<?php

/******************************************************************************




			郑重声明:不要在这里加载好友推荐,已经在space_feed.php添加了!



			by Ancon 2012-8-3 2:02:48






******************************************************************************/

include_once('./common.php');
include_once(S_ROOT.'./data/data_magic.php');


//是否关闭站点
checkclose();


/******************************************************************************
 *
update_usertype(246);
 *
 * ***************************************************************************/
//处理rewrite
if($_SCONFIG['allowrewrite'] && isset($_GET['rewrite'])) {
	$rws = explode('-', $_GET['rewrite']);
	if($rw_uid = intval($rws[0])) {
		$_GET['uid'] = $rw_uid;
	} else {
		$_GET['do'] = $rws[0];
	}
	if(isset($rws[1])) {
		$rw_count = count($rws);
		for ($rw_i=1; $rw_i<$rw_count; $rw_i=$rw_i+2) {
			$_GET[$rws[$rw_i]] = empty($rws[$rw_i+1])?'':$rws[$rw_i+1];
		}
	}
	unset($_GET['rewrite']);
}

//允许动作
$dos = array('feed', 'doing', 'mood', 'blog', 'album', 'video', 'thread', 'mtag', 'friend', 'wall', 'tag', 'notice', 'share', 'topic', 'home', 'pm', 'event', 'poll', 'top', 'info', 'videophoto','public','arrangement', 'search','recommendpublic', 'recommendation','feeddetail','complain','complain_item','calendar');

//获取变量
$isinvite = 0;
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);
$username = empty($_GET['username'])?'':$_GET['username'];
$domain = empty($_GET['domain'])?'':$_GET['domain'];
$do = (!empty($_GET['do']) && in_array($_GET['do'], $dos))?$_GET['do']:'index';
$admissionid = empty($_GET['admid'])?0:intval($_GET['admid']);
$collegeid = empty($_GET['collid'])?0:$_GET['collid'];
if($admissionid){
	$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('baseprofile')." WHERE admissionid=$admissionid and uid>0 limit 1");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value['uid']){
		$uid = $value['uid'];
	}
}

if($collegeid){
	//showmessage("SELECT uid FROM ".tname('baseprofile')." WHERE collegeid=$collegeid and uid>0 limit 1");
	$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('baseprofile')." WHERE collegeid='$collegeid' and uid>0 limit 1");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value['uid']){
		$uid = $value['uid'];
	}
}

if($do == 'home') {
	$do = 'feed';
} elseif ($do == 'index') {
	//邀请好友
	$invite = empty($_GET['invite'])?'':$_GET['invite'];
	$code = empty($_GET['code'])?'':$_GET['code'];
	$reward = getreward('invitecode', 0);
	if($code && !$reward['credit']) {
		$isinvite = -1;
	} elseif($invite) {
		$isinvite = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT id FROM ".tname('invite')." WHERE uid='$uid' AND code='$invite' AND fuid='0'"), 0);
	}
}

//处理@功能，获取好友及公共主页

$friendurl_w = S_ROOT."./data/assets/data_".$_SGLOBAL[supe_uid].".json";
$friendurl_r = "data/assets/data_".$_SGLOBAL[supe_uid].".json";
$FileModTime = @filemtime($friendurl_w);
$CurrentTime = time();
if($CurrentTime - $FileModTime > 3600){
	$atfriends = array();
	$count = 0;

	$result = $_SGLOBAL['db']->query("select friend from ".tname('spacefield')." where uid='$_SGLOBAL[supe_uid]'");
	$rs0 = $_SGLOBAL['db']->fetch_array($result);
	$rs1 = explode(",",$rs0['friend']);
	$length = count($rs1);
	for($i=0; $i<$length; $i++) {
		$result2 = $_SGLOBAL['db']->query("select name,username from ".tname('space')." where uid='$rs1[$i]'");
		$rs2 = $_SGLOBAL['db']->fetch_array($result2);	
		if(empty($rs2['name'])) $rs2['name'] = $rs2['username'];
		$result3 = $_SGLOBAL['db']->query("select type from ".tname('spaceinfo')." where uid='$rs1[$i]'");
		$rs3 = $_SGLOBAL['db']->fetch_array($result3);

		$atfriends[$count++] = array('uid'=>$rs1[$i],'namequery'=>$rs2['name'].' '.Pinyin($rs2['name'],1).' '.$rs1[$i],'name'=>$rs2['name'],'avatar'=>'');

	}
	//获取公共主页
	$query = $_SGLOBAL['db']->query("select uid,name,username from ".tname('space')." where groupid=3");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		if(empty($value['name'])) $value['name'] = $value['username'];
		$atfriends[$count++] = array('uid'=>$value['uid'],'namequery'=>$value['name'].' '.Pinyin($value['name'],1).' '.$value['uid'],'name'=>$value['name'],'avatar'=>'');
	}

    $query = $_SGLOBAL['db']->query("select uid,name,username from ".tname("space")." as a, ".tname("powerlevel")." as b where b.dept_uid = a.uid and b.isdept = 1 "); 
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		if(empty($value['name'])) $value['name'] = $value['username'];
		$atfriends[$count++] = array('uid'=>$value['uid'],'namequery'=>$value['name'].' '.Pinyin($value['name'],1).' '.$value['uid'],'name'=>$value['name'],'avatar'=>'');
	}


	$friends = json_encode($atfriends);
	$friends = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $friends);
	$f = fopen($friendurl_w,"w");
	fwrite($f,$friends);
	fclose($f);
}
$querygroupid = $_SGLOBAL['db']->query("SELECT groupid,pptype,caninvite FROM ".tname('space')." WHERE uid=".$_SGLOBAL['supe_uid']);
$groupid = $_SGLOBAL['db']->fetch_array($querygroupid);

//include_once("space_status_feed.html");
if($_SGLOBAL['supe_uid']){	
	$querygroupid = $_SGLOBAL['db']->query("SELECT pptype,caninvite FROM ".tname('space')." WHERE uid=".$_SGLOBAL['supe_uid']);
	$valuegroupid = $_SGLOBAL['db']->fetch_array($querygroupid);
	
	if(isDepartment($_SGLOBAL['supe_uid'] ,0)||$valuegroupid['pptype']==1 ||$valuegroupid['pptype']==2 ||$valuegroupid['caninvite']==1)
	{//显示邀请功能
		$_SCONFIG['closeinvite'] = 1;
	}
	else
	{//不显示邀请功能
		$_SCONFIG['closeinvite'] = 0;
	}
}

//exit;

//是否公开
if(empty($isinvite) && empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}

//showmessage($uid);

//获取空间

if($uid) {
	$space = getspace($uid, 'uid');
} elseif ($username) {
	$space = getspace($username, 'username');
} elseif ($domain) {
	$space = getspace($domain, 'domain');
} elseif ($_SGLOBAL['supe_uid']) {
	$space = getspace($_SGLOBAL['supe_uid'], 'uid');
}
getmember(); //获取当前用户信息by xuxing 2012-5-23

if($space) {

	//验证空间是否被锁定
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	//验证空间是否被锁定
	if($space['flag'] == -2) {
		include_once template("space_check_bot");
		exit();
	}
	$query=$_SGLOBAL['db']->query('SELECT groupid from '.tname('space').' WHERE uid='.$_SGLOBAL['supe_uid']);
	if($res=$_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['mygroupid']=$res['groupid'];
	}
	//隐私检查
	if(empty($isinvite) || ($isinvite<0 && $code != space_key($space, $_GET['app']))) {
		//游客
		if(empty($_SCONFIG['networkpublic'])) {
			checklogin();//需要登录 
		}
		////////////////////////是否为粉丝，是则按好友处理///////////////////////////////////////////
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid=$uid");
		$value = $_SGLOBAL['db']->fetch_array($query);
		$aud=explode(",",$value['aud']); 
		$flag=in_array($_SGLOBAL['supe_uid'], $aud);
		if($_SGLOBAL['mygroupid']==3)	
			$flag=1;
		/////////////////////////////////////////////////////////////////////////////////
		if(!ckprivacy($do)&&!$flag) {
			include template('space_privacy');
			exit();
		}
	}

	//别人只查看自己
	if(!$space['self']) {
		$_GET['view'] = 'me';
	} else if(empty($space['feedfriend']) && empty($_GET['view'])) {
		$_GET['view'] = 'all';
	}
	if ($_GET['view'] == 'me') {
		$space['feedfriend'] = '';
	}

} elseif($uid) {

	//判断当前用户是否删除
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacelog')." WHERE uid='$uid' AND flag='-1'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('the_space_has_been_closed');
	}

	//未开通空间
	include_once(S_ROOT.'./uc_client/client.php');
	if($user = uc_get_user($uid, 1)) {
		$space = array('uid' => $user[0], 'username' => $user[1], 'dateline'=>$_SGLOBAL['timestamp'], 'friends'=>array());
		$_SN[$space['uid']] = $space['username'];
	}
}

//游客
if(empty($space)) {
	$space = array('uid'=>0, 'username'=>'guest', 'self'=>1);
	if($do == 'index') $do = 'feed';
}

//更新活动session
if($_SGLOBAL['supe_uid']) {

	//getmember(); //获取当前用户信息
	if($_SGLOBAL['member']['flag'] == -1) {
		showmessage('space_has_been_locked');
	}

	//禁止访问
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}

	updatetable('session', array('lastactivity' => $_SGLOBAL['timestamp']), array('uid'=>$_SGLOBAL['supe_uid']));
}

//计划任务
if(!empty($_SCONFIG['cronnextrun']) && $_SCONFIG['cronnextrun'] <= $_SGLOBAL['timestamp']) {
	include_once S_ROOT.'./source/function_cron.php';
	runcron();
}

$_SGLOBAL['space_theme'] = $space['theme'];
$_SGLOBAL['space_css'] = $space['css'];
if ($_SGLOBAL['space_theme'] == 'diy') {
	$_SGLOBAL['space_diy'] = array(
		'bg_enabled' => $space['diy_bg_enabled'],
		'bg' => $space['diy_bg'],
		'bg_style' => $space['diy_bg_style'],
		'diy_colors' => $space['diy_colors'],
		'diy_alpha' => $space['diy_alpha'],
    );
}
$_SGLOBAL['index_bg']=$space['index_bg'];
$theme = empty($_GET['theme'])?'':preg_replace("/[^0-9a-z]/i", '', $_GET['theme']);
if($theme == 'uchomedefault') {
	$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = $_SGLOBAL['space_diy'] = '';
} elseif($theme) {
	$cssfile = S_ROOT.'./theme/'.$theme.'/style.css';
	if(file_exists($cssfile)) {
		$_SGLOBAL['space_theme'] = $theme;
		$_SGLOBAL['space_css'] = '';
		$_SGLOBAL['space_diy'] = '';
	}
} else {
	if(!$space['self'] && $_SGLOBAL['member']['nocss']) {
		$_SGLOBAL['space_theme'] = $_SGLOBAL['space_css'] = $_SGLOBAL['space_diy'] = '';
	}
}

//全局变量定义，判读是否是国外校友
//通过IP归属地，判断是否为从前的国外校友，并把信息录入到spaceforeign表中

$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']);
if($_SGLOBAL['db']->fetch_array($query))	{
	$_SGLOBAL['overseas'] = 'overseas' ;
	$q = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']." AND cer!=-1");
	if($qes=$_SGLOBAL['db']->fetch_array($q))	{
		$_SGLOBAL['cer'] = 2;
	
		$_SGLOBAL['sync'] = $qes['sync'];
		//showmessage($_SGLOBAL['sync']);
	}
	else {
	 	$_SGLOBAL['cer'] = 0;
	 	$_SGLOBAL['sync'] = 'no';
	}
}
else if(is_overseas())	{
	$query=$_SGLOBAL['db']-> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']);
	if(!$_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['overseas'] = 'overseas' ;
		$_SGLOBAL['cer'] = 0;
	}
}
else $_SGLOBAL['overseas'] = 'inland' ;	

//全局变量定义，判断是否再也不显示同步到群组

$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("space")." WHERE uid=".$_SGLOBAL['supe_uid']);
if($rows = $_SGLOBAL['db']->fetch_array($query))	{
	if ($rows['credit'] <= 3) {
		$_SGLOBAL['newbie'] = 1;
	} else {
		$_SGLOBAL['newbie'] = 0;
	}
	if($rows['overseas_tip']=='never')	{
		$_SGLOBAL['overseas_tip'] = 'never';
	}
	else $_SGLOBAL['overseas_tip'] = 'always';
}

$hasShortcut = TRUE;
$shortcuts = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_users')." JOIN ".tname('apps')." WHERE ".tname('apps_users').".shortcut=1 AND ".tname('apps_users').".uid=$_SGLOBAL[supe_uid] AND ".tname('apps').".id=".tname('apps_users').".appsid");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$shortcuts []= $value;
}
if (empty($shortcuts)) {
	$hasShortcut = FALSE;
}
//置顶
if($_POST['uid'] == $_SGLOBAL['supe_uid'] && $_GET['go_top'])	{
	$uid = $_POST['uid'];
	$go_top_id = $_GET['go_top'];
	$res = $_SGLOBAL['db'] -> query("SELECT max(top) FROM ".tname("feed")." WHERE uid=".$uid);
	$max_top = "";
	if($val = $_SGLOBAL['db']->fetch_array($res))	{
		$max_top = $val['max(top)'];
	}
	$sql = "UPDATE ".tname("feed")." SET `top` = '".($max_top+1)."' where `id` = '".$go_top_id."'";
	$res = $_SGLOBAL['db'] -> query($sql);
	echo $res;
	exit();
}

//处理
//parent
@include_once('./source/cp_parent_func.php');
global $_PARENT;
initStudent();
initParent();
initParentFlag();

if($_SGLOBAL['supe_isParent']){
	$_SGLOBAL['newbie'] = 0;
}
include_once(S_ROOT."./source/space_{$do}.php");

//echo Pinyin($friends,2);
?>
