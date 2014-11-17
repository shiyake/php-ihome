<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$_GET['op'] = empty($_GET['op']) ? '' : trim($_GET['op']);

if(submitcheck('setsendemailsubmit')) {
	//ÓÊÏäÌáÐÑÉèÖÃ
	if(empty($_SCONFIG['sendmailday'])) {
		showmessage('no_privilege');
	}
	$_POST['sendmail'] = addslashes(serialize($_POST['sendmail']));
	updatetable('spacefield', array('sendmail'=>$_POST['sendmail']), array('uid'=>$space['uid']));
	showmessage('do_success', 'cp.php?ac=sendmail');
}


if(empty($_SCONFIG['sendmailday'])) {
	showmessage('no_privilege');
}

//ÌîÐ´ÓÊÏä
if(empty($space['email'])) {
	showmessage('email_input');
}

$sendmail = array();
$space['sendmail'] = empty($space['sendmail']) ? array() : unserialize($space['sendmail']);
if($space['sendmail']) {
	foreach($space['sendmail'] as $mkey=>$mailset) {
		if($mkey != 'frequency') {
			$sendmail[$mkey] = empty($space['sendmail'][$mkey]) ? '' : ' checked';
		} else {
			$sendmail[$mkey] = array($space['sendmail']['frequency'] => 'selected');
		}
	}
}

include_once template("cp_sendmail");

?>