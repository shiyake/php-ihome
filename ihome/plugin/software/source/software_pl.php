<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}


//是否公开
if(empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}


$content = $_POST['message'];
$score = intval($_POST['score']);
//$sid = intval($_POST['id']);
$sid = $_GET['sid'] = empty($_GET['sid'])?0:intval($_GET['sid']);

if(empty($content)){
	showmessage("评论内容不能为空"); // 评论内容不能为空
}
if(empty($sid)){
	showmessage("评论软件不能为空"); 
}

$arr = array(
	'uid' => $_SGLOBAL[supe_uid],
	'username' => $_SGLOBAL[supe_username],
	'sid' => $sid,
	'score' => $score,
	'content' => getstr($content, '', 1, 1, 1),
	'ip' => getonlineip(),
	'stamptime' => $_SGLOBAL[timestamp]
);
$id = inserttable('software_comment', $arr, 1);   //插入数据

$query = $_SGLOBAL['db']->query("SELECT COUNT(*) AS allnums, SUM(score) AS scores FROM ".tname('software_comment')." where sid=$sid");
$tmplist = $_SGLOBAL['db']->fetch_array($query);
$tmpscore = floor($tmplist[scores]/$tmplist[allnums]);


$_SGLOBAL['db']->query("UPDATE ".tname('software')." SET modders=$tmplist[allnums], score=$tmpscore WHERE id=$sid");  //更新评分数		


showmessage("do_success", $_POST['refer'], 2);
?>