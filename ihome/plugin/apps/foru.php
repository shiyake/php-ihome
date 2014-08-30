<?php if(!defined('iBUAA')) exit('Access Denied');

if($ac != 'foru') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}

$uid = $_SGLOBAL['supe_uid'];

//如果为公共主页
if($_SGLOBAL['member']['groupid'] == 3){
	header("Location:plugin.php?pluginid=apps&ac=mine");exit();
}


$usertype = $collegeid_len;
$wheresql = " WHERE applypass =1 AND ishidden=0";
// showmessage($collegeid_len);
if($collegeid_len == 8){
//for 本科生
	//echo "<script>alert('$username 本科生');</script>";
	$wheresql .= " AND usertype & 8";
}elseif($collegeid_len == 9){
//for 研究生
	//echo "<script>alert('$username 研究生');</script>";
	$wheresql .= " AND usertype & 4";
}elseif($collegeid_len == 5 || $collegeid_len == 6){
//for 教职工
	//echo "<script>alert('$username 教职工');</script>";
	$wheresql .= " AND usertype & 2";
}elseif($collegeid_len == 1){
//for 公共主页
	//echo "<script>alert('$username 公共主页');</script>";
	$wheresql .= "";
}else{
//for 校友
	//echo "<script>alert('$username 校友或其他');</script>";
	$wheresql .= " AND usertype & 1";
}


// $jiaoxue = array();
// $keyan = array();
// $caiwu = array();
// $renzi = array();
// $zichan = array();
// $shenghuo = array();
// $qita = array();

//所有应用
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql ORDER BY clicktime DESC");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$value['tuisong'] = ($value['score'] + $value['score_easy'] + $value['score_service'] + $value['score_speed']) * $value['modders'] + $value['usernumber'] + $value['promot'];
	switch($value['type']){
		case 1:
			$value['type'] = '教学类';
			break;
		case 2:
			$value['type'] = '科研类';
			break;
		case 3:
			$value['type'] = '财务类';
			break;
		case 4:
			$value['type'] = '人力资源类';
			break;
		case 5:
			$value['type'] = '资产类';
			break;
		case 6:
			$value['type'] = '生活服务类';
			break;
		case 7:
			$value['type'] = '其他';
			break;
		default:
			break;
	}
	$allapps[] = $value;
}


// $jiaoxue = array_sort($jiaoxue ,'tuisong');
// $keyan = array_sort($keyan ,'tuisong');
// $caiwu = array_sort($caiwu ,'tuisong');
// $renzi = array_sort($renzi ,'tuisong');
// $zichan = array_sort($zichan ,'tuisong');
// $shenghuo = array_sort($shenghuo ,'tuisong');
// $qita = array_sort($qita ,'tuisong');

$limit = 16;
$half = $limie/2;
$hot = array_slice(array_sort($allapps ,'clicktime'),0,$limit);
$popular = array_slice(array_sort($allapps ,'score'),0,$limit);
$promot = array_slice(array_sort($allapps ,'tuisong'),0,$limit);

$ads = array();
$count = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("ad4app")." WHERE state=1");
while($res = $_SGLOBAL['db']->fetch_array($query))	{
	$ads[] = $res;
	$count[] = 1;
}


//我常用的应用
// $appsids = '0';
// $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_users')." WHERE uid=$uid ORDER BY clicktime DESC LIMIT 12");
// while($value = $_SGLOBAL['db']->fetch_array($query)){
// 	$appsids .= ','.$value['appsid'];
// }
// $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." WHERE id IN (".$appsids.") AND applypass =1 AND ishidden=0 ORDER BY applytime ASC LIMIT 12");
// while($value = $_SGLOBAL['db']->fetch_array($query)) {
// 	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
// 	$myfavorite[] = $value;
// }

/*

//热门应用,使用次数最多
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$hot[] = $value;
}
//得分最高的应用
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql ORDER BY score DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$popular[] = $value;
}


//教学类
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=1 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$jiaoxue[] = $value;
}
//科研类
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=2 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$keyan[] = $value;
}
//财务类
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=3 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$caiwu[] = $value;
}
//人力资源类
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=4 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$renzi[] = $value;
}
//资产类
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=5 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$zichan[] = $value;
}
//生活服务类
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=6 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$shenghuo[] = $value;
}
//其他
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')."$wheresql AND type=7 ORDER BY clicktime DESC LIMIT 12");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
	$qita[] = $value;
}

*/


include_once template("/plugin/apps/foru");


?>
