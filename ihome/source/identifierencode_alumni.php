<?php
include_once('../common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./buaasso.php');

//将加密后的身份证号存入baseprofile表中的identifierhash字段
$queryid = $_SGLOBAL['db']->query("SELECT userid, identifier_not_use FROM ".tname('baseprofile')." WHERE collegeid='10101006'");
echo "SELECT userid, identifier_not_use FROM ".tname('baseprofile')." WHERE collegeid='10101006'";
// (identifier_not_use is not null and identifier_not_use!='') and identifier is null");
$valueid = $_SGLOBAL['db']->fetch_array($queryid);
while($valueid = $_SGLOBAL['db']->fetch_array($queryid)){
echo $valueid['userid']." 111 ";
	if(empty($valueid['identifier_not_use'])){
		continue;
	}else{
		$idhash = M_encode($valueid['identifier_not_use'], aeskeyA);
		$insertinfo = array('identifier'=>$idhash);
		updatetable('baseprofile', $insertinfo, array('userid'=>$valueid['userid']));
	}
}
echo '---baseprofile OK----<br />';

exit();

?>
