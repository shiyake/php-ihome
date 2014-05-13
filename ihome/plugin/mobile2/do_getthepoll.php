<?php
/*
     do_getthepoll.php获得具体投票信息
     Add by am@ihome.2013-08-29  01:07


*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');

	$pid = intval(trim($_POST[pid]));
	$sex = intval(trim($_POST[sex]));
	//$pid = 54;
	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT pf.*, p.* FROM ".tname('poll')." p LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid WHERE p.pid=$pid");
	//echo "SELECT pf.*, p.* FROM ".tname('poll')." p LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid WHERE p.pid='$pid'";
	while($poll = $_SGLOBAL['db']->fetch_array($query)){
		realname_set($poll['uid'], $poll['username']);//实名
		$hotpoll[] = $poll;
	}
	realname_get();	
	//print_r($hotpoll);
	if(empty($hotpoll)) {
		$result = "no poll";
    }
	//验证性别
	if($poll['sex']  && $poll['sex'] != $sex) {
		$arrs = array('flag'=>'fail');
		$result = json_encode($arrs);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('polluser')." 
	WHERE uid=$userid AND pid='$pid'"));
	if($count >= 1){
		$arrs = array('flag'=>'voted');
		$result = json_encode($arrs);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
	
	//取出所有投票项
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('polloption')." WHERE pid='$pid' ORDER BY oid");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$option[] = $value;
	}
	//print_r($option);
	
	foreach($hotpoll as $poll){
	$result[] = array('poll_userpic'=>avatar($poll['uid'],middle),'poll_username'=>$_SN[$poll['uid']],
	'poll_userid'=>$poll[uid],'poll_time'=>$poll[dateline],'poll_title'=>$poll[subject],
	'poll_voternum'=>$poll[voternum],'poll_replynum'=>$poll[replynum],'poll_multiple'=>$poll[multiple],
	'poll_maxchoice'=>$poll[maxchoice],'poll_sex'=>$poll[sex],'poll_noreply'=>$poll[noreply],
	'poll_expiration'=>$poll[expiration],'poll_lastvote'=>$poll[lastvote]
	);
	}
	
	foreach($option as $value){
		$result1[] = array('optionid'=>$value[oid],'poll_option' => $value[option],'poll_votenum'=> $value[votenum]);
	}
		//$result1 = json_encode($result1);
		//$result1 = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result1);
	$result2 = array_merge($result,$result1);
	$result2 = json_encode($result2);
	$result2 = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result2);
	echo $result2;
	exit();
?>