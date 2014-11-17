<?php


include_once('../common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./buaasso.php');

//将加密后的身份证号存入baseprofile表中的identifierhash字段
$queryid = $_SGLOBAL['db']->query("SELECT userid, identifier_not_use FROM ".tname('baseprofile')." WHERE usertype='校友'");
$valueid = $_SGLOBAL['db']->fetch_array($queryid);
while($valueid = $_SGLOBAL['db']->fetch_array($queryid)){
	if(empty($valueid['identifier_no_use'])){
		continue;
	}else{
		$idhash = M_encode($valueid['identifier_no_use'], aeskeyA);
		$insertinfo = array('identifier'=>$idhash);
		updatetable('baseprofile', $insertinfo, array('userid'=>$valueid['userid']));
	}
}
echo '---baseprofile OK----<br />';

//�˶δ������spacefield���е����֤��
//$query = $_SGLOBAL['db']->query("SELECT uid, realname FROM ".tname('spacefield'));
//while($name = $_SGLOBAL['db']->fetch_array($query)){
//	$nm = $name['realname'];
//	if(empty($nm)){
//		continue;
//	}
//	$query1 = $_SGLOBAL['db']->query("SELECT identifier FROM ".tname('baseprofile')." WHERE realname = '$nm'");
//	$identifier = $_SGLOBAL['db']->fetch_array($query1);
//	if(empty($identifier['identifier'])){
//		continue;
//	}
//	$identifierhash = M_encode($identifier['identifier'], aeskeyA);
//	$insertinfo = array('identifier'=>$identifierhash);
//	updatetable('spacefield', $insertinfo, array('uid' => $name['uid']));
//}
//echo '---spacefield OK---';
exit();

?>