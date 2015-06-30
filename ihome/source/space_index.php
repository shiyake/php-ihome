<?php

/******************************

		note::ￕ￢ￊￇ﾿￘ￖￆﾸ￶￈ￋￖ￷ￒﾳﾵￄￎￄﾼ￾!!


******************************/

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$query=$_SGLOBAL['db']->query('SELECT groupid,pptype from '.tname('space').' WHERE uid='.$_SGLOBAL['supe_uid']);
if($res=$_SGLOBAL['db']->fetch_array($query))	{
	$_SGLOBAL['mygroupid']=$res['groupid'];
	$_SGLOBAL['pptype']=$res['pptype'];
}
$pptype_res = array("1"=>"学院","2"=>"部处","3"=>"名人","4"=>"学生组织","5"=>"兴趣社团","6"=>"学生党组织","7"=>"活动主页","8"=>"品牌主页","20"=>"班级主页","100"=>"航路研语","200"=>"名师工作坊");
//ￊﾵￃ￻￈ￏￖﾤ
if($space['namestatus']) {
	include_once(S_ROOT.'./source/function_cp.php');
	if(!ckrealname('viewspace', 1)) {
		$_SGLOBAL['realname_privacy'] = 1;
		include template('space_privacy');
		exit();
	}
}

//ﾷ￧ﾸ￱
$_SGLOBAL['space_theme'] = $space['theme'];
$_SGLOBAL['space_css'] = $space['css'];
$_SGLOBAL['index_bg'] = $space['index_bg'];
//ￊￇﾷ￱ﾺￃￓ￑
$space['isfriend'] = $space['self'];
if($space['friends'] && in_array($_SGLOBAL['supe_uid'], $space['friends'])) {
	$space['isfriend'] = 1;//ￊￇﾺￃￓ￑
}

//ﾸ￶￈ￋￗￊ￁ￏ
//￐ￔﾱ￰
$space['sex_org'] = $space['sex'];
$space['sex_text'] = $space['sex'] == '1' ? "男生" : ($space['sex']=='2' ? "女生" : '');
$space['sex'] = $space['sex']=='1'?'<a href="cp.php?ac=friend&op=search&sex=1&searchmode=1">'.lang('man').'</a>':($space['sex']=='2'?'<a href="cp.php?ac=friend&op=search&sex=2&searchmode=1">'.lang('woman').'</a>':'');
$space['birth'] = ($space['birthyear']?"$space[birthyear]".lang('year'):'').($space['birthmonth']?"$space[birthmonth]".lang('month'):'').($space['birthday']?"$space[birthday]".lang('day'):'');
$space['marry'] = $space['marry']=='1'?'<a href="cp.php?ac=friend&op=search&marry=1&searchmode=1">'.lang('unmarried').'</a>':($space['marry']=='2'?'<a href="cp.php?ac=friend&op=search&marry=2&searchmode=1">'.lang('married').'</a>':'');
$space['birthcity'] = trim(($space['birthprovince']?"<a href=\"cp.php?ac=friend&op=search&birthprovince=".rawurlencode($space['birthprovince'])."&searchmode=1\">$space[birthprovince]</a>":'').($space['birthcity']?" <a href=\"cp.php?ac=friend&op=search&birthcity=".rawurlencode($space['birthcity'])."&searchmode=1\">$space[birthcity]</a>":''));
$space['residecity'] = trim(($space['resideprovince']?"<a href=\"cp.php?ac=friend&op=search&resideprovince=".rawurlencode($space['resideprovince'])."&searchmode=1\">$space[resideprovince]</a>":'').($space['residecity']?" <a href=\"cp.php?ac=friend&op=search&residecity=".rawurlencode($space['residecity'])."&searchmode=1\">$space[residecity]</a>":''));
$space['qq'] = empty($space['qq'])?'':"<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?V=1&Uin=$space[qq]&Site=$space[username]&Menu=yes\">$space[qq]</a>";

/*match wether the public page are followed. by xuxing@ihome start on 2013-1-16*/
if ($space[groupid]==3) {
	# judge wether is a public page.
	$myfollow = array();
	$myfollow = explode(',', $_SGLOBAL[member][feedfriend]);
	if(in_array($space[uid], $myfollow)){
		$followflag = 1;
	}
}
/*match wether the public page are followed. by xuxing@ihome end on 2013-1-16*/

//ￒ￾ￋﾽ
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type IN ('base', 'contact')");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$v_friend = ckfriend($value['uid'], $value['friend']);
	if(!$v_friend) $space[$value['subtype']] = '';
}

@include_once(S_ROOT.'./data/data_usergroup.php');

//ﾻ�ﾷￖ
$space['star'] = getstar($space['experience']);

//ￓ￲ￃ￻
$space['domainurl'] = space_domain($space);

//ﾸ￶￈ￋﾶﾯￌﾬ
$feedlist = array();
if($_SGLOBAL['mygroupid']==3||ckprivacy('feed')) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." WHERE uid='$space[uid]' ORDER BY top DESC,dateline DESC  LIMIT 0,20 ");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['share_url'] = get_shareurl($value['idtype'], $value['id']);
		if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
			realname_set($value['uid'], $value['username']);
			$value['num'] = get_commentnum($value['idtype'],$value['id']);
			$feedlist[] = $value;
		}
	}
	$feednum = count($feedlist);
}

//ﾺￃￓ￑￁￐ﾱ￭
$oluids = array();
$friendlist = array();
$friendnum = 0;
if ($space[groupid] == 3)
{
	$friendfans = '我的粉丝';
	$friendnumquery = $_SGLOBAL['db']->query("SELECT count(x.uid) FROM ".tname('friend')." x , ".tname('space')." y WHERE x.uid='$space[uid]' AND x.fuid = y.uid AND y.groupid != 3 AND x.status='1' ORDER BY x.num DESC, x.dateline DESC");
	$friendnumarray= mysql_fetch_array($friendnumquery);
	$friendnum = $friendnumarray['0'];
	$query = $_SGLOBAL['db']->query("SELECT x.* , y.* FROM ".tname('friend')." x , ".tname('space')." y WHERE x.uid='$space[uid]' AND x.fuid = y.uid AND y.groupid != 3 AND x.status='1' ORDER BY x.num DESC, x.dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['fuid'], $value['fusername']);
		$oluids[$value['fuid']] = $value['fuid'];
		$friendlist[] = $value;
	}
	if($friendlist && empty($space['friendnum'])) {
		//ﾸ￼￐ￂﾺￃￓ￑ﾻﾺﾴ￦
		include_once(S_ROOT.'./source/function_cp.php');
		friend_cache($space['uid']);
	}	
}
else
{
	$friendfans = '我关注的';
	$friendnumquery = $_SGLOBAL['db']->query("SELECT count(x.uid) FROM ".tname('friend')." x , ".tname('space')." y WHERE x.uid='$space[uid]' AND x.fuid = y.uid AND y.groupid = 3 AND x.status='1' ORDER BY x.num DESC, x.dateline DESC");
	$friendnumarray = mysql_fetch_array($friendnumquery);
	$friendnum = $friendnumarray['0'];
	$query = $_SGLOBAL['db']->query("SELECT x.* , y.* FROM ".tname('friend')." x , ".tname('space')." y WHERE x.uid='$space[uid]' AND x.fuid = y.uid AND y.groupid = 3 AND x.status='1' ORDER BY x.num DESC, x.dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['fuid'], $value['fusername']);
		$oluids[$value['fuid']] = $value['fuid'];
		$friendlist[] = $value;
	}
	if($friendlist && empty($space['friendnum'])) {
		//ﾸ￼￐ￂﾺￃￓ￑ﾻﾺﾴ￦
		include_once(S_ROOT.'./source/function_cp.php');
		friend_cache($space['uid']);
	}	
	$friendfans2 = '我的好友';
	$friendlist2 = array();
	$friendnumquery2 = $_SGLOBAL['db']->query("SELECT count(x.uid) FROM ".tname('friend')." x , ".tname('space')." y WHERE x.uid='$space[uid]' AND x.fuid = y.uid AND x.status='1' ORDER BY x.num DESC, x.dateline DESC");
	$friendnumarray2 = mysql_fetch_array($friendnumquery2);
	$friendnum2 = $friendnumarray2['0'];
	$query = $_SGLOBAL['db']->query("SELECT x.* , y.* FROM ".tname('friend')." x , ".tname('space')." y WHERE x.uid='$space[uid]' AND x.fuid = y.uid AND y.groupid != 3 AND x.status='1' ORDER BY x.num DESC, x.dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['fuid'], $value['fusername']);
		$oluids[$value['fuid']] = $value['fuid'];
		$friendlist2[] = $value;
	}
	if($friendlist2 && empty($space['friendnum'])) {
		//ﾸ￼￐ￂﾺￃￓ￑ﾻﾺﾴ￦
		include_once(S_ROOT.'./source/function_cp.php');
		friend_cache($space['uid']);
	}	
	
}
/*
if($_SGLOBAL['mygroupid']==3||ckprivacy('friend')) {
	$friendfans = '我的粉丝';
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$space[uid]' AND status='1' ORDER BY num DESC, dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['fuid'], $value['fusername']);
		$oluids[$value['fuid']] = $value['fuid'];
		$friendlist[] = $value;
	}
	if($friendlist && empty($space['friendnum'])) {
		//ﾸ￼￐ￂﾺￃￓ￑ﾻﾺﾴ￦
		include_once(S_ROOT.'./source/function_cp.php');
		friend_cache($space['uid']);
	}
}*/

//ￗ￮ﾽ￼ﾷￃ﾿ￍ￁￐ﾱ￭
$visitorlist = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('visitor')." WHERE uid='$space[uid]' ORDER BY dateline DESC LIMIT 0,6");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if($value['vusername']) {
		realname_set($value['vuid'], $value['vusername']);
	}
	$value['isfriend'] = 0;
	if($space['friends'] && in_array($value['vuid'], $space['friends'])) {
		$value['isfriend'] = 1;
	}
	$oluids[$value['vuid']] = $value['vuid'];
	$visitorlist[$value['vuid']] = $value;
}

//ﾷￃￎￊￍﾳﾼￆ
$viewuids = $_SCOOKIE['viewuids']?explode('_', $_SCOOKIE['viewuids']):array();
if($_SGLOBAL['supe_uid'] && !$space['self'] && !in_array($space['uid'], $viewuids)) {
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET viewnum=viewnum+1 WHERE uid='$space[uid]'");
	//ﾷￃￋﾢ￐ￂ
	$viewuids[$space['uid']] = $space['uid'];
	ssetcookie('viewuids', implode('_', $viewuids));
}

//￈ￕￖﾾ
$bloglist = array();
if($_SGLOBAL['mygroupid']==3||$space['blognum'] && ckprivacy('blog')) {
	$query = $_SGLOBAL['db']->query("SELECT b.uid, b.blogid, b.subject, b.dateline, b.pic, b.picflag, b.viewnum, b.replynum, b.friend, b.password, bf.message, bf.target_ids
		FROM ".tname('blog')." b
		LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
		WHERE b.uid='$space[uid]'
		ORDER BY b.weight DESC, b.dateline DESC LIMIT 0,5");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
			if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
			$value['message'] = $value['friend']==4?'':getstr($value['message'], 150, 0, 0, 0, 0, -1);
			$bloglist[] = $value;
		}
	}
	$blognum = count($bloglist);
}

//ￏ￠ﾲ￡
$albumlist = array();
if($_SGLOBAL['mygroupid']==3||$space['albumnum'] && ckprivacy('album')) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE uid='$space[uid]' ORDER BY updatetime DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
			$value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
			$albumlist[] = $value;
		}
	}
}

//友情链接
$flink = array();
if($space['groupid']==3){
	$fquery = $_SGLOBAL['db']->query("SELECT flink FROM ".tname('publicflink')." WHERE uid=$space[uid]");
	if ($fresult = $_SGLOBAL['db']->fetch_array($fquery)) {
		$flink = json_decode($fresult['flink'],true);
	}
}

//￁￴￑ￔﾰ￥
$walllist = array();
if($_SGLOBAL['mygroupid']==3||ckprivacy('wall')) {
	$query_sql = "SELECT * FROM ".tname('comment')." WHERE ((id=$space[uid] AND secret='on' AND authorid=$_SGLOBAL[supe_uid]) OR (id=$space[uid] AND secret='on' AND id=$_SGLOBAL[supe_uid]) OR (id=$space[uid] AND secret!='on') AND idtype='uid') ORDER BY dateline DESC LIMIT 0,5";

	$query = $_SGLOBAL['db']->query($query_sql);
		
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['authorid'], $value['author']);
		$value['message'] = strlen($value['message'])>500?getstr($value['message'], 500, 0, 0, 0, 0, -1).' ...':$value['message'];
		$walllist[] = $value;
	}
}
$mywalllist = array();
if($_SGLOBAL['mygroupid']==3||ckprivacy('wall')) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE authorid='$space[uid]' AND idtype='uid' ORDER BY dateline DESC LIMIT 0,12");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['authorid'], $value['author']);
		$value['message'] = strlen($value['message'])>500?getstr($value['message'], 500, 0, 0, 0, 0, -1).' ...':$value['message'];
		$mywalllist[] = $value;
	}
}
//ￊￇﾷ￱ￔￚￏ￟
$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('session')." WHERE uid = '$space[uid]'");
$value = $_SGLOBAL['db']->fetch_array($query);
$isonline = (empty($value) || $value['magichidden']) ? 0 : sgmdate('H:i:s', $value['lastactivity'], 1);

//ﾷ￧ﾸ￱
$theme = empty($_GET['theme'])?'':preg_replace("/[^0-9a-z]/i", '', $_GET['theme']);
if($theme == 'uchomedefault') {
	$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = '';
} elseif($theme) {
	$cssfile = S_ROOT.'./theme/'.$theme.'/style.css';
	if(file_exists($cssfile)) {
		$_SGLOBAL['space_theme'] = $theme;
		$_SGLOBAL['space_css'] = '';
	}
} else {
	if(!$space['self'] && $_SGLOBAL['member']['nocss']) {
		$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = '';
	}
}

//ￗ￮ﾽ￼ﾷￃ﾿ￍﾼￇￂﾼ
if(!$space['self'] && $_SGLOBAL['supe_uid']) {
	$query = $_SGLOBAL['db']->query("SELECT dateline FROM ".tname('visitor')." WHERE uid='$space[uid]' AND vuid='$_SGLOBAL[supe_uid]'");
	$visitor = $_SGLOBAL['db']->fetch_array($query);
	$is_anonymous = empty($_SCOOKIE['anonymous_visit_'.$_SGLOBAL['supe_uid'].'_'.$space['uid']]) ? 0 : 1;
	if(empty($visitor['dateline'])) {
		$setarr = array(
			'uid' => $space['uid'],
			'vuid' => $_SGLOBAL['supe_uid'],
			'vusername' => $is_anonymous ? '' : $_SGLOBAL['supe_username'],
			'dateline' => $_SGLOBAL['timestamp']
		);
		inserttable('visitor', $setarr, 0, true);
		show_credit();//ﾾﾺﾼￛￅￅￃ￻
	} else {
		if($_SGLOBAL['timestamp'] - $visitor['dateline'] >= 300) {
			updatetable('visitor', array('dateline'=>$_SGLOBAL['timestamp'], 'vusername'=>$is_anonymous ? '' : $_SGLOBAL['supe_username']), array('uid'=>$space['uid'], 'vuid'=>$_SGLOBAL['supe_uid']));
		}
		if($_SGLOBAL['timestamp'] - $visitor['dateline'] >= 3600) {
			show_credit();//1￐ﾡￊﾱﾺ￳ﾾﾺﾼￛￅￅￃ￻
		}
	}
	//ﾽﾱ￀￸ﾷￃ﾿ￍ
	getreward('visit', 1, 0, $space['uid']);
}

//ﾺ￬ﾰ￼ﾵ￀ﾾ￟
$space['magiccredit'] = 0;
if($_SGLOBAL['magic']['gift'] && $_SGLOBAL['supe_uid']) {
	$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('magicuselog')." WHERE uid='$space[uid]' AND mid='gift' LIMIT 1");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$data = empty($value['data'])?array():unserialize($value['data']);
		if($data['left'] <= 0) {
			$_SGLOBAL['db']->query('DELETE FROM '.tname('magicuselog')." WHERE uid = '$space[uid]' AND mid = 'gift'");
		}
		if(!$data['receiver'] || !in_array($_SGLOBAL['supe_uid'], $data['receiver'])) {
			$space['magiccredit'] = $data['left'] >= $data['chunk'] ? $data['chunk'] : $data['left'];
		}
	}
}

$recommendpublic = array();
$me = '%,'.$_SGLOBAL['supe_uid'].',%';
$query = $_SGLOBAL['db']->query("SELECT uid, name FROM ".tname("autorecpub")." WHERE exclude not like '".$me."' and recTo like '".$me."'");
while($res = $_SGLOBAL['db']->fetch_array($query)) {
	if(!isblacklist($res['uid']) && $res[uid] != $_SGLOBAL['supe_uid']) {
		$recommendpublic[] = $res;
	}	
}

$query = $_SGLOBAL['db']->query("SELECT a.uid as uid, b.name as name FROM ".tname("rec_public")." as a left join ".tname("space")." as b on a.uid=b.uid order by id desc limit 6");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	if (in_array($res,$recommendpublic)) {
		continue;
	}
	$q = $_SGLOBAL['db']->query("SELECT count(*) FROM ".tname("space")." where uid=".$res['uid']." and (aud like '".$me."' or aud like '".$_SGLOBAL['supe_uid'].",%' or aud like '%,".$_SGLOBAL['supe_uid']."' or aud like '".$_SGLOBAL['supe_uid']."')");
	$count = $_SGLOBAL['db']->fetch_array($q);
	if (!$count['count(*)']) {
		if(!isblacklist($res['uid']) && $res[uid] != $_SGLOBAL['supe_uid']) {
			$recommendpublic[] = $res;
		}
	}
}

$reccount = count($recommendpublic);
$allflag = 0;
if ($reccount <= 2) {
	$allflag = 1;
}



//ￊￇﾷ￱ￔￚￏ￟
$ols = array();
if($oluids) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')." WHERE uid IN (".simplode($oluids).")");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!$value['magichidden']) {
			$ols[$value['uid']] = 1;
		} elseif($visitorlist[$value['uid']]) {
			unset($visitorlist[$value['uid']]);
		}
	}
}

$timerange = $_SGLOBAL['timestamp']-25920000;
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('poll')." WHERE lastvote >= '$timerange' ORDER BY  voternum DESC LIMIT 3 ");
while($value = $_SGLOBAL['db']->fetch_array($query))
{

    realname_set($value['uid'], $value['username']);//ʵÃ
    $hotpoll[] = $value;
}

//ￓﾦￓￃￏￔￊﾾ
$narrowlist = $widelist = $guidelist = $space['userapp'] = array();
if ($_SCONFIG['my_status']) {
	$query = $_SGLOBAL['db']->query("SELECT main.*, field.*
		FROM ".tname('userapp')." main
		LEFT JOIN ".tname('userappfield')." field
		ON field.uid=main.uid AND field.appid=main.appid
		WHERE main.uid='$space[uid]'
		ORDER BY main.displayorder DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$space['userapp'][$value['appid']] = $value;
	}
}
if($space['userapp']) {
	include_once(S_ROOT.'./source/function_userapp.php');
	foreach ($space['userapp'] as $value) {
		if($value['allowprofilelink'] && $value['profilelink']) {
			$guidelist[] = $value;
		}
		if(app_ckprivacy($value['privacy']) && $value['myml']) {
			$value['appurl'] = 'userapp.php?id='.$value['appid'];
			if($value['narrow']) {
				$narrowlist[] = $value;
			} else {
				$widelist[] = $value;
			}
		}
	}
}

//ￊﾵￃ￻
realname_get();

//feed
foreach ($feedlist as $key => $value) {
	$feedlist[$key] = mkfeed($value);
}

//ﾸ￼￐ￂﾺￃￓ￑￈￈ﾶ￈
if(!$space['self'] && $_SGLOBAL['supe_uid']) {
	include_once(S_ROOT.'./source/function_cp.php');
	addfriendnum($space['uid'], $space['username']);
}

@include_once(S_ROOT.'./data/data_profilefield.php');
$fields = empty($_SGLOBAL['profilefield'])?array():$_SGLOBAL['profilefield'];
	
//ﾸ￼ﾶ￠ￗￊ￁ￏ
$base_farr = $contact_farr = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]'");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$v_friend = ckfriend($value['uid'], $value['friend']);
	if($value['type'] == 'base' || $value['type'] == 'contact') {
		if(!$v_friend) $space[$value['subtype']] = '';
	} else {
		if($v_friend) $space[$value['type']][] = $value;
	}
}
//ﾻ￹ﾱﾾￗￊ￁ￏￊￇﾷ￱ￓ￐
$space['profile_base'] = 0;
foreach (array('sex','birthday','blood','marry','residecity','birthcity', 'signature') as $value) {
	if($space[$value]) $space['profile_base'] = 1;
}
foreach ($fields as $fieldid => $value) {
	if($space["field_$fieldid"] && empty($value['invisible'])) $space['profile_base'] = 1;
}
//￁ﾪￏﾵￗￊ￁ￏ
$space['profile_contact'] = 0;
foreach (array('mobile','qq','msn') as $value) {
	if($space[$value]) $space['profile_contact'] = 1;
}
	
//ﾻ�ﾷￖ
$space['star'] = getstar($space['experience']);	

//￈ﾥﾵ￴ﾹ￣ﾸ￦
$_SGLOBAL['ad'] = array();

$_GET['view'] = 'me';

$_TPL['css'] = 'space';

$dept = isDepartment($space['uid']);

$ntags = getntags($space[uid],'index',0);

include_once template("space_index");

//ﾾﾺﾼￛￅￅￃ￻
function show_credit() {
	global $_SGLOBAL, $space;
	$showcredit = getcount('show', array('uid'=>$space['uid']), 'credit');
	if($showcredit>0) {
		if($showcredit == 1) {
			//ￏￂﾰ￱ￍﾨￖﾪ
			notification_add($space['uid'], 'show', cplang('note_show_out'));
		}
		$_SGLOBAL['db']->query("UPDATE ".tname('show')." SET credit=credit-1 WHERE uid='$space[uid]' AND credit>0");
	}
}
?>
