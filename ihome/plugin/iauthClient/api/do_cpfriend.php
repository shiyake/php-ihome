<?php
/*
	cpfriend.php文件用于分页查看好友，查看与指定好友的状态，以及请求对方为好友，或解除好友关系。
	输入参数有：指定好友uid（可选）、请求添加好友（可选）、解除好友关系（可选）。
	Add by xuxing@ihome. 2012-11-5  9:13
*/
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');

	$touserid = intval(trim($_POST['targetuid']));
	//$userid = 3;
	//$touserid = 102;
	
	if($userid == $touserid){
		$result = array('flag'=>'sameuser');
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
	
	//获得对方用户的用户名
	$query = $_SGLOBAL['db']->query("SELECT username,name FROM ".tname('space')." where uid = $touserid");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$tousername = $value['username'];
		$touserrealname = $value['name']?$value['name']:$value['username'];
	}else{
		$result = array('flag'=>'touseridnotexist');
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}	

	global $space;
	
	if(!$space){
		$space = getspace($userid, 'uid');
	}

	if($touserid){
		$fstatus = getfriendstatus($userid, $touserid);//检测相互是否请求过好友，0为单向，1为互为好友，-1为不存在；当前用户对目标用户的好友关系；
		$rfstatus = getfriendstatus($touserid, $userid);//检测相互是否请求过好友，0为单向，1为互为好友，-1为不存在；目标用户对当前用户的好友关系；
		
		$type = $_POST['type'];
//$type="ignore";
		if($type == 'add'){
			if($fstatus == 1) {
				$result = array('flag'=>'isfriends');
			} else {
				if($rfstatus == -1) {
					//对方没有加好友，我加别人
					if($fstatus == -1) {
						$setarr = array(
							'uid' => $userid,
							'fuid' => $touserid,
							'fusername' => $tousername,
							'gid' => 0,
							'dateline' => time()
						);
						inserttable('friend', $setarr);
						
						//发送邮件通知
						smail($touserid, '', cplang('friend_subject',array($space['name'], getsiteurl().'cp.php?ac=friend&amp;op=request')), '', 'friend_add');

						//增加对方好友申请数
						$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum+1 WHERE uid='$touserid'");
						
						$result = array('flag'=>'issending');
					} else {
						$result = array('flag'=>'hassended');
					}
				} else {
					//对方加了我为好友，我审核通过
					friend_update($userid, $space['username'], $touserid, $tousername, 'add', 0);

					//事件发布
					//加好友不发布事件
					if(ckprivacy('friend', 1)) {
						$fs = array();
						$fs['icon'] = 'friend';
		
						$fs['title_template'] = cplang('feed_friend_title');
						$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$touserid\">".$touserrealname."</a>");
		
						$fs['body_template'] = '';
						$fs['body_data'] = array();
						$fs['body_general'] = '';

						feed_add($fs['icon'], $fs['title_template'], $fs['title_data'], $fs['body_template'], $fs['body_data'], $fs['body_general']);
					}
					
					//我的好友申请数进行变化
					$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum-1 WHERE uid=$userid AND addfriendnum>0");
					
					
					//通知
					notification_add($tousesrid, 'friend', cplang('note_friend_add'));
					$result = array('flag'=>'added');
				}
			}
		}elseif($type == 'ignore'){
			if($rfstatus == 1) {

				//取消双向好友关系
				friend_update($userid, $space['username'], $touserid, '', 'ignore');
				$result = array('flag'=>'ignored');
			} elseif ($rfstatus == 0) {
				request_ignore($touserid);
				$result = array('flag'=>'ignored');
			}
			else{
				$result = array('flag'=>'notfriends');
			}
		}else{
			$friends = explode(',',$space['friend']);
			if(in_array($touserid, $friends)){
				$result = array('flag'=>'isfriend');
			}else{
				$result = array('flag'=>'notfriends');

			}
		}
	}
	else{
	
		/*
		无参数时，则默认显示所有好友，返回格式为：
		{flag:all,count:好友数,start:显示好友的起始位置,data:[{fuid:好友1的uid,f_name:好友1的姓名},{fuid:好友2的uid,f_name:好友2的姓名},...]}
		如果没有好友，则返回nofriend
		*/
		//分页
		$perpage = 20;
		$count = 0;
		$page = empty($_POST['page'])?0:intval($_POST['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		
		$friendnum = $space['friendnum'];

		if($friendnum) {
			$result = array('flag'=>'all','count'=>$friendnum,'start'=>$start);
			$query = $_SGLOBAL['db']->query("SELECT s.uid, s.username, s.name
				FROM ".tname('friend')." main
				LEFT JOIN ".tname('space')." s ON s.uid=main.fuid
				WHERE main.uid=$userid AND main.status='1' 
				ORDER BY main.num DESC, main.dateline DESC
				LIMIT $start,$perpage");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				if(!$value['name']){
					$value['name'] = $value['username'];
				}
				$result['data'][] = array('fuid'=>$value['uid'],'f_name'=>$value['name']);
			}
		}else{
			$result = array('flag'=>'nofriend');
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>