<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By xuxing
	Last Modfile By Ancon
	Last Time : 2013-4-15 10:28:58
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$theurl = "plugin.php?pluginid=wall&wallid=$WallId&ac=track";
$adminuid = 1;

$starttime=strtotime(date("Y-m-d"));
$endtime = strtotime(date("Y-m-d 23:59:59"));

inserttable('livecount', array('uid'=>$_SGLOBAL['supe_uid'], 'timeline' => time()), 0);
$query = $_SGLOBAL['db']->query("SELECT count(*) num FROM ".tname('livecount')." WHERE timeline>=$starttime and timeline<=$endtime");
$total = $_SGLOBAL['db']->fetch_array($query);
$query = $_SGLOBAL['db']->query("SELECT count(distinct uid) num FROM ".tname('livecount')." WHERE timeline>=$starttime and timeline<=$endtime");
$total_once = $_SGLOBAL['db']->fetch_array($query);

if($WallId){
	$Query = $_SGLOBAL['db']->query("select * from ".tname(wall)." where pass > 0 and id=".$WallId);
	if($Value = $_SGLOBAL['db']->fetch_array($Query)){
		if (empty($Value)) {
			showmessage('wall_not_exist');
		}
		$Wall = $Value;
		if(time() < ($Wall['starttime'] - 30*60)){
			showmessage('亲，活动开始前30分钟内才可使用哦！');
		}
		if(time() > ($Wall['endtime'] + 30*60)){
			showmessage('亲，活动结束30分钟后停止使用！');
		}
	}else{
		$title = $Value['wallname'];
		$adminuid = $Value['uid'];
	}


	
	
//分页
$perpage = 20;
$perpage = mob_perpage($perpage);

$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page=1;
$start = ($page-1)*$perpage;

//检查开始数
ckstart($start, $perpage);

$wheresql = "wallid = '$WallId' AND (uid = '$uid'  OR pass >= 1 ) ";
$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('wallfield')." WHERE  $wheresql"), 0);

if($count) {
	//最好显示与屏幕相同的东西,并且显示自己的!
	$mine = $_SGLOBAL['db']->query("select * from ".tname(wallfield)." where wallid = '$WallId' AND (uid = '$uid'  OR pass >= 1 ) order by timeline desc limit ".$start.",".$perpage);
	while($Mine = $_SGLOBAL['db']->fetch_array($mine))
		{
			realname_set($Mine['uid'], $Mine['username']);
			$TrackList[] = $Mine;
		}
	}

//分页
$multi = multi($count, $perpage, $page, $theurl);

//实名
realname_get();

$_TPL['css'] = 'doing';

include_once template("/plugin/wall/template/wall_track");
	
}
?>
