<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-6-20 16:06:31
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$uid = $_GET['uid'];
if($_SGLOBAL[supe_uid] != $uid) {
	echo "非法请求~!";
	exit;
}
$name = $_GET['name'];
$friendat = array();
$query = $_SGLOBAL['db']->query("SELECT uid,name,username FROM ".tname('space')." WHERE name LIKE '%".$name."%' OR username LIKE '%".$name."%'");
while($value = $_SGLOBAL['db']->fetch_array($query)){
	$value['name'] = $value['name'] ? $value['name'] : $value['username'];
	$friendat[] = $value; 
}
echo json_encode($friendat);

?>