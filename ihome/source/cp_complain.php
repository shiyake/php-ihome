<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
if ($_GET['op'] == 'delete') {
    if (submitcheck('deletesubmit')) {
    }
}
include template("cp_complain");
?>
