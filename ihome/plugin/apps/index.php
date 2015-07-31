<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}
if($_SGLOBAL['member']['groupid'] != 3){
	$userTypes = array();
	$uid = $_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query("SELECT usertype FROM ".tname('baseprofile')." WHERE uid=$uid");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$userTypes[] = $value['usertype'];
	}
	if (in_array('学生', $userTypes) || in_array('教师', $userTypes) || in_array('离休', $userTypes)) {
		include_once('cas_login.php');
	}elseif(in_array('1', $userTypes) || in_array('2', $userTypes) || in_array('3', $userTypes) || in_array('4', $userTypes) || in_array('5', $userTypes) || in_array('7', $userTypes)){
	//本科生为1，硕士生为2，博士生为3，博士后为4，教职工为5，校友为6，留学生为7，其他为8。
		include_once('cas_login.php');
	}else{
		$username = '';
		$collegeid_len =0;
	}
}else{
	$username = '';
	$collegeid_len =1;
}

$ac = $_GET['ac'];
$ac_array = array('foru' ,'list','detail','delete','apply','applys' ,'mine' ,'api' ,'mylist');
if (!in_array($ac, $ac_array)) {
	$ac = 'foru';
}

$apps_ad = 0;

$_SGLOBAL['space_theme'] = $space['theme'];
$_SGLOBAL['space_css'] = $space['css'];
if ($_SGLOBAL['space_theme'] == 'diy') {
	$_SGLOBAL['space_diy'] = array(
		'bg_enabled' => $space['diy_bg_enabled'],
		'bg' => $space['diy_bg'],
		'bg_style' => $space['diy_bg_style'],
		'diy_colors' => $space['diy_colors'],
		'diy_alpha' => $space['diy_alpha'],
    );
}
$_SGLOBAL['index_bg']=$space['index_bg'];
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

if($ac) {
	@require_once(''.$ac.'.php');
}

?>
