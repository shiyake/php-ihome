<?php
/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013年6月27日9:53:18
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if($_SGLOBAL['member']['groupid'] != 3){
	$userTypes = array();
	$uid = $_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query("SELECT usertype FROM ".tname('baseprofile')." WHERE uid=$uid");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$userTypes[] = $value['usertype'];
	}
	if (in_array('学生', $userTypes) || in_array('教师', $userTypes) || in_array('离休', $userTypes)) {
		include_once('cas_login.php');
	}elseif(in_array('1', $userTypes) || in_array('2', $userTypes) || in_array('3', $userTypes) || in_array('4', $userTypes) || in_array('5', $userTypes) || in_array('7', $userTypes)){
	//本科生为1，硕士生为2，博士生为3，博士后为4，教职工为5，校友为6，留学生为7，其他为8。
		include_once('cas_login.php');
	}else{
		$username = '';
		$collegeid_len =0;
	}
}else{
	$username = '';
	$collegeid_len =1;
}

$ac = $_GET['ac'];
$ac_array = array('foru' ,'list','detail','delete','apply','applys' ,'mine' ,'api');
if (!in_array($ac, $ac_array)) {
	$ac = 'foru';
}


if($ac) {
	@require_once(''.$ac.'.php');
}

?>
