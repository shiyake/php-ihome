<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//检查信息
$arrangementid = empty($_GET['arrangementid'])?0:intval($_GET['arrangementid']);
$op = empty($_GET['op'])?'':$_GET['op'];
//
$arrangement = array();
if($arrangementid) {
    $query = $_SGLOBAL['db']->query("SELECT * from ".tname('arrangement')." WHERE arrangementid='$arrangementid'");
    $arrangement = $_SGLOBAL['db']->fetch_array($query);
    if(empty($arrangement)){
        $query = $_SGLOBAL['db']->query("SELECT * from ".tname('unCheckArrangement')." WHERE arrangementid='$arrangementid'");
        $arrangement = $_SGLOBAL['db']->fetch_array($query);
    }
}

if($op == 'allow'){
    $arrangementid = $_GET['arrangementid'];
    $query = $_SGLOBAL['db']->query("SELECT * FROM ihome_unCheckArrangement where arrangementid='$arrangementid'");
    $value = $_SGLOBAL['db']->fetch_array($query);
//    unset($value['arrangemntid']);
    $_SGLOBAL['db']->query("DELETE FROM ihome_unCheckArrangement where arrangementid='$arrangementid'");
    include_once(S_ROOT.'./source/function_blog.php');
    if($newarrangementid = inserttable('arrangement',$value,1)){
        include_once(S_ROOT.'./source/function_feed.php');
        feed_publish($newarrangementid, 'arrangementid', 1);
        $note=cplang('note_allow_arrangement', array('space.php?uid='.$value['uid'].'&do=arrangement&id='.$newarrangementid, $value['subject']));
        notification_add($value['uid'], 'systemnote', $note);
        header("newid:".$arrangementid);
        exit;
    }
}

if($op == 'deny'){
    $arrangementid = $_GET['arrangementid'];
    $query = $_SGLOBAL['db']->query("SELECT * FROM ihome_arrangement where arrangementid='$arrangementid'");
    $value = $_SGLOBAL['db']->fetch_array($query);
//	$arrangement['subject'] = empty($_value['subject'])?'':getstr($_value['subject'], 80, 1, 0);
//	$arrangement['message'] = empty($_value['message'])?'':getstr($_value['message'], 5000, 1, 0);
//    unset($value['arrangemntid']);
    $_SGLOBAL['db']->query("DELETE FROM ihome_arrangement where arrangementid='$arrangementid'");
    $_SGLOBAL['db']->query("DELETE FROM ihome_feed where id='$arrangementid' and idtype='arrangementid'");
    include_once(S_ROOT.'./source/function_blog.php');
    if($newarrangementid = inserttable('unCheckArrangement',$value,1)){
        $note=cplang('note_deny_arrangement', array('space.php?uid='.$value['uid'].'&do=arrangement&state=deny&id='.$newarrangementid, $value['subject']));
        notification_add($value['uid'], 'systemnote', $note);
        header("newid:".$arrangementid);
        exit;
    }
}
//print_r($arrangement);exit();
//权限检查
if(empty($arrangement)) {
	if(!checkperm('allowblog')) {
		ckspacelog();
		showmessage('no_authority_to_add_arrangement');
	}
	
	//实名认证
	ckrealname('blog');
	
	//视频认证
	ckvideophoto('blog');
	
	//新用户见习
	cknewuser();
	
	//接收外部标题
	$arrangement['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$arrangement['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $arrangement['uid'] && !checkperm('manageablog')) {
		showmessage('no_authority_operation_of_the_arrangement');
	}
}

//添加编辑操作
if(submitcheck('arrangementsubmit')) {
    //判断是否发布太快
    $from = $_POST['from'] || null;
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	if(empty($arrangement['arrangementid'])) {
		$arrangement = array();
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
	if((empty($arrangement['arrangementid']) && strtotime($_POST['starttime'])<time()) || ($arrangement['arrangementid'] && strtotime($_POST['starttime'])<$arrangement['starttime'] && strtotime($_POST['starttime'])<time())){
		showmessage('arrangement_expired');
	}
	
	include_once(S_ROOT.'./source/function_blog.php');
    if($newarrangement = arrangement_post($_POST, $arrangement, 0)) {
        $url = 'space.php?uid='.$newarrangement['uid'].'&do=calendar&id=';
        $from = empty($_POST['from'])?'':$_POST['from'];
        // 靠靠�
        if(empty($_GET['arrangementid'])){
            $note = cplang('note_new_arrangement', array("admincp.php?ac=calenderCheck", $newarrangement['subject']));
            $query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('space')." where groupid=1");
            while ($value = $_SGLOBAL['db']->fetch_array($query)){
                notification_add($value['uid'], 'systemnote', $note);
            }
        }
        //靠靠edited
        $query = $_SGLOBAL['db']->query("SELECT subject, uid FROM ".tname('arrangement')." where arrangementid = ".$newarrangement['arrangementid']." UNION "."SELECT subject, uid FROM ".tname('unCheckArrangement')." where arrangementid =".$newarrangement['arrangementid']);
        $value = $_SGLOBAL['db']->fetch_array($query);
        if($from == "admin" and $_SGLOBAL['supe_uid'] != $value['uid']) {
            $note = cplang("note_edit_arrangement", array("space.php?uid=".$value['uid']."&do=arrangement&id=".$newarrangement['arrangementid'], $newarrangement['subject']));
            notification_add($value['uid'], 'systemnote', $note);
        }
        if($from == "admin")
            showmessage('do_success', "admincp.php?ac=calenderCheck");
        else
            showmessage('do_success', $url);
	} else {
		showmessage('that_should_at_least_write_things');
	}
}

if($op == 'delete') {
	//删除
    $from = empty($_GET['from'])?'':$_GET['from'];
	if(submitcheck('deletesubmit')) {
        include_once(S_ROOT.'./source/function_delete.php');
        if(deletearrangements(array($arrangementid))) {
            showmessage('do_success', "space.php?do=arrangement");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
    if($from){
        include_once(S_ROOT.'./source/function_delete.php');
        $arrangementids = split(",",$_GET['arrangementid']);
        foreach($arrangementids as $key) {
            $query = $_SGLOBAL['db']->query("SELECT subject, uid FROM ".tname('arrangement')." where arrangementid = ".$key." UNION "."SELECT subject, uid FROM ".tname('unCheckArrangement')." where arrangementid =".$key);
            $value[$key] = $_SGLOBAL['db']->fetch_array($query);
        } 
        if(deletearrangements($arrangementids)) { 
            //靠靠靠靠i
            foreach($arrangementids as $key) {
                $note = cplang('note_delete_arrangement', array($value[$key]['subject']));
                notification_add($value[$key]['uid'], 'systemnote', $note);
            }
            header("state: success");
            exit;
        } else {
            header("state: failed");
            exit;
        }
    }	
} elseif($op == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('arrangement', array('arrangementid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=arrangement&id=$id", 0);

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

	$tmp = stripos($_GET['url'], 'view=');
	if($tmp>=0){
		$view = substr($_GET['url'], $tmp+5);
	}else{
		$view = 'all';
	}

	if($view == 'schoolcalendar') {
		//校历信息
		$wheresql = " and classid=1";
	}elseif($view == 'lecture') {
		//讲座信息
		$wheresql = " and classid=2";
	}elseif($view == 'meeting') {
		//会议信息
		$wheresql = " and classid=3";
	}elseif($view == 'activity') {
		//文体活动信息
		$wheresql = " and classid=4";
	}elseif($view == 'all'){
		//所有信息
		$wheresql = '';
	}

	//本月活动
	$arrangements = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("arrangement")." WHERE 1 $wheresql and starttime < $dayend AND starttime >= $daystart ORDER BY starttime asc");
	while($value=$_SGLOBAL['db']->fetch_array($query)) {
		$start = $value['starttime'] < $daystart ? 1 : intval(date("j", $value['starttime']));
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
	$url = $_GET['url'] ? preg_replace("/date=[\d\-]+/", '', $_GET['url']) : "space.php?do=arrangement";
	
}else {
	//添加编辑
	//获取个人分类
	$classid = empty($arrangement['classid']) ? 0:$arrangement['classid'];
	//获取相册
	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	/*$tags = empty($arrangement['tag'])?array():unserialize($arrangement['tag']);
	$arrangement['tag'] = implode(' ', $tags);
	
	$arrangement['target_names'] = '';*/

	$arrangement['message'] = str_replace('&amp;', '&amp;amp;', $arrangement['message']);
	$arrangement['message'] = shtmlspecialchars($arrangement['message']);
	
	$allowhtml = checkperm('allowhtml');
	
	
	
	//菜单激活
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_arrangement");

?>
