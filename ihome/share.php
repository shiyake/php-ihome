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

//
if($_SGLOBAL['supe_uid']) {
	//已登录，直接跳转个人首页
	//showmessage('enter_the_space', 'space.php?do=home', 0);
    $shareLogin = true;
    $userquery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid=".$_SGLOBAL['supe_uid']);
    $valuequery = $_SGLOBAL['db']->fetch_array($userquery);
    $username_share = $valuequery['name'];

    //@friend

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
}else {
    $shareLogin = false;
}

$shareUrl = empty($_GET['href']) ? '' : rawurldecode($_GET['href']);
$shareTitle = empty($_GET['title']) ? '' : rawurldecode($_GET['title']);
$shareImage = empty($_GET['image']) ? '' : rawurldecode($_GET['image']);

include_once template("share");
