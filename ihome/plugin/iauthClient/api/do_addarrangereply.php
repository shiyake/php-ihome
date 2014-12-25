<?php
/*
     do_addarrangereply.php评论某个校园日历
     Add by am@ihome.2012-12-17  10:34

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	//$userid =96;
	//$username = 'anminghao';
	$Message =empty($_GET['message'])?'':getstr($_POST['message']);
	$arrangementid =empty($_POST['arrangeid'])?0:intval($_POST['arrangeid']);

	$arr = array(
	"id" => intval($arrangementid),
	"uid" => intval($userid), 
	"idtype" => 'arrangementid',
	"message" => getstr($Message, 5000, 1, 1, 1),
	"authorid" => intval($userid), 
	"author" => getstr($username, 15, 1, 1, 1),
	"ip" => getonlineip(),
	'dateline' => $_SGLOBAL['timestamp'],
	'magicflicker' => 0,
	);
	
	$shareid = inserttable('comment', $arr,1);
	if($shareid){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
?>