<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(empty($_SCONFIG['videophoto'])) {
	showmessage('no_open_videophoto');
}

//��Ƶ��֤
include_once(S_ROOT.'./source/function_cp.php');
ckvideophoto('viewphoto', $space);

$videophoto = getvideopic($space['videopic']);

//����ͷ��
include_once template("space_videophoto");

?>
