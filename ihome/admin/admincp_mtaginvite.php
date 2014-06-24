<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if($_GET['do'] == "pass")	{
	$data = date('Ymd H:i:s',time());
	$_SGLOBAL['db']->query("UPDATE ".tname("no_mtag_register")." SET  pass_date='$data' , apply_uid=$_SGLOBAL[supe_uid],state='yes' WHERE uid=$_GET[uid]");
	echo "location.href='space.php?do=friend&view=confirm&uid=%27$_GET[uid]%27'";
}
if($_GET['do'] == 'refuse')	{
	$data = date('Ymd H:i:s',time());
	$_SGLOBAL['db']->query("UPDATE ".tname("no_mtag_register")." SET  pass_date='$data' , apply_uid=$_SGLOBAL[supe_uid],state='no' WHERE uid=$_GET[uid]");

}
$value = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("no_mtag_register")." as a left join ".tname("space")." as b on a.uid=b.uid");
while($result = $_SGLOBAL['db'] -> fetch_array($query))	{
	$value[] = $result ;

}

?>
