<?php

define('IN_ADMINCP', TRUE);
define('iBUAA', TRUE);
include_once('./common.php');
include_once(S_ROOT.'./source/function_admincp.php');

//是否关闭站点
checkclose();

//需要登录
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
	}
	showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
}
$space = getspace($_SGLOBAL['supe_uid']);
if ($space['theme'] == 'diy') {
    $_SGLOBAL['space_diy'] = array(
        'bg_enabled' => $space['diy_bg_enabled'],
        'bg' => $space['diy_bg'],
        'bg_style' => $space['diy_bg_style'],
	    'diy_colors' => $space['diy_colors']
    );
}
$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}

if(checkperm('banvisit')) {
	ckspacelog();
	showmessage('you_do_not_have_permission_to_visit');
}

$isfounder = ckfounder($_SGLOBAL['supe_uid']);


$acs = array(
	array('index','config', 'privacy', 'ip', 'spam', 'hotuser', 'defaultuser', 'usergroup', 'credit', 'magic', 'magiclog', 'profield', 'ad', 'userapp'),
	array('tag', 'mtag', 'event', 'report', 'space', 'userimport'),
	array('cache', 'network', 'profilefield', 'eventclass', 'click', 'task', 'censor', 'stat', 'block', 'cron', 'app', 'log','wallmanage','publicapply','publictype','recommendpublic','complain','apps','loginbg','map','overseas'),
	array('feed', 'blog', 'album', 'pic', 'comment', 'thread', 'post', 'doing', 'share', 'poll','wallcontentmanage','mtaginvite'),
);
if(!empty($_SC['allowedittpl']) && $isfounder) {
	$acs[2][] = 'template';
}
if($isfounder) {
	$acs[2][] = 'backup';
}



if(($_SGLOBAL['member']['groupid']==1) || $isfounder) {
	$acs[4] = array('jifen_lb','jifen_lp','jifen_pl','jifen_cj','jifen_dhlog','jifen_cjlog','software_lb');
}

$acs[5] = array('retention', 'activation', 'user_active', 'publish_page', 'register_analyse');


if(empty($_GET['ac']) || (!in_array($_GET['ac'], $acs[0]) && !in_array($_GET['ac'], $acs[1]) && !in_array($_GET['ac'], $acs[2]) && !in_array($_GET['ac'], $acs[3]) && !in_array($_GET['ac'], $acs[4]) && !in_array($_GET['ac'], $acs[5]))) {
	$ac = 'index';
} else {
	$ac = $_GET['ac'];
}
/*if($ac=='publicapply'){
	//echo $ac;
	//echo S_ROOT.'admin/admincp_publicapply.php';
include_once(S_ROOT.'admin/admincp_publicapply.php');

}

if($ac=='publictype'){
	//echo $ac;
	//echo S_ROOT.'admin/admincp_publicapply.php';
include_once(S_ROOT.'admin/admincp_publictype.php');

}*/

//来源
if(!preg_match("/admincp\.php/", $_SGLOBAL['refer'])) $_SGLOBAL['refer'] = "admincp.php?ac=$ac";

//菜单激活
$menuactive = array($ac => ' class="active"');

//权限
$menus = array();
$needlogin = 0;

$m_groupid = $_SGLOBAL['member']['groupid'];

@include_once(S_ROOT.'./data/data_usergroup_'.$m_groupid.'.php');

$megroup = $_SGLOBAL['usergroup'][$m_groupid];
$megroup['manageuserapp'] = $megroup['manageapp'];

for($i=0; $i<3; $i++) {
	foreach ($acs[$i] as $value) {
		if($isfounder || $megroup['manageconfig'] || $megroup['manage'.$value]) {
			$needlogin = 1;
			$menus[$i][$value] = 1;
			$_SGLOBAL['usergroup'][$m_groupid]['manage'.$value] = 1;

		}
	}
}

//管理空间
if($isfounder || $megroup['managename'] || $megroup['managespacegroup'] || $megroup['managespaceinfo'] || $megroup['managespacecredit'] || $megroup['managespacenote'] || $megroup['managedelspace']) {
	$needlogin = 1;
	$menus[1]['space'] = 1;
}

//二次登录确认(半个小时)
if($needlogin) {
	$cpaccess = 0;
	$query = $_SGLOBAL['db']->query("SELECT errorcount FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]' AND dateline+1800>='$_SGLOBAL[timestamp]'");
	if($session = $_SGLOBAL['db']->fetch_array($query)) {
		if($session['errorcount'] == -1) {
			$_SGLOBAL['db']->query("UPDATE ".tname('adminsession')." SET dateline='$_SGLOBAL[timestamp]' WHERE uid='$_SGLOBAL[supe_uid]'");
			$cpaccess = 2;
		} elseif($session['errorcount'] <= 3) {
			$cpaccess = 1;
		}
	} else {
		$_SGLOBAL['db']->query("DELETE FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]' OR dateline+1800<'$timestamp'");
		$_SGLOBAL['db']->query("INSERT INTO ".tname('adminsession')." (uid, ip, dateline, errorcount)
			VALUES ('$_SGLOBAL[supe_uid]', '".getonlineip()."', '$_SGLOBAL[timestamp]', '0')");
		$cpaccess = 1;
	}
} else {
	$cpaccess = 2;
}

switch ($cpaccess) {
	case '1'://可以登录
		if(submitcheck('loginsubmit')) {
			if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
				$_SGLOBAL['db']->query("UPDATE ".tname('adminsession')." SET errorcount=errorcount+1 WHERE uid='$_SGLOBAL[supe_uid]'");
				cpmessage('enter_the_password_is_incorrect', 'admincp.php');
			} else {
				$_SGLOBAL['db']->query("UPDATE ".tname('adminsession')." SET errorcount='-1' WHERE uid='$_SGLOBAL[supe_uid]'");
				$refer = empty($_SCOOKIE['_refer'])?$_SGLOBAL['refer']:rawurldecode($_SCOOKIE['_refer']);
				if(empty($refer) || preg_match("/(login)/i", $refer)) {
					$refer = 'admincp.php';
				}
				ssetcookie('_refer', '');
				showmessage('login_success', $refer, 0);
			}
		} else {
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
			} else {
				ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
			}
			$actives = array('advance' => ' class="active"');
			include template('cp_advance');
			exit();
		}
		break;
	case '2'://登录成功
		break;
	default://尝试次数太多禁止登录
		cpmessage('excessive_number_of_attempts_to_sign');
		break;
}

if($ac == 'defaultuser') {
	$acfile = 'hotuser';
} else {
	$acfile = $ac;
}

//取消翻页限制
$_SCONFIG['maxpage'] = 0;

//log
if($needlogin) {
	admincp_log();
}

//去掉广告
$_SGLOBAL['ad'] = array();

//足迹墙审核权限 by xuxing 2012-8-20
$Query = $_SGLOBAL['db']->query("select * from ".tname("wall")." where uid=".$_SGLOBAL['supe_uid']." and (".time()." between starttime-1800 and endtime+1800) limit 1");
if($_SGLOBAL['db']->fetch_array($Query)){
	$WallStartFlag = 1;
}

include_once(S_ROOT.'./admin/admincp_'.$acfile.'.php');
include_once template("admin/tpl/$acfile");

?>
