<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$cpid = empty($_GET['cpid'])?0:intval($_GET['cpid']);
$query=$_SGLOBAL['db']->query("select * from ".tname('complain')." where doid = $doid and id = $cpid");
$complain=$_SGLOBAL['db']->fetch_array($query);
if (!$complain) {
    $query=$_SGLOBAL['db']->query("select * from ".tname('complain')." where doid = $doid");
    $complain=$_SGLOBAL['db']->fetch_array($query);
    if ($complain) {
        $cpid = $complain['id'];
    }
}
$dv=null;
$doclist= array();
if ($complain) {
    $theurl = "space.php?do=complain_item&doid=$doid&cpid=$cpid";
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

    $hints = array();
    $q = $_SGLOBAL['db']->query("select * from ".tname('complain')." where doid = $doid and status=1");
    while ($r = $_SGLOBAL['db']->fetch_array($q)) {
        $hints[] = $r['lastopid'];
    }

    include_once(S_ROOT.'./source/class_tree.php');
    $tree = new tree();

    $dv['replynum'] = 0;
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." USE INDEX(dateline) WHERE doid = $doid and !complainBorn ORDER BY dateline");
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
    $query = $_SGLOBAL['db']->query("select a.uid as uid,a.name as name,a.username as username from ".tname('space')." as a,".tname("powerlevel")." as b where a.uid = b.dept_uid and b.isdept = 1");
    $deps = array();
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        if (empty($value['name'])) $value['name'] = $value['username'];
        if ($value["uid"] == $_SGLOBAL['supe_uid']) {
            continue;
        }
        $deps[] = $value;
    }
    $query = $_SGLOBAL['db']->query("select * from ".tname('complain_op')." where doid=$doid");
    $complain_ops = array();
    $opids = array();
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        if ($complain['status']==3 && $value['id']>$complain['lastopid']) {
            continue;
        }
        $complain_ops[] = $value;
        realname_set($value['uid'], $value['username']);
        if ($value['optype'] == 3) {
            realname_set(intval($value['opvalue']), '');
        }
        $opids[] = $value['id'];
    }
    $commenttree = new tree();
    foreach($complain_ops as $op) {
        $query = $_SGLOBAL['db']->query("select * from ".tname('treecomments')." USE index(rootid) where rootid = 'cop_{$op[id]}' order by dateline");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            realname_set($value['uid'], $value['username']);
            if (empty($value['upid'])) {
                $value['upid'] = $value['rootid'];
            }
            $commenttree->setNode($value['id'], $value['upid'], $value);
        }
    }
    $opupdowns = array();
    if (!empty($opids)) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid in (". implode(",", $opids).") and uid = $_SGLOBAL[supe_uid]");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $opupdowns[$value["opid"]] = $value['updown'];
        }
    }

    $opclist = array();
    foreach ($complain_ops as $op) {
        $opclist[$op['id']] = array();
        $values = $commenttree->getChilds('cop_'.$op[id]);
        foreach ($values as $id) {
            $one = $commenttree->getValue($id);
            $one['layer'] = $commenttree->getLayer($id) * 2 -2;
            $one['style'] = "padding-left:{$one['layer']}em;";
            $opclist[$op['id']][] = $one;
        }
    }
}

realname_get();
$_TPL['css'] = 'complain_item';
include_once template("space_complain_item");

?>



