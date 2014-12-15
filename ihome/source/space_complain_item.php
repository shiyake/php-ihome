<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$query=$_SGLOBAL['db']->query("select * from ".tname('complain')." where doid = $doid and status!=4 order by id desc");
$complain = array();
$hints = array();
$relay_records = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    if (($value['status'] == '1') && $value['lastopid']) {
        $hints[] = $value['lastopid'];
    }
    if (!array_key_exists($value['atuid'], $relay_records)) {
        $relay_records[$value['atuid']] = $value['relay_times'];
    }
    if ($complain) {
        if (!in_array($value['atuid'], $complain['atuid'])) {
            $complain['atuid'][] = $value['atuid'];
            $complain['atuname'][] = $value['atuname'];
            $complain['times'][] = $value['times'];
            $complain['status'][] = $value['status'];
        }
    } else {
        $value['atuid'] = array($value['atuid']);
        $value['atuname'] = array($value['atuname']);
        $value['times'] = array($value['times']);
        $value['status'] = array($value['status']);
        $complain = $value;
    }
}
$dv=null;
$doclist= array();
if ($complain) {
    $theurl = "space.php?do=complain_item&doid=$doid";
    $query=$_SGLOBAL['db']->query("select * from ".tname('doing')." where doid = $doid");
    $dv= $_SGLOBAL['db']->fetch_array($query);
    if ($dv) {
        if ($_SGLOBAL['supe_uid'] != $complain['uid']) {
            $space = getspace($complain['uid']);
        }
    } else {
        include_once(S_ROOT.'./source/function_delete.php');
        deleteComplains(array($doid));
        showmessage('complain_no_doing', "space.php?do=complain");
    }

    include_once(S_ROOT.'./source/class_tree.php');
    $tree = new tree();

    $dv['replynum'] = 0;
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." USE INDEX(dateline) WHERE doid = $doid ORDER BY dateline");
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        realname_set($value['uid'], $value['username']);
        if (empty($value['upid'])) {
            $value['upid'] = "do$doid";
        }
        $tree->setNode($value['id'], $value['upid'], $value);
        $dv['replynum']++;
    }
    $values = $tree->getChilds("do$doid");
    foreach ($values as $key=>$id) {
        $one = $tree->getValue($id);
        $one['layer'] = $tree->getLayer($id) * 2 - 2;
        $one['style'] = "padding-left:{$one['layer']}em;";
        $doclist[$doid][] = $one;
    }

    $legalEntity = 0;
    if ($_SGLOBAL['isdept'] == 1) {
        $legalEntity = $_SGLOBAL['supe_uid'];
    } else {
        $q = $_SGLOBAL['db']->query("select * from ".tname("powerlevel")." where dept_uid in (".implode(',',$complain['atuid']).")");
        while ($r = $_SGLOBAL['db']->fetch_array($q)) {
            if (in_array("$_SGLOBAL[supe_uid]", explode(',',$r['up_uid']))) {
                $legalEntity = $r['dept_uid'];
                break;
            }
        }
    }
    if ($legalEntity) {
        $complain['relay_times'] = $relay_records[$legalEntity];
    }
    $query = $_SGLOBAL['db']->query("select a.uid as uid,a.name as name,a.username as username from ".tname('space')." as a,".tname("powerlevel")." as b where a.uid = b.dept_uid and b.isdept = 1");
    $deps = array();
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        if (empty($value['name'])) $value['name'] = $value['username'];
        if ($value["uid"] == $_SGLOBAL['supe_uid'] || $value["uid"] == $legalEntity) {
            continue;
        }
        $v = array('name'=>$value['name'], 'uid'=>$value['uid'], 'namequery'=>$value['name'].' '.Pinyin($value['name'],1).' '.$value['uid']);
        $deps[] = $v;
    }
    $deps = json_encode($deps);

    $query = $_SGLOBAL['db']->query("select * from ".tname('complain_op')." where doid=$doid");
    $complain_ops = array();
    $opids = array();
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $complain_ops[$value['id']] = $value;
        realname_set($value['uid'], $value['username']);
        if ($value['optype'] == 3) {
            realname_set(intval($value['opvalue']), '');
        }
        $opids[] = $value['id'];
    }
    // $commenttree = new tree();
    // foreach($complain_ops as $op) {
    //     $query = $_SGLOBAL['db']->query("select * from ".tname('treecomments')." USE index(rootid) where rootid = 'cop_{$op[id]}' order by dateline");
    //     while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    //         realname_set($value['uid'], $value['username']);
    //         if (empty($value['upid'])) {
    //             $value['upid'] = $value['rootid'];
    //         }
    //         $commenttree->setNode($value['id'], $value['upid'], $value);
    //     }
    // }
    $opupdowns = array();
    if (!empty($opids)) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid in (". implode(",", $opids).") and uid = $_SGLOBAL[supe_uid]");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $opupdowns[$value["opid"]] = $value['updown'];
        }
    }

    // $opclist = array();
    // foreach ($complain_ops as $op) {
    //     $opclist[$op['id']] = array();
    //     $values = $commenttree->getChilds('cop_'.$op[id]);
    //     foreach ($values as $id) {
    //         $one = $commenttree->getValue($id);
    //         $one['layer'] = $commenttree->getLayer($id) * 2 -2;
    //         $one['style'] = "padding-left:{$one['layer']}em;";
    //         $opclist[$op['id']][] = $one;
    //     }
    // }
}

realname_get();
$_TPL['css'] = 'complain_item';
include_once template("space_complain_item");

?>



