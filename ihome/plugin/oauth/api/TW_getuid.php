<?php
/*
     getuid.php用于活动用户的uid
	 Add by am@ihome.20130605  09:40 
	 团委
     只需要学号
*/
    include_once('../../../common.php'); 
	include_once(S_ROOT.'./source/function_space.php');
    include_once(S_ROOT.'./uc_client/client.php');
	//include_once('function.php');
	$id = getstr(trim($_POST['collegeid']));
	$id = 10021126;
	//$type = 2 ;
    //$msg = "匡辉,19900501";	
	//$str = explode(",",$msg);
	//print_r($str);
	$result = array();
	$topiclist[] = $value;						 		

    $uid = get_uid($id);	
	//print_r($result);
	foreach($topiclist as $value){
		$result[] = array('uid'=>$uid);
	}

	
	$result = json_encode($result);
    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);

	echo $result;
	exit();

function get_uid($id){
global $_SGLOBAL;
    $collegeid = $id ; 
    $wheresql = "collegeid = $collegeid";
	//echo "SELECT * FROM ".tname('baseprofile')." where ".$wheresql;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." where ".$wheresql);
	if($value = $_SGLOBAL['db']->fetch_array($query)){
		$uid = $value[uid];
	if($value[uid] == null){
		$uid = 'no uid';
	}
	}else{
		$uid = 'no person';
	}
	return $uid;
}

?>