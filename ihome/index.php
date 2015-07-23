<?php
include_once('./common.php');
//showmessage("test");
/*
include_once(S_ROOT.'function_judge.php');

$client_ip=$_SERVER["REMOTE_ADDR"];

//如果用户的Ip地址为内网，则跳转到统一认证平台
//////////////
if(judge_ip($client_ip))
{
	include_once(S_ROOT."do_cas_login.php");
}*/
/////////////////////////

/*
echo ($_SERVER[SCRIPT_NAME]);
echo "<br />";
echo ($_SERVER[QUERY_STRING]);
echo "<br />";
echo $_SERVER[REQUEST_URI];
echo "<br />";
print_r ($_SERVER[argv]);
echo "<br />";
exit(aa);
*/
//get loginbg style
try {
    $query_bg = $_SGLOBAL['db']->query("SELECT * FROM ".tname('loginbg').' where id=1');
    while($value_bg = $_SGLOBAL['db']->fetch_array($query_bg)){
        $loginbg = $value_bg;
        $col1 = hexdec(substr($loginbg['box_bg_col'],0,2));
        $col2 = hexdec(substr($loginbg['box_bg_col'],2,2));
        $col3 = hexdec(substr($loginbg['box_bg_col'],4,2));
    }
} catch(Exception $e){
}

if(is_numeric($_SERVER['QUERY_STRING'])) {
	/*started by 0, length == 6 or length==8 or length==9 is collegeid. by xuxing 2013-7-30*/
	if(strlen($_SERVER['QUERY_STRING'])==8){
		showmessage('enter_the_space', "space.php?collid=$_SERVER[QUERY_STRING]", 0);
	}elseif(substr($_SERVER['QUERY_STRING'], 0, 1)=='0'){
		showmessage('enter_the_space', "space.php?collid=$_SERVER[QUERY_STRING]", 0);
	}else{
		showmessage('enter_the_space', "space.php?uid=$_SERVER[QUERY_STRING]", 0);
	}
}elseif((strlen($_SERVER['QUERY_STRING'])==6) or (strlen($_SERVER['QUERY_STRING'])==9)){
	showmessage('enter_the_space', "space.php?collid=$_SERVER[QUERY_STRING]", 0);
}


//二级域名
if(!isset($_GET['do']) && $_SCONFIG['allowdomain']) {
	$hostarr = explode('.', $_SERVER['HTTP_HOST']);
	$domainrootarr = explode('.', $_SCONFIG['domainroot']);
	if(count($hostarr) > 2 && count($hostarr) > count($domainrootarr) && $hostarr[0] != 'www' && !isholddomain($hostarr[0])) {
		showmessage('enter_the_space', $_SCONFIG['siteallurl'].'space.php?domain='.$hostarr[0], 0);
	}
}
//
if($_SGLOBAL['supe_uid']) {
	//已登录，直接跳转个人首页
	showmessage('enter_the_space', 'space.php?do=home', 0);
}

if(empty($_SCONFIG['networkpublic'])) {
	$cachefile = S_ROOT.'./data/cache_index.txt';
	$cachetime = @filemtime($cachefile);
	
	$spacelist = array();
	$count = 0;
	if($_SGLOBAL['timestamp'] - $cachetime > 900) {
		//20位热门头像用户
		$query = $_SGLOBAL['db']->query("SELECT s.*, sf.resideprovince, sf.residecity
			FROM ".tname('space')." s
			LEFT JOIN ".tname('spacefield')." sf ON sf.uid=s.uid 
			WHERE (s.uid NOT IN (1,2,3,144) and s.groupid<>3) or (s.groupid=3 and pptype=3)  
			ORDER BY s.friendnum DESC LIMIT 0,29");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(ckavatar($value[uid])!= 0){
				$count++;
				$spacelist[] = $value;
				if($count>=20){
					break;
				}
			}
		}
		swritefile($cachefile, serialize($spacelist));
	} else {
		$spacelist = unserialize(sreadfile($cachefile));
	}
	
	//大家的话题
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." ORDER BY dateline DESC LIMIT 0,30");
	while ($value = $_SGLOBAL['db']->fetch_array($query)){
		$topic[] = $value;
	}

	//应用
	$myappcount = 0;
	$myapplist = array();
	if($_SCONFIG['my_status']) {
		$myappcount = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('myapp')." WHERE flag>='0'"), 0);
		if($myappcount) {
			$query = $_SGLOBAL['db']->query("SELECT appid,appname FROM ".tname('myapp')." WHERE flag>=0 ORDER BY flag DESC, displayorder LIMIT 0,7");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$myapplist[] = $value;
			}
		}
	}
		
	//实名
	foreach ($spacelist as $key => $value) {
		realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
	}
	realname_get();

    $login_fail_times = $_COOKIE['login_fail_times'];
	
	$_TPL['css'] = 'network';
	
	include_once template("index");
	
} else {
	include_once(S_ROOT.'./source/network.php');
}


