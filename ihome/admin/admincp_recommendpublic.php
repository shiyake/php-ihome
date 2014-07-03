<?php
if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
//1为学院、2为部处、3为名人、4为学生组织、5为兴趣社团、6为学生党组织、7为活动主页、8为品牌主页、20为班级主页、100为航路研语、默认0为其他


if($_GET['op']=='query')	{
	$query_str = $_POST['query'];
	$sql="SELECT * FROM ".tname("space").' WHERE uid="'.$query_str.'" or name like "%'.$query_str.'%" and groupid=3';

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("space").' WHERE uid="'.$query_str.'" or name like "%'.$query_str.'%" and groupid=3');

	$query_value = array();
	while($res = $_SGLOBAL['db']->fetch_array($query))	{
		$query_value[] = $res;
	}

}
if($_GET['op']=='add')	{
	$add_item = $_POST['uid'];
	$name = $_POST['username'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("rec_public")." WHERE uid=".$add_item);
	if($_SGLOBAL['db']->fetch_array($query))	{
		echo "<script>alert('该公共主页已经存在推荐列表，请不要重复添加');</script>";
	}
	else {
		$arr = array("id"=>"0","uid"=>$add_item,"username"=>$name,"addtime"=>time());
		inserttable("rec_public",$arr);
	}

}
if($_GET['op']=='delete')	{
	$uid = $_POST['uid'];
	$sql = "SELECT * FROM ".tname("rec_public")." WHERE uid=".$uid;

	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("rec_public")." WHERE uid=".$uid);
	if($_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['db'] -> query("DELETE FROM ".tname("rec_public")." WHERE uid=".$uid);
	}
	else {
		echo "<script>alert('不允许的操作');</script>";
	}

}
if($_GET['op']=='edit')	{
	$uid = $_POST['uid'];

	$edit_input = $_POST['edit_input'];
	$sql = "SELECT * FROM ".tname("rec_public")." WHERE uid=".$uid;

	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("rec_public")." WHERE uid=".$uid);
	
	if($res = $_SGLOBAL['db']->fetch_array($query))	{
		$sql = "UPDATE ".tname("rec_public")." SET id=".$edit_input." WHERE uid=".$uid;
	
		$_SGLOBAL['db'] -> query("UPDATE ".tname("rec_public")." SET id=".$edit_input." WHERE uid=".$uid);
		
	}
}
$name_map = array("1"=>"学院","2"=>"部处","3"=>"名人","4"=>"学生组织","5"=>"兴趣社团","6"=>"学生党组织","7"=>"活动主页","8"=>"品牌主页","20"=>"班级主页","100"=>"航路研语","0"=>"其他");

$public_uid = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("rec_public")." as a left join ".tname("space")." as b on a.uid=b.uid order by id desc");
while($value = $_SGLOBAL['db']->fetch_array($query))	{
	
	if(empty($value['pptype']))	{
		$value['pptype']="其他";
	}
	else {
		$value['pptype']=$name_map[$value['pptype']];
	}
	$public_uid[] = $value;
}

?>
