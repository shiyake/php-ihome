<?php
/*
     getthetopic.php获取某一话题的具体内容
     Add by am@ihome.2012-09-18  16:09

*/ 
	//include_once(S_ROOT.'./uc_client/client.php');
    include_once('../iauth_verify_forward.php');
    include_once('../../../common.php');	
    $userid = intval(iauth_verify());
	@include_once(S_ROOT.'./data/data_profield.php');
    $id = intval(trim($_POST[topic_id]));
	$tagid = intval(trim($_POST[tagid]));
	//$userid = 100 ; 
	//$id=63;
	//$tagid = 22;
	
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
			
	
	if($topiclist){
		foreach($topiclist as $value){
				
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
	}
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
	
	
	

	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
?>