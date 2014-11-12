<?php
/********************************************
此文件用于对公共主页的类别与显示位置进行管理。
创建:lv
时间:2012-07-22

修改:Xuxing@ihome
时间:2012-08-29
*************************************************/

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('managepublic')) {
	cpmessage('no_authority_management_operation');
}

include_once(S_ROOT.'./uc_client/client.php');
include_once(S_ROOT.'./data/data_usergroup.php');
@include_once(S_ROOT.'./data/data_profilefield.php');

$op = $_GET['op'] ? trim($_GET['op']) : '';
$PublicType = $_GET['type'] ? trim($_GET['type']) : 0;

$actives = array($_GET['type'] => ' class="active"');

if(!isset($_GET['type'])) {
	$actives = array('0' => ' class="active"');
} else {
	$mpurl .= '&type='.$_GET['type'];
}

$PublicList = array();//存放公共主页

if($op==''){
	//根据公共主页的类别进行数据库查询。1为学院、2为部处、3为名人、4为学生组织、5为兴趣社团、6为学生党组织、7为活动主页、8为品牌主页、20为班级主页、100为航路研语、默认0为其他；
	
	$query = $_SGLOBAL['db']->query("SELECT uid,username,name,pptype,ppnum FROM ".tname('space')." WHERE groupid=3 AND pptype=".$PublicType." ORDER BY ppnum asc");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {	
		if($value['name']=='')$value['name']=$value['username'];
		$PublicList[] = $value;
	}
}elseif($op=='save'){
	$PublicId = $_POST['pid'] ? trim($_POST['pid']) : 0;
	$NewType = $_POST['type'] ? trim($_POST['type']) : 0;
	$PublicNum = $_POST['num'] ? trim($_POST['num']) : 0;
	
	$arr = array(
		'pptype'=>$NewType,
		'ppnum'=>$PublicNum
	);

	updatetable('space', $arr, array('uid'=>$PublicId));// 更新审批状态
	cpmessage("do_success", "admincp.php?ac=publictype&type=$PublicType", 1);//跳转

}

include_once template("admin/tpl/publictype");


?>