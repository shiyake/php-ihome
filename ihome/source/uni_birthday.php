<?php
include_once('../common.php');
include_once(S_ROOT.'./source/function_common.php');
include_once(S_ROOT.'./source/function_cp.php');

$querybirth = $_SGLOBAL['db']->query("SELECT userid, birthday FROM ".tname('baseprofile')." WHERE birthday is not null and birthday != ''");
while($valuebirth = $_SGLOBAL['db']->fetch_array($querybirth)){
	$strbirth = $valuebirth['birthday'];
	//$len = strlen($strbirth);
	if(is_int(strpos($strbirth, '-'))){
		$birtharray = explode('-', $strbirth);
		$ct = count($birtharray);
		$birthinfo = '';
		for($i = 0; $i < $ct; $i++){
			$birthinfo = $birthinfo.$birtharray[$i];
		}
		updatetable('baseprofile', array('birthday' => $birthinfo), array('userid' => $valuebirth['userid']));
	}
}

echo 'OK!';

?>