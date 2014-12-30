<?php

include_once("./common.php");

$log = Logger::getLogger("update_dep_rank");
$log->debug("update dep rank");

$endtime = mktime(0,0,0);
$starttime = $endtime - 24*3600;
$midtime = $endtime - 12*3600;
$deprank = array();

$query = $_SGLOBAL['db']->query("select * from ".tname('complain_dep_rank')." where dateline>=$starttime and dateline<$endtime limit 1");
if ($result = $_SGLOBAL['db']->fetch_array($query)) {
    exit();
}

$query = $_SGLOBAL['db']->query("select uid,username,$midtime dateline from ".tname('complain_dep'));
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    $deprank[$result['uid']] = $result;
}

$query = $_SGLOBAL['db']->query("select doid, atuid from ".tname('complain')." where addtime>=$starttime and addtime<$endtime group by doid, atuid");
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    $deprank[$result['atuid']]['complainnum'] += 1;
}

$query = $_SGLOBAL['db']->query("select a.updown as updown, b.uid as uid, a.dateline as dateline, b.doid as doid, a.uid as actor from ihome_complain_op_updown as a, ihome_complain_op as b where a.opid = b.id and a.dateline >= $starttime and a.dateline < $endtime");
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    if ($result['updown'] == 1) {
        $deprank[$result['uid']]['upnum'] += 1;
        $deprank[$result['uid']]['updownnum'] += 1;
    } else {
        $q = $_SGLOBAL['db']->query("select * from ihome_complain where uid=$result[actor] and doid=$result[doid]");
        if ($r = $_SGLOBAL['db']->fetch_array($q)) {
            continue;
        }
        $deprank[$result['uid']]['downnum'] += 1;
        $deprank[$result['uid']]['updownnum'] += 1;
    }
}

$query = $_SGLOBAL['db']->query("select uid, count(opid) replynum, sum(replysecs) replysecs from ".tname('complain_resp')." where dateline>=$starttime and dateline<$endtime group by uid");
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    $deprank[$result['uid']]['replynum'] = $result['replynum'];
    $deprank[$result['uid']]['replysecs'] = $result['replysecs'];
}

foreach ($deprank as $uid => $info) {
    if (count($info)<=3) {
        continue;
    }
    inserttable('complain_dep_rank', $info);
    $log->debug("update dep rank $uid upnum $info[upnum] downum $info[downnum]");
}
