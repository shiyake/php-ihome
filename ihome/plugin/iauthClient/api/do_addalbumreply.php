<?php
/*
     addalbumreply.php评论某相册
     Add by am@ihome.2012-12-12  11:34

*/
    
	include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
    include_once('../../../common.php'); 
	//$userid =100;
	//$username = '1号';
	$Message =empty($_POST['message'])?'':getstr($_POST['message']);
	$Pic =empty($_POST['picid'])?0:intval($_POST['picid']);
    //$Message = '哈哈 我是i相册的评论';
	//$Pic = 135 ;
	$arr = array(
	"id" => intval($Pic),
	"uid" => intval($userid), 
	"idtype" => 'picid',
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
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
?>