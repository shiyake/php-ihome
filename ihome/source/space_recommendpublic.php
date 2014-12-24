<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}
$recommend = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("rec_public")." as a left join ".tname("space")."  as b on a.uid = b.uid order by id desc");
while($res = $_SGLOBAL['db']->fetch_array($query))	{

	$friend = $_SGLOBAL['db']->query("SELECT * FROM ".tname("spacefield")." WHERE uid=".$_SGLOBAL['supe_uid']);
	if($fri = $_SGLOBAL['db']->fetch_array($friend))	{
		$res['feedfriend'] = $fri['feedfriend'] ;
	}
	$myfriend = explode(",",$res['feedfriend']);

	if(in_array($res['uid'],$myfriend))	{
		$res['a']=1;
	}
	else {
		$res['a']=0;
	}
	
	$recommend[] = $res;

}
include_once template("space_recommendpublic");
?>
