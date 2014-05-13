<?php
/*
     do_search.php用于通过姓名查询好友具体信息
     Add by am@ihome.2012-09-26  15:35

*/

    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
    
	$QUERY_STRING = $_POST[QUERY_STRING];
	//$QUERY_STRING = '余启勇';
	$result  =  array();
	//print_r("你妹妹的");
		//print_r(strlen($QUERY_STRING));
	if(is_numeric($QUERY_STRING)) {
	//echo 111;
		if(strlen($QUERY_STRING)==8){
			//$id = getuid($QUERY_STRING);
			$collegeid = $QUERY_STRING;
			$wheresql = "collegeid = $collegeid";
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." where ".$wheresql);
			$value = $_SGLOBAL['db']->fetch_array($query);
			$id = $value[uid];

		}else if(substr($QUERY_STRING, 0, 1)=='0'){
			//$id = getuid($QUERY_STRING);
			$collegeid = $QUERY_STRING;
			$wheresql = "collegeid = $collegeid";
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." where ".$wheresql);
			$value = $_SGLOBAL['db']->fetch_array($query);
			$id = $value[uid];
		}else{
			$id = $QUERY_STRING;
		}
	}else if(strlen($QUERY_STRING)==6 || strlen($QUERY_STRING)==9){
	//echo 222;
			//$id = getuid($QUERY_STRING);
			$collegeid = $QUERY_STRING;
			$wheresql = "collegeid = '$collegeid'";
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." where ".$wheresql);
			$value = $_SGLOBAL['db']->fetch_array($query);
			$id = $value[uid];
			//通过姓名得出uid
			//$wheresql = "name = '$QUERY_STRING'";
			$wheresql = "name like '".$QUERY_STRING."%'";
			//echo "SELECT uid FROM ".tname('baseprofile')." where ".$wheresql;
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('space')." where ".$wheresql);
			$value = $_SGLOBAL['db']->fetch_array($query);
			$id = $value[uid];
	}else{
			//通过姓名得出uid
			$wheresql = "name like '".$QUERY_STRING."%'";
			//echo "SELECT uid FROM ".tname('baseprofile')." where ".$wheresql;
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('space')." where ".$wheresql);
			$value = $_SGLOBAL['db']->fetch_array($query);
			$id = $value[uid];
				
	}
	
	//echo 8888;
	if(!empty($id)){
	$query = $_SGLOBAL['db']->query("SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ".tname('space')." s 
				, ".tname('spacefield')." sf ,".tname('usergroup')." ug where s.uid=sf.uid and s.groupid=ug.gid
                and s.uid =$id");
				//echo 333;
				
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				    $value['mygroupname'] = $_SGLOBAL['profield'][$value['fieldid']]['title'];
					realname_set($value['uid'], $value['username']);
					$access = unserialize($value[privacy]);
					//将用户信息中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
					preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['note'], $matches, PREG_SET_ORDER);

					foreach($matches as $item){
						$TmpString = $item[1]; 
						$HrefString = $_SCONFIG[siteallurl].$item[1];
				//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
				
						$value['note'] = str_replace($TmpString, $HrefString, $value['note']);
						}
					//将用户信息中的图片进行绝对路径化。 by xuxing end
					$userlist[] = $value;
					}
		realname_get();
		
		
	foreach($userlist as $value){
		$result[] = array(
		'user_thumbpic'=>avatar($value[uid],middle),
		'user_name'=>$_SN[$value[uid]],
		'user_degree'=>$value[grouptitle],
		'user_lastfeed'=>$value[note],
		'user_friendcount'=>$value[friendnum],
		'user_topiccount'=>$value[threadnum],
		'user_blogcount'=>$value[blognum],
		'user_id' => $id
		);
	}
	}else{
		$result[] = array('flag'=>'no register');
}	

	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	


?>