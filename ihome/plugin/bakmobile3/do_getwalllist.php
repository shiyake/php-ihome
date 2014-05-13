<?php
/*
     do_getwalllist.php用于获得墙的列表
     Add by am@ihome.2012-10-08  11:25
	 


*/
    //include_once('../../common.php'); 

    include_once('do_mobileverify.php');   	
	//include_once(S_ROOT.'./data/data_profield.php');
	$touid = intval(trim($_POST[userid]));
	
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
	$Query = $_SGLOBAL['db']->query("select * from ".tname(wall)." where pass > 0 order by starttime desc ");
	while ($value = $_SGLOBAL['db']->fetch_array($Query)) {
		$value['picture'] = pic_get($value['picture'], 0, 0);
		$WallList[] = $value;
	}
	if($WallList){
		foreach($WallList as $value){
			$result[] = array('wall_id'=>$value[id],'wall_name'=>$value[wallname],'wall_content'=>$value[content],'wall_uid'=>$value[uid],'pass'=>$value[pass],'starttime'=>$value[starttime],'endtime'=>$value[endtime],'timeline'=>$value[timeline],'live'=>$value[live]);
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>