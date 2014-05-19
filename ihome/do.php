<?php

include_once('./common.php');

$ac = empty($_GET['ac'])?'':$_GET['ac'];

if($ac == $_SCONFIG['login_action']) {
	$ac = 'login';
} elseif($ac == 'login') {
	$ac = '';
}
if($ac == $_SCONFIG['register_action']) {
	$ac = 'register';
} elseif($ac == 'register') {
	$ac = '';
}
if($ac == $_SCONFIG['activate_action']) {
	$ac = 'activate';
} elseif($ac == 'activate') {
	$ac = '';
}
if($ac == $_SCONFIG['buaaregister_action']) {
	$ac = 'buaaregister';
} elseif($ac == 'buaaregister') {
	$ac = '';
}
if($ac == $_SCONFIG['quickregister_action']) {
	$ac = 'quickregister';
} elseif($ac == 'quickregister') {
	$ac = '';
}
if($ac == $_SCONFIG['mobileregister_action']) {
	$ac = 'mobileregister';
} elseif($ac == 'mobileregister') {
	$ac = '';
}
if($ac == $_SCONFIG['EmailInviteRegister']) {
	$ac = 'emailinviteregister';
}
/*if($ac == $_SCONFIG['public_apply']) {
	$ac = 'publicapply';
} elseif($ac == 'publicapply') {
	$ac = '';
}*/
if($ac == $_SCONFIG['FreshmanRegister_Action']) {
	$ac = 'freshmanregister';
} elseif($ac == 'freshmanregister') {
	$ac = '';
}
if($ac == $_SCONFIG['QuickMarkRegister_Action']) {
	$ac = 'quickmarkregister';
} elseif($ac == 'quickmarkregister') {
	$ac = '';
}
if($ac == $_SCONFIG['mobileaccess']) {
	$ac = 'mobileaccess';
} elseif($ac == 'mobileaccess') {
	$ac = '';
}


$acs = array('login', 'register', 'activate', 'buaaregister', 'quickregister', 'mobileregister','lostpasswd', 'swfupload', 'inputpwd', 'emailinviteregister', 'freshmanregister','quickmarkregister',
	'ajax', 'seccode', 'sendmail', 'stat', 'emailcheck','mobileaccess');

	
if(empty($ac) || !in_array($ac, $acs)) {

	showmessage('enter_the_space', 'index.php', 0);
}

//Á´½Ó
$theurl = 'do.php?ac='.$ac;


include_once(S_ROOT.'./source/do_'.$ac.'.php');



?>
