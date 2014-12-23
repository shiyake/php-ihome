<?php
/*
     gettopicreply.php获取某一话题的回复数据
     Add by am@ihome.2012-09-18  16:09

*/
    //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
	//@include_once(S_ROOT.'./data/data_profield.php');
 	include_once('do_mobileverify.php');

	$id = intval(trim($_POST[topic_id]));
	$perpage = 20;
	//$id=8;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$topicreplylist = $result = array();
	//echo "SELECT * FROM  ".tname('post')."  WHERE tid =".$id. " and isthread=0 order by dateline asc LIMIT  $start,$perpage";exit();
	$query = $_SGLOBAL['db']->query("SELECT * FROM  ".tname('post')."  WHERE tid =".$id. " and isthread=0 order by dateline asc LIMIT  $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					//将message中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
					preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matches, PREG_SET_ORDER);

					foreach($matches as $item){
						$TmpString = $item[1]; 
						$TmpFace = $item[0];
						$markpos = strpos($item[1], "http://");
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
			$value['message'] = str_replace($TmpFace, $newface, $value['message']);
			}
		}

						if($markpos != 1){
							$HrefString = $_SCONFIG[siteallurl].$item[1];					
							$value['message'] = str_replace($TmpString, $HrefString, $value['message']);
						}
					}
					//将message中的图片进行绝对路径化。 by xuxing end
					realname_set($value['uid'],$value['username']);
					$topicreplylist[] = $value;
					}
	realname_get();
	if($topicreplylist){
		foreach($topicreplylist as $value){
			$result[] = array('topic_groupid'=>$value['tagid'],'topic_id'=>$value[tid],'reply_userpic'=>avatar($value[uid],small),'reply_uid'=>$value['uid'],'reply_pid'=>$value[pid],'reply_user'=>$_SN[$value[uid]],'reply_text'=>$value[message],'reply_time'=>$value[dateline]);
		}
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>