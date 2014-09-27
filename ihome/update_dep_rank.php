<?php

include_once("./common.php");

$caltime = $_SGLOBAL['timestamp'] - 3600*3;
$query = $_SGLOBAL['db']->query("select * from ihome_complain_dep");
$depinfos = array();
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    $depinfos[$result['uid']] = $result;
}
$query = $_SGLOBAL['db']->query("select a.updown as updown, b.uid as uid, a.dateline as dateline from ihome_complain_op_updown as a, ihome_complain_op as b where a.opid = b.id and a.dateline > $caltime");
while ($result = $_SGLOBAL['db']->fetch_array($query)) {
    if ($result['dateline'] < $depinfos[$result['uid']]['lastupdate']) {
        continue;
    }
    if ($result['updown'] == 1) {
        $depinfos[$result['uid']]['upnum'] += 1;
    } else {
        $depinfos[$result['uid']]['downnum'] += 1;
    }
}

foreach ($depinfos as $uid => $info) {
    updatetable("complain_dep", array("upnum"=>$info['upnum'], "downnum"=>$info['downnum'], "updownnum"=>$info['upnum']+$info['downnum'], "aversecs"=>intval($info['allreplysecs']/$info['allreplynum']), "score"=>intval($info['upnum']-$info['downnum'])), array('uid'=>$uid));
}
