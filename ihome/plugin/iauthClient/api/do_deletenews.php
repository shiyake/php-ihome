﻿<?php
/*
     deletenews.php删除纪录
     Add by am@ihome.2012-10-19  09:20

*/
    include_once('../iauth_verify_forward.php');
	include_once('../../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	$doid =intval($_POST['doingid']);
	$userid = intval(iauth_verify());

	$delete=deletedoings(array($doid));
	if($delete){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
    exit();
function deletedoings($ids) {

	global $_SGLOBAL;
	

	

	$_SGLOBAL['db']->query("DELETE FROM ".tname('doing')." WHERE doid IN (".simplode($ids).")");

	//删除评论

	$_SGLOBAL['db']->query("DELETE FROM ".tname('docomment')." WHERE doid IN (".simplode($ids).")");

	

	//删除feed

	$_SGLOBAL['db']->query("DELETE FROM ".tname('feed')." WHERE id IN (".simplode($ids).") AND idtype='doid'");



	return true;

}



	
	
	
	
	
?>