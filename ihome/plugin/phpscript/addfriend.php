<?

include_once('../../common.php');
//$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('space')." where friendnum > 100 ORDER BY  friendnum DESC limit 500");


if($_SGLOBAL['supe_uid'] !=1)
	{
		exit('fail');
	}

$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('session')." limit 500");	
while($value = $_SGLOBAL['db']->fetch_array($query)){
	$uids[]=$value[uid];
}

/*
print_r($uids);
echo "<br />";
echo ('end');
echo "<br />";
echo "$_SGLOBAL[supe_uid]";
echo "<br />";
exit();
*/

foreach($uids as $uid)
	{

/*		
echo ($uid);
echo "<br />";
echo ('end');
echo "<br />";
echo "$_SGLOBAL[supe_uid]";
echo "<br />";
exit();
*/

		if(!checkperm('allowfriend')) {
		ckspacelog();
		showmessage('no_privilege');
		}

		//检测用户
		if($uid == $_SGLOBAL['supe_uid']) {
		echo ('friend_self_error');
		echo "<br />";
		echo 'fail';
		echo "<br />";
		echo "$uid";
		echo "<br />";
		}

		if($space['friends'] && in_array($uid, $space['friends'])) {
		echo('you_have_friends');
		echo 'fail';
		echo "<br />";
		echo "$uid";
		echo "<br />";
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
		$query1 = $_SGLOBAL['db']->query("SELECT s.*,sf.friend FROM ".tname('space')." s, ".tname('spacefield')." sf WHERE s.uid='$uid' and s.uid=sf.uid");
		$value1 = $_SGLOBAL['db']->fetch_array($query1);
		$fstatus = getfriendstatus($uid, $_SGLOBAL['supe_uid']);//检测相互是否请求过好友，0为单向，1为互为好友，-1为不存在；
		$m_gid = $value1['groupid'];
		$publicaud = $value1['aud'];//获得粉丝
		if($m_gid == 3 && $fstatus == -1) {	
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$_SGLOBAL[supe_uid]");	
		$value = $_SGLOBAL['db']->fetch_array($query);
		if(!empty($value['feedfriend'])){
			$myfeedfriend= explode(",", $value['feedfriend']);
			$myfeedfriend = array_flip(array_flip($myfeedfriend));//唯一化数组元素

			if(in_array($uid, $myfeedfriend)) {
				echo('public_have');
				echo 'fail';
				echo "<br />";
				echo "$uid";
				echo "<br />";
			}
			//把对方加到自己的feed中，不改变好友数(只收听，而不是好友)	
			$myfeedfriend[] = $uid;
			$myfeedfriend = array_filter($myfeedfriend);
			$myfeedfriendnew=implode(",", $myfeedfriend);
		}else{
			$myfeedfriendnew = $uid;
		}
		updatetable('spacefield',array('feedfriend'=>$myfeedfriendnew),array('uid'=>$_SGLOBAL['supe_uid']));
		$aud=explode(",", $value1['aud']);
		$friends = explode(',', $value1['friend']);
		$aud = array_merge($aud,$friends);
		$aud = array_flip(array_flip($aud));

		if(!in_array($_SGLOBAL['supe_uid'], $aud)) {
			$aud[]=$_SGLOBAL['supe_uid'];
		}
		$aud = array_filter($aud);
		sort($aud);
		$na=implode(",", $aud);
		$setarr=array('aud'=> $na,'audnum'=>count($aud));
		updatetable('space',$setarr,array('uid'=>$uid));
		echo('public_add');	
		echo 'fail';
		echo "<br />";
		echo "$uid";
		echo "<br />";
		}
		//检测现在状态
		$status = getfriendstatus($_SGLOBAL['supe_uid'], $uid);
		if($status == 1)
		{
			echo ('you_have_friends');
			echo "<br />";
			echo 'fail';
			echo "<br />";
			echo "$uid";
			echo "<br />";
		}
		else
		{
			$maxfriendnum = checkperm('maxfriendnum');
			if($maxfriendnum && $space['friendnum'] >= $maxfriendnum + $space['addfriend']) {
				if($_SGLOBAL['magic']['friendnum']) {
					showmessage('enough_of_the_number_of_friends_with_magic');
				} else {
					showmessage('enough_of_the_number_of_friends');
				}
			}
			$maxfriendnum = checkperm('maxfriendnum');
			if($maxfriendnum && $space['friendnum'] >= $maxfriendnum + $space['addfriend']) {
				if($_SGLOBAL['magic']['friendnum']) {
					showmessage('enough_of_the_number_of_friends_with_magic');
				} else {
					showmessage('enough_of_the_number_of_friends');
				}
			}
					
			$fstatus = getfriendstatus($uid, $_SGLOBAL['supe_uid']);
			if($fstatus == -1)
				{
					//对方没有加好友，我加别人
					if($status == -1)
						{
							$setarr = array(
							'uid' => $_SGLOBAL['supe_uid'],
							'fuid' => $uid,
							'fusername' => addslashes($tospace['username']),
							'gid' => intval($_POST['gid']),
							'note' => getstr($_POST['note'], 50, 1, 1),
							'dateline' => $_SGLOBAL['timestamp']
							);
							inserttable('friend', $setarr);
							if($_SGLOBAL['member']['groupid'] == 3 && in_array($uid, explode(',',$_SGLOBAL['member']['aud']))) {
								friend_update($tospace['uid'], $tospace['username'], $space['uid'], $space['username'], 'add', 0);
								notification_add($tospace['uid'], 'friend', cplang('note_friend_add'));
								showmessage('friends_add', $_POST['refer'], 1, array($_SN[$tospace['uid']]));
							}
							//发送邮件通知
							smail($uid, '', cplang('friend_subject',array($_SN[$space['uid']], getsiteurl().'cp.php?ac=friend&amp;op=request')), '', 'friend_add');

							//增加对方好友申请数
							$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET addfriendnum=addfriendnum+1 WHERE uid='$uid'");
							
							echo ('request_has_been_sent');
							echo "<br />";
							echo "$uid is ok!";
							echo "<br />";
						} 
					else
						{
					echo ('waiting_for_the_other_test');
					echo "<br />";
					echo "$uid";
					echo "<br />";
						}
				}
		}
	}
?>