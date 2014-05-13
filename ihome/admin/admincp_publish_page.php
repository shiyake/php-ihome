<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$start_time = time()-24*3600*7;

$result = array();

$docommentnum = array();
$query = $_SGLOBAL['db']->query("select a.uid as uid, count(1) as num from ".tname('space')." a join ".tname('docomment')." b on a.uid = b.uid and b.dateline > $start_time and a.groupid = 3 group by b.uid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $docommentnum[intval($value['uid'])] = intval($value['num']);
}

$complainnum = array();
$query = $_SGLOBAL['db']->query("select a.uid as uid, count(1) as num from ".tname('space')." a join ".tname('complain')." b on a.uid = b.atuid and b.dateline > $start_time and a.groupid = 3 group by a.uid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $complainnum[intval($value['uid'])] = intval($value['num']);
}

$complain_reply_num = array();
$query = $_SGLOBAL['db']->query("select a.uid as uid, count(1) as num from ".tname('space')." a join ".tname('complain')." b on a.uid = b.atuid and b.dateline > $start_time and a.groupid = 3 and b.isreply = 1 group by a.uid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $complain_reply_num[intval($value['uid'])] = intval($value['num']);
}
$commentnum = array();
$query = $_SGLOBAL['db']->query("select a.uid as uid, count(1) as num from ".tname('space')." a join ".tname('comment')." b on a.uid = b.uid and b.dateline > $start_time and a.groupid = 3 group by b.uid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $commentnum[intval($value['uid'])] = intval($value['num']);
}

$blognum = array();
$query = $_SGLOBAL['db']->query("select a.uid as uid, count(1) as num from ".tname('space')." a join ".tname('blog')." b on a.uid = b.uid and b.dateline > $start_time and a.groupid = 3 group by b.uid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $blognum[intval($value['uid'])] = intval($value['num']);
}

$doingnum = array();
$query = $_SGLOBAL['db']->query("select a.uid as uid, count(1) as num from ".tname('space')." a join ".tname('doing')." b on a.uid = b.uid and b.dateline > $start_time and a.groupid = 3 group by b.uid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $doingnum[intval($value['uid'])] = intval($value['num']);
}
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $item = array();
    if ($value['name'] == '') {
        $item['name'] = $value['username'];
    } else {
        $item['name'] = $value['name'];
    }
    $item['audnum'] = $value['audnum'];
    $item['commentnum'] = 0;
    $uid = intval($value['uid']);
    if (array_key_exists($uid, $commentnum)) {
        $item['commentnum'] += $commentnum[$uid];
    }
    if (array_key_exists($uid, $docommentnum)) {
        $item['commentnum'] += $docommentnum[$uid];
    }

    $item['blognum'] = 0;
    if (array_key_exists($uid, $blognum)) {
        $item['blognum'] = $blognum[$uid];
    }
    $item['doingnum'] = 0;
    if (array_key_exists($uid, $doingnum)) {
        $item['doingnum'] = $doingnum[$uid];
    }
    $item['complainnum'] = 0;
    if (array_key_exists($uid, $complainnum)) {
        $item['complainnum'] = $complainnum[$uid];
    }
    $item['complain_reply_num'] = 0;
    if (array_key_exists($uid, $complainnum)) {
        $item['complain_reply_num'] = $complainnum[$uid];
    }
    $results[] = $item;
}

    
?>


