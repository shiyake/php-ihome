<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

//分页
$perpage=20;
$perpage=mob_perpage($perpage);

$page=empty($_GET['page'])?0:intval($_GET['page']);
if ($page < 1) $page=1;
$start = ($page-1)*$perpage;

ckstart($start, $perpage);

$cids = array();
$clist = array();

if (empty($_GET['view'])) {
    if ($_SGLOBAL['isdept'] == 0) {
        $_GET['view'] = 'me';//我的诉求
    } else {
        $_GET['view'] = 'atme';//我管理的诉求
    }
}
if ($_GET['view'] == 'rank') {
    $deps = array();
    $submenus = array();
    if ($_GET['type'] == 'score') {
        $order = " order by score ";
        $submenus['score']=' class = "active"';
    } elseif ($_GET['type'] == 'updownnum') {
        $order = " order by updownnum ";
        $submenus['updownnum']=' class = "active"';
    } else {
        $order = " order by aversecs ";
        $submenus['aversecs']=' class = "active"';
    }
    $query = $_SGLOBAL['db']->query("select * from ".tname("complain_dep") . $order);
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $deps[] = $value;
        realname_set($value['uid'], $value['username']);
    }
    $actives = array('rank'=>' class="active"');
} else {
    if (empty($_GET['type'])) {
        $_GET['type'] = 'running';
    }
    if($_GET['view'] == 'me') {
        $wheresql = "uid='$space[uid]'";
        $theurl = "space.php?do=$do&view=me&type=$_GET[type]";
        $actives = array('me'=>' class="active"');
    } elseif ($_GET['view'] == 'atme') {
        $wheresql = "curuid=$_SGLOBAL[supe_uid]";
        $theurl = "space.php?do=$do&view=atme&type=$_GET[type]";
        $actives = array('atme'=>' class="active"');
    } else {
        $wheresql = " 1 ";
        $theurl = "space.php?do=$do&view=all&type=$_GET[type]";
        $actives = array('all'=>' class="active"');
    }
    $submenus = array();
    if ($_GET['type'] == 'running') {
        $wheresql .= ' and status = 0 ';
        $submenus['running']=' class = "active"';
    } elseif ($_GET['type'] == 'done') {
        $wheresql .= ' and status = 1 ';
        $submenus['done']=' class = "active"';
    } elseif ($_GET['type'] == 'closed') {
        $wheresql .= ' and status = 2 ';
        $submenus['closed']=' class = "active"';
    } else {
        $submenus['all']=' class = "active"';
    }
    $count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select count(*) from ".tname('complain')." where $wheresql"), 0);

    if ($count) {
        $query = $_SGLOBAL['db']->query("select * from ".tname('complain')." $f_index
                    where $wheresql
                    order by addtime desc
                    limit $start,$perpage");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $cids[] = $value['id'];
            $clist[] = $value;
            realname_set($value['uid'], $value['uname']);
            realname_set($value['curuid'], $value['curusername']);
        }
    }

    //分页
    $ajaxdiv = 'tab_content_'.$_GET['do'];
    $multi = multi($count, $perpage, $page, $theurl.'&space='.$_GET['space'], $ajaxdiv);
}
//实名
realname_get();

$_TPL['css'] = 'complain';

include_once template("space_complain");


?>
