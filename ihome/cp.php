﻿<?php

//Í¨ÓÃÎÄ¼þ
include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./source/function_magic.php');
//ÔÊÐíµÄ·½·¨
$acs = array('space', 'doing', 'upload', 'video', 'comment', 'blog', 'album', 'relatekw', 'common', 'class',
	'swfupload', 'thread', 'mtag', 'poke', 'friend',
	'avatar', 'profile', 'theme', 'import', 'feed', 'privacy', 'pm', 'share', 'advance', 'invite', 'parent', 'invitefriend', 'invite2', 'sendmail', 'protect', 'thirdparty',
	'userapp', 'task', 'credit', 'password', 'domain', 'event', 'poll', 'topic',
	'click','magic', 'top', 'videophoto','publicapply', 'arrangement','namecard', 'check_bot', 'public', 'changelogin', 'complain');
$ac = (empty($_GET['ac']) || !in_array($_GET['ac'], $acs))?'profile':$_GET['ac'];
$op = empty($_GET['op'])?'':$_GET['op'];
$type = empty($_GET['type'])?'':$_GET['type'];
$appid = empty($_GET['appid'])?'':$_GET['appid'];
	$friendurl_w = S_ROOT."./data/assets/data_".$_SGLOBAL[supe_uid].".json";
	$friendurl_r = "data/assets/data_".$_SGLOBAL[supe_uid].".json";
	$FileModTime = filemtime($friendurl_w);
	$CurrentTime = time();
	if($CurrentTime - $FileModTime > 3600){
		$atfriends = array();
		$count = 0;
			
		$result = $_SGLOBAL['db']->query("select friend from ".tname('spacefield')." where uid='$_SGLOBAL[supe_uid]'");
		$rs0 = $_SGLOBAL['db']->fetch_array($result);
		$rs1 = explode(",",$rs0['friend']);
		$length = count($rs1);
		for($i=0; $i<$length; $i++) {
			$result2 = $_SGLOBAL['db']->query("select name,username from ".tname('space')." where uid='$rs1[$i]'");
			$rs2 = $_SGLOBAL['db']->fetch_array($result2);	
			if(empty($rs2['name'])) $rs2['name'] = $rs2['username'];
			$result3 = $_SGLOBAL['db']->query("select type from ".tname('spaceinfo')." where uid='$rs1[$i]'");
			$rs3 = $_SGLOBAL['db']->fetch_array($result3);
			
			$atfriends[$count++] = array('uid'=>$rs1[$i],'namequery'=>$rs2['name'].' '.Pinyin($rs2['name'],1).' '.$rs1[$i],'name'=>$rs2['name'],'avatar'=>'');
		
		}
		//¿¿¿¿¿¿
		$query = $_SGLOBAL['db']->query("select uid,name,username from ".tname('space')." where groupid=3");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			if(empty($value['name'])) $value['name'] = $value['username'];
			$atfriends[$count++] = array('uid'=>$value['uid'],'namequery'=>$value['name'].' '.Pinyin($value['name'],1).' '.$value['uid'],'name'=>$value['name'],'avatar'=>'');
		}
		

		
		$friends = json_encode($atfriends);
		$friends = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $friends);
		$f = fopen($friendurl_w,"w");
		fwrite($f,$friends);
		fclose($f);
	}
	
//showmessage('bb');//2013Äê3ÔÂ11ÈÕ10:52:45 for find BUG of friend¡¤¡¤ @Ancon£¡
//È¨ÏÞÅÐ¶Ï
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('cp.php?ac='.$ac));
	}
	showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
}

//»ñÈ¡¿Õ¼äÐÅÏ¢
$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}

	
//ÊÇ·ñ¹Ø±ÕÕ¾µã
if(!in_array($ac, array('common', 'pm'))) {
	checkclose();
	//¿Õ¼ä±»Ëø¶¨
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
    if ($space['flag'] == -2 && $ac != 'check_bot') {
        include_once template("space_check_bot");
        exit();
    }

	//½ûÖ¹·ÃÎÊ
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
	//ÑéÖ¤ÊÇ·ñÓÐÈ¨ÏÞÍæÓ¦ÓÃ
	if($ac =='userapp' && !checkperm('allowmyop')) {
		showmessage('no_privilege');
	}
}
//全局变量定义，判读是否是国外校友
$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']);
if($_SGLOBAL['db']->fetch_array($query))	{
	$_SGLOBAL['overseas'] = 'overseas' ;
	if($q = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']." AND cer=1"))	{
		$_SGLOBAL['cer'] = 1;
	}
	else $_SGLOBAL['cer'] = 0;
}
else if(is_overseas())	{
	$query=$_SGLOBAL['db']-> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']);
	if(!$_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['overseas'] = 'overseas' ;
	}
}
else $_SGLOBAL['overseas'] = 'inland' ;	

$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("space")." WHERE uid=".$_SGLOBAL['supe_uid']);
if($rows = $_SGLOBAL['db']->fetch_array($query))	{
	if($rows['overseas_tip']=='never')	{
		$_SGLOBAL['overseas_tip'] = 'never';
	}
	else $_SGLOBAL['overseas_tip'] = 'always';
}
$_SGLOBAL['space_theme'] = $space['theme'];
$_SGLOBAL['space_css'] = $space['css'];
if ($space['theme'] == 'diy') {
    $_SGLOBAL['space_diy'] = array(
        'bg_enabled' => $space['diy_bg_enabled'],
        'bg' => $space['diy_bg'],
        'bg_style' => $space['diy_bg_style'],
	    'diy_colors' => $space['diy_colors'],
        'diy_alpha' => $space['diy_alpha']
    );
}

$theme = empty($_GET['theme'])?'':preg_replace("/[^0-9a-z]/i", '', $_GET['theme']);
if($theme == 'uchomedefault') {
	$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = $_SGLOBAL['space_diy'] = '';
} elseif($theme) {
	$cssfile = S_ROOT.'./theme/'.$theme.'/style.css';
	if(file_exists($cssfile)) {
		$_SGLOBAL['space_theme'] = $theme;
		$_SGLOBAL['space_css'] = '';
	    $_SGLOBAL['space_diy'] = '';
    }
} else {
	if(!$space['self'] && $_SGLOBAL['member']['nocss']) {
		$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = $_SGLOBAL['space_diy'] = '';
	}
}
//²Ëµ¥
$actives = array($ac => ' class="active"');
//showmessage($ac);//2013Äê3ÔÂ11ÈÕ10:48:31--for find bug of friend¡¤¡¤!@Ancon
//parent
@include_once('./source/cp_parent_func.php');
global $_PARENT;
initStudent();
initParent();
initParentFlag();
if(preg_match('/@ihome.com$/',$space['email'])){
	$_PARENT['emailupdated']=0;
}else{
	$_PARENT['emailupdated']=1;
}
include_once(S_ROOT.'./source/cp_'.$ac.'.php');

?>
