<?php
/*
     addcomplain.php发布纪录
     Add by am@ihome.2013-07-09  14:34

*/
	//include_once('../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./source/function_common.php');
	include_once('do_mobileverify.php');
	/*
	$username = 'anminghao';
	$userid = 96 ;
	$FromDevice = 'mobile';
	$Message = '   @诉求1(200) 什么情况啊    ';
	*/
	$Message = $_POST['message'];
	$FromDevice = trim($_POST['fromdevice']);
	
	if(empty($Message)){
		$arrs = array('flag'=>'no message');
		$result = json_encode($arrs);
	    $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}else if(strlen(trim($Message)) < 2){
		$arrs = array('flag'=>'content_is_too_short');
		$result = json_encode($arrs);
	    $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}else{
		preg_match_all("/[@](.*)[(]([\d]+)[)]\s/U",$Message, $matches, PREG_SET_ORDER);
		if(empty($matches)){
			$arrs = array('flag'=>'no Department');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}
	foreach($matches as $value){
		$TmpString = $value[0]; 
		$TmpName = $value[1]; 
		$UserId = $value[2];
		$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
		$rs = $_SGLOBAL['db']->fetch_array($result);
		$realname = $rs['name'];	
			
       
		//调用检查函数将@后的内容进行验证，为UID对应的姓名相同则返回@与姓名，不相同则继续判断下一个@，没有找到匹配的最终将返回false
		$ValidValue = getAtName($TmpString, $TmpName, $realname);
		$ValidValue = trim($ValidValue);
		$at_friend= "space.php?uid=".$UserId;	
		$Message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $Message);
		$UserIds[] = $UserId;
			
}
	//替换表情
	$Message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $Message);
	$Message = preg_replace("/\<br.*?\>/is", ' ', $Message);
	
	
	$arr = array(
	"username" => getstr($username, 15, 1, 1, 1),
	"message" => $Message,
	"uid" => intval($userid),
	"replynum"=>0,
	"mood"=>0,
	'dateline' => $_SGLOBAL['timestamp'],
	'ip' => getonlineip(),
	'fromdevice' => $FromDevice
	);
	$newdoid = inserttable('doing', $arr,1);

	$isComplain = TRUE;
		$nowtime = time();
		/*
		//积分低于积分规则中设置的数值时,禁止发起诉求,将诉求转为普通记录
		@include_once(S_ROOT.'./data/data_creditrule.php');
		print_r($_SGLOBAL['member']['credit']);
		echo 111;
		print_r($_SGLOBAL['creditrule']['complain']['credit']);
		if(($_SGLOBAL['member']['credit'] < $_SGLOBAL['creditrule']['complain']['credit'])){
			$isComplain = FALSE;
			$note = cplang('note_complain_credit_failed', array("space.php?do=doing&doid=$newdoid"));
			notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
		}
		*/
		foreach($UserIds as $UserId){
			if($isComplain){
				//根据@到的用户ID,查询该用户是否为部门
				$UserDept = isDepartment($UserId ,0);
				if($UserDept){
					$nowtime = time();
					$dateline = strtotime("+1 days", $nowtime);
					$complain = array(
						'doid' => $newdoid,
						'uid' => $userid,
						'uname' => $username,
						'atdepartment' => $UserDept['department'],
						'atdeptuid' => $UserId,
						'from' => $username,
						'atuid' => $UserId,
						'atuname' => $UserDept['department'],
						'isreply' => 0,
						'addtime' => $nowtime,
						'dateline' => $dateline,
						'expire' => 0,
						'times' => 1,
						'issendmsg' =>0,
						'message' => $Message
					);
					$newcomplainid = inserttable('complain', $complain, 1);
				}
				
					//通知被@的部门,有用户投诉
					$note = cplang('note_complain_buchu', array("space.php?do=doing&doid=$newdoid",date('Y-m-d H:i' ,$dateline)));
					notification_complain_add($UserId, 'complain', $note);
					$complainOK = TRUE;
					if($complainOK){//通知用户诉求发起成功
					$note = cplang('note_complain_user_success', array("space.php?do=doing&doid=$newdoid"));
					notification_complain_add($userid, 'complain', $note);
					getreward('complain', 1, $userid);
		}

	
	

	//事件feed
	$feedarr = array(
		'appid' => UC_APPID,
		'icon' => 'doing',
		'uid' => $userid,
		'username' =>$username,
		'dateline' => $_SGLOBAL['timestamp'],
		'title_template' => cplang('feed_doing_title'),
		'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$Message)))),
		'body_template' => '',
		'body_data' => '',
		'id' => $newcomplainid,
		'idtype' => 'doid',
		'fromdevice' => $FromDevice
		);
		$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//喜好hash
		$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//合并hash
		inserttable('feed', $feedarr,1);
		updatestat('doing');
		//更新空间note
		$setarr = array('note'=>$Message);		
		if(!empty($_POST['spacenote'])) {
		             $reward = getreward('updatemood', 0);
		             $setarr['spacenote'] = $Message;
	    } else {
		$reward = getreward('doing', 0);
	    }
		updatetable('spacefield', $setarr, array('uid'=>$userid));

		//返回flag
			if($newcomplainid){
				$arrs = array('flag'=>'success');
			}else{
				$arrs = array('flag'=>'fail');
			}
		}
	}
}
	    $result = json_encode($arrs);
	    $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	
	
	
	
?>