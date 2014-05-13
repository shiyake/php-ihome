<?php
/*
     getthetopic.php获取某一话题的具体内容
     Add by am@ihome.2012-09-18  16:09

*/ 
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	//@include_once(S_ROOT.'./data/data_profield.php');
    $id = intval(trim($_POST[topic_id]));
	$tagid = intval(trim($_POST[tagid]));
	/*
	$id=43;
	$tagid = 21;
	$userid = 96;
	*/
	$result = array();	
	
	$query = $_SGLOBAL['db']->query("SELECT  grade  FROM  " .tname('tagspace')."    WHERE tagid=$tagid and uid = $userid");
    $gd = $_SGLOBAL['db']->fetch_array($query);

	
	
	$query = $_SGLOBAL['db']->query("SELECT  uid FROM  " .tname('tagspace')." where tagid = $tagid ");

	while($rs = $_SGLOBAL['db']->fetch_array($query)){
				$starlist[] = $rs[uid];
			}
	$query = $_SGLOBAL['db']->query("SELECT  b.viewperm,b.postperm  FROM  " .tname('thread')." a , ".tname('mtag')." b   WHERE a.tagid=b.tagid  and a.tid=$id");
    $perm = $_SGLOBAL['db']->fetch_array($query);
	
	//处理页面标签
	 $query = $_SGLOBAL['db']->query("SELECT a.tid, a.subject, a.tagid,a.username, a.uid, a.dateline, b.message,b.pid,a.replynum,a.viewnum,c.tagname,c.viewperm,c.joinperm,c.threadperm,c.postperm  FROM  " .tname('thread')." a , ".tname('post')."  b,".tname('mtag')." c   WHERE a.tid = b.tid and b.tagid=c.tagid and b.isthread=1 and a.tid=".$id);
	
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$topiclist[] = $value;
				realname_set($value['uid'],$value[username]);
				}
		
			realname_get();	
				//print_r($value[message]);
	//将公告中的图片进行绝对路径化。  start<img src=\"image\/face\/24.gif\" class=\"face\">


			
			
	
	if($topiclist){
		foreach($topiclist as $value){
		
			preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matches, PREG_SET_ORDER);
		//print_r($matches);
		foreach($matches as $item){
			$TmpString = $item[1]; 
			//print_r($TmpString);
			//echo "1111111111111111111111111111111111";
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	        $TmpFace = $item[0];
			//print_r($TmpFace);
			//开始处理图片	
		if(preg_match_all("#image\/face\/(\d+)\.gif#i",$TmpString, $matchface, PREG_SET_ORDER)){
		//print_r($matchface);
		//exit(2222222);
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
	}

/*
		preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$value['message'], $matches, PREG_SET_ORDER);
		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];
	
			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			*/
		}
		
		
		$result = array(
		'thread_authorpic'=>avatar($value[uid],small),
		'thread_id'=>$value[tid],
		'thread_tagname'=>$value[tagname],
		'thread_tagid'=>$value[tagid],
		'thread_title'=>$value[subject],
		'thread_author'=>$_SN[$value[uid]],
		'thread_authorid'=>$value[uid],
		'thread_createtime'=>$value[dateline],
		'thread_pid'=>$value[pid],
		'thread_content'=>$value[message],
		'thread_replynum'=>$value[replynum],
		'thread_viewnum'=>$value[viewnum],
		'thread_viewperm'=>$value[viewperm],
		'thread_joinperm'=>$value[joinperm],
		'thread_threadperm'=>$value[threadperm],
		'thread_postperm'=>$value[postperm]);

	}

	
	
	
	
			
	
	
	

	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
?>