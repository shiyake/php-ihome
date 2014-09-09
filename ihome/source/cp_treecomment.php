<?php

if(!defined('iBUAA')) {
    exit('Access Denied');
}

$rootid = empty($_GET['rootid'])?0:intval($_GET['rootid']);
$id = empty($_GET['id'])?0:intval($_GET['id']);
include template("cp_treecomment");

?>

