<?php

//判断内外网
$username = '';
$isSchoolNET = FALSE;
include_once(S_ROOT.'./source/function_judge.php');
$client_ip=$_SERVER["REMOTE_ADDR"];
if(judge_ip($client_ip)){
//内网,则要求登陆CAS帐号
	$isSchoolNET = TRUE;
	$username = getCASUser();
}
$collegeid_len = strlen($username);
//print_r($username);exit;

?>
