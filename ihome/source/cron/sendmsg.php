<?php
/**
 * 该脚本用于发布消息
 */
if(!defined('IN_UCHOME')) {
    exit('Access Denied');
}
include_once(S_ROOT.'./source/function_cp.php');
$sql = "select * from ".tname('calendar')." order by id asc";
$query = $_SGLOBAL['db']->query($sql);
$t = time();
$lang = cplang('calendar_send_msg');
while($row = $_SGLOBAL['db']->fetch_array($query)){
    $calendar_id = $row['id'];
    $sql = "select * from ".tname('calendar_info')." where calendar_id={$calendar_id}";
    $new_query = $_SGLOBAL['db']->query($sql);
    while($val = $_SGLOBAL['db']->fetch_array($new_query)){
        if($val['start_t']-$t <= 600){
            $min = ceil(($val['start_t'] - $t)/60);
            $note = cplang('calendar_send_msg',array('space.php?do=calendar&calendar_id='.$row['id'],$row['calendar_name'],$min));
            notification_add($row['uid'],'calendar',$note);
        }
    }
}