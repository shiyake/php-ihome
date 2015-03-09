<?php
include_once('./common.php');

checklogin();

$dos = array('home', 'apply', 'service', 'manage', 'resource');
$do = (!empty($_GET['do']) && in_array($_GET['do'], $dos)) ? $_GET['do'] : 'home';

$member = $_SGLOBAL['member'];

include_once(S_ROOT.'./uc_client/client.php');
$member['is_admin'] = uc_check_admin($member['username']);

function is_developer($uid)
{
    global $_SGLOBAL;
    $q = $_SGLOBAL['db']->query("SELECT 1 FROM " . tname('developer') . " WHERE uid='$uid'");
    return (bool)$_SGLOBAL['db']->num_rows($q);
}

$uid = $member['uid'];
$member['is_developer'] = is_developer($uid);

include_once(S_ROOT . "./source/dev_{$do}.php");
