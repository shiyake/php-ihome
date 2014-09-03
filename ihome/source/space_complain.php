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
    $_GET['view'] = 'me';//我的诉求
}
if (empty($_GET['type'])) {
    $_GET['type'] = 'done';
}
if($_GET['view'] == 'me') {
    $wheresql = "uid='$space[uid]'";
    $theurl = "space.php?uid=$space[uid]&do=$do&view=me&type=$_GET[type]";
    $actives = array('me'=>' class="active"');
} else {
    $wheresql = " 1 ";
    $theurl = "space.php?uid=$space[uid]&do=$do&view=all&type=$_GET[type]";
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
    $wheresql .= ' and status < 127 ';
    $submenus['all']=' class = "active"';
}
echo $wheresql;
$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select count(*) from ".tname('complain')." where $wheresql"), 0);

if ($count) {
    $query = $_SGLOBAL['db']->query("select * from ".tname('complain')." $f_index
                where $wheresql
                order by addtime desc
                limit $start,$perpage");
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $cids[] = $value['id'];
        $clist[] = $value;
        realname_set($value['uid']);
        realname_set($value['atdeptuid']);
    }
}

//分页
$ajaxdiv = 'tab_content_'.$_GET['do'];
$multi = multi($count, $perpage, $page, $theurl.'&space='.$_GET['space'], $ajaxdiv);
//实名
realname_get();

$_TPL['css'] = 'complain';

include_once template("space_complain");


?>
