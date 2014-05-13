<?php
/*
     thetopicaccess.php获取某一话题的具体内容验证
     Add by am@ihome.2012-09-18  16:09

*/
    include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
	//include_once('do_mobileverify.php');   	
	//@include_once(S_ROOT.'./data/data_profield.php');
	$perpage = 20;
    //$id = intval(trim($_POST[topic_id]));
	//$tagid = intval(trim($_POST[tagid]));
	$userid = 100 ; 
	$id=62;
	$tagid = 21;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();	
	$query = $_SGLOBAL['db']->query("SELECT  uid FROM  " .tname('tagspace')." where tagid = $tagid ");
	
	while($rs = $_SGLOBAL['db']->fetch_array($query)){
				$starlist[] = $rs[uid];
			}

	
			
			// 无查看此用户的权限
	if(!in_array($userid,$starlist)){
			
			$query = $_SGLOBAL['db']->query("SELECT  c.joinperm  FROM  " .tname('thread')." a , ".tname('post')."  b,".tname('mtag')." c   WHERE a.tid = b.tid and b.tagid=c.tagid  and a.tid=$id");
            $value = $_SGLOBAL['db']->fetch_array($query);
			if(!$value[joinperm]==0){
			$result = array(
			'flag'=>'failed',
			'thread_authorpic'=>'',
		    'thread_id'=>'',
		    'thread_tagname'=>'',
		    'thread_tagid'=>'',
		    'thread_title'=>'',
		    'thread_author'=>'',
		    'thread_authorid'=>'',
		    'thread_createtime'=>'',
		    'thread_pid'=>'',
		    'thread_content'=>'',
		    'thread_replynum'=>'',
		    'thread_viewnum'=>'',
		    'thread_joinperm'=>'');
			
	}
    }else{
			
	
			
	$query = $_SGLOBAL['db']->query("SELECT a.tid, a.subject, a.tagid,a.username, a.uid, a.dateline, b.message,b.pid,a.replynum,a.viewnum,c.tagname,c.joinperm  FROM  " .tname('thread')." a , ".tname('post')."  b,".tname('mtag')." c   WHERE a.tid = b.tid and b.tagid=c.tagid and b.isthread=1 and a.tid=".$id."  LIMIT $start,$perpage");
	
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$topiclist[] = $value;
				realname_set($value['uid'],$value[username]);
			}
		
			realname_get();	
			
	
	foreach($topiclist as $value){
	
	preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];	
			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			
		}
				
		//去除<b> start
		preg_match_all("#[<]b[>](.*)[<][\][/]b[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	
			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			
		}
		//去除<b> end

		preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];
	
			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			}
	        
		$result = array(
		'thread_authorpic'=>avatar($value[authorid],small),
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
		'thread_joinperm'=>$value[joinperm]);
	}
  }
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
?>