<?php
//判断内外网
$username = '';
$isSchoolNET = FALSE;
include_once(S_ROOT.'./source/function_judge.php');
include_once(S_ROOT.'./source/CAS.php');
$client_ip=$_SERVER["REMOTE_ADDR"];
if(judge_ip($client_ip)){
//内网,则要求登陆CAS帐号
	$isSchoolNET = TRUE;
	//$cas=getCASUser();
	//$username = getAttribute("employeeNumber");


	phpCAS::setDebug();
        $_cas_server_version=CAS_VERSION_2_0;
        $_hostname='sso.buaa.edu.cn';
        $_hostport=443;
        $_uri='';
        //initialize phpCAS
        phpCAS::client($_cas_server_version,$_hostname,$_hostport,$_uri);
        //no SSL validation for the CAS server
        phpCAS::setNoCasServerValidation();
        //force CAS authentication
        phpCAS::forceAuthentication();

        //showmessage("cas halt");
        if(isset($_REQUEST['logout']))
        {
                phpCAS::logout();
        }

        //获取学号或者教职工的教工号
        ///////////////
        //////////////////////
        $auth1 = phpCAS::checkAuthentication();

        if($auth1){
                $cas=phpCAS::getUser();
                $username=phpCAS::getAttribute("employeeNumber");
        }
}
$collegeid_len = strlen($username);
//print_r($username);exit;

?>
