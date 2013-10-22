<?php
/*
     userinfoaccess.php用于获得用户的具体信息
     Add by am@ihome.2012-11-27  9:35


*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	//@include_once(S_ROOT.'./data/data_profield.php');
	//include_once(S_ROOT.'./uc_client/client.php');

	//$uid = intval(trim($_POST[targetuid]));
	//$uid=311;
    //$userid = 96 ;
	$result  =  array();

	
	
	
	$query = $_SGLOBAL['db']->query("SELECT  friend  FROM  " .tname('spacefield')."  WHERE uid = $userid");
			while($rs = $_SGLOBAL['db']->fetch_array($query)){
				$starlist[] = $rs[friend];
			}
			
		
	if(!in_array($uid,$starlist)){
	        $arrs = array('flag'=>'Unauthorized access');	
	$result = json_encode($arrs);
	$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
}
	
	
	
	
	
	
	
?>