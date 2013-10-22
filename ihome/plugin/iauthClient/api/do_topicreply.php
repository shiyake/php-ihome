<?php
/*
     topicreply.php获取某一话题的回复数据
     Add by am@ihome.2012-09-18  16:09

*/
    
    include_once('../iauth_verify_forward.php');	
    include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	$id = intval(trim($_POST[topic_id]));
	$userid = intval(iauth_verify());
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
						$markpos = strpos($item[1], "http://");
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