<?php
if(!defined('iBUAA')) {
    exit('Access Denied');
}

$op = !empty($_GET['op']) && in_array($_GET['op'],array('index','add')) ? trim($_GET['op']) : 'index';

$uid = $_SGLOBAL['supe_uid'];

$showFcDate = isset($_GET['showFcDate']) ? $_GET['showFcDate'] : date('Y-m-d');


$calendar_id = empty($_GET['calendar_id'])?0:intval($_GET['calendar_id']);
$calendar = array();
if($calendar_id) {
    $query = $_SGLOBAL['db']->query("SELECT * from ".tname('calendar')." WHERE id='$calendar_id'");
    $calendar = $_SGLOBAL['db']->fetch_array($query);
} else {
    $query = $_SGLOBAL['db']->query('select * from ' . tname('calendar') . ' where `uid` = ' . $_SGLOBAL['supe_uid'] . ' order by `dateline` limit 1');
    $calendar = $_SGLOBAL['db']->fetch_array($query);
    $calendar_id = $calendar['id'];
}

if($op == 'index'){
    $row = $_SGLOBAL['db']->query('select * from '.tname('calendar')." where uid=".$uid." order by id desc limit 1");
    $my_calendar = $_SGLOBAL['db']->fetch_array($row);
    if(empty($my_calendar)){
        $_SGLOBAL['db']->query("insert into ".tname('calendar')."(uid,calendar_name,dateline) values (".$uid.",'我的日历',".time().")");
        $id = $_SGLOBAL['db'] -> insert_id();
    }else{
        $id = $my_calendar['id'];
    }
    $list_query = $_SGLOBAL['db']->query("select * from ".tname('calendar')." where uid={$uid} order by id asc");
    while($row = $_SGLOBAL['db']->fetch_array($list_query)){
        $list[] = $row;
    }
}
$_TPL['css'] = 'calendar';
include_once template("space_calendar");
