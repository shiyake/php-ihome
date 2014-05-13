<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(empty($_SCONFIG['videophoto'])) {
	showmessage('no_open_videophoto');
}

//视频认证
include_once(S_ROOT.'./source/function_cp.php');
ckvideophoto('viewphoto', $space);

$videophoto = getvideopic($space['videopic']);

//个人头像
include_once template("space_videophoto");

?>
