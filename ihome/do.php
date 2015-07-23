<?php

include_once('./common.php');

$ac = empty($_GET['ac'])?'':$_GET['ac'];

if($ac == 'test_user_locked') {
    notifyUserLocked('xuxing');
    exit();
}

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
if($ac == $_SCONFIG['overseasregister_action'])	{
	$ac = 'overseasregister';
} elseif($ac == 'overseasregister')	{
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
if($ac == $_SCONFIG['oversear']) {
	$ac = 'mobileaccess';
} elseif($ac == 'mobileaccess') {
	$ac = '';
}if($ac == $_SCONFIG['overseasregister_email']) {
	$ac = 'overseasregister_email';
} elseif($ac == 'overseasregister_email') {
	$ac = '';
}


$acs = array('login', 'register', 'activate', 'buaaregister', 'quickregister', 'mobileregister','overseasregister','lostpasswd', 'swfupload', 'inputpwd', 'emailinviteregister', 'freshmanregister','quickmarkregister',
	'ajax', 'seccode', 'sendmail', 'stat', 'emailcheck','mobileaccess','overseasregister_email');

	
if(empty($ac) || !in_array($ac, $acs)) {

	showmessage('enter_the_space', 'index.php', 0);
}

//Á´½Ó
$theurl = 'do.php?ac='.$ac;


include_once(S_ROOT.'./source/do_'.$ac.'.php');



?>
