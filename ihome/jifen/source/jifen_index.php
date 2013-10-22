<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//是否公开
if(empty($_SCONFIG['networkpublic'])) {
	checklogin();//需要登录
}

include_once(S_ROOT . "jifen/source/jifen_menu.php");

//礼品列表
$lplist = array();
$lbid = $_GET['lbid']?$_GET['lbid']:0;

$wheresql = ' s.id > 0';
if($lbid){
	$wheresql .= " and lbid = '".$lbid."'";
}

//$ordersql = ' order by s.id desc';
$ordersql = ' order by s.price asc';


if($_GET['type'] == 'cj'){   //判断是否为抽奖
	$mpurl = 'jifen.php?type='.$_GET['type'];
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_lp')." s,".tname('jifen_cj')." c WHERE $wheresql and s.id=c.lpid"), 0);
}else{
	$mpurl = 'jifen.php?lbid='.$lbid;
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('jifen_lp')." s WHERE $wheresql"), 0);
}

//显示分页
$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
if(!in_array($perpage, array(10,20,50))) $perpage = 10;
$mpurl .= '&perpage='.$perpage;
$perpages = array($perpage => ' selected');

$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
if($count) {
	if($_GET['type'] == 'cj'){//判断是否为抽奖
		$query = $_SGLOBAL['db']->query("SELECT s.*,c.total as ctotal,c.getnums FROM ".tname('jifen_lp')." s,".tname('jifen_cj')." c WHERE $wheresql and s.id=c.lpid $ordersql LIMIT $start,$perpage");
	}else{
		$query = $_SGLOBAL['db']->query("SELECT s.*,c.total as ctotal,c.getnums FROM ".tname('jifen_lp')." s left join ".tname('jifen_cj')." c ON s.id=c.lpid WHERE $wheresql $ordersql LIMIT $start,$perpage");
	}
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['pic']) {
			$value['pic'] = "jifen/uploads/image/".$value['id'].".jpg";
		} else {
			$value['pic'] = "jifen/images/default.jpg";
		}
		$value['des'] = $value['des']?$value['des']:'暂时没有相关的说明';
		$value['des'] = getstr(strip_tags(html_entity_decode($value['des'])), 120, 0, 0, 0, 0, -1);
		$value['leave']  = $value['total'] - $value['ctotal'] - $value['nums'];
		$str1 = '';
		$str2 = '';
		$str = '';
		if($value['ctotal'] - $value['getnums'] > 0){
			$str1 = '&nbsp;抽奖&nbsp;';
		}
		if($value['total'] - $value['ctotal'] - $value['nums'] > 0){
			$str2 = '&nbsp;兑换&nbsp;';
		}
		if(!$str1 && !$str2){
			$str = '<font color="red">已兑完</font>';
		}else{
			$str = $str1.$str2;
		}
		$value['str'] = $str;
		$lplist[] = $value;
	}
	$multi = multi($count, $perpage, $page, $mpurl);
}



//最后登录名
$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
$wheretime = $_SGLOBAL['timestamp']-3600*24*30;

$_TPL['css'] = 'network';

include_once( template( "jifen/template/jifen_index" ) );

?>