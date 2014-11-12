<?php
/*
by ancon
2012-6-14 21:14:56
*/

include_once('./common.php');

//是否关闭站点
checkclose();

//空间被锁定
if($_SGLOBAL['supe_uid']) {
	$space = getspace($_SGLOBAL['supe_uid']);
	
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	
	//禁止访问
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
}

$ac_array = array('index','show','pl','dh','cj');

$ac = $_GET['ac']?$_GET['ac']:'index';

if(!in_array($ac, $ac_array)){
	showmessage('参数错误');
}
	
include_once(S_ROOT.'./jifen/source/jifen_'.$ac.'.php');

?>