<?php
/*
     addsharereply.php评论某个分享
     Add by am@ihome.2012-10-17  10:34

*/
    //include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');
	//$userid =96;
	//$username = 'anminghao';
	$Message =empty($_POST['message'])?'':getstr($_POST['message']);
	$ShareId =empty($_POST['shareid'])?0:intval($_POST['shareid']);
    if(trim($Message)==null){
	   $arrs = array('flag'=>'null');
	}else if(strlen($Message) < 2){
		$arrs = array('flag'=>'content_is_too_short');
	}else{
	$arr = array(
	"id" => intval($ShareId),
	"uid" => intval($userid), 
	"idtype" => 'sid',
	"message" => $Message,
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
}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
?>