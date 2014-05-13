<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}



//是否公开
if(empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}

if(empty($_SGLOBAL[supe_uid])){
	showmessage("对不起，你还没有登录"); 
}

$credit = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT credit FROM ".tname('space')." s WHERE uid=".$_SGLOBAL[supe_uid]), 0);//查询当前用户的可用积分

$lpid = $_GET[id]?$_GET[id]:$_POST[lpid];

$query = $_SGLOBAL['db']->query("SELECT s.*,c.total as ctotal FROM ".tname('jifen_lp')." s LEFT JOIN ".tname('jifen_cj')." c ON s.id=c.lpid  WHERE s.id='$lpid'");
$thevalue = $_SGLOBAL['db']->fetch_array($query);
if($thevalue['pic']){
	$thevalue['pic'] = "jifen/uploads/image/".$thevalue['id'].".jpg";
} else {
	$thevalue['pic'] = "jifen/images/default.jpg";
}
if($credit < $thevalue['price']){
	showmessage("对不起，你的积分不够"); 
}

if(($thevalue['total'] - $thevalue['ctotal'] - $thevalue['nums']) <1){
	showmessage("对不起，此礼品已兑完"); 
}

if($thevalue['sdate'] && $thevalue['sdate'] > time()){
	showmessage("对不起，此礼品还未开始兑换"); 
}

if($thevalue['edate'] && $thevalue['edate'] < time()){
	showmessage("对不起，此礼品已结束兑换"); 
}

if(!$thevalue['flag']){
	$num = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT count(*) FROM ".tname('jifen_dhlog')." s WHERE uid=".$_SGLOBAL[supe_uid] ." and lpid=".$lpid), 0);//查询当前用户兑换此礼品数
	if($num){
		showmessage("对不起，此礼品只能兑换一次"); 
	}
}

$thevalue['sdate'] = $thevalue['sdate']?'<b>开始时间：</b>'.(date('Y-m-d H:i:s',$thevalue['sdate'])).'<br />':'';
$thevalue['edate'] = $thevalue['edate']?'<b>结束时间：</b>'.(date('Y-m-d H:i:s',$thevalue['edate'])).'<br />':'<font color="#ff3300"><b>兑完即止</b></font><br />';
$summay = getstr($thevalue['des'], 250, 1, 1, 0, 0, -1);

//寄送信息列表
$jslist = array();
$query = $_SGLOBAL['db']->query("SELECT name,tel,address FROM ".tname('jifen_dhlog')." WHERE uid=".$_SGLOBAL[supe_uid]." group by name,tel,address");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$jslist[] = $value;
}
$query = $_SGLOBAL['db']->query("SELECT name,tel,address FROM ".tname('jifen_cjlog')." WHERE uid=".$_SGLOBAL[supe_uid]." group  by name,tel,address");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$jslist[] = $value;
}
//$jslist = array_unique($jslist);
//print_r($jslist);


if($_POST){
	if(!$_POST['realname'] || !$_POST['tel']){
		showmessage("信息填写有误"); 
	}
	$arr = array(
		"uid" => $_SGLOBAL[supe_uid],
		"username" => $_SGLOBAL[supe_username],
		"lpid" => $lpid,
		"giftname" => $thevalue[name],
		"time" => time(),
		"address" => strip_tags($_POST['address']),
		"tel" => strip_tags($_POST['tel']),
		"name" => strip_tags($_POST['realname'])
	);
	$id = inserttable('jifen_dhlog', $arr, 1);   //插入数据
	
	$_SGLOBAL['db']->query('UPDATE '.tname('jifen_lp').' SET total=total-1,nums=nums+1 WHERE id='.$lpid);  //更新礼品信息
	
	$_SGLOBAL['db']->query('UPDATE '.tname('space').' SET credit=credit-'.$thevalue['price'].' WHERE uid='.$_SGLOBAL[supe_uid]);  //更新积分信息
	
	
	//发全站feed
	$uid = $_SGLOBAL['supe_uid'];
	realname_set($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
	realname_get();
	
	
	include_once(S_ROOT.'./source/function_cp.php');
	$avatar = ckavatar($uid) ? avatar($uid, 'middle',true) : UC_API.'/images/noavatar_middle.gif';
	$summay = getstr($thevalue['des'], 150, 1, 1, 0, 0, -1);
	
	
	if($thevalue['pic']) {
		$thevalue['pic'] = "jifen/uploads/image/".$thevalue['id'].".jpg";
	} else {
		$thevalue['pic'] = "jifen/images/default.jpg";
	}
				
	feed_add(
		'share',
		'{username}兑换了【{lpname}】',
		array(
			'username' => "<a href=\"space.php?uid=$uid\">{$_SN[$uid]}</a>",
			'lpname' =>"<a href=\"jifen.php?ac=show&id={$lpid}\">{$thevalue[name]}</a>"),
		'{summay}',
		array(
			'summay' =>$summay),
		'',
		array($thevalue['pic']),
		array('jifen.php?ac=show&id='.$lpid)
	);	
	
	showmessage("兑换成功", "jifen.php?ac=show&id=".$lpid, 2);
}else{
	include_once(S_ROOT . "jifen/source/jifen_info.php");
}	


?>