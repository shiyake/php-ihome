<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$mpurl = 'admincp.php?ac=job';
$db = $_SGLOBAL['db'];
if (isset($_POST['op']) && $_POST['op'] == 'batchDelete')
{
	$ids = $_POST['ids'];
	$ids_str = implode(',', $ids);

	//删除数据
	$db->query(sprintf("delete from %s where id in (%s)", tname('job'), $ids_str));
	$db->query(sprintf("delete from %s where jobid in (%s)", tname('job_content_3'), $ids_str));
	$db->query(sprintf("delete from %s where jobid in (%s)", tname('job_fav'), $ids_str));//删除收藏信息
	$db->query(sprintf("delete from %s where idtype='jobid' and id in (%s)", tname('comment'), $ids_str));//删除评论
	showmessage('删除成功', $mpurl);
	exit();
}

$where = '';
if (!empty($_GET['username']))
{
	$username = trim($_GET['username']);
	if (!empty($username))
	{
		$where .= ' and username=\'' . $username . '\'';
		$mp_url .= '&username=' . $username;
	}
}
if (!empty($_GET['dateline1']))
{
	$start = trim($_GET['dateline1']) . ' 00-00-00';
	if (!empty($start))
	{
		$where .= " and createtime>='{$start}'";
		$mp_url .= '&dateline1=' . $_GET['dateline1'];
	}
}
if (!empty($_GET['dateline2']))
{
	$end = trim($_GET['dateline2']) . ' 00-00-00';
	if (!empty($end))
	{
		$where .= " and createtime<='{$end}'";
		$mp_url .= '&dateline2=' . $_GET['dateline2'];
	}
}

$perpage = 20;
$page = intval($_GET['page']);
$page = max($page, 1);
$offset = ($page - 1) * $perpage;
$count_query = $db->query(sprintf("select count(*) cnt from %s where type=3 %s", tname('job'), $where));
$count_row = $db->fetch_array($count_query);
$count = $count_row['cnt'];

$select_query = $db->query(sprintf("select * from %s where type=3 %s order by id desc limit %d,%d", tname('job'), $where, $offset, $perpage));
$list = array();
while ($select_row = $db->fetch_array($select_query))
{
	$list[] = $select_row;
}

$multi = multi($count, $perpage, $page, $mpurl);

