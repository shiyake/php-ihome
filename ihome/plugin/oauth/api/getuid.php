<?php
/*
     getuid.php用于活动用户的uid
	 Add by am@ihome.20130605  09:40 
     类型一:学号和入学年   类型二:姓名+生日
*/
    include_once('../../common.php'); 
	include_once(S_ROOT.'./source/function_space.php');
    include_once(S_ROOT.'./uc_client/client.php');
	//include_once('function.php');
	$type =intval($_POST['type']);
	$msg = getstr(trim($_POST['msg']));
	//$type = 2 ;
    //$msg = "匡辉,19900501";	
	//$str = explode(",",$msg);
	//print_r($str);
	$result = array();
	$topiclist[] = $value;						 		

    $uid = get_uid($type,$msg);	
	//print_r($result);
	foreach($topiclist as $value){
		$result[] = array('uid'=>$uid);
	}

	
	$result = json_encode($result);
    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);

	echo $result;
	exit();

function get_uid($type,$msg){
global $_SGLOBAL;
    if($type == 1){
		$str = explode(",",$msg);
		//print_r($str);
		$collegeid = $str[0];
		$startyear = $str[1];
		$wheresql = "collegeid = '$collegeid' and startyear = $startyear";
		//print($wheresql);
	}else if($type == 2 ){
		$str = explode(",",$msg);
		$name = $str[0];
		$bir = $str[1];
		$wheresql = "realname = '$name' and birthday = $bir";
	}
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