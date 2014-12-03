<?php
header('Content-type:text/html;charset=utf8');
//error_reporting(E_ALL);ini_set('display_errors', 1);
include './common.php';

date_default_timezone_set('Asia/Shanghai');

checklogin();

$member = $_SGLOBAL['member'];

$valid_do = array('index', 'hui', 'nei', 'fav', 'myfav', 'publish');

$do = isset($_GET['do']) ? trim($_GET['do']) : 'index';

$db = $_SGLOBAL['db'];

if (!in_array($do, $valid_do))
{
	$do = 'index';
}

if ($do === 'fav')
{
	$rets = array(
		'ret' => -1,
		'msg' => '未知错误'
	);
	do
	{
		$id = intval($_GET['id']);
		if ($id <= 0)
		{
			$rets['msg'] = '参数非法';
			break;
		}
		$query = $db->query(sprintf("select id from %s where id=%d", tname('job'), $id));
		$info = $db->fetch_array($query);
		if (!is_array($info) || !isset($info['id']))
		{
			$rets['msg'] = '该招聘信息不存在';
			break;
		}
		$uid = $member['uid'];
		$fav_query = $db->query(sprintf("select id from %s where uid=%d and jobid=%d", tname('job_fav'), $uid, $id));
		$fav_info = $db->fetch_array($fav_query);
		if (is_array($fav_info) && isset($fav_info['id']))
		{
			$rets['msg'] = '您已经收藏该招聘信息';
			break;
		}
		$insert = array(
			'uid' => $uid,
			'jobid' => $id
		);
		inserttable('job_fav', $insert);
		$rets = array(
			'ret' => 0,
			'msg' => '收藏成功'
		);
	} while(false);
	echo json_encode($rets);
	exit();
}
else if ($do == 'myfav')
{
	$uid = $member['uid'];
	$limit = 10;
	$page = intval($_GET['page']);
	$fav_count_query = $db->query(sprintf("select count(*) cnt from %s where uid=%d", tname('job_fav'), $uid));
	$fav_count_info = $db->fetch_array($fav_count_query);
	$total_count = (int) $fav_count_info['cnt'];
	if ($total_count === 0)
	{
		$jobs = array();
		$pagination = '';
	}
	else
	{
		$total_page = ceil($total_count / $limit);
		$cpage = min(max($page, 1), $total_page);
		$offset = ($cpage - 1) * $limit;
		$fav_query = $db->query(sprintf("select jobid from %s where uid=%d order by id desc limit $offset,$limit", tname('job_fav'), $uid));
		
		$jobids = $jobs = array();
		while ($fav_row = $db->fetch_array($fav_query))
		{
			$jobids[] = $fav_row['jobid'];
		}
		$jobids_str = implode(",", $jobids);
		$job_query = $db->query(sprintf("select j.id,j.title,jc.endtime,jc.description from %s j right join %s jc on j.id=jc.jobid where j.id in (%s)", tname("job"), tname("job_content_3"), $jobids_str));
		while ($job_row = $db->fetch_array($job_query))
		{
			$jobs[] = $job_row;
		}
		$pagination = multi($total_count, $limit, $page, 'job.php?do=fav');
	}
	
	include template('job_myfav');
}
else if ($do == 'publish')
{
	$uid = $member['uid'];
	$limit = 10;
	$page = intval($_GET['page']);
	$fav_count_query = $db->query(sprintf("select count(*) cnt from %s where uid=%d", tname('job'), $uid));
	$fav_count_info = $db->fetch_array($fav_count_query);
	$total_count = (int) $fav_count_info['cnt'];
	if ($total_count === 0)
	{
		$jobs = array();
		$pagination = '';
	}
	else
	{
		$total_page = ceil($total_count / $limit);
		$cpage = min(max($page, 1), $total_page);
		$offset = ($cpage - 1) * $limit;	
		$fav_query = $db->query(sprintf("select id from %s where uid=%d order by id desc limit $offset,$limit", tname('job'), $uid));
		
		$jobids = $jobs = array();
		while ($fav_row = $db->fetch_array($fav_query))
		{
			$jobids[] = $fav_row['id'];
		}
		$jobids_str = implode(",", $jobids);
		$job_query = $db->query(sprintf("select j.id,j.title,jc.endtime,jc.description from %s j right join %s jc on j.id=jc.jobid where j.id in (%s)", tname("job"), tname("job_content_3"), $jobids_str));
		while ($job_row = $db->fetch_array($job_query))
		{
			$jobs[] = $job_row;
		}
		$pagination = multi($total_count, $limit, $page, 'job.php?do=publish');
	}
	
	include template('job_myfav');
}
else if ($do === 'hui')
{
	include template('job_index');
}
else
{
	include_once(S_ROOT."./source/job_{$do}.php");
}
