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
} else {
    $query = $_SGLOBAL['db']->query('select * from ' . tname('calendar') . ' where `uid` = ' . $_SGLOBAL['supe_uid'] . ' order by `dateline` limit 1');
    $calendar = $_SGLOBAL['db']->fetch_array($query);
    $calendar_id = $calendar['id'];
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
    if(empty($calendar['id']) || $op == 'add') {
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
        //检测是否有ICS文件日历需要导入
        if(!empty($_FILES) && !empty($_FILES['ics_file']['tmp_name'])){
           $file_type = substr($_FILES['ics_file']['name'],strrpos($_FILES['ics_file']['name'],'.')+1);
           if(strtolower($file_type) == 'ics'){
               //如果为ICALENDAR格式文件，则开始进行导入
               include S_ROOT.'./source/vendor/autoload.php';
               $calendar = Sabre\VObject\Reader::read(file_get_contents($_FILES['ics_file']['tmp_name']));
               foreach($calendar->vevent as $event) {
                   $start_t = active_date((string)$event->dtstart);
                   $end_t = !empty($event->dtend) ? active_date((string)$event->dtend) : $start_t + 3600;
                   $date = array('calendar_id'=>$newarrangement['id'],'content'=>(string)$event->summary,'start_t'=>$start_t,
                                 'end_t' => $end_t,'dateline'=>time()
                   );
                   inserttable('calendar_info', $date);
               }
           }
        }
        showmessage('do_success', $url, 0);
    } else {
        showmessage('that_should_at_least_write_things');
    }
}
if($op == 'leadin') {
    include_once(S_ROOT.'./source/function_blog.php');
    //检测是否有ICS文件日历需要导入
    if(!empty($_FILES) && !empty($_FILES['leading-in']['tmp_name'])){
        $file_type = substr($_FILES['leading-in']['name'],strrpos($_FILES['leading-in']['name'],'.')+1);
       if(strtolower($file_type) == 'ics'){
       //如果为ICALENDAR格式文件，则开始进行导入
           include S_ROOT.'./source/vendor/autoload.php';
           $calendar = Sabre\VObject\Reader::read(file_get_contents($_FILES['leading-in']['tmp_name']));
           foreach($calendar->vevent as $event) {
               $start_t = active_date((string)$event->dtstart);
               $end_t = !empty($event->dtend) ? active_date((string)$event->dtend) : $start_t + 3600;
               if($_POST['leadin-type']=='person') {
                   $color = "#75D906";
               }
               else {
                    $color = "#7515E0";
               }
               $sql = 'INSERT INTO '.tname("calendar_info").' (`calendar_id`,`content`,`start_t`,`end_t`,`bgcolor`,`dateline`) values ('.$calendar_id.',"'.$event->summary.'","'.$start_t.'","'.$end_t.'","'.$color.'","'.time().'")';
               $_SGLOBAL['db']-> query($sql);
           }
       }

    }
    showmessage('日历导入成功','space.php?do=calendar');
    exit();
}
elseif($op == 'extract_calendar') {
    $sql = "SELECT * FROM ".tname("calendar_info")." WHERE calendar_id=".$calendar_id;
    $event = array();
    if($_POST['leadout-type-edu']) {
        $sqledu = $sql . " and bgcolor='#7515E0'";
        $query = $_SGLOBAL['db'] -> query($sqledu);

        while($res = $_SGLOBAL['db']->fetch_array($query)) {
            $item = array("id"=>$res['id'],"content"=>$res['content'],"place"=>$res['place'],"start_t"=>$res['start_t'],"end_t"=>$res['end_t'],"bgcolor"=>$res['bgcolor'],"dateline"=>$res['dateline']);
            $event[] = $item; 
        }
    }
    if ($_POST['leadout-type-school']) {
        $sqlschool = "SELECT * FROM ".tname("arrangement");
        $query = $_SGLOBAL['db'] -> query($sqlschool);    
        while($res = $_SGLOBAL['db']->fetch_array($query)) {
            $item = array("id"=>$res['arrangementid'],"content"=>$res['subject'],"place"=>"","start_t"=>$res['starttime'],"end_t"=>$res['starttime']+2*3600,"bgcolor"=>"rgb(68,10,231)","dateline"=>$res['dateline']);
            $event[] = $item; 
        }
    }
    if ($_POST['leadout-type-person']) {
        $sqlperson = $sql . " and bgcolor='#75D906'";
        $query = $_SGLOBAL['db'] -> query($sqlperson);
        while($res = $_SGLOBAL['db']->fetch_array($query)) {
            $item = array("id"=>$res['id'],"content"=>$res['content'],"place"=>$res['place'],"start_t"=>$res['start_t'],"end_t"=>$res['end_t'],"bgcolor"=>$res['bgcolor'],"dateline"=>$res['dateline']);
            $event[] = $item; 
        }

    }

    include S_ROOT.'./source/vendor/autoload.php';
    $vcal = Sabre\VObject\Document::create('VCALENDAR');
    $vcal->VERSION = '2.0';
    $vcal->PRODID = '-//SabreDAV//SabreDAV//EN';
    $vcal->CALSCALE = 'GREGORIAN';
    var_dump($vcal);
    for($i=0;$i<count($event);$i++) {
        $todo = Sabre\VObject\Document::create('VTODO');
        $todo->summary = $event[$i]['content'];
        $todo->dtstart = $event[$i]['start_t'];
        $todo->ddtend = $event[$i]['end_t'];
        $vcal->add($todo);
        var_dump($todo);
    }

    file_put_contents('output.ics', $vcal->serialize()); 
    echo json_encode($event); 
    exit(); 
}
elseif($op == 'delete') {
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

}elseif($op == 'getCalendarInfo'){
    $start_t = isset($_GET['start']) ? strtotime($_GET['start']) : strtotime('Y-m-d', strtotime('-2 day'));
    $end_t = isset($_GET['end']) ? strtotime($_GET['end']) : strtotime('Y-m-d', strtotime('+2 day'));
    
    $sql = 'select * from ' . tname('calendar_info') . " where ";
    if(!$_GET['calendar_info_id'] || $_GET['addtime'] == 'new')   {
        $sql.="`calendar_id` = {$calendar_id} and `start_t` >= {$start_t} and `end_t` <= {$end_t}";
    }
    if($_GET['addtime'] == 'new')   {
        $sql.=" order by dateline desc limit 1";
    }
    if($_GET['calendar_info_id']) {
        $sql.=" `id` = '".$_GET['calendar_info_id']."'";
    }
    $query = $_SGLOBAL['db']->query($sql);
    $event = array();
    while ($val = $_SGLOBAL['db']->fetch_array($query)) {
        $item = array();
        $item['id'] = $val['id'];
        $item['title'] = $val['content'] ;
        $item['start'] = date('Y-m-d H:i:s', $val['start_t']);
        $item['end'] = date('Y-m-d H:i:s', $val['end_t']);
        $item['color'] = $val['bgcolor'];
        $event[] = $item;
    }
    $sql = 'select * from '.tname('arrangement')." where `starttime` >= {$start_t}";
    $query = $_SGLOBAL['db']->query($sql);
    while($val = $_SGLOBAL['db']->fetch_array($query))  {
        $item = array();
        $item['id'] = $val['arrangementid'];
        $item['title'] = $val['subject'];
        $item['start'] = date('Y-m-d H:i:s', $val['starttime']);
        $item['end'] = date('Y-m-d H:i:s',$val['starttime']+3600);
        $item['color'] = 'rgb(68,10,231)';
        $event[] = $item;
    }

    if($_GET['filter'] == 'school')   {
        $event = array();
        $sql = 'select *  from '.tname('arrangement')." where `starttime` >= {$start_t}";
        $query = $_SGLOBAL['db'] -> query($sql);
        while($val = $_SGLOBAL['db'] -> fetch_array($query))    {
            $item = array();
            $item['id'] = $val['arrangementid'];
            $item['title'] = $val['subject'];
            $item['start'] = date('Y-m-d H:i:s', $val['starttime']);
            $item['end'] = date('Y-m-d H:i:s',$val['starttime']+3600);
            $item['color'] = 'rgb(68,10,231)';
            $event[] = $item;
        }
    }
    if($_GET['filter'] == 'person') {
        $color = "#75D906";
    }
    elseif ($_GET['filter'] == 'edu') {
        $color = "#7515E0";
    }
    
    if($_GET['filter'] == 'person' || $_GET['filter'] == 'edu')   {
        $event = array();
        $sql = 'select * from ' . tname('calendar_info') . " where `calendar_id` = {$calendar_id} and `start_t` >= {$start_t} and `end_t` <= {$end_t} and bgcolor='".$color."'";
        if($_GET['addtime'] == 'new')   {
            $sql.=" order by dateline desc limit 1";
        }
        $query = $_SGLOBAL['db']->query($sql);
        while ($val = $_SGLOBAL['db']->fetch_array($query)) {
            $item = array();
            $item['id'] = $val['id'];
            $item['title'] = $val['content'] ;
            $item['start'] = date('Y-m-d H:i:s', $val['start_t']);
            $item['end'] = date('Y-m-d H:i:s', $val['end_t']);
            $item['color'] = $val['bgcolor'];
            $item['editable'] = 'true';
            $event[] = $item;
        }
    }
    echo json_encode($event);
    exit();
}elseif($op == 'resize' || $op == 'drag')  {
    $calendar_info_id = $_GET['calendar_info_id'];
    $min = $_POST['minutes'];
    $hour = $_POST['hours'];
    $day = $_POST['days'];
    $sql = "SELECT * FROM ".tname("calendar_info")." WHERE id = ".$calendar_info_id;
    $query = $_SGLOBAL['db']-> query($sql);
    $event = array();
    if($res = $_SGLOBAL['db']->fetch_array($query)) {
        if($op == 'drag')   {
            $startt = intval($res['start_t']) + 60*$min+3600*$hour+3600*24*$day;
        }
        $endt = intval($res['end_t']) + 60*$min+3600*$hour+3600*24*$day;
        $sql_start = "UPDATE ".tname("calendar_info")." SET end_t = ".$endt;
        if($op == 'drag')   {
            $sql_start .= " , start_t = ".$startt;
        }
        $sql_end = " WHERE id=".$calendar_info_id;
        $sql = $sql_start . $sql_end;
        $_SGLOBAL['db'] -> query($sql);
        $item = array();
        $item['id'] = $res['id'];
        $item['title'] = $res['content'];
        $item['color'] = $res['bgcolor'];
        if($op == 'drag')   {
            $item['start'] = date('Y-m-d H:i:s',$startt);
        }
        else {
            $item['start'] = date('Y-m-d H:i:s',$res['start_t']);
        }
        $item['end'] = date('Y-m-d H:i:s',$endt);
        $event[] = $item;
    }
    echo json_encode($event);
    exit();
}
elseif($op == 'addEventDo') {
    //添加事件
    if (submitcheck('calendarEventBtn') && !empty($calendar)) {

        $start_time = strtotime($_POST['start_d']);
        $end_time = strtotime($_POST['end_d']);
        if($_POST['bg']=="school")  {
            $bgcolor = '#7515E0';
        }
        else if($_POST['bg']=="person") {
            $bgcolor = '#75D906';
        }    
        $dateline = time();
        $sql = 'insert into ' . tname('calendar_info') . ' (`calendar_id`, `content`, `place`, `start_t`, `end_t`, `dateline`, `bgcolor`) ' .
            " values ('{$calendar_id}', '{$_POST['eventContent']}', '{$_POST['place']}', {$start_time}, {$end_time}, {$dateline}, '{$bgcolor}')";
        $_SGLOBAL['db']->query($sql);
        echo "true";
        exit();
    }
    echo "error";
    exit();
}elseif($op == 'editEvent'){
    isset($_GET['calendar_info_id']) && !empty($calendar) ? $calendar_info_id = $_GET['calendar_info_id'] : showmessage('do_error');
    if($_GET['submit']=='true' ){
        $start_time = strtotime($_POST['start_d']);
        $end_time = strtotime($_POST['end_d']);
        if($_POST['bg']=="school")  {
            $bgcolor = '#7515E0';
        }
        else if($_POST['bg']=="person") {
            $bgcolor = '#75D906';
        }    
 
        $sql = 'update ' . tname('calendar_info') . " set `calendar_id`='{$_GET['calendar_id']}', `content` = '{$_POST['eventContent']}', `place` = '{$_POST['place']}',`start_t` = '{$start_time}',`end_t`='{$end_time}', `bgcolor` = '{$bgcolor}' where id = {$calendar_info_id}";

        $_SGLOBAL['db']->query($sql);

        echo "true";
        exit();
    }else{
        $sql = 'select * from ' . tname('calendar_info') . " where id = {$calendar_info_id} limit 1";
        $query = $_SGLOBAL['db']->query($sql);
        $calendarInfo = $_SGLOBAL['db']->fetch_array($query);
        $calendarInfo['start_d'] = date('Y-m-d H:i:s', $calendarInfo['start_t']);
        $calendarInfo['start_w'] = date('H:i', $calendarInfo['start_t']);
        $calendarInfo['end_d'] = date('Y-m-d H:i:s', $calendarInfo['end_t']);
        $calendarInfo['end_w'] .= date('H:i', $calendarInfo['end_t']);
    }
}elseif($op == 'showEvent'){

    if(empty($calendar) || !isset($_GET['calendar_info_id']))
        showmessage('do_error');
    $calendar_info_id = $_GET['calendar_info_id'];
    $sql = 'select * from ' . tname('calendar_info') . " where id = {$calendar_info_id} limit 1";
    $query = $_SGLOBAL['db']->query($sql);
    $calendarInfo = $_SGLOBAL['db']->fetch_array($query);
    
    $calendarInfo['show_date'] = date('m月d日', $calendarInfo['start_t']);
    $calendarInfo['show_date'] .= '（周' . getWeekName(date('w', $calendarInfo['start_t'])) . '），';
    $calendarInfo['show_date'] .= date('H', $calendarInfo['start_t']) >= 12 ? '下午' : '上午';
    $calendarInfo['show_date'] .= date('H:i', $calendarInfo['start_t']) . ' - ';
    $calendarInfo['show_date'] .= date('H', $calendarInfo['end_t']) >= 12 ? '下午' : '上午';
    $calendarInfo['show_date'] .= date('H:i', $calendarInfo['end_t']);

}elseif($op == 'deleteEvent'){
    if(!empty($calendar) && isset($_GET['calendar_info_id'])){
        $sql = 'delete from ' . tname('calendar_info') . " where id = {$_GET['calendar_info_id']}";
        $_SGLOBAL['db']->query($sql);
        echo json_encode(array('status' => 1));
    }else
        echo json_encode(array('status' => 1));
    exit();
}
else {
    //添加编辑日历
    //菜单激活
    $menuactives = array('space'=>' class="active"');
}

if($op == 'addEvent' || $op == 'editEvent' || $op == 'showEvent'){
    $list_query = $_SGLOBAL['db']->query("select * from ".tname('calendar')." where uid={$_SGLOBAL['supe_uid']} order by id asc");
    while($row = $_SGLOBAL['db']->fetch_array($list_query)){
        $calendar_list[] = $row;
    }
}
include_once template("cp_calendar");

function getWeekName($w){
    switch($w){
        case 0:
            $w = '日';
            break;
        case 1:
            $w = '一';
            break;
        case 2:
            $w = '二';
            break;
        case 3:
            $w = '三';
            break;
        case 4:
            $w = '四';
            break;
        case 5:
            $w = '五';
            break;
        case 6:
            $w = '六';
            break;
    }
    return $w;
}
/**
 * 格式化ICS文件里的时间格式
 * @param string $string
 */
function active_date($string){
    $s = explode("T",$string);
    $y = substr($s[0],0,4);
    $m = substr($s[0],4,2);
    $d = substr($s[0],6,2);
    $h = substr($s[1],0,2);
    $f = substr($s[1],3,2);
    $s = substr($s[1],5,2);
    return mktime($h,$f,$s,$m,$d,$y);
}
?>
