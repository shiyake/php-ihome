<?php
/*
     do_getpermsg.php用于获得用户个人信息
     Add by am@ihome.2013-10-31  11:09


*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
    
	//$uid = intval(trim($_POST[targetuid]));
	//$uid=3;
    //$userid = 96;
	$result  =  array();
	//echo "SELECT realname,sex,academy,major,sourcearea,class from ".tname('baseprofile')." where uid =$userid";
	$query = $_SGLOBAL['db']->query("SELECT realname,sex,academy,major,sourcearea,class from ".tname('baseprofile')." where uid =$userid");
	$value = $_SGLOBAL['db']->fetch_array($query); 
	$topiclist[] = $value;
	foreach($topiclist as $value){
		$result = array(
		'user_name'=>$value[realname],
		'user_sex'=>$value[sex],
		'user_birthday'=>$value[birthday],
		'user_academy'=>$value[academy],
		'user_major'=>$value[major],
		'user_sourcearea'=>$value[sourcearea],
		'user_class'=>$value['class']
		);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>