<?php

if(!defined('iBUAA')) {
    exit('Access Denied');
}

//检查信息
$calendar_id = empty($_GET['calendar_id'])?0:intval($_GET['calendar_id']);
$op = empty($_GET['op'])?'':$_GET['op'];

$calendar = array();
if($calendar_id) {
    $query = $_SGLOBAL['db']->query("SELECT * from ".tname('calendar')." WHERE id='$calendar_id'");
    $calendar = $_SGLOBAL['db']->fetch_array($query);
}
//权限检查
if(empty($calendar)) {
    if(!checkperm('allowblog')) {
        ckspacelog();
        showmessage('no_authority_to_add_calendar');
    }

    //实名认证
    ckrealname('blog');

    //视频认证
    ckvideophoto('blog');

    //新用户见习
    cknewuser();

} else {

    if($_SGLOBAL['supe_uid'] != $calendar['uid'] && !checkperm('manageablog')) {
        showmessage('no_authority_operation_of_the_calendar');
    }
}

//添加编辑操作
if(submitcheck('calendarbutton')) {
    //判断是否发布太快
    $waittime = interval_check('post');
    if($waittime > 0) {
        showmessage('operating_too_fast','',1,array($waittime));
    }
    if(empty($calendar['id'])) {
        $calendar = array();
    } else {
        if(!checkperm('allowblog')) {
            ckspacelog();
            showmessage('no_authority_to_add_arrangement');
        }
    }
    //showmessage(strtotime($_POST['starttime']));
    //验证码
    if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
        showmessage('incorrect_code');
    }
    include_once(S_ROOT.'./source/function_blog.php');
    if($newarrangement = calendar_post($_POST, $calendar)) {
        $url = 'space.php?uid='.$newarrangement['uid'].'&do=calendar&id='.$newarrangement['id'];
        showmessage('do_success', $url, 0);
    } else {
        showmessage('that_should_at_least_write_things');
    }
}
if($op == 'delete') {
    //删除
    if(submitcheck('deletesubmit')) {
        $sql = "delete from ".tname('calendar')." where uid={$_SGLOBAL['supe_uid']} and id={$calendar_id}";
        $_SGLOBAL['db']->query($sql);
        //删除日历
        $_SGLOBAL['db']->query('delete from '.tname('calendar_info')." where calendar_id={$calendar_id}");
        //删除动态事件
        //TODO
        showmessage('do_success', "space.php?do=calendar");
    }
} elseif($op == 'calendar') {//校历安排列表日历
    $match = array();
    if(!$_GET['month'] && preg_match("/^(\d{4}-\d{1,2})/", $_GET['date'], $match)) {
        $_GET['month'] = $match[1];
    }
    if(preg_match("/^(\d{4})-(\d{1,2})$/", $_GET['month'], $match)){
        $year = intval($match[1]);
        $month = intval($match[2]);
    } else {
        $year = intval(sgmdate("Y"));
        $month = intval(sgmdate("m"));
    }
    if($month==12) {
        $nextmonth = ($year + 1)."-"."1";
        $premonth = $year."-11";
    } elseif ($month==1) {
        $nextmonth = $year."-2";
        $premonth = ($year-1)."-12";
    } else {
        $nextmonth = $year."-".($month+1);
        $premonth = $year."-".($month-1);
    }

    $daystart = mktime(0,0,0,$month,1,$year);
    $week = sgmdate("w",$daystart);//本月第一天是周几: 0-6
    $dayscount = sgmdate("t",$daystart);//本月天数
    $dayend = mktime(0,0,0,$month,$dayscount,$year) + 86400;
    $days = array();
    for($i=1; $i<=$dayscount; $i++) {
        $days[$i] = array("count"=>0, "arrangements"=>array(), "class"=>'');
    }
    
    $wheresql = " and calendar_id = {$calendar_id}";
    //本月活动
    $arrangements = array();
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("calendar_info")." WHERE 1 $wheresql and start_t < $dayend AND end_t >= $daystart ORDER BY start_t asc");
    while($value=$_SGLOBAL['db']->fetch_array($query)) {
        $start = $value['start_t'] < $daystart ? 1 : intval(date("j", $value['start_t']));
        //$end = $value['starttime'] > $dayend ? $dayscount : intval(date("j", $value['starttime']));
        //for($i=$start; $i<=$dayend; $i++) {
        //if($days[$start]['count'] < 10) {//最多只显示10个安排/每天
            $days[$start]['arrangement'][] = $value;
            $days[$start]['count'] += 1;
            $days[$start]['class'] = " on_link";
            //}
            //}
        }
        if($month == intval(sgmdate("m")) && $year == intval(sgmdate("Y"))) {
            $d = intval(sgmdate("j"));
            $days[$d]['class'] = "on_today";
        }

        unset($arrangements);

        if($_GET['date']) {
            $t = sstrtotime($_GET['date']);
            if($month == intval(sgmdate("m",$t)) && $year == intval(sgmdate("Y",$t))) {
                $d = intval(sgmdate("j",$t));
                $days[$d]['class'] = "on_select";
            }
        }
        
        //链接
        $url = $_GET['url'] ? preg_replace("/date=[\d\-]+/", '', $_GET['url']) : "space.php?do=calendar";

}else {
    //添加编辑日历
    //菜单激活
    $menuactives = array('space'=>' class="active"');
}

include_once template("cp_calendar");

?>
