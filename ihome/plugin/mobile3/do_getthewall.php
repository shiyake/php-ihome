<?php
/*
     do_getthewall.php用于获得墙的具体信息
     Add by am@ihome.2013-11-1  11:25
	 


*/
    //include_once('../../common.php'); 

    include_once('do_mobileverify.php');   	
	//include_once(S_ROOT.'./data/data_profield.php');
	$wallid = intval(trim($_POST[wallid]));
	//$wallid = 3;
	/*$userid=18;
	$username='seen';
    $touid = 3;
	$_SGLOBAL['supe_uid'] = $userid;
	$_SGLOBAL['supe_username'] = $username;*/
	
	getmember();
	
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')."  where  uid=$touid order by dateline desc LIMIT $start,$perpage ");
	$Query = $_SGLOBAL['db']->query("select * from ".tname(wallfield)." where wallid = $wallid ");
	while ($value = $_SGLOBAL['db']->fetch_array($Query)) {
		realname_set($value['uid'], $value['username']);
		$WallList[] = $value;
	}
	realname_get();
	if($WallList){
		foreach($WallList as $value){
			$result[] = array('user_name'=>$_SN[$value[uid]],'message'=>$value[message],'time'=>$value[timeline]);
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>