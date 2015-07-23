<?php
/*
	arrangement.php用于读取校园日历中的信息内容。
	added by xuxing@ihome 2012-11-9
*/
if(!defined('iBUAA')) {
	exit('Access Denied');
}

//$minhot = $_SCONFIG['feedhotmin']<1?3:$_SCONFIG['feedhotmin'];

$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page=1;
$id = empty($_GET['id'])?0:intval($_GET['id']);
$classid = empty($_GET['classid'])?0:intval($_GET['classid']);

if($id) {
    //读取校园日历
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('unCheckArrangement')." WHERE arrangementid='$id'"." UNION "."SELECT * FROM ".tname('arrangement')." WHERE arrangementid='$id'");
    $arrangement = $_SGLOBAL['db']->fetch_array($query);
        //校园日历不存在
	if(empty($arrangement)) {
		showmessage('view_to_info_did_not_exist');
	}

	//处理视频标签
	include_once(S_ROOT.'./source/function_blog.php');
	$arrangement['message'] = blog_bbcode($arrangement['message']);

	$otherlist = $hotlist = array();


	//作者的其他最新校园日历
	$otherlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." WHERE uid='$space[uid]' ORDER BY starttime DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['arrangementid'] != $arrangement['arrangementid']) {
			$otherlist[] = $value;
		}
	}

	//最新的校园日历
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." ORDER BY replynum DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['arrangementid'] != $arrangement['arrangementid']) {
			realname_set($value['uid']);
			$hotlist[] = $value;
		}
	}

	//评论
	$perpage = 5;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//检查开始数
	ckstart($start, $perpage);

	$count = $arrangement['replynum'];
	$list = array();
	if($count) {
		$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
		$csql = $cid?"cid='$cid' AND":'';

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE $csql id='$id' AND idtype='arrangementid' ORDER BY dateline desc LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['authorid'], $value['author']);//实名
            $list[] = $value;
		}
	}

	//分页
	$multi = multi($count, $perpage, $page, "space.php?uid=$arrangement[uid]&do=$do&id=$id", '', 'content');

	//访问统计
	if(!$space['self'] && $_SCOOKIE['view_arrangementid'] != $arrangement['arrangementid']) {
		$_SGLOBAL['db']->query("UPDATE ".tname('arrangement')." SET viewnum=viewnum+1 WHERE arrangementid='$arrangement[arrangementid]'");
		inserttable('log', array('id'=>$space['uid'], 'idtype'=>'uid'));//延迟更新
		ssetcookie('view_arrangementid', $arrangement['arrangementid']);
	}

	//实名
	realname_get();

	$_TPL['css'] = 'blog';
	include_once template("space_arrangement_view");

} else {
	//分页
	$perpage = 10;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//检查开始数
	ckstart($start, $perpage);

	//摘要截取
	$summarylen = 300;

	$classarr = array();
	$list = array();
	$userlist = array();
	$count = $pricount = 0;

	if(empty($_GET['view'])) {
		$_GET['view'] = 'all';//默认显示
	}
	if(empty($_GET['searchkey']) && empty($_GET['range']) && empty($_GET['date'])) {
		$_GET['range'] = 'oneweek';//默认显示
	}


	//处理查询
	$f_index = '';
	$wheresql = "1";
	$theurl = '';
	$calendarurl = '';
	$orderby = '';
	if($_GET['view'] == 'schoolcalendar') {
		//校历信息
		$actives = array('schoolcalendar'=>' class="active"');
		$theurl = "space.php?do=$do&view=schoolcalendar";
		//类别ID
		$classid = "1";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'lecture') {
		//讲座信息
		$actives = array('lecture'=>' class="active"');
		$theurl = "space.php?do=$do&view=lecture";
		//类别ID
		$classid = "2";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'meeting') {
		//会议信息
		$actives = array('meeting'=>' class="active"');
		$theurl = "space.php?do=$do&view=meeting";
		//类别ID
		$classid = "3";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'activity') {
		//文体活动信息
		$actives = array('activity'=>' class="active"');
		$theurl = "space.php?do=$do&view=activity";
		//类别ID
		$classid = "4";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'all'){
		//所有信息
		$actives = array('all'=>' class="active"');
		$theurl = "space.php?do=$do&view=all";
	}
	
	$calendarurl = $theurl;
	
	if($_GET['range'] == 'oneweek'){
		$subactives = array('oneweek'=>' class="active"');
		$theurl .= '&range=oneweek'; 
		$wheresql .= " and starttime between ".time()." and ".(time()+(7*24*60*60)); 
		$orderby = " order by starttime asc ";
	}elseif($_GET['range'] == 'past'){
		$subactives = array('past'=>' class="active"');
		$theurl .= '&range=past'; 
		$wheresql .= " and starttime <".time(); 
		$orderby = " order by starttime desc ";
	}elseif($_GET['range'] == 'future'){
		$subactives = array('future'=>' class="active"');
		$theurl .= '&range=future'; 
		$wheresql .= " and starttime >".(time()+(7*24*60*60)); 
		$orderby = " order by starttime asc ";
	}elseif($_GET['range'] == 'all'){
		$orderby = " order by starttime desc ";
	}
	
	//搜索
	if($searchkey = stripsearchkey($_GET['searchkey'])) {
		$wheresql .= " AND subject LIKE '%$searchkey%'";
		$theurl .= "&searchkey=$_GET[searchkey]";
		$orderby = " order by starttime desc";
		cksearch($theurl);
	}
	//带有日期
	if($getdate = $_GET['date']) {
		$wheresql .= " AND starttime between ".strtotime($getdate)." and ".(strtotime($getdate)+86400-1);
		$theurl .= "&date=".$getdate;
		$orderby = " order by starttime asc";
	}

	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('arrangement')." WHERE $wheresql"),0);
	if(count){
		$query = $_SGLOBAL['db']->query("SELECT * from ".tname('arrangement')." where $wheresql $orderby LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid']);
				$value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
				if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				$list[] = $value;
		}
	}

	//分页
	$multi = multi($count, $perpage, $page, $theurl);

	//实名
	realname_get();

	$_TPL['css'] = 'blog';
	include_once template("space_arrangement_list");
}

?>
