<?php
/*
     addmessage.php发布站内信
     Add by am@ihome.2012-10-15  11:34

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
    include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	//$MsgFrom =trim($_POST['msgfrom']);
	//$MsgFromId=intval($_POST['msgfromid']);
	$MsgFrom = $username;
	$MsgFromId = $userid;
	$MsgToId =intval($_POST['touid']);
	$Subject=$Message;
	$Pmid = empty($_POST['pmid'])?0:floatval($_POST['pmid']);
    $Message=trim($_POST['message']);
	

	$touid = $MsgToId;
    
	
	if($touid) {
		if(isblacklist($touid)) {
			$arrs = array('flag'=>'fail');
	    $result = json_encode($arrs);
	    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
		}
	}
	
			//直接给一个用户发PM
			$return = uc_pm_send($MsgFromId, $touid, $Subject, $Message, 1, $Pmid, 0);

	if($return){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
?>