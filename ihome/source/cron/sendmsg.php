<?php
/**
 * 该脚本用于发布消息
 */
define('IN_UCHOME',TRUE);
if(!defined('IN_UCHOME')) {
    exit('Access Denied');
}
include_once(S_ROOT.'./source/function_cp.php');
$sql = "select * from ".tname('calendar')." order by id asc";
$query = $_SGLOBAL['db']->query($sql);
$t = time();
$lang = cplang('calendar_send_msg',array());
while($row = $_SGLOBAL['db']->fetch_array($query)){
    $calendar_id = $row['id'];
    $sql = "select * from ".tname('calendar_info')." where calendar_id={$calendar_id} and is_send_msg=0";
    $new_query = $_SGLOBAL['db']->query($sql);
    while($val = $_SGLOBAL['db']->fetch_array($new_query)){
        if($val['start_t']-$t <= 600 && $val['start_t']-$t > 0){
            $min = ceil(($val['start_t'] - $t)/60);
            $note = cplang('calendar_send_msg',array('space.php?do=calendar&calendar_id='.$row['id'],$row['calendar_name'],$min),getUserLang($row['uid']));
            notification_add($row['uid'],'calendar',$note);
        }
    }
}
