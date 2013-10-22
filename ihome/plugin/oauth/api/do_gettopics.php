<?php
/*
     gettopics.php用于获得群组话题列表
     Add by am@ihome.2012-09-18  16:09

*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	$tagid = intval(trim($_POST[group_id]));
	//$tagid = 3;
	//$userid =96;
	//$username = 'xuxing';
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = $value = array();	
	
	
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('tagspace')." WHERE tagid='$tagid'");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$starlist[] = $value[uid];
			}
		
			
	
	
	$query = $_SGLOBAL['db']->query("SELECT tid,subject,replynum,replynum,viewnum,dateline,lastpost,uid,username FROM ".tname('thread')."  WHERE  tagid='$tagid' ORDER BY displayorder DESC, lastpost DESC LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['uid'],$value[username]);
					$topiclist[] = $value;
					}
	realname_get();
	foreach($topiclist as $value){
		$result[] = array('topic_id'=>$value[tid],'topic_title'=>$value[subject],'topic_replycount'=>$value[replynum],'topic_readcount'=>$value[viewnum],'topic_topicauthor'=>$_SN[$value[uid]],'topic_topicupdatetime'=>$value[lastpost],'topic_topiccreatetime'=>$value[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>