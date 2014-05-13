<?php
/*
     getuser.php用于活动用户的信息
	 Add by am@ihome.20130522  11:00 

*/
    include_once('../data_oauth_check.php');
    include_once('../../../common.php');
    include_once(S_ROOT.'./uc_client/client.php');	
	include_once(S_ROOT.'./source/function_space.php');
	//$uid = 123;
	$uid = intval(oauth_check());
	$result = array();
		$wheresql = "uid = '$uid'";
		$query1 = $_SGLOBAL['db']->query("SELECT max(userid) FROM ".tname('baseprofile')." where ".$wheresql);
		$value1 = $_SGLOBAL['db']->fetch_array($query1);
		//print_r($value1['max(userid)']);
		$userid = $value1['max(userid)'];
		$wheresql1 = "userid = $userid";
		$query = $_SGLOBAL['db']->query("SELECT collegeid,longid,realname,identifier_not_use,sex,birthday,ethnic,
		sourcearea,academy,major,startyear,class,unit,defaultemail,shortemail,usertype FROM ".tname('baseprofile')." where ".$wheresql1);
		$value = $_SGLOBAL['db']->fetch_array($query);
		
		//print_r($value);
	//foreach($topiclist as $value){}
		$result[] = array('collegeid'=>$value['collegeid'],'longid'=>$value[longid],'realname'=>$value[realname],'nationalid'=>$value[identifier_not_use],'sex'=>$value[sex],'birthday'=>$value[birthday],'ethnic'=>$value[ethnic],'sourcearea'=>$value[sourcearea],
		'academy'=>$value[academy],'major'=>$value[major],'startyear'=>$value[startyear],'class'=>$value['class'],'unit'=>$value[unit],'defaultemail'=>$value[defaultemail],'shortemail'=>$value[shortemail],'usertype'=>$value[usertype]);
	

	
	$result = json_encode($result);
    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);

	echo $result;
	exit();
?>