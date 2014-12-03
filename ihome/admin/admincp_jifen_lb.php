<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//权限
if(!checkperm('managejifen_lb')) {
	cpmessage('no_authority_management_operation');
}

//取得单个数据
$thevalue = array();
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
if($_GET['id']) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('jifen_lb')." WHERE id='$_GET[id]'");
	$thevalue = $_SGLOBAL['db']->fetch_array($query);
	if(!$thevalue['pic']){
		$thevalue['pic'] = "jifen/images/default.gif";
	}
}
if(!empty($_GET['op']) && $_GET['op'] != 'add' && empty($thevalue)) {
	cpmessage('there_is_no_designated_users_columns');
}

if(submitcheck("jifen_lbsubmit")){// 创建/编辑礼品类别

	$arr = array(
		"name" => getstr($_POST['name'], 50, 1, 1, 1),
		"des" => getstr($_POST['des'], '', 1, 1, 1),
		"displayorder" => intval($_POST['displayorder']),
		"time" => time()
	);

	$query = $_SGLOBAL['db']->query('SELECT * FROM ' . tname('jifen_lb'). " WHERE name = '$arr[name]'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value && $_POST['id'] != $value['id']){
		cpmessage("礼品分类名称不能重复"); // 分类名称不能重复
	}
	
	if($_POST['id']){// 修改
		$id = intval($_POST['id']);
		updatetable('jifen_lb', $arr, array('id'=>$id));
	} else {
		$arr['id'] = 'null';
		$id = inserttable('jifen_lb', $arr, 1);
	}
	// 更新缓存
	include_once(S_ROOT . "source/function_cache.php");
	jifen_lb_cache();
	cpmessage("do_success", "admincp.php?ac=jifen_lb", 2);

} elseif(submitcheck("ordersubmit")) {// 排序

	if(is_array($_POST['displayorder'])){
		@include_once(S_ROOT."data/data_jifen_lb.php");
		foreach($_POST['displayorder'] as $id=>$neworder){
			$id = intval($id);
			$neworder = intval($neworder);
			if($_SGLOBAL['jifen_lb'][$id]['displayorder'] != $neworder) {
				updatetable("jifen_lb", array("displayorder"=>$neworder), array("id"=>$id));
			}
		}
		// 更新缓存
		include_once(S_ROOT . "source/function_cache.php");
		jifen_lb_cache();
		cpmessage("do_success", "admincp.php?ac=jifen_lb", 2);
	}
	
} elseif(submitcheck("deletesubmit")){// 删除

	if(! $_POST['id']){
		cpmessage("请至少正确选择一个要删除的礼品类别", "admincp.php?ac=jifen_lb", 2); //请至少正确选择一个要删除的礼品类别
	}
	if(! $_POST['newclassid']){
		cpmessage("请至少正确选择一个要合并的礼品类别", "admincp.php?ac=jifen_lb&id=$_POST[id]", 2); // 请至少正确选择一个要合并的礼品类别
	}

	$_POST['id '] = intval($_POST['id']);
	$_POST['newclassid'] = intval($_POST['newclassid']);

	// 检查合并到的分类是否存在
	$query = $_SGLOBAL['db']->query("SELECT id FROM " . tname("jifen_lb") . " WHERE id = '$_POST[id]'");
	if(! $_SGLOBAL['db']->fetch_array($query)){
		cpmessage("请至少正确选择一个要合并的礼品类别", "admincp.php?ac=jifen_lb&id=$_POST[id]", 2); // 请至少正确选择一个要合并的礼品类别
	}

	updatetable("jifen_lp", array("lbid"=>$_POST['newclassid']), array("lbid"=>$_POST['id']));
	$_SGLOBAL['db']->query("DELETE FROM " . tname("jifen_lb") . " WHERE id = '$_POST[id]'");

	// 更新缓存
	include_once(S_ROOT . "source/function_cache.php");
	jifen_lb_cache();
	cpmessage("do_success", "admincp.php?ac=jifen_lb", 2);
}

if("delete" == $_GET['op']) {// 删除礼品类别

	if(empty($thevalue)){
		cpmessage("there_is_no_designated_users_columns", "admincp?ac=jifen_lb", 2);
	}

	if (! @include_once(S_ROOT . "data/data_jifen_lb.php")) {
	include_once(S_ROOT . "source/function_cache.php");
		jifen_lb_cache();
	}
	$list = $_SGLOBAL['jifen_lb'];
	if(sizeof($list) == 1){// 最后一项不能删除
		cpmessage("have_no_jifen_lb", "admincp.php?ac=jifen_lb", 2); // 删除失败，请保留至少一个礼品类别
	}
	$list[$thevalue['id']] = null; // 移除删除项

} elseif("add" == $_GET['op']) {

	//$thevalue['pic'] = "jifen/images/default.gif";

} else {
	if (!@include_once(S_ROOT.'./data/data_jifen_lb.php')) {
		include_once(S_ROOT.'source/function_cache.php');
		jifen_lb_cache();
	}
	$list = $_SGLOBAL['jifen_lb'];
	
	$actives = array('view' => ' class="active"');
}

?>