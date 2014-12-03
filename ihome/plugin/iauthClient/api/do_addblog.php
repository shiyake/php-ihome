<?php
/*
     do_addblog.php发布日志
     Add by am@ihome.2012-10-17  10:34

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	include_once(S_ROOT.'./data/data_profield.php');
	$Subject =getstr($_POST['subject']);
	$Message =substr($_POST['message'],0,20000);
	//$userid = 96 ;
	//$username = 'anminghao';
	
	$arr = array(
	"topicid" => 0,
	"uid" => intval($userid), 
	"username" => getstr($username, 15, 1, 1, 1),
	"subject" => getstr($Subject, 80, 1, 1, 1),
	"classid" => 0,
	"viewnum" => 0,
	"replynum" => 0,
	"hot" => 0,
	"picflag" => 0,
	"noreply"=>0,
	'dateline' => $_SGLOBAL['timestamp'],
	'friend' => 0,
	'click_1' => 0,
	'click_2' => 0,
	'click_3' => 0,
	'click_4' => 0,
	'click_5' => 0
	);
	$blogid = inserttable('blog', $arr,1);
	
	$arr1 = array(
	"blogid" => intval($blogid),
	"uid" => intval($userid), 
	"message" => $Message,
	"postip" => getonlineip(),
	"relatedtime" => 0,
	"magiccolor" => 0,
	"magicpaper" => 0,
	"magiccall" => 0
	);
	$blogfield = inserttable('blogfield',$arr1,1);
	
	include_once(S_ROOT.'./source/function_feed.php');
	feed_publish($blogid, 'blogid');
	if($blogid){
	$arrs = array('flag'=>'success','blogid'=>$blogid);
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
	
?>
