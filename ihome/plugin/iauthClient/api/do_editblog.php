<?php
/*
     do_editblog.php修改日志
     Add by xuxing@ihome.2013-04-04  18:34

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	include_once(S_ROOT.'./data/data_profield.php');
	$Subject =getstr($_POST['subject']);
	$Message =substr($_POST['message'],0,20000);
	$BlogId = intval($_POST['blogid']);
	
	//$userid = 96 ;
	//$username = 'anminghao';
	
	if($BlogId){
		$query = $_SGLOBAL['db']->query("select blogid from ".tname('blog')." where blogid=$BlogId and uid=$userid");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			updatetable('blog',array('subject'=>getstr($Subject, 80, 1, 1, 1)),array('blogid'=>$BlogId));
			updatetable('blogfield',array('message'=>$Message),array('blogid'=>$BlogId));	
			$arrs = array('flag'=>'success','blogid'=>$BlogId);		
		}
	}else{
		$arrs = array('flag'=>'fail');
	}

   $result = json_encode($arrs);
   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
	
?>