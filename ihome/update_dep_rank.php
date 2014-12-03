<?php

include_once("./common.php");

$log = Logger::getLogger("update_dep_rank");
$log->debug("update dep rank");

$caltime = $_SGLOBAL['timestamp'] - 3600*3;
$query = $_SGLOBAL['db']->query("select * from ihome_complain_dep");
$depinfos = array();
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    $depinfos[$result['uid']] = $result;
}
$query = $_SGLOBAL['db']->query("select a.updown as updown, b.uid as uid, a.dateline as dateline, b.doid as doid, a.uid as actor from ihome_complain_op_updown as a, ihome_complain_op as b where a.opid = b.id and a.dateline > $caltime");
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    if ($result['dateline'] < $depinfos[$result['uid']]['lastupdate']) {
        continue;
    }

    if ($result['updown'] == 1) {
        $depinfos[$result['uid']]['upnum'] += 1;
    } else {
        $q = $_SGLOBAL['db']->query("select * from ihome_complain where uid=$result[actor] and doid=$result[doid]");
        if ($r = $_SGLOBAL['db']->fetch_array($q)) {
            continue;
        }
        $depinfos[$result['uid']]['downnum'] += 1;
    }
}

foreach ($depinfos as $uid => $info) {
    $score = intval($info['upnum']-$info['downnum']);
    if ($score < 0) {
        $score = 0;
    }
    updatetable("complain_dep", array("upnum"=>$info['upnum'], "downnum"=>$info['downnum'], "updownnum"=>$info['upnum']+$info['downnum'], "aversecs"=>intval($info['allreplysecs']/$info['allreplynum']), "score"=>$score, "lastupdate"=>$_SGLOBAL['timestamp']), array('uid'=>$uid));
    $log->debug("update dep rank $uid upnum $info[upnum] downum $info[downnum]");
}
