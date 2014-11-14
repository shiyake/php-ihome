<?php
/**
 * 日历功能模块
 */
if(!defined('iBUAA')) {
    exit('Access Denied');
}

//操作动作
$op = !empty($_GET['op']) && in_array($_GET['op'],array('index','add')) ? trim($_GET['op']) : 'index';

$uid = $_SGLOBAL['supe_uid'];

if($op == 'index'){
    //默认打开日历功能
    //检查当时用户是否有日历，如没有日历，自动创建默认日历
    $row = $_SGLOBAL['db']->query('select * from '.tname('calendar')." where uid=".$uid." order by id desc limit 1");
    $my_calendar = $_SGLOBAL['db']->fetch_row($row);
    if(empty($my_calendar)){
        $_SGLOBAL['db']->query("insert into ".tname('calendar')."(uid,calendar_name,dateline) values (".$uid.",'我的日历',".time().")");
        $id = $_SGLOBAL['db'] -> insert_id();
    }else{
        $id = $my_calendar['id'];
    }
    //获取所有日历列表，用于前台展出
    $list_query = $_SGLOBAL['db']->query("select * from ".tname('calendar')." where uid={$uid} order by id asc");
    while($row = $_SGLOBAL['db']->fetch_array($list_query)){
        $list[] = $row;
    }
}

$_TPL['css'] = 'calendar';
include_once template("space_calendar");