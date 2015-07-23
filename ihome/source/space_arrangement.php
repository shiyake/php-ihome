<?php
/*
	arrangement.php���ڶ�ȡУ԰�����е���Ϣ���ݡ�
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
    //��ȡУ԰����
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('unCheckArrangement')." WHERE arrangementid='$id'"." UNION "."SELECT * FROM ".tname('arrangement')." WHERE arrangementid='$id'");
    $arrangement = $_SGLOBAL['db']->fetch_array($query);
        //У԰����������
	if(empty($arrangement)) {
		showmessage('view_to_info_did_not_exist');
	}

	//������Ƶ��ǩ
	include_once(S_ROOT.'./source/function_blog.php');
	$arrangement['message'] = blog_bbcode($arrangement['message']);

	$otherlist = $hotlist = array();


	//���ߵ���������У԰����
	$otherlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." WHERE uid='$space[uid]' ORDER BY starttime DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['arrangementid'] != $arrangement['arrangementid']) {
			$otherlist[] = $value;
		}
	}

	//���µ�У԰����
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('arrangement')." ORDER BY replynum DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['arrangementid'] != $arrangement['arrangementid']) {
			realname_set($value['uid']);
			$hotlist[] = $value;
		}
	}

	//����
	$perpage = 5;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//��鿪ʼ��
	ckstart($start, $perpage);

	$count = $arrangement['replynum'];
	$list = array();
	if($count) {
		$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
		$csql = $cid?"cid='$cid' AND":'';

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE $csql id='$id' AND idtype='arrangementid' ORDER BY dateline desc LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['authorid'], $value['author']);//ʵ��
            $list[] = $value;
		}
	}

	//��ҳ
	$multi = multi($count, $perpage, $page, "space.php?uid=$arrangement[uid]&do=$do&id=$id", '', 'content');

	//����ͳ��
	if(!$space['self'] && $_SCOOKIE['view_arrangementid'] != $arrangement['arrangementid']) {
		$_SGLOBAL['db']->query("UPDATE ".tname('arrangement')." SET viewnum=viewnum+1 WHERE arrangementid='$arrangement[arrangementid]'");
		inserttable('log', array('id'=>$space['uid'], 'idtype'=>'uid'));//�ӳٸ���
		ssetcookie('view_arrangementid', $arrangement['arrangementid']);
	}

	//ʵ��
	realname_get();

	$_TPL['css'] = 'blog';
	include_once template("space_arrangement_view");

} else {
	//��ҳ
	$perpage = 10;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//��鿪ʼ��
	ckstart($start, $perpage);

	//ժҪ��ȡ
	$summarylen = 300;

	$classarr = array();
	$list = array();
	$userlist = array();
	$count = $pricount = 0;

	if(empty($_GET['view'])) {
		$_GET['view'] = 'all';//Ĭ����ʾ
	}
	if(empty($_GET['searchkey']) && empty($_GET['range']) && empty($_GET['date'])) {
		$_GET['range'] = 'oneweek';//Ĭ����ʾ
	}


	//�����ѯ
	$f_index = '';
	$wheresql = "1";
	$theurl = '';
	$calendarurl = '';
	$orderby = '';
	if($_GET['view'] == 'schoolcalendar') {
		//У����Ϣ
		$actives = array('schoolcalendar'=>' class="active"');
		$theurl = "space.php?do=$do&view=schoolcalendar";
		//���ID
		$classid = "1";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'lecture') {
		//������Ϣ
		$actives = array('lecture'=>' class="active"');
		$theurl = "space.php?do=$do&view=lecture";
		//���ID
		$classid = "2";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'meeting') {
		//������Ϣ
		$actives = array('meeting'=>' class="active"');
		$theurl = "space.php?do=$do&view=meeting";
		//���ID
		$classid = "3";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'activity') {
		//������Ϣ
		$actives = array('activity'=>' class="active"');
		$theurl = "space.php?do=$do&view=activity";
		//���ID
		$classid = "4";
		$wheresql .= " and classid=".$classid;
	}elseif($_GET['view'] == 'all'){
		//������Ϣ
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
	
	//����
	if($searchkey = stripsearchkey($_GET['searchkey'])) {
		$wheresql .= " AND subject LIKE '%$searchkey%'";
		$theurl .= "&searchkey=$_GET[searchkey]";
		$orderby = " order by starttime desc";
		cksearch($theurl);
	}
	//��������
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

	//��ҳ
	$multi = multi($count, $perpage, $page, $theurl);

	//ʵ��
	realname_get();

	$_TPL['css'] = 'blog';
	include_once template("space_arrangement_list");
}

?>
