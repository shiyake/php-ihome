<?php
/*
     addtopic.php发布群组话题
     Add by am@ihome.2012-10-18  09:34

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	//$username = 'anminghao';
	//$userid = 96 ;
	$Subject =empty($_POST['subject'])?'':getstr($_POST['subject']);
	$Message =empty($_POST['message'])?'':getstr($_POST['message']);
	$TagId =empty($_POST['tagid'])?0:intval($_POST['tagid']);
	$setarr = array(
	"topicid" => 0,
	"tagid" => intval($TagId),
	"eventid" => 0,
	"uid" => intval($userid), 
	"username" => getstr($username, 15, 1, 1, 1),
	"subject" => getstr($Subject, 80, 1, 1, 1),
	"magiccolor" => 0,
	"magicegg" => 0,
	"lastpost" => 0,
	"viewnum" => 0,
	"replynum" => 0,
	"lastauthor" => getstr($username, 15, 1, 1, 1),
	"lastauthorid" => 0,
	"displayorder"=>0,
	'dateline' => $_SGLOBAL['timestamp'],
	'digest' => 0,
	"click_11" => 0,
	"hot" => 0,
	"click_12" => 0,
	"click_13" => 0,
	"click_14" => 0,
	"click_15" => 0
	);
	$tid = inserttable('thread', $setarr,1);
	$psetarr = array(
	'tid'=>intval($tid),
	"tagid" => intval($TagId),
	"uid" => intval($userid), 
	"username" => getstr($username, 15, 1, 1, 1),
	"message" => getstr($Message, 5000, 1, 1, 1),
	"ip" => getonlineip(),
	'dateline' => $_SGLOBAL['timestamp'],
	"isthread" => 1
	);
	//更新群组统计
	$_SGLOBAL['db']->query("UPDATE ".tname("mtag")." SET threadnum=threadnum+1 WHERE tagid='$Tagid'");	
	//统计
	updatestat('thread');
	updatestat('post');
	
	$pid = inserttable('post',$psetarr,1);
	
	
	include_once(S_ROOT.'./source/function_feed.php');
	feed_publish($tid, 'tid', empty($_POST['tid'])?1:0);
	
	
	
	
	
	
	
	

	if($tid && $pid){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
	
?>