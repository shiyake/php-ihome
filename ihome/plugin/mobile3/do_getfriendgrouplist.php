﻿<?php
/*
     getfriendgrouplist.php获得当前登录用户或者用户好友分组下的的好友列表信息
     Add by am@ihome.2014-04-15  09:20

*/
    include_once('../../common.php'); 
    //include_once('do_mobileverify.php');

	//$perpage = 20;
	//$userid=5618;
	//获得好友分组的id
	$groupid = intval($_POST[group_id]);
	//$groupid = 1;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	$perpage = empty($_POST['perpage'])?20:intval($_POST['perpage']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT f.fusername, s.name, s.namestatus, s.groupid, s.uid, sf.note 
                                     FROM ".tname('friend')." f , ".tname('spacefield')." sf , ".tname('space')." s
                                     WHERE s.uid = f.fuid
                                     AND f.fuid = sf.uid
                                     AND f.uid =".$userid."
									 AND f.gid = ".$groupid."
                                     AND f.status = '1' ORDER BY CONVERT(s.name USING gbk)");
	$value1 = $_SGLOBAL['db']->fetch_array($query);
	if(empty($value1)){
		$result[] = array('flag'=> 'end');
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();

	}						 
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			//将好友状态中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
			preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['note'], $matches, PREG_SET_ORDER);

			foreach($matches as $item){
				$TmpString = $item[1]; 
				$HrefString = $_SCONFIG[siteallurl].$item[1];
		//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
				$TmpFace = $item[0];
				//开始处理图片	
		if(preg_match_all("#image\/face\/(\d+)\.gif#i",$TmpString, $matchface, PREG_SET_ORDER)){
			foreach($matchface as $facenum){
				switch($facenum[1]){
					case 1:
						$newface=' [:what] ';
						break;
					case 2:
						$newface=' [:nothing] ';
						break;
					case 3:
						$newface=' [:breakdown] ';
						break;
					case 4:
						$newface=' [:caml] ';
						break;
					case 5:
						$newface=' [:coldsweat] ';
						break;
					case 6:
						$newface=' [:congratulationsgirl] ';
						break;
					case 7:
						$newface=' [:curse] ';
						break;
					case 8:
						$newface=' [:dead] ';
						break;
					case 9:
						$newface=' [:donot] ';
						break;
					case 10:
						$newface=' [:doubt] ';
						break;
					case 11:
						$newface=' [:embarrassed] ';
						break;
					case 12:
						$newface=' [:envy] ';
						break;
					case 13:
						$newface=' [:full] ';
						break;
					case 14:
						$newface=' [:furious] ';
						break;
					case 15:
						$newface=' [:happy] ';
						break;
					case 16:
						$newface=' [:laugh] ';
						break;
					case 17:
						$newface=' [:little] ';
						break;
					case 18:
						$newface=' [:loveboy] ';
						break;
					case 19:
						$newface=' [:no] ';
						break;
					case 20:
						$newface=' [:alexander] ';
						break;
					case 21:
						$newface=' [:please] ';
						break;
					case 22:
						$newface=' [:proud] ';
						break;
					case 23:
						$newface=' [:regret] ';
						break;
					case 24:
						$newface=' [:shout] ';
						break;
					case 25:
						$newface=' [:shyboy] ';
						break;
					case 26:
						$newface=' [:sinistersmile] ';
						break;
					case 27:
						$newface=' [:spit] ';
						break;
					case 28:
						$newface=' [:tears] ';
						break;
					case 29:
						$newface=' [:unconcern] ';
						break;
					case 30:
						$newface=' [:bored] ';
						break;
					

				}
			$value['note'] = str_replace($TmpFace, $newface, $value['note']);
			}
		}
				
				}
			//将公告中的图片进行绝对路径化。 by xuxing end
			$friendslist[] = $value;
			realname_set($value['uid'],$value[name]);
			}
		realname_get();
	if($friendslist){
		foreach($friendslist as $value){
			$result[] = array('user_thumb_pic'=>avatar($value[uid],middle),
							'user_name'=>$_SN[$value[uid]],
							'user_id'=>$value[uid],
							'user_last_message'=>$value[note]);
		}
}
/*
	$result1 = json_encode($result1);
	$result1 = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result1);
	echo $result1;
	*/
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>