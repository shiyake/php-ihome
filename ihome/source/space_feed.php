<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$user = $_SGLOBAL['db']->query("select usertype from ".tname(baseprofile)." WHERE uid = ".$space[uid]."  and collegeid like '0%' LIMIT 1 ");
$usertype = $_SGLOBAL['db']->result($user);
ssetcookie('mytemplate',S_ROOT.'./template/default/style.css' , 3600*24*365);//长期有效
//显示全站动态的好友数
if(empty($_SCONFIG['showallfriendnum']) || $_SCONFIG['showallfriendnum']<1) $_SCONFIG['showallfriendnum'] = 10;
//默认热点天数
if(empty($_SCONFIG['feedhotday'])) $_SCONFIG['feedhotday'] = 2;

//网站近况
$isnewer = $space['friendnum']<$_SCONFIG['showallfriendnum']?1:0;
if(empty($_GET['view']) && $space['self'] && $isnewer) {
	$_GET['view'] = 'we';//默认显示
}

//分页
$perpage = $_SCONFIG['feedmaxnum']<50?50:$_SCONFIG['feedmaxnum'];
$perpage = mob_perpage($perpage);

if($_GET['view'] == 'hot') {
	$perpage = 50;
}

$start = empty($_GET['start'])?0:intval($_GET['start']);
//检查开始数
ckstart($start, $perpage);

//今天时间开始线
$_SGLOBAL['today'] = sstrtotime(sgmdate('Y-m-d'));
//最少热度
$minhot = $_SCONFIG['feedhotmin']<1?3:$_SCONFIG['feedhotmin'];
$_SGLOBAL['gift_appid'] = '1027468';

if($_GET['view'] == 'all') {

	$wheresql = "1";
	$ordersql = "dateline DESC";
	$theurl = "space.php?uid=$space[uid]&do=$do&view=all";
	$f_index = '';

} elseif($_GET['view'] == 'hot') {

	$wheresql = "hot>='$minhot'";
	$ordersql = "dateline DESC";
	$theurl = "space.php?uid=$space[uid]&do=$do&view=hot";
	$f_index = '';

}elseif($_GET['view'] == 'work') {
	$wheresql = "icontype='work'";
	$ordersql = "dateline DESC";
	$theurl = "space.php?uid=$space[uid]&do=$do&view=work";
	$f_index = '';
}elseif($_GET['view'] == 'complain'){
	$ordersql = "dateline DESC";
	$theurl = "space.php?uid=$space[uid]&do=$do&view=complain";
	$f_index = 'USE INDEX(dateline)';
	$_GET['view'] = 'complain';
	$_TPL['hidden_time'] = 0;

}elseif($_GET['view'] == 'ours' || $_GET['view'] == 'we'){
    $wheresql = "icontype!='work' or icontype is NULL";
    $ordersql = "dateline DESC";
    $theurl = "space.php?uid=$space[uid]&do=$do&view=ours";
    $f_index = '';
}else {

	if(empty($space['feedfriend'])) $_GET['view'] = 'me';
	
	if( $_GET['view'] == 'me') {
		$wheresql = "uid='$space[uid]'";
		$ordersql = "dateline DESC";
		$theurl = "space.php?uid=$space[uid]&do=$do&view=me";
		$f_index = '';
		
	} else {
		//许兴修改 2012-05-23
		//$wheresql = "uid IN ('0',$space[feedfriend])";
		$wheresql = "uid IN ('0',$space[feedfriend],$space[uid])";
		$ordersql = "dateline DESC";
		$theurl = "space.php?uid=$space[uid]&do=$do&view=we";
		$f_index = 'USE INDEX(dateline)';
		$_GET['view'] = 'we';
		$_TPL['hidden_time'] = 0;
	}
}
//exit('bb');
//过滤
$appid = empty($_GET['appid'])?0:intval($_GET['appid']);
if($appid) {
	$wheresql .= " AND appid='$appid'";
}
$icon = empty($_GET['icon'])?'':trim($_GET['icon']);
if($icon) {
	$wheresql .= " AND icon='$icon'";
}
$filter = empty($_GET['filter'])?'':trim($_GET['filter']);
if($filter == 'site') {
	$wheresql .= " AND appid>0";
} elseif($filter == 'myapp') {
	$wheresql .= " AND appid='0'";
}

$feed_list = $appfeed_list = $hiddenfeed_list = $filter_list = $hiddenfeed_num = $icon_num = array();
$count = $filtercount = 0;
$useragent = $_SERVER['HTTP_USER_AGENT'];
// tagcloud
if(preg_match('/MSIE/i', $useragent))
{
	$tags_query = $_SGLOBAL['db']->query('SELECT id, tag_word as text, tag_count as weight, max_type as intend FROM '.tname('tagcloud')." LIMIT 0,8");
}
else 
{
	$tags_query = $_SGLOBAL['db']->query('SELECT id, tag_word as text, tag_count as weight, max_type as intend FROM '.tname('tagcloud')." LIMIT 0,40");
}
$tags = array();
$tag_index = 0;
while($value = $_SGLOBAL['db']->fetch_array($tags_query)) {
    $tags[$tag_index] = $value;
    $tag_index++;
}

if($_GET['view'] == 'complain'){
	if($_GET['type'] == 'all'){
		$ComplainQuery = $_SGLOBAL['db']->query("SELECT doid FROM ".tname('complain')." USE INDEX(doid) GROUP BY doid");
		$doids = '';
		while($ComplainDoids = $_SGLOBAL['db']->fetch_array($ComplainQuery)){
			$doids .= $ComplainDoids['doid'].',';
		}
	}else{
		$UserUidArray = isDepartment($space['uid'] ,1);
		if($UserUidArray){
			$ComplainQuery = $_SGLOBAL['db']->query("SELECT doid FROM ".tname('complain')." USE INDEX(doid) WHERE atuid='$UserUidArray[dept_uid]'");
			$doids = '';
			while($ComplainDoids = $_SGLOBAL['db']->fetch_array($ComplainQuery)){
				$doids .= $ComplainDoids['doid'].',';
			}
		}else{
			$ComplainQuery = $_SGLOBAL['db']->query("SELECT doid FROM ".tname('complain')." USE INDEX(doid) WHERE uid='$_SGLOBAL[supe_uid]' GROUP BY doid");
			$doids = '';
			while($ComplainDoids = $_SGLOBAL['db']->fetch_array($ComplainQuery)){
				$doids .= $ComplainDoids['doid'].',';
			}
		}
		if(!$doids){
			/*
			$ComplainQuery = $_SGLOBAL['db']->query("SELECT doid FROM ".tname('complain')." USE INDEX(doid) GROUP BY doid");
			$doids = '';
			while($ComplainDoids = $_SGLOBAL['db']->fetch_array($ComplainQuery)){
				$doids .= $ComplainDoids['doid'].',';
			}
			*/
			$doids = '0,';
			
		}
	}
	$doids = substr($doids ,0 ,-1);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." $f_index
		WHERE id IN (".$doids.") AND idtype='doid' 
		ORDER BY $ordersql 
		LIMIT $start,$perpage");
}else{
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." $f_index
		WHERE $wheresql
		ORDER BY $ordersql
		LIMIT $start,$perpage");
}




if($_GET['view'] == 'me' || $_GET['view'] == 'hot') {
$count=0;
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['share_url'] = get_shareurl($value['idtype'], $value['id']);
		
		if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
			realname_set($value['uid'], $value['username']);
			//if($value['idtype']=='doid'){
				$value['num'] = get_commentnum($value['idtype'],$value['id']);
			//}
			$feed_list[] = $value;
		}
		$count++;
    
    }
} else {
    $count=0;
	$hidden_icons = array();
	if($_SCONFIG['feedhiddenicon']) {
		$_SCONFIG['feedhiddenicon'] = str_replace(' ', '', $_SCONFIG['feedhiddenicon']);
		$hidden_icons = explode(',', $_SCONFIG['feedhiddenicon']);
	}
	$space['filter_icon'] = empty($space['privacy']['filter_icon'])?array():array_keys($space['privacy']['filter_icon']);
	$space['black_feed'] = empty($space['privacy']['black_feed'])?array():array_keys($space['privacy']['black_feed']);
    $blackquery = $_SGLOBAL['db']->query("select buid from ".tname('blacklist')." where uid=$_SGLOBAL[supe_uid]");
    $space['blacklist'] = array();
    while ($item = $_SGLOBAL['db']->fetch_array($blackquery)) {
        $space['blacklist'][]=$item['buid'];
    }
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        
        $value['share_url'] = get_shareurl($value['idtype'], $value['id']);
		if(empty($feed_list[$value['hash_data']][$value['uid']])) {
			if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
				realname_set($value['uid'], $value['username']);
				//if($value['idtype']=='doid'){
					$value['num'] = get_commentnum($value['idtype'],$value['id']);
				//}
				if(ckicon_uid($value)) {
					$ismyapp = is_numeric($value['icon'])?1:0;
					if($_SCONFIG['my_showgift'] && $value['icon'] == $_SGLOBAL['gift_appid']) $ismyapp = 0;
					if((($ismyapp && in_array('myop', $hidden_icons)) || in_array($value['icon'], $hidden_icons)) && !empty($icon_num[$value['icon']])) {
						$hiddenfeed_num[$value['icon']]++;
						$hiddenfeed_list[$value['icon']][] = $value;
					} else {
						if($ismyapp) {
							$appfeed_list[$value['hash_data']][$value['uid']] = $value;
						} else {
							$feed_list[$value['hash_data']][$value['uid']] = $value;
						}
					}
					$icon_num[$value['icon']]++;
				} else {
					$filtercount++;
					$filter_list[] = $value;
				}
			}
		}
        $count++;
	}
}
//exit('0');
$olfriendlist = $visitorlist = $task = $ols = $birthlist = $myapp = $hotlist = $guidelist = array();
$oluids = array();
$topiclist = array();
$newspacelist = array();

if($space['self'] && empty($start)) {

	//短消息
	$space['pmnum'] = $_SGLOBAL['member']['newpm'];

	//举报管理
	if(checkperm('managereport')) {
		$space['reportnum'] = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('report')." WHERE new='1'"), 0);
	}

	//审核活动
	if(checkperm('manageevent')) {
		$space['eventverifynum'] = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('event')." WHERE grade='0'"), 0);
	}

	//等待实名认证
	if($_SCONFIG['realname'] && checkperm('managename')) {
		$space['namestatusnum'] = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('space')." WHERE namestatus='0' AND name!=''"), 0);
	}
	
	//最近访客列表
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('visitor')." WHERE uid='$space[uid]' ORDER BY dateline DESC LIMIT 0,3");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['vuid'], $value['vusername']);
		$visitorlist[$value['vuid']] = $value;
		$oluids[] = $value['vuid'];
	}

	//访客在线
	if($oluids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')." WHERE uid IN (".simplode($oluids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(!$value['magichidden']) {
				$ols[$value['uid']] = 1;
			} elseif ($visitorlist[$value['uid']]) {
				unset($visitorlist[$value['uid']]);
			}
		}
	}

	$oluids = array();
	$olfcount = 0;
	if($space['feedfriend']) {
		//在线好友
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')." WHERE uid IN ($space[feedfriend]) ORDER BY lastactivity DESC LIMIT 0,15");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(!$value['magichidden']) {
				realname_set($value['uid'], $value['username']);
				$olfriendlist[] = $value;
				$ols[$value['uid']] = 1;
				$oluids[$value['uid']] = $value['uid'];
				$olfcount++;
			}
		}
	}
	if($olfcount < 15) {
		//我的好友
		$query = $_SGLOBAL['db']->query("SELECT fuid AS uid, fusername AS username, num FROM ".tname('friend')." WHERE uid='$space[uid]' AND status='1' ORDER BY num DESC, dateline DESC LIMIT 0,30");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(empty($oluids[$value['uid']])) {
				realname_set($value['uid'], $value['username']);
				$olfriendlist[] = $value;
				$olfcount++;
				if($olfcount == 15) break;
			}
		}
	}

	//获取任务
	include_once(S_ROOT.'./source/function_space.php');
	$task = gettask();

	//好友生日
	if($space['feedfriend']) {
		list($s_month, $s_day) = explode('-', sgmdate('n-j', $_SGLOBAL['timestamp']-3600*24*3));//过期3天
		list($n_month, $n_day) = explode('-', sgmdate('n-j', $_SGLOBAL['timestamp']));
		list($e_month, $e_day) = explode('-', sgmdate('n-j', $_SGLOBAL['timestamp']+3600*24*7));
		if($e_month == $s_month) {
			$wheresql = "sf.birthmonth='$s_month' AND sf.birthday>='$s_day' AND sf.birthday<='$e_day'";
		} else {
			$wheresql = "(sf.birthmonth='$s_month' AND sf.birthday>='$s_day') OR (sf.birthmonth='$e_month' AND sf.birthday<='$e_day' AND sf.birthday>'0')";
		}
		$query = $_SGLOBAL['db']->query("SELECT s.uid,s.username,s.name,s.namestatus,s.groupid,sf.birthyear,sf.birthmonth,sf.birthday
			FROM ".tname('spacefield')." sf
			LEFT JOIN ".tname('space')." s ON s.uid=sf.uid
			WHERE (sf.uid IN ($space[feedfriend])) AND ($wheresql)");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
			$value['istoday'] = 0;
			if($value['birthmonth'] == $n_month && $value['birthday'] == $n_day) {
				$value['istoday'] = 1;
			}
			$key = sprintf("%02d", $value['birthmonth']).sprintf("%02d", $value['birthday']);
			$birthlist[$key][] = $value;
			ksort($birthlist);
		}
	}

	//积分
	$space['star'] = getstar($space['experience']);

	//域名
	$space['domainurl'] = space_domain($space);

	//热点
	if($_SCONFIG['feedhotnum'] > 0 && ($_GET['view'] == 'we' || $_GET['view'] == 'all')) {
		$hotlist_all = array();
		$hotstarttime = $_SGLOBAL['timestamp'] - $_SCONFIG['feedhotday']*3600*24;
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." USE INDEX(hot) WHERE dateline>='$hotstarttime' ORDER BY hot DESC LIMIT 0,10");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['hot']>0 && ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
				realname_set($value['uid'], $value['username']);
				if(empty($hotlist)) {
					$hotlist[$value['feedid']] = $value;
				} else {
					$hotlist_all[$value['feedid']] = $value;
				}
			}
		}
		$nexthotnum = $_SCONFIG['feedhotnum'] - 1;
		if($nexthotnum > 0) {
			if(count($hotlist_all)> $nexthotnum) {
				$hotlist_key = array_rand($hotlist_all, $nexthotnum);
				if($nexthotnum == 1) {
					$hotlist[$hotlist_key] = $hotlist_all[$hotlist_key];
				} else {
					foreach ($hotlist_key as $key) {
						$hotlist[$key] = $hotlist_all[$key];
					}
				}
			} else {
				$hotlist = $hotlist_all;
			}
		}
	}
	
	//热闹
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('topic')." ORDER BY lastpost DESC LIMIT 0,1");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['pic'] = $value['pic']?pic_get($value['pic'], $value['thumb'], $value['remote']):'';
		$topiclist[] = $value;
	}


	//提醒总数
	$space['allnum'] = 0;
	foreach (array('notenum', 'addfriendnum', 'mtaginvitenum', 'eventinvitenum', 'myinvitenum', 'pokenum', 'reportnum', 'namestatusnum', 'eventverifynum') as $value) {
		$space['allnum'] = $space['allnum'] + $space[$value];
	}
}
//exit('1');
//引入一个月热门投票--仅取3个!
$timerange = $_SGLOBAL['timestamp']-2592000;
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('poll')." WHERE dateline >= '$timerange' AND $_SGLOBAL[timestamp] <= expiration ORDER BY  hot DESC LIMIT 3 ");
while($value = $_SGLOBAL['db']->fetch_array($query))
	{
		realname_set($value['uid'], $value['username']);//实名
		$hotpoll[] = $value;
	}
//引入热门活动
$hotevents = array();
$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('event')." WHERE endtime > '$_SGLOBAL[timestamp]' ORDER BY membernum DESC LIMIT 3 ");
while($value = $_SGLOBAL['db']->fetch_array($query))
	{
		realname_set($value['uid'], $value['username']);
		$hotevents[] = $value;
	}
//引入一个月热门日志
	$hotlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')." WHERE dateline >= '$timerange' ORDER BY hot DESC LIMIT 3 ");
	while ($value = $_SGLOBAL['db']->fetch_array($query))
	{
		if($value['blogid'] != $blog['blogid'] && empty($value['friend'])) {
			realname_set($value['uid'], $value['username']);
			$hotlist[] = $value;
		}
	}
//最新日志
	$newlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')." ORDER BY dateline DESC LIMIT 3 ");
	while ($value = $_SGLOBAL['db']->fetch_array($query))
	{
		if($value['blogid'] != $blog['blogid'] && empty($value['friend'])) {
			realname_set($value['uid'], $value['username']);
			$newlist[] = $value;
		}
	}


//实名处理
realname_get();

//feed合并
$list = array();
if($_GET['view'] == 'hot') {
	//热点
	foreach ($feed_list as $value) {
		$value = mkfeed($value);
		$list['today'][] = $value;
	}
} elseif($_GET['view'] == 'me') {
	//个人
	foreach ($feed_list as $value) {
		if($hotlist[$value['feedid']]) continue;
		$value = mkfeed($value);
		if($value['dateline']>=$_SGLOBAL['today']) {
			$list['today'][] = $value;
		} elseif ($value['dateline']>=$_SGLOBAL['today']-3600*24) {
			$list['yesterday'][] = $value;
		} else {
			$theday = sgmdate('Y-m-d', $value['dateline']);
			$list[$theday][] = $value;
		}
	}
} else {
	//好友、全站
	foreach ($feed_list as $values) {
		$actors = array();
		$a_value = array();
		foreach ($values as $value) {
			if(empty($a_value)) {
				$a_value = $value;
			}
			$actors[] = "<a href=\"space.php?uid=$value[uid]\">".$_SN[$value['uid']]."</a>";
		}
		if($hotlist[$a_value['feedid']]) continue;
		$a_value = mkfeed($a_value, $actors);
		if($a_value['dateline']>=$_SGLOBAL['today']) {
			$list['today'][] = $a_value;
		} elseif ($a_value['dateline']>=$_SGLOBAL['today']-3600*24) {
			$list['yesterday'][] = $a_value;
		} else {
			$theday = sgmdate('Y-m-d', $a_value['dateline']);
			$list[$theday][] = $a_value;
		}
		
	}
	//应用
	foreach ($appfeed_list as $values) {
		$actors = array();
		$a_value = array();
		foreach ($values as $value) {
			if(empty($a_value)) {
				$a_value = $value;
			}
			$actors[] = "<a href=\"space.php?uid=$value[uid]\">".$_SN[$value['uid']]."</a>";
		}
		$a_value = mkfeed($a_value, $actors);
		$list['app'][] = $a_value;
	}
}

$_SGLOBAL['news_list']=$list;
if(!empty($_GET['show']))	{

	include_once template(cp_feed_news);	
	exit();
}

//获得最新10条已处理的诉求信息
$complainQuery = $_SGLOBAL['db']->query("SELECT replytime,doid,atdepartment,atdeptuid FROM ".tname('complain')." USE INDEX(doid) WHERE isreply=1 GROUP BY doid ORDER BY replytime DESC LIMIT 10");
while ($complain = $_SGLOBAL['db']->fetch_array($complainQuery)) {
	$complain['replytime'] = date("Y-m-d H:i",$complain['replytime']);
	$Complains[] = $complain;
}

$isLeader = FALSE;
$dept_uids = '0';
$dept_uids .= getBaseDepartmentID($uid);
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('complain_uid')." WHERE uid=$_SGLOBAL[supe_uid]");
if($value = $_SGLOBAL['db']->fetch_array($query) || $dept_uids != '0') {
	$isLeader = TRUE;
}


//获得个性模板
$templates = $default_template = array();
$tpl_dir = sreaddir(S_ROOT.'./template');
foreach ($tpl_dir as $dir) {
	if(file_exists(S_ROOT.'./template/'.$dir.'/style.css')) {
		$tplicon = file_exists(S_ROOT.'./template/'.$dir.'/image/template.gif')?'template/'.$dir.'/image/template.gif':'image/tlpicon.gif';
		$tplvalue = array('name'=> $dir, 'icon'=>$tplicon);
		if($dir == $_SCONFIG['template']) {
			$default_template = $tplvalue;
		} else {
			$templates[$dir] = $tplvalue;
		}
	}
}
$_TPL['templates'] = $templates;
$_TPL['default_template'] = $default_template;



//标签激活
$my_actives = array(in_array($_GET['filter'], array('site','myapp'))?$_GET['filter']:'all' => ' class="active"');
$actives = array(in_array($_GET['view'], array('me','all','hot'))?$_GET['view']:'we' => ' class="active"');

if(empty($cp_mode)) include_once template("space_feed");
//筛选
function ckicon_uid($feed) {
	global $_SGLOBAL, $space, $_SCONFIG;

	if($space['filter_icon']) {
		$key = $feed['icon'].'|0';
		if(in_array($key, $space['filter_icon'])) {
			return false;
		} else {
			$key = $feed['icon'].'|'.$feed['uid'];
			if(in_array($key, $space['filter_icon'])) {
				return false;
			}
		}
	}
    if($space['black_feed']) {
        $key = $feed['uid'];
        if(in_array($key, $space['black_feed'])) {
            return false;
        }
	}
    if ($space['blacklist']) {
        if (in_array($feed['uid'], $space['blacklist'])) {
            return false;
        }
    }
	return true;
}

//推荐礼物
function my_showgift() {
	global $_SGLOBAL, $space, $_SCONFIG;
	if($_SCONFIG['my_showgift'] && $_SGLOBAL['my_userapp'][$_SGLOBAL['gift_appid']]) {
		echo '<script language="javascript" type="text/javascript" src="http://gift.manyou-apps.com/recommend.js"></script>';
	}
}

?>
