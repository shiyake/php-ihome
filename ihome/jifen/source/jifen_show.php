<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}


if(empty($_SCONFIG['networkpublic'])) {
	checklogin();
}

include_once(S_ROOT . "jifen/source/jifen_menu.php");
include_once(S_ROOT.'./source/function_bbcode.php');

//取得单个数据
$thevalue = array();
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
if($_GET['id']) {
	$_SGLOBAL['db']->query('UPDATE '.tname('jifen_lp').' SET views=views+1 WHERE id='.$_GET['id']);
	$query = $_SGLOBAL['db']->query("SELECT s.*,b.name as bname,b.id as bid,c.total as ctotal,c.getnums FROM ".tname('jifen_lp')." s LEFT JOIN ".tname('jifen_cj')." c ON s.id=c.lpid,".tname('jifen_lb')." b WHERE s.id='$_GET[id]' and s.lbid=b.id");
	$thevalue = $_SGLOBAL['db']->fetch_array($query);
	if($thevalue['pic']){
		$thevalue['pic'] = "jifen/uploads/image/".$thevalue['id'].".jpg";
	} else {
		$thevalue['pic'] = "jifen/images/default.jpg";
	}


	$thevalue['flag'] = $thevalue['flag']?'<font color="ff3300"><b>可多次兑换</b></font>':'<font color="ff3300"><b>只能兑换一次</b></font>';
	$thevalue['sdate'] = $thevalue['sdate']?'<b>开始时间：</b>'.(date('Y-m-d H:i:s',$thevalue['sdate'])).'&nbsp;&nbsp;':'';
	$thevalue['edate'] = $thevalue['edate']?'<b>结束时间：</b>'.(date('Y-m-d H:i:s',$thevalue['edate'])):'<font color="#ff3300"><b>兑完即止</b></font>';
	$thevalue['dhs']  = $thevalue['total'] - $thevalue['ctotal'] ;
	$thevalue['cjs'] = $thevalue['ctotal'] - $thevalue['getnums'];
	$str1 = '';
	$str2 = '';
	$str = '';
	if($thevalue['ctotal'] - $thevalue['getnums'] > 0){
		$str1 = '&nbsp;抽奖&nbsp;';
	}
	if($thevalue['total'] - $thevalue['ctotal']  > 0){
		$str2 = '&nbsp;兑换&nbsp;';
	}
	if(!$str1 && !$str2){
		$str = '<font color="red">已兑完</font>';
	}else{
		$str = $str1.$str2;
	}
	$thevalue['str1'] = $str1;
	$thevalue['str2'] = $str2;
	$thevalue['str'] = $str;
}else{
	showmessage('参数错误');
}

//评论列表
$pllist = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('jifen_pl')." where lpid=".$_GET['id']." ORDER BY id desc;");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$uid =$value[uid];
	realname_set($value[uid], $value[username]);
	realname_get();
	$value[realname] = $_SN[$uid];
	$value['content'] = bbcode($value['content']);
	$pllist[$value['id']] = $value;
}


$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
$wheretime = $_SGLOBAL['timestamp']-3600*24*30;

$_TPL['css'] = 'network';

include_once(template( "jifen/template/jifen_show" ));

?>