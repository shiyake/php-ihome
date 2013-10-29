<?php

//ͨ���ļ�
include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./source/function_magic.php');

//����ķ���
$acs = array('space', 'doing', 'upload', 'video', 'comment', 'blog', 'album', 'relatekw', 'common', 'class',
	'swfupload', 'thread', 'mtag', 'poke', 'friend',
	'avatar', 'profile', 'theme', 'import', 'feed', 'privacy', 'pm', 'share', 'advance', 'invite', 'invitefriend', 'invite2', 'sendmail',
	'userapp', 'task', 'credit', 'password', 'domain', 'event', 'poll', 'topic',
	'click','magic', 'top', 'videophoto','publicapply', 'arrangement','namecard', 'check_bot');
$ac = (empty($_GET['ac']) || !in_array($_GET['ac'], $acs))?'profile':$_GET['ac'];
$op = empty($_GET['op'])?'':$_GET['op'];
//showmessage('bb');//2013��3��11��10:52:45 for find BUG of friend���� @Ancon��
//Ȩ���ж�
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('cp.php?ac='.$ac));
	}
	showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
}

//��ȡ�ռ���Ϣ
$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}

//�Ƿ�ر�վ��
if(!in_array($ac, array('common', 'pm'))) {
	checkclose();
	//�ռ䱻����
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
    if ($space['flag'] == -2 && $ac != 'check_bot') {
        include_once template("space_check_bot");
        exit();
    }

	//��ֹ����
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
	//��֤�Ƿ���Ȩ����Ӧ��
	if($ac =='userapp' && !checkperm('allowmyop')) {
		showmessage('no_privilege');
	}
}

$_SGLOBAL['space_theme'] = $space['theme'];
$_SGLOBAL['space_css'] = $space['css'];

$theme = empty($_GET['theme'])?'':preg_replace("/[^0-9a-z]/i", '', $_GET['theme']);
if($theme == 'uchomedefault') {
	$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = '';
} elseif($theme) {
	$cssfile = S_ROOT.'./theme/'.$theme.'/style.css';
	if(file_exists($cssfile)) {
		$_SGLOBAL['space_theme'] = $theme;
		$_SGLOBAL['space_css'] = '';
	}
} else {
	if(!$space['self'] && $_SGLOBAL['member']['nocss']) {
		$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = '';
	}
}

//�˵�
$actives = array($ac => ' class="active"');
//showmessage($ac);//2013��3��11��10:48:31--for find bug of friend����!@Ancon
include_once(S_ROOT.'./source/cp_'.$ac.'.php');

?>
