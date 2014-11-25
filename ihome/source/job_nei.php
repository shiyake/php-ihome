<?php

$valid_m = array('index', 'add', 'edit', 'delete', 'sync', 'view');

$m = isset($_GET['m']) && in_array($_GET['m'], $valid_m) ? $_GET['m'] : 'index';

$index_url = 'job.php?do=nei';

switch($m) {
	case 'index':
		$page = (int) $_GET['page'];
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'new';
		$sort_arr = array('new', 'hot');
		in_array($sort, $sort_arr) || $sort = 'new';
		if ($sort == 'new')
		{
			$sort_field = 'j.id';
		}
		else
		{
			$sort_field = 'j.viewcount';
		}
		$page = max($page, 1);
		$perpage = 10;
		$offset = ($page - 1) * $perpage;
		$query = $db->query(sprintf("select j.id,j.title,jc.endtime,jc.description from %s j right join %s jc on j.id=jc.jobid where j.type=3 order by {$sort_field} desc limit $offset,$perpage", tname("job"), tname("job_content_3")));
		$result = array();
		while ($row = $db->fetch_array($query))
		{
			$result[] = $row;
		}
		
		$count_query = $db->query(sprintf("select count(*) cnt from %s where type=3", tname("job")));
		$count_row = $db->fetch_array($count_query);
		$total_count = $count_row['cnt'];
		$baseurl = 'job.php?do=nei&sort=' . $sort;
		$pagination = multi($total_count, $perpage, $page, $baseurl);
		include template('job_nei');
		break;
	case 'view':
		$id = (int) $_GET['id'];
		$query = $db->query(sprintf("select j.id,j.title,j.uid,j.replynum,j.createtime,jc.endtime,jc.content from %s j right join %s jc on j.id=jc.jobid where j.id={$id} limit 1", tname('job'), tname('job_content_3')));
		$result = $db->fetch_array($query);
		if (!is_array($result) || !isset($result['id']))
		{
			showmessage('Job_Not_Found');
		}
		//update viewcount
		$update = $db->query(sprintf('update %s set viewcount=viewcount+1 where id=%d', tname('job'), $id));
		$perpage = 10;
		$cmt_count_query = $db->query(sprintf("select count(*) cnt from %s where idtype='jobid'", tname('comment')));;
		$cmt_query = $db->query(sprintf("select * from %s where idtype='jobid' and id=$id limit $perpage", tname('comment')));
		$total_count = $db->fetch_array($cmt_count_query);
		$total_count = $total_count['cnt'];
		$list = array();
		while ($row = $db->fetch_array($cmt_query))
		{
			$list[] = $row;
		}
		$multi = multi($total_count, $perpage, 1);
		include template('job_nei');
		break;
	case 'add':
		include template('job_nei');
		break;
	case 'edit':
		$id = intval($_GET['id']);
		if ($id <= 0)
		{
			showmessage('该数据不存在');
		}
		$query = $db->query(sprintf("select j.id,j.title,j.uid,j.replynum,j.createtime,jc.endtime,jc.description,jc.content from %s j right join %s jc on j.id=jc.jobid where j.id={$id} limit 1", tname('job'), tname('job_content_3')));
		$job = $db->fetch_array($query);
		if (!is_array($job) || !isset($job['id']))
		{
			showmessage('该数据不存在');
		}
		include template('job_nei');
		break;
	case 'delete':
		$id = intval($_GET['id']);
		if ($id <= 0)
		{
			showmessage('该数据不存在', $index_url);
		}
		$query = $db->query(sprintf("select id,uid from %s where id=%d", tname('job'), $id));
		$info = $db->fetch_array($query);
		if (!is_array($info) || !isset($info['id']))
		{
			showmessage('该数据不存在', $index_url);
		}
		if ($info['uid'] != $_SGLOBAL['supe_uid'])
		{
			showmessage('不能删除不属于您的工作信息', $index_url);
		}
		
		//删除数据
		$db->query(sprintf("delete from %s where id=%d", tname('job'), $id));
		$db->query(sprintf("delete from %s where jobid=%d", tname('job_content_3'), $id));
		$db->query(sprintf("delete from %s where idtype='jobid' and id=%d", tname('comment'), $id));
		showmessage('删除成功', $index_url);
		break;
	case 'sync':
		$uid = (int)$member['uid'];
		$title = trim($_POST['title']);
		$deadtime = trim($_POST['deadtime']);
		$description = trim($_POST['description']);
		$content = trim($_POST['message']);
		$id = (int) $_POST['id'];
		$now_time = $_SERVER['REQUEST_TIME'];
		$now = date('Y-m-d H:i:s');
		$rets = array(
			'ret' => -1,
			'msg' => '未知错误'
		);
		do
		{
			if (!is_string($title) || empty($title))
			{
				$rets['msg'] = '请输入标题';
				break;
			}
			if (!is_string($deadtime) || empty($deadtime))
			{
				$rets['msg'] = '请输入截止时间';
				break;
			}
			$dead_int_time = strtotime($deadtime);
			if ($dead_int_time < $now_time)
			{
				$rets['msg'] = '截止时间不能小于当前时间';
				break;
			}
			if (!is_string($description) || empty($description))
			{
				$rets['msg'] = '请输入描述信息';
				break;
			}
			if (!is_string($content) || empty($content))
			{
				$rets['msg'] = '请输入内容';
				break;
			}
			
			$db = $_SGLOBAL['db'];
			
			if ($id === 0)
			{
				$base_job = array(
					'title' => $title,
					'viewcount' => 0,
					'uid' => $uid,
					'type' => 3,
					'createtime' => $now
				);
				inserttable('job', $base_job);
				$jobid = $db->insert_id();
				if ($jobid <= 0)
				{
					$rets['msg'] = '添加数据失败!';
					break;
				}
				$other_job = array(
					'jobid' => $jobid,
					'description' => $description,
					'endtime' => $deadtime,
					'content' => $content
				);
				inserttable('job_content_3', $other_job);
				$rets = array(
					'ret' => 0,
					'msg' => '添加成功',
				);
			}
			else
			{
				$base_update = array(
					'title' => $title,
				);
				updatetable('job', $base_update, array('id' => $id));
				$extra_update = array(
					'endtime' => $deadtime,
					'description' => $description,
					'content' => $content,
				);
				updatetable('job_content_3', $extra_update, array('jobid' => $id));
				$rets = array(
					'ret' => 0,
					'msg' => '更新成功'
				);
			}
		} while(false);

		echo json_encode($rets);
		exit();
		break;
}



