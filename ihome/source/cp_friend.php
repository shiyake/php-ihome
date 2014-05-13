<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}
//showmessage(cc);//2013年3月11日10:54:03 For find bug @Ancon
require_once('space_friendrecommend.php');

$op = empty($_GET['op'])?'':$_GET['op'];
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);

$space['key'] = space_key($space);

$actives = array($op=>' class="active"');

//邀请功能
$tmpuid = $_SGLOBAL['supe_uid'] ? $_SGLOBAL['supe_uid'] : $uid;
if($tmpuid){
	$querygroupid = $_SGLOBAL['db']->query("SELECT pptype,caninvite FROM ".tname('space')." WHERE uid='$tmpuid'");
	$valuegroupid = $_SGLOBAL['db']->fetch_array($querygroupid);
	if(isDepartMent($_SGLOBAL['supe_uid'],0)||$valuegroupid['pptype']==1 ||$valuegroupid['pptype']==2||$valuegroupid['caninvite']==1 ){//显示邀请功能
		$_SCONFIG['closeinvite'] = 1;
	}else{//不显示邀请功能
		$_SCONFIG['closeinvite'] = 0;
	}
}else{
	$_SCONFIG['closeinvite'] = 0;
}
/***********************************martin 修改*******************************************************/

if($op == 'add') {

	if(!checkperm('allowfriend')) {
		ckspacelog();
		#showmessage('no_privilege');
	}

	//检测用户
//	showmessage('aa');
	if($uid == $_SGLOBAL['supe_uid']) {
		showmessage('friend_self_error');
	}
	
	if($space['friends'] && in_array($uid, $space['friends'])) {
		showmessage('you_have_friends');
	}

	//实名认证
	ckrealname('friend');

	$tospace = getspace($uid);
	if(empty($tospace)) {
		showmessage('space_does_not_exist');
	}

	//黑名单
	if(isblacklist($tospace['uid'])) {
		showmessage('is_blacklist');
	}

	//用户组
	$groups = getfriendgroup();

		////////////////////////////
		//公共主页添加关注        //
		//coding by Lv            //
		//Last edit 2012-07-01    //
		////////////////////////////		
		$query1 = $_SGLOBAL['db']->query("SELECT s.*,sf.friend FROM ".tname('space')." s, ".tname('spacefield')." sf WHERE s.uid='$uid' and s.uid=sf.uid");
		$value1 = $_SGLOBAL['db']->fetch_array($query1);
		$fstatus = getfriendstatus($uid, $_SGLOBAL['supe_uid']);//检测相互是否请求过好友，0为单向，1为互为好友，-1为不存在；
		$m_gid = $value1['groupid'];
		$publicaud = $value1['aud'];//获得粉丝
		if($m_gid == 3 && $fstatus == -1) {	
				//检查是否已关注
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$_SGLOBAL[supe_uid]");	
				$value = $_SGLOBAL['db']->fetch_array($query);
				if(!empty($value['feedfriend'])){
					$myfeedfriend= explode(",", $value['feedfriend']);
					$myfeedfriend = array_flip(array_flip($myfeedfriend));//唯一化数组元素

					if(in_array($uid, $myfeedfriend)) {
						showmessage('public_have');
					}
					//把对方加到自己的feed中，不改变好友数(只收听，而不是好友)	
					$myfeedfriend[] = $uid;
					$myfeedfriend = array_filter($myfeedfriend);
					$myfeedfriendnew=implode(",", $myfeedfriend);
				}else{
					$myfeedfriendnew = $uid;
				}
				//showmessage($myfeedfriendnew);
				/*$setarr=array('feedfriend'=> $value['feedfriend'].','.$uid );
				if($value['feedfriend'] == ''){
					$setarr['feedfriend']=$uid;
				}*/
				updatetable('spacefield',array('feedfriend'=>$myfeedfriendnew),array('uid'=>$_SGLOBAL['supe_uid']));//加入feedfriend，接受feed
											
				//$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET audnum=audnum+1 WHERE uid='$uid' ");//增加观众数

				//$queryx = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$uid'");//加入观众列表
				//$valuex = $_SGLOBAL['db']->fetch_array($queryx);
				$aud=explode(",", $value1['aud']);
				$friends = explode(',', $value1['friend']);
				$aud = array_merge($aud,$friends);
				//$audlist = implode(',', $aud);
				//showmessage($audlist);
				//echo  $valuex['aud'];
				$aud = array_flip(array_flip($aud));//唯一化数组元素

				if(!in_array($_SGLOBAL['supe_uid'], $aud)) {
					$aud[]=$_SGLOBAL['supe_uid'];
				}
				$aud = array_filter($aud);
				sort($aud);
				$na=implode(",", $aud);
				//showmessage($na);exit();
				$setarr=array('aud'=> $na,'audnum'=>count($aud));
				updatetable('space',$setarr,array('uid'=>$uid));
				showmessage('public_add','space.php?uid='.$uid,1);

		
				
		}
		//////////Lv/////////////
	//检测现在状态
	$status = getfriendstatus($_SGLOBAL['supe_uid'], $uid);
	if($status == 1) {
		showmessage('you_have_friends');
	} else {

		//检查数目
		$maxfriendnum = checkperm('maxfriendnum');
		if($maxfriendnum && $space['friendnum'] >= $maxfriendnum + $space['addfriend']) {
			if($_SGLOBAL['magic']['friendnum']) {
				showmessage('enough_of_the_number_of_friends_with_magic');
			} else {
				showmessage('enough_of_the_number_of_friends');
			}
		}
		//检查数目
		$maxfriendnum = checkperm('maxfriendnum');
		if($maxfriendnum && $space['friendnum'] >= $maxfriendnum + $space['addfriend']) {
			if($_SGLOBAL['magic']['friendnum']) {
				showmessage('enough_of_the_number_of_friends_with_magic');
			} else {
				showmessage('enough_of_the_number_of_friends');
			}
		}
				
		//对方是否把自己加为了好友
		$fstatus = getfriendstatus($uid, $_SGLOBAL['supe_uid']);
		if($fstatus == -1) {
			//对方没有加好友，我加别人
			if($status == -1) {

				//视频认证
				if($tospace['videostatus']) {
					ckvideophoto('friend', $tospace);
				}
                if (empty($_SGLOBAL['check_bot'])) {
                    $before_time = $_SGLOBAL['timestamp'] - 10 * 60;
                    $query = $_SGLOBAL['db']->query("select count(*) from ".tname('friend')." where status = 0 and dateline > $before_time");
                    if ($item = $_SGLOBAL['db']->fetch_array($query)) {
                        if ($item['count(*)'] >= 10) {
                            $_SGLOBAL['check_bot'] = 1;
                        }
                    }
                }


				if(submitcheck('addsubmit')) {
                    if ($_SGLOBAL['check_bot'] && !ckseccode($_POST['seccode'])) {
                        showmessage('incorrect_code');
                    }

					$setarr = array(
						'uid' => $_SGLOBAL['supe_uid'],
						'fuid' => $uid,
						'fusername' => addslashes($tospace['username']),
						'gid' => intval($_POST['gid']),
						'note' => getstr($_POST['note'], 50, 1, 1),
						'dateline' => $_SGLOBAL['timestamp']
					);
					inserttable('friend', $setarr);
					
					//if I am a publicpage, and the user follow me, then be friends directly.
					//by xuxing@ihome. 2013-4-28
					if($_SGLOBAL['member']['groupid'] == 3 && in_array($uid, explode(',',$_SGLOBAL['member']['aud']))) {
						//showmessage($space['uid'].'---'.$space['username'].'----'.$tospace['uid'].'---'.$tospace['username']);
						friend_update($tospace['uid'], $tospace['username'], $space['uid'], $space['username'], 'add', 0);
						notification_add($tospace['uid'], 'friend', cplang('note_friend_add'));
						showmessage('friends_add', $_POST['refer'], 1, array($_SN[$tospace['uid']]));
						exit();
					}

				//end by xuxing.
				

					//发送邮件通知
					smail($uid, '', cplang('friend_subject',array($_SN[$space['uid']], getsiteurl().'cp.php?ac=friend&amp;op=request')), '', 'friend_add');

					//增加对方好友申请数
					$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum+1 WHERE uid='$uid'");
					
					showmessage('request_has_been_sent');
				} else {
					include_once template('cp_friend');
					exit();
				}
			} else {
				showmessage('waiting_for_the_other_test');
			}
		} else {
			//对方加了我为好友，我审核通过
			if(submitcheck('add2submit')) {
				//成为好友
				$gid = intval($_POST['gid']);

				friend_update($space['uid'], $space['username'], $tospace['uid'], $tospace['username'], 'add', $gid);

				//事件发布
				//加好友不发布事件
				if(ckprivacy('friend', 1)) {
					$fs = array();
					$fs['icon'] = 'friend';
	
					$fs['title_template'] = cplang('feed_friend_title');
					$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>");
	
					$fs['body_template'] = '';
					$fs['body_data'] = array();
					$fs['body_general'] = '';

					feed_add($fs['icon'], $fs['title_template'], $fs['title_data'], $fs['body_template'], $fs['body_data'], $fs['body_general']);
				}
				
				//我的好友申请数进行变化
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum-1 WHERE uid='$space[uid]' AND addfriendnum>0");
				
				//处理公共主页的粉丝，如果不存在则添加当前用户为该公共主页的粉丝
				if($m_gid == 3){
					$publicaudlist=explode(",", $publicaud);
					if(!in_array($_SGLOBAL['supe_uid'], $publicaudlist)){
						$publicaudlist[] = $_SGLOBAL['supe_uid'];
						$publicaudlist = array_flip(array_flip($publicaudlist));
						$publicaudlist = array_filter($publicaudlist);
						sort($publicaudlist);
						$newpublicaud = implode(",", $publicaudlist);			
						$setarr=array('aud'=> $newpublicaud,'audnum'=>count($publicaudlist));
						updatetable('space',$setarr,array('uid'=>$uid));
					}
				}
				//end by xuxing 2012-10-20
				
				//通知
				notification_add($uid, 'friend', cplang('note_friend_add'));

				showmessage('friends_add', $_POST['refer'], 1, array($_SN[$tospace['uid']]));
			} else {
				$op = 'add2';
				include_once template('cp_friend');
				exit();
			}
		}
	}

} elseif($op == 'ignore') {

//showmessage('1111');
	//检测用户
	if($uid) {
		
		////////////////////////////
		//公共主页取消关注        //
		//coding by lv            //
		//Last edit 2012-07-22    //
		////////////////////////////		
		if(submitcheck('friendsubmit')) {
			//$fstatus = getfriendstatus($uid, $space['uid']);
			$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$uid'");
			$value1 = $_SGLOBAL['db']->fetch_array($query1);
			
			$m_gid = $value1['groupid'];
			$publicaud = $value1['aud'];
			$fstatus = getfriendstatus($uid, $_SGLOBAL['supe_uid']);
			if($m_gid == 3) {
				if ($fstatus == 0) {
					request_ignore($uid);
				}
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$_SGLOBAL[supe_uid]");	
				$value = $_SGLOBAL['db']->fetch_array($query);
				$myfeedfriend = explode(",", $value['feedfriend']);
				$myfeedfriend = array_flip(array_flip($myfeedfriend));//唯一化数组元素

				if(!in_array($uid, $myfeedfriend) && $fstatus<0) {
					showmessage('public_not_have');
				}
				//修改自己的feedfriend，不再接受feed
				$k = array_search($uid,$myfeedfriend);

				//在数组中删除不再关注的用户ID
				unset($myfeedfriend[$k]);
				$myfeedfriend = array_filter($myfeedfriend);
				$f = implode(',',$myfeedfriend);
				
				$setarrAAA=array('feedfriend' => $f );
				updatetable('spacefield',$setarrAAA,array('uid'=>$_SGLOBAL['supe_uid']));

				//减少粉丝数
				$auds = explode(",", $value1['aud']);
				$auds = array_flip(array_flip($auds));//唯一化数组元素
				$k = array_search($_SGLOBAL[supe_uid],$auds);
				unset($auds[$k]);
				$auds = array_filter($auds);
				sort($auds);
				$f = implode(',',$auds);			
				//减少publicpage的粉丝数
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET aud='".$f."', audnum=".count($auds)." WHERE uid='$uid'");
				$setarr=array('aud'=> $f,'audnum'=>count($auds));
				updatetable('space',$setarr,array('uid'=>$uid));
				
				
			}

			//////////lv///////////////
			//对方与我的关系
			//$fstatus = getfriendstatus($uid, $space['uid']);
			if($fstatus == 1) {
				//如果当前用户为公共主页，则将指定uid从aud中删除 start by xuxing 2012-10-20
				if($_SGLOBAL['member']['groupid'] == 3){
					$myauds = array();
					$myauds = explode(",", $_SGLOBAL['member']['aud']);
					$myauds = array_flip(array_flip($myauds));//唯一化数组元素
					$k = array_search($uid, $myauds);
					unset($myauds[$k]);
					$myauds = array_filter($myauds);
					sort($myauds);
					$restnum = count($myauds);
					$restaud = implode(',', $myauds);			
					//showmessage('1111'.$restum);
					//减少publicpage的粉丝数
					$setarr=array('aud'=> $restaud,'audnum'=>count($myauds));
					updatetable('space',$setarr,array('uid'=>$_SGLOBAL['supe_uid']));

				}
				// end by xuxing 2012-10-20
				
				//取消双向好友关系
				if($_SGLOBAL['member']['groupid'] == 3){
					friend_update($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username'], $uid, '', 'ignore',0,1);
				}else{
					friend_update($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username'], $uid, '', 'ignore');
				}

			} elseif ($fstatus == 0) {
				request_ignore($uid);
			}
			showmessage('do_success', 'cp.php?ac=friend&op=request', 0);
		}
	} elseif($_GET['key'] == $space['key']) {
		//批量忽略好友请求
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('friend')." WHERE fuid='$space[uid]' AND status='0' LIMIT 0,1");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			//删除
			$uid = $value['uid'];
			$username = getcount('space', array('uid'=>$uid), 'username');
			request_ignore($uid);
			
			showmessage('friend_ignore_next', 'cp.php?ac=friend&op=ignore&confirm=1&key='.$space['key'], 1, array($username));
		} else {
			showmessage('do_success', 'cp.php?ac=friend&op=request', 0);
		}
	}
	
} elseif($op == 'addconfirm') {

	if($_GET['key'] == $space['key']) {
		
		//检查数目
		$maxfriendnum = checkperm('maxfriendnum');
		if($maxfriendnum && $space['friendnum'] >= $maxfriendnum + $space['addfriend']) {
			if($_SGLOBAL['magic']['friendnum']) {
				showmessage('enough_of_the_number_of_friends_with_magic');
			} else {
				showmessage('enough_of_the_number_of_friends');
			}
		}
		
		//批量审核
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('friend')." WHERE fuid='$space[uid]' AND status='0' LIMIT 0,1");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			
			$uid = $value['uid'];
			$username = getcount('space', array('uid'=>$uid), 'username');
			
			friend_update($space['uid'], $space['username'], $uid, $tospace['username'], 'add', 0);
			
			//我的好友申请数进行变化
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum-1 WHERE uid='$space[uid]' AND addfriendnum>0");

			//不产生feed
			showmessage('friend_addconfirm_next', 'cp.php?ac=friend&op=addconfirm&key='.$space['key'], 1, array($username));
		}
	}

	showmessage('do_success', 'cp.php?ac=friend&op=request', 0);

} elseif($op == 'syn') {

	//获取用户中心我的fans列表
	if(isset($_SCOOKIE['synfriend']) || empty($_SCONFIG['uc_status'])) {
		exit();
	}

	include_once S_ROOT.'./uc_client/client.php';
	$buddylist = uc_friend_ls($_SGLOBAL['supe_uid'], 1, 999, 999, 2);//别人加了我

	$havas = array();
	if($buddylist && is_array($buddylist)) {
		foreach($buddylist as $key => $buddy) {
			$uids[] = $buddy['uid'];
		}
		$members = array();
		if($uids) {
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('space')." WHERE uid IN (".simplode($uids).")");
			while($member = $_SGLOBAL['db']->fetch_array($query)) {
				$members[] = $member['uid'];
			}
		}
		if($members) {
			foreach($buddylist as $key => $buddy) {
				if(in_array($buddy['uid'], $members)) {
					$havas[$buddy['uid']] = $buddy;
				}
			}
		}
	}

	//查找当前好友
	if($havas) {
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('friend')." WHERE fuid='$_SGLOBAL[supe_uid]'");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(isset($havas[$value['uid']])) {
				unset($havas[$value['uid']]);
			}
		}
	}
	
	//我的黑名单
	$blacklist = array();
	$query = $_SGLOBAL['db']->query("SELECT buid FROM ".tname('blacklist')." WHERE uid='$_SGLOBAL[supe_uid]'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$blacklist[$value['buid']] = $value['buid'];
	}

	//添加好友
	$addnum = 0;
	$inserts = array();
	if($havas) {
		foreach ($havas as $value) {
			if($_SGLOBAL['supe_uid'] != $value['uid'] && empty($blacklist[$value['uid']])) {
				$value['username'] = addslashes($value['username']);
				if($value['direction'] == 3) {//双向
					$inserts[] = "('$_SGLOBAL[supe_uid]','$value[uid]','$value[username]','1','$_SGLOBAL[timestamp]')";
					$inserts[] = "('$value[uid]','$_SGLOBAL[supe_uid]','$_SGLOBAL[supe_username]','1','$_SGLOBAL[timestamp]')";
				} else {//别人加我
					$addnum++;
					$inserts[] = "('$value[uid]','$_SGLOBAL[supe_uid]','$_SGLOBAL[supe_username]','0','$_SGLOBAL[timestamp]')";
				}
			}
		}
	}
	if($inserts) {
		$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',',$inserts));
		friend_cache($_SGLOBAL['supe_uid']);
	}
	if($addnum) {
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum+$addnum WHERE uid='$_SGLOBAL[supe_uid]'");
	}

	ssetcookie('synfriend', 1, 1800);//30分钟检查一次
	exit();

} elseif($op == 'find') {

	//自动找好友
	$maxnum = 18;
	
	$nouids = $space['friends'];
	$nouids[] = $space['uid'];

	//就在您附近的
	$nearlist = array();
	$i=0;
	$myip = getonlineip(1);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')."
		WHERE ip='$myip' LIMIT 0,200");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!in_array($value['uid'], $nouids)) {
			realname_set($value['uid'], $value['username']);
			$nearlist[] = $value;
			$i++;
			if($i>=$maxnum) break;
		}
	}
	
	//好友的好友
	$i = 0;
	$friendlist = array();
	if($space['feedfriend']) {
		$query = $_SGLOBAL['db']->query("SELECT fuid AS uid, fusername AS username FROM ".tname('friend')."
			WHERE uid IN (".$space['feedfriend'].") LIMIT 0,200");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(!in_array($value['uid'], $nouids) && $value['username']) {
				realname_set($value['uid'], $value['username']);
				$friendlist[$value['uid']] = $value;
				$i++;
				if($i>=$maxnum) break;
			}
		}
	}

	//当前在线的好友
	$i = 0;
	$onlinelist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')." LIMIT 0,200");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!in_array($value['uid'], $nouids)) {
			realname_set($value['uid'], $value['username']);
			$onlinelist[] = $value;
			$i++;
			if($i>=$maxnum) break;
		}
	}

	realname_get();

} elseif($op == 'search2') {
    $maxnum = 9;
    $nouids = $space['friends'];
    $nouids[] = $space['uid'];

    $list = array(); 
    @include_once(S_ROOT.'./data/data_profilefield.php');
    $fields = empty($_SGLOBAL['profilefield'])?array():$_SGLOBAL['profilefield'];
    if (!empty($_GET['searchsubmit'])) {
        $_GET['searchsubmit'] = 1;

        $wherearr = $fromarr = $uidjoin = array();
        $fsql = '';
        $fromarr['space'] = tname('space').' s';
        $wherearr[] = "s.groupid != 3";
        if($searchkey = stripsearchkey($_GET['searchkey'])) {
            $uid = intval($searchkey);
            $wherearr[] = "(s.name like '%$searchkey%' OR s.username like '%$searchkey%' OR s.uid = '$uid')";
        }
        
        foreach (array('sex','marry','birthprovince','birthcity',) as $value) {
            if($_GET[$value]) {
                $fromarr['spacefield'] = tname('spacefield').' sf';
                $wherearr['spacefield'] = "sf.uid=s.uid";
                $wherearr[] = "sf.$value='{$_GET[$value]}'";
                $fsql .= ", sf.$value";
            }
        }

        $agerange = intval($_GET['age']);
        $startage = $endage = 0;
        if ($agerange == 1) {
            $startage = sgmdate('Y') - 15;
        } elseif ($agerange == 2) {
            $startage = sgmdate('Y') - 22;
            $endage = sgmdate('Y') - 16;
        } elseif ($agerange == 3) {
            $startage = sgmdate('Y') - 30;
            $endage = sgmdate('Y') -23;
        } elseif ($agerange == 4) {
            $startage = sgmdate('Y') - 40;
            $endage = sgmdate('Y') - 31;
        } elseif ($agerange == 5) {
            $endage = sgmdate('Y') - 41;
        }
        if ($startage || $endage) {
            $fromarr['spacefield'] = tname('spacefield').' sf';
            $wherearr['spacefield'] = "sf.uid=s.uid";
        }
        if($startage && $endage && $endage > $startage) {
            $wherearr[] = '(sf.birthyear>='.$startage.' AND sf.birthyear<='.$endage.')';
        } elseif ($startage && empty($endage)) {
            $wherearr[] = 'sf.birthyear>='.$startage;
        } else if(empty($startage) && $endage) {
            $wherearr[] = 'sf.birthyear<='.$endage;
        }

        foreach (array('subtitle', 'startyear') as $value) {
            if($_GET[$value]) {
                $fromarr['spaceinfo'] = tname('spaceinfo').' si';
                $wherearr['spaceinfo'] = 'si.uid=s.uid';
                $wherearr[] = "si.$value LIKE '%{$_GET[$value]}%'";
            }
        }

        $page = intval($_GET['page']) - 1;
	    $prev_page = -1;
	    $next_page = -1;
	    $total = 0;
        if ($wherearr) {
            $query = $_SGLOBAL['db']->query("SELECT s.* $fsql FROM ".implode(',', $fromarr)." WHERE ".implode(' AND ', $wherearr)." LIMIT 0,500");
            $total = $_SGLOBAL['db']->num_rows($query);
	    
	        $offset = 0;
	        if ($total > $page * $maxnum) {
		        $offset = $page * $maxnum;
	        } else {
		        $page = floor($total / $maxnum);
		        $offset = $page * $macnum;
	        }
	
	        $prev_page = $page - 1;
	        $next_page = floor($total / $maxnum) > $page ? ($page + 1) : -1;
	        mysql_data_seek($query, $offset);
	        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
                realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
                $value['isfriend'] = ($value['uid']==$space['uid'] || ($space['friends'] && in_array($value['uid'], $space['friends']))) ? 1 : 0;
                $value['status'] = getfriendstatus($space['uid'], $value['uid']);
                $value['commonfriends'] = getcommonfriend($value['uid'], $space['uid']);
		        if ($value['commonfriends']) {
                    $value['commonfriendcount'] = count($value['commonfriends']);
                    $value['commonfriendstr'] = cplang('common_friends', array(implode(',', array_slice(array_values($value['commonfriends']), 0, 6)), $value['commonfriendcount']));
                }
		        $list[$value['uid']] = $value;
	        
		        if(count($list)>=$maxnum) break;
            }
        }

        $theurl = "cp.php?searchkey=".$_GET['searchkey']."&sex=".$_GET['sex'];
        $theurl = $theurl."&age=".$_GET['age']."&marry=".$_GET['marry']."&birthprovince=".$_GET['birthprovince'];
        $theurl = $theurl."&birthcity=".$_GET['birthcity']."&subtitle=".$_GET['subtitle'];
        $theurl = $theurl."&startyear=".$_GET['startyear']."&ac=friend&op=search2&searchsubmit=1";
		$multi = multi($total, $maxnum, $page + 1, $theurl);

        realname_get();
    } else {
        if($space['feedfriend']) {
           $query = $_SGLOBAL['db']->query("SELECT fuid AS uid, fusername AS username FROM ".tname('friend')." f, ".tname('space')." s WHERE f.fuid = s.uid AND s.groupid != 3 AND  f.uid IN (".$space['feedfriend'].") AND f.status = 1 LIMIT 0,200"); 
            $count = $_SGLOBAL['db']->num_rows($query);
            $offset = 0;
            if ($count > 6) {
                $offset = rand(0, $count-6);
            }
            mysql_data_seek($query, $offset);
            while ($value = $_SGLOBAL['db']->fetch_array($query)) {
                if(!in_array($value['uid'], $nouids) && $value['username']) {
                    realname_set($value['uid'], $value['username']);
                    $value['status'] = getfriendstatus($space['uid'], $value['uid']);
                    $value['commonfriends'] = getcommonfriend($space['uid'], $value['uid']);
                    $value['commonfriendcount'] = count($value['commonfriends']);
                    $value['res']='many_same_friend';
                    if ($value['commonfriendcount'] > 0) {
                        $value['commonfriendstr'] = cplang('common_friends', array(implode(',', array_slice(array_values($value['commonfriends']), 0, 6)), $value['commonfriendcount']));
                        $list[$value['uid']] = $value;
                        if(count($list)>=$maxnum/2)   break;
                     }
                }	    
             }

            $query = $_SGLOBAL['db']->query("SELECT ihome_friend_toRecomment.uid2 as uid,ihome_friend_toRecomment.res_toRecomment as res,ihome_friend_toRecomment.other as other, ihome_friend_toRecomment.username as username FROM ihome_friend_toRecomment,".tname('space')." where ihome_friend_toRecomment.uid1='".$space['uid']."' and ihome_friend_toRecomment.uid1=".tname('space').".uid;"); 
            mysql_data_seek($query, $offset);
            while ($value = $_SGLOBAL['db']->fetch_array($query)) {
                if(!in_array($value['uid'], $nouids) && $value['username']) {
                    realname_set($value['uid'], $value['username']);
                    $value['status'] = getfriendstatus($space['uid'], $value['uid']);
                    if(!strcmp($value['res'],'same_class_edu')) {
                        $value['commonclassnum']=$value['other'];
                        $value['commonclass']=cplang('common_class',array($value['commonclassnum']));
                        $list[$value['uid']]=$value;
                    } else if(!strcmp($value['res'],'same_class_work')) {
                        $value['commonclassnum']=$value['other'];
                        $value['commonclass']=cplang('common_class',array($value['commonclassnum']));
                        $list[$value['uid']]=$value;
                                         
                    } else if(!strcmp($value['res'],'same_hometown')) {
                        $value['commonhometown']=cplang('common_hometown',array($value['other']));
                        $list[$value['uid']]=$value;
                    }
                    if(count($list)>=$maxnum) break;
                }
            }
	
            #$list = null;
           realname_get();
        }
    }
} elseif($op == 'changegroup') {

	if(submitcheck('changegroupsubmit')) {
		updatetable('friend', array('gid'=>intval($_POST['group'])), array('uid'=>$_SGLOBAL['supe_uid'], 'fuid'=>$uid));
		friend_cache($_SGLOBAL['supe_uid']);
		showmessage('do_success', $_SGLOBAL['refer']);
	}

	//获得当前用户group
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$_SGLOBAL[supe_uid]' AND fuid='$uid'");
	if(!$friend = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('specified_user_is_not_your_friend');
	}
	$groupselect = array($friend['gid'] => ' checked');

	$groups = getfriendgroup();

} elseif($op == 'changenum') {

	if(submitcheck('changenumsubmit')) {
		updatetable('friend', array('num'=>intval($_POST['num'])), array('uid'=>$_SGLOBAL['supe_uid'], 'fuid'=>$uid));
		friend_cache($_SGLOBAL['supe_uid']);
		showmessage('do_success', $_SGLOBAL['refer'], 0);
	}

	//获得当前用户group
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$_SGLOBAL[supe_uid]' AND fuid='$uid'");
	if(!$friend = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('specified_user_is_not_your_friend');
	}
	
} elseif($op == 'group') {

	if(submitcheck('groupsubmin')) {
		if(empty($_POST['fuids'])) {
			showmessage('please_correct_choice_groups_friend');
		}
		$ids = simplode($_POST['fuids']);
		$groupid = intval($_POST['group']);
		updatetable('friend', array('gid'=>$groupid), "uid='$_SGLOBAL[supe_uid]' AND fuid IN ($ids) AND status='1'");
		friend_cache($_SGLOBAL['supe_uid']);
		showmessage('do_success', $_SGLOBAL['refer']);
	}

	$perpage = 50;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;

	$list = array();
	$multi = $wheresql = '';
	if($space['friendnum']) {
		$groups = getfriendgroup();

		$theurl = 'cp.php?ac=friend&op=group';
		$group = !isset($_GET['group'])?'-1':intval($_GET['group']);
		if($group > -1) {
			$wheresql = "AND main.gid='$group'";
			$theurl .= "&group=$group";
		}

		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('friend')." main
			WHERE main.uid='$space[uid]' AND main.status='1' $wheresql"), 0);
		$query = $_SGLOBAL['db']->query("SELECT main.fuid AS uid,main.fusername AS username, main.gid, main.num FROM ".tname('friend')." main
			WHERE main.uid='$space[uid]' AND main.status='1' $wheresql
			ORDER BY main.dateline DESC
			LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username']);
			$value['group'] = $groups[$value['gid']];
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $theurl);
	}
	$groups = getfriendgroup();

	$actives = array('group'=>' class="active"');

	//实名
	realname_get();

} elseif($op == 'request') {

	if(submitcheck('requestsubmin')) {
		showmessage('do_success', $_SGLOBAL['refer']);
	}
	
	$maxfriendnum = checkperm('maxfriendnum');
	if($maxfriendnum) {
		$maxfriendnum = $maxfriendnum + $space['addfriend'];
	}

	//好友请求
	$perpage = 20;
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	
	$friend1 = $space['friends'];
	$list = array();
	
	$count = getcount('friend', array('fuid'=>$space['uid'], 'status'=>0));
	
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.*, sf.friend, f.* FROM ".tname('friend')." f
			LEFT JOIN ".tname('space')." s ON s.uid=f.uid
			LEFT JOIN ".tname('spacefield')." sf ON sf.uid=f.uid
			WHERE f.fuid='$space[uid]' AND f.status='0'
			ORDER BY f.dateline DESC
			LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username']);
			//共有的好友
			$cfriend = array();
			$friend2 = empty($value['friend'])?array():explode(',',$value['friend']);
			if($friend1 && $friend2) {
				$cfriend = array_intersect($friend1, $friend2);
			}
			$value['cfriend'] = implode(',', $cfriend);
			$value['cfcount'] = count($cfriend);
			$list[] = $value;
		}
	}
	
	//统计更新
	if($count != $space['addfriendnum']) {
		updatetable('space', array('addfriendnum'=>$count), array('uid'=>$space['uid']));
	}
		
	//分页
	$multi = multi($count, $perpage, $page, "cp.php?ac=friend&op=request");
	
	realname_get();

} elseif($op == 'groupname') {

	$groups = getfriendgroup();
	$group = intval($_GET['group']);
	if(!isset($groups[$group])) {
		showmessage('change_friend_groupname_error');
	}

	if(submitcheck('groupnamesubmit')) {
		$space['privacy']['groupname'][$group] = getstr($_POST['groupname'], 20, 1, 1);
		privacy_update();
		showmessage('do_success', $_POST['refer']);
	}
} elseif($op == 'groupignore') {

	$groups = getfriendgroup();
	$group = intval($_GET['group']);
	if(!isset($groups[$group])) {
		showmessage('change_friend_groupname_error');
	}

	if(submitcheck('groupignoresubmit')) {
		if(isset($space['privacy']['filter_gid'][$group])) {
			unset($space['privacy']['filter_gid'][$group]);
		} else {
			$space['privacy']['filter_gid'][$group] = $group;
		}
		privacy_update();
		friend_cache($_SGLOBAL['supe_uid']);//缓存更新

		showmessage('do_success', $_POST['refer'], 0);
	}

} elseif($op == 'blacklist') {

	if($_GET['subop'] == 'delete') {
		$_GET['uid'] = intval($_GET['uid']);
		$_SGLOBAL['db']->query("DELETE FROM ".tname('blacklist')." WHERE uid='$space[uid]' AND buid='$_GET[uid]'");
		showmessage('do_success', "space.php?do=friend&view=blacklist&start=$_GET[start]", 0);
	}

	if(submitcheck('blacklistsubmit')) {
		$_POST['username'] = trim($_POST['username']);
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE username='$_POST[username]'");
		if(!$tospace = $_SGLOBAL['db']->fetch_array($query)) {
			showmessage('space_does_not_exist');
		}
		if($tospace['uid'] == $space['uid']) {
			showmessage('unable_to_manage_self');
		}
		//删除好友
		if($space['friends'] && in_array($tospace['uid'], $space['friends'])) {
			friend_update($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username'], $tospace['uid'], '', 'ignore');
		}
		inserttable('blacklist', array('uid'=>$space['uid'], 'buid'=>$tospace['uid'], 'dateline'=>$_SGLOBAL['timestamp']), 0, true);

		showmessage('do_success', "space.php?do=friend&view=blacklist&start=$_GET[start]", 0);
	}
	
} elseif($op == 'rand') {
	
	$randuids = array();
	if($space['friendnum']<5) {
		//附近在线的朋友
		$onlinelist = array();
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('session')." LIMIT 0,100");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['uid'] != $space['uid']) {
				$onlinelist[] = $value['uid'];
			}
		}
		$randuids = sarray_rand(array_merge($onlinelist, $space['friends']), 1);
	} else {
		$randuids = sarray_rand($space['friends'], 1);
	}
	showmessage('do_success', "space.php?uid=".array_pop($randuids), 0);
	
} elseif ($op == 'getcfriend') {
	
	$fuids = empty($_GET['fuid'])?array():explode(',', $_GET['fuid']);
	$newfuids = array();
	foreach ($fuids as $value) {
		$value = intval($value);
		if($value) $newfuids[$value] = $value;
	}
	
	//共同的好友
	$list = array();
	if($newfuids) {
		$query = $_SGLOBAL['db']->query("SELECT uid,username,name,namestatus FROM ".tname('space')." WHERE uid IN (".simplode($newfuids).") LIMIT 0,15");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
			$list[] = $value;
		}
		realname_get();
	}
} elseif($op == 'search') {

	@include_once(S_ROOT.'./data/data_profilefield.php');
	$fields = empty($_SGLOBAL['profilefield'])?array():$_SGLOBAL['profilefield'];
		
	if(!empty($_GET['searchsubmit']) || !empty($_GET['searchmode'])) {
		$_GET['searchsubmit'] = $_GET['searchmode'] = 1;
		//找人
		$wherearr = $fromarr = $uidjoin = array();
		$fsql = '';
		
		$fromarr['space'] = tname('space').' s';
		
		if($searchkey = stripsearchkey($_GET['searchkey'])) {
			$wherearr[] = "(s.name like '%$searchkey%' OR s.username like '%$searchkey%')";
		} else {
			foreach (array('uid','username','name','videostatus','avatar') as $value) {
				if($_GET[$value]) {
					$wherearr[] = "s.$value='{$_GET[$value]}'";
				}
			}
		}
		//附表
		foreach (array('sex','qq','msn','birthyear','birthmonth','birthday','blood','marry','birthprovince','birthcity','resideprovince','residecity') as $value) {
			if($_GET[$value]) {
				$fromarr['spacefield'] = tname('spacefield').' sf';
				$wherearr['spacefield'] = "sf.uid=s.uid";
				$wherearr[] = "sf.$value='{$_GET[$value]}'";
				$fsql .= ", sf.$value";
			}
		}
		//转换成实际的年份
		$startage = $endage = 0;
		if($_GET['endage']) {
			$startage = sgmdate('Y') - intval($_GET['endage']);
		}
		if($_GET['startage']) {
			$endage = sgmdate('Y') - intval($_GET['startage']);
		}
		if($startage || $endage) {
			$fromarr['spacefield'] = tname('spacefield').' sf';
			$wherearr['spacefield'] = "sf.uid=s.uid";
		}
		if($startage && $endage && $endage > $startage) {
			$wherearr[] = '(sf.birthyear>='.$startage.' AND sf.birthyear<='.$endage.')';
		} else if($startage && empty($endage)) {
			$wherearr[] = 'sf.birthyear>='.$startage;
		} else if(empty($startage) && $endage) {
			$wherearr[] = 'sf.birthyear<='.$endage;
		}
		//自定义
		$havefield = 0;
		foreach ($fields as $fkey => $fvalue) {
			if($fvalue['allowsearch']) {
				$_GET['field_'.$fkey] = empty($_GET['field_'.$fkey])?'':stripsearchkey($_GET['field_'.$fkey]);
				if($_GET['field_'.$fkey]) {
					$havefield = 1;
					$wherearr[] = "sf.field_$fkey LIKE '%".$_GET['field_'.$fkey]."%'";
				}
			}
		}
		if($havefield) {
			$fromarr['spacefield'] = tname('spacefield').' sf';
			$wherearr['spacefield'] = "sf.uid=s.uid";
		}
		
		//扩展
		if($_GET['type'] == 'edu' || $_GET['type'] == 'work') {
			foreach (array('type','title','subtitle','startyear') as $value) {
				if($_GET[$value]) {
					$fromarr['spaceinfo'] = tname('spaceinfo').' si';
					$wherearr['spaceinfo'] = "si.uid=s.uid";
					$wherearr[] = "si.$value='{$_GET[$value]}'";
				}
			}
		}
		
		$list = array();
		if($wherearr) {
			$query = $_SGLOBAL['db']->query("SELECT s.* $fsql FROM ".implode(',', $fromarr)." WHERE ".implode(' AND ', $wherearr)." LIMIT 0,500");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
				$value['isfriend'] = ($value['uid']==$space['uid'] || ($space['friends'] && in_array($value['uid'], $space['friends'])))?1:0;
				$list[$value['uid']] = $value;
			}
		}
		
		realname_get();
		
	} else {
		
		$yearhtml = '';
		$nowy = sgmdate('Y');
		for ($i=0; $i<50; $i++) {
			$they = $nowy - $i;
			$yearhtml .= "<option value=\"$they\">$they</option>";
		}
		
		//性别
		$sexarr = array($space['sex']=>' checked');
		
		//生日:年
		$birthyeayhtml = '';
		$nowy = sgmdate('Y');
		for ($i=0; $i<100; $i++) {
			$they = $nowy - $i;
			if(empty($_GET['all'])) $selectstr = $they == $space['birthyear']?' selected':'';
			$birthyeayhtml .= "<option value=\"$they\"$selectstr>$they</option>";
		}
		//生日:月
		$birthmonthhtml = '';
		for ($i=1; $i<13; $i++) {
			if(empty($_GET['all'])) $selectstr = $i == $space['birthmonth']?' selected':'';
			$birthmonthhtml .= "<option value=\"$i\"$selectstr>$i</option>";
		}
		//生日:日
		$birthdayhtml = '';
		for ($i=1; $i<29; $i++) {
			if(empty($_GET['all'])) $selectstr = $i == $space['birthday']?' selected':'';
			$birthdayhtml .= "<option value=\"$i\"$selectstr>$i</option>";
		}
		//血型
		$bloodhtml = '';
		foreach (array('A','B','O','AB') as $value) {
			if(empty($_GET['all'])) $selectstr = $value == $space['blood']?' selected':'';
			$bloodhtml .= "<option value=\"$value\"$selectstr>$value</option>";
		}
		//婚姻
		$marryarr = array($space['marry'] => ' selected');
		
		//自定义
		foreach ($fields as $fkey => $fvalue) {
			if($fvalue['allowsearch']) {
				if($fvalue['formtype'] == 'text') {
					$fvalue['html'] = '<input type="text" name="field_'.$fkey.'" value="'.$gets["field_$fkey"].'" class="t_input">';
				} else {
					$fvalue['html'] = "<select name=\"field_$fkey\"><option value=\"\">---</option>";
					$optionarr = explode("\n", $fvalue['choice']);
					foreach ($optionarr as $ov) {
						$ov = trim($ov);
						if($ov) {
							$selectstr = $gets["field_$fkey"]==$ov?' selected':'';
							$fvalue['html'] .= "<option value=\"$ov\"$selectstr>$ov</option>";
						}
					}
					$fvalue['html'] .= "</select>";
				}
				$fields[$fkey] = $fvalue;
			} else {
				unset($fields[$fkey]);
			}
		}

	}
	
}  else if($op = 'recommend') {
	//根据个人信息推荐
	
	if($_GET['type']&&$_GET['subtype']&&$_GET['title']) {
		$list = array();
		//$temtitle = utf8_decode($_GET['title']);
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(is_numeric(strpos($agent,'MSIE')) ) {
			$title = $_GET['title'];
		} else {
			$title = iconv('UTF-8','GB2312',$_GET['title']);
		}
		//var_dump($title);
		//var_dump($_GET['title']);
		mysql_set_charset('GB2312');
		//die();
/*	$query = $_SGLOBAL['db']->query("SELECT si.uid,username,title,credit,friendnum,experience,viewnum FROM ".tname('spaceinfo')." AS si ,".tname(space)." AS s 
			WHERE  si.uid=s.uid AND type='".$_GET['type']."' AND si.title IS NOT NULL 
			AND si.subtype='".$_GET['subtype']."' LIMIT 0,10");
		
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			var_dump($value['title']);
			var_dump($value['uid']);
		}
		die();*/
		
		
		
		
		
		
		
		
		$query = $_SGLOBAL['db']->query("SELECT si.uid,username,title,credit,friendnum,experience,viewnum FROM ".tname('spaceinfo')." AS si ,".tname(space)." AS s 
			WHERE  si.uid=s.uid AND type='".$_GET['type']."'
			AND si.title IS NOT NULL
			AND si.uid!=".$space['uid']." 
			AND si.uid NOT IN (SELECT f.fuid FROM ".tname('friend')." AS f WHERE f.uid=".$space['uid']." )
			AND si.subtype='".$_GET['subtype']."' LIMIT 0,10");
		$sourcetitle = array();
		$testtitle = array();
		$tempresult = array();
		$sourcetitle = explode(',',$title);
		
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			
			 if (!empty($value['title'])) {
			 	if(!get_magic_quotes_gpc()) {
					$value['title'] = stripcslashes($value['title']);
				}
				var_dump($sourcetitle);
			 	$testtitle = explode(',',$value['title']);
				$tempresult = array_intersect($sourcetitle,$testtitle);
				if(count($tempresult) > 0) {
					realname_set($value['uid'],$value['username']);
					$value['isfriend'] = 0;
					$value['interst'] = $tempresult;
					$list[$value['uid']] = $value;
					//var_dump($value['interst']);	
					
				}
			 }
		}
		//die();	
	} else {
		$list = array();
		$query = $_SGLOBAL['db']->query("SELECT si.uid,username,title,credit,friendnum,experience,viewnum FROM ".tname('spaceinfo')." AS si ,".tname(space)." AS s 
			WHERE  si.uid=s.uid AND type='info'
			AND si.title IS NOT NULL
			AND s.uid!=".$space['uid']." 
			AND si.uid NOT IN (SELECT f.fuid FROM ".tname('friend')." AS f WHERE f.uid=".$space['uid']." ) LIMIT 0,10");
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list[$value['uid']] = $value;
		}
	}
		
	
} 

include template('cp_friend');

?>
