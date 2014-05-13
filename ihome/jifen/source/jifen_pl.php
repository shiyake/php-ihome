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
$lpid = intval($_POST['id']);

if(empty($content)){
	showmessage("评论内容不能为空"); // 评论内容不能为空
}
if(empty($lpid)){
	showmessage("评论礼品不能为空"); 
}

$arr = array(
	"uid" => $_SGLOBAL[supe_uid],
	"username" => $_SGLOBAL[supe_username],
	"lpid" => $lpid,
	"score" => $score,
	"content" => getstr($content, '', 1, 1, 1),
	"time" => time()
);
$id = inserttable('jifen_pl', $arr, 1);   //插入数据

$query = $_SGLOBAL['db']->query("SELECT COUNT(*) as allnums,sum(score) as scores FROM ".tname('jifen_pl')." s where lpid=".$lpid);
$tmplist = $_SGLOBAL['db']->fetch_array($query);
$tmpscore = floor($tmplist[scores]/$tmplist[allnums]);


$_SGLOBAL['db']->query('UPDATE '.tname('jifen_lp').' SET modders='.$tmplist[allnums].',score='.$tmpscore.' WHERE id='.$lpid);  //更新评分数


//发全站feed
$uid = $_SGLOBAL['supe_uid'];
realname_set($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
realname_get();


include_once(S_ROOT.'./source/function_cp.php');
$avatar = ckavatar($uid) ? avatar($uid, 'middle',true) : UC_API.'/images/noavatar_middle.gif';
$summay = getstr($content, 150, 1, 1, 0, 0, -1);
feed_add(
	'thread',
	'{username} 对礼品 {lpname} 进行评分',
	array(
		'username' => "<a href=\"space.php?uid=$uid\">{$_SN[$uid]}</a>",
		'lpname' =>"<a href=\"jifen.php?ac=show&id={$lpid}\">{$_POST[name]}</a>"),
	'{summay}',
	array(
		'summay' =>$summay)
);		


showmessage("do_success", $_POST['refer'], 2);
?>