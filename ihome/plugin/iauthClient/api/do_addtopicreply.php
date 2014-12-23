<?php
/*
     addtopicreply.php评论一篇话题
     Add by am@ihome.2012-10-18  11:34

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	/*$username = 'seen';
	$userid = 18 ;
	$Message = '999992222';
	$TagId = '3';
	$Commentid = '8';*/
	$Message =empty($_POST['message'])?'':getstr($_POST['message']);
	$TagId =empty($_POST['tagid'])?0:intval($_POST['tagid']);
	$Commentid =empty($_POST['commentid'])?0:intval($_POST['commentid']);
	$arr = array(
	'tid' => intval($Commentid),
	"tagid" => intval($TagId),
	"uid" => intval($userid), 
	"username" => getstr($username, 15, 1, 1, 1),
	"message" => getstr($Message, 5000, 1, 1, 1),
	"ip" => getonlineip(),
	'dateline' => $_SGLOBAL['timestamp'],
	"isthread" => 0,
	);
	$pid = inserttable('post',$arr,1);
	//更新统计数据
	$_SGLOBAL['db']->query("UPDATE ".tname('thread')."
		SET replynum=replynum+1, lastpost='$_SGLOBAL[timestamp]', lastauthor='$username', lastauthorid='$userid'
		WHERE tid='$Commentid'");
	//统计
	updatestat('post');
if($pid){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
	
?>