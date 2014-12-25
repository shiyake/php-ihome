<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(empty($_SCONFIG['videophoto'])) {
	showmessage('no_open_videophoto');
}

$videophoto = $space['videostatus'] ? getvideopic($space['videopic']) : '';

include template("cp_videophoto");
?>