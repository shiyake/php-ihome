<?php
/*
     getusertopics.php用于登录用户所发布的群组话题
     Add by am@ihome.2012-09-18  14:35
     Modified by am@ihome.2012-12-12 11:30
*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
	$perpage = 20;
	//$userid=96;
	$userid = intval(trim($_POST[target_userid]));
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT main.*,mt.* FROM ".tname('thread')." main 
				LEFT JOIN ".tname('mtag')." mt ON mt.tagid=main.tagid
				WHERE main.uid='$userid' ORDER BY mt.threadnum DESC LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				    $value['mygroupname'] = $_SGLOBAL['profield'][$value['fieldid']]['title'];
					$topiclist[] = $value;
					}
			
	foreach($topiclist as $value){
		$result[] = array('topic_id'=>$value[tid],'create_at'=>$value[dateline],'topic_title'=>$value[subject],'tagid'=>$value[tagid],'tagname'=>$value[tagname],'topic_group'=>$value[mygroupname],'comments_count'=>$value[replynum]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>