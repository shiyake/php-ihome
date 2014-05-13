<?php if(!defined('iBUAA')) exit('Access Denied');

if($ac != 'list') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=complain');
}

$curr_uid = $_SGLOBAL['supe_uid'];

$dept_uids = '0';
$dept_uids .= getBaseDepartmentID($uid);
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('complain_uid')." WHERE uid='$curr_uid'");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$dept_uids .= getBaseDepartmentID($value['foruid']);
}
if($dept_uids == '0'){
	showmessage('对不起，您没有该权限！','space.php?do=home');
}






$type = $_GET['type'];

if($type == 'complains'){
	$tab = 1;
	$Complains = array();//存放complain记录
	
	$perpage = 20;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	
	$wheresql = '1';
	$isSearch = FALSE;
	if($uid = $_GET['uid'] ? trim($_GET['uid']) : ''){
		$wheresql .= " AND temp.uid=$uid";
	}
	if($uname = $_GET['uname'] ? trim($_GET['uname']) : ''){
		$wheresql .= " AND temp.uname like '%$uname%'";
	}	
	if($message = $_GET['message'] ? trim($_GET['message']) : ''){
		$wheresql .= " AND temp.atdepartment like '%$message%'";
	}
	if($atuname = $_GET['atuname'] ? trim($_GET['atuname']) : ''){
		$wheresql .= " AND temp.atuname like '%$atuname%'";
	}
	if($isreply = $_GET['isreply'] ? trim($_GET['isreply']) : ''){
		if($isreply == 1){
			$isreply = 1;
			$wheresql .= " AND temp.isreply=$isreply";
		}elseif($isreply == 2){
			$isreply = 0;
			$wheresql .= " AND temp.isreply=$isreply";
		}
	}
	$where = " WHERE ".$wheresql." AND temp.atdeptuid IN (".$dept_uids.")";
	
	$mpurl = "plugin.php?pluginid=complain&type=complains&uid=$uid&uname=$uname&message=$message&atuname=$atuname";
	//echo $where;exit();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(DISTINCT doid,atdeptuid) FROM ".tname('complain')." temp".$where), 0);
	//echo $count;exit();
	if($count) {
		include S_ROOT.'./data/powerlevel/powerlevel.php';
		$query = $_SGLOBAL['db']->query("SELECT * FROM (SELECT * FROM ".tname('complain')." USE INDEX(id) ORDER BY id DESC) temp".$where." GROUP BY doid,atdeptuid ORDER BY doid DESC LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['addtime'] = date("Y-m-d H:i",$value['addtime']);
			realname_set($value['uid'], $value['uname']);
			$value['atuname'] = $_POWERINFO[$value['atuid']]['department'];
			$Complains[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		realname_get();
	}

}else{
	$tab = 0;
	$complains = array();
	$totalNum = 0;
	$isreplyNum = 0;
	
	$firstday = date("Y-m-01" ,time());
	$nowday = date("Y-m-d");
	$startDay = $_GET['starttime'] ? trim($_GET['starttime']) : $firstday;
	$endDay = $_GET['endtime'] ? trim($_GET['endtime']) : $nowday;
	
	$startTime = strtotime($startDay);
	$endTime = strtotime($endDay);
	$endTime = strtotime("+1 days",$endTime);
	
	$times = $_GET['times'] ? trim($_GET['times']) : 0;

	$sql_where = "WHERE addtime<".$endTime." AND addtime>".$startTime." AND atdeptuid IN (".$dept_uids.")";
	
	if($times != 0)
		$sql_where .= " AND expire=0 AND times=".$times;
	
//	echo "SELECT * FROM (SELECT * FROM ".tname('complain')." USE INDEX(id) ORDER BY id DESC) temp ".$sql_where." GROUP BY doid,atdeptuid ORDER BY doid DESC";exit;
	$query = $_SGLOBAL['db']->query("SELECT * FROM (SELECT * FROM ".tname('complain')." USE INDEX(id) ORDER BY id DESC) temp ".$sql_where." GROUP BY doid,atdeptuid ORDER BY doid DESC");
	
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(isset($complains[$value['atdeptuid']])){
			$complains[$value['atdeptuid']]['total']++;
			if($value['isreply']){
				$complains[$value['atdeptuid']]['isreply']++;
				$isreplyNum++;
			}
		}else{
			$complains[$value['atdeptuid']]['department'] = $value['atdepartment'];
			$complains[$value['atdeptuid']]['atdeptuid'] = $value['atdeptuid'];
			$complains[$value['atdeptuid']]['total'] = 1;
			$complains[$value['atdeptuid']]['isreply'] = 0;
			if($value['isreply']){
				$complains[$value['atdeptuid']]['isreply']++;
				$isreplyNum++;
			}
		}
		$totalNum++;
	}
	$complains = array_sort($complains ,'total');
}

$actives = array($tab => ' class="active"');
if(!isset($tab)) {
	$actives = array('all' => ' class="active"');
} else {
	$mpurl .= '&tab='.$tab;
}
// tagcloud
if(preg_match('/MSIE/i', $useragent))
{
	$tags_query = $_SGLOBAL['db']->query('SELECT id, tag_word as text, tag_count as weight, max_type,type as intend FROM '.tname('complain_tagcloud')." LIMIT 0,8");
}
else 
{
	$tags_query = $_SGLOBAL['db']->query('SELECT id, tag_word as text, tag_count as weight, max_type,type as intend FROM '.tname('complain_tagcloud')." LIMIT 0,200");
}
$tags = array();
$tag_index = 0;
while($value = $_SGLOBAL['db']->fetch_array($tags_query)) {
    $tags[$tag_index] = $value;
    $tag_index++;
}

include_once template("/plugin/complain/list");


?>
