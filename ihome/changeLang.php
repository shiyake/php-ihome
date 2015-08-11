<?php

include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./source/function_magic.php');

global $_SGLOBAL;

if(empty($_POST['lang'])) {
    $lang = 'null';
} else {
    $lang = $_POST['lang'];
}
$sql = "update ".tname('baseprofile')." set language=".$lang." where uid='$_SGLOBAL[supe_uid]'";
echo $sql;
$_SGLOBAL['db']->query($sql);

