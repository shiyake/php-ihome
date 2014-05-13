<?php
/*
     getnotification.php用于获得当前用户的消息
     Add by am@ihome.2012-09-28  14:09
	 Modify by am@ihome . 2012-10-8   9:20


*/
    //include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');

    include_once('do_mobileverify.php');   	
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	$id = empty($_POST['id'])?0:intval($_POST['id']);
    //$id = 603;
	
	
	
	$wheresql = "uid =  $userid and new = 1";
	$query = $_SGLOBAL['db']->query("SELECT id,type,new,author,authorid,note,dateline FROM " .tname('notification')."  where ".$wheresql." 
					 order by dateline desc LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				    $newids[] = $value['id'];
					$topiclist[] = $value;
					realname_set($value['authorid'],$value['author']);
					}
	//消息标记为已读
	 $_SGLOBAL['db']->query("UPDATE ".tname('notification')." SET new='0' WHERE id IN (".simplode($newids).")");
	 //更新未读的
	$newcount = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('notification')." WHERE uid=$userid AND new='1'"), 0);
	$newcount = intval($newcount);
	updatetable('space', array('notenum'=>$newcount), array('uid'=>$userid));
	
	 realname_get();
	 
	 
	foreach($topiclist as $value){

		preg_match_all("#[<]a[\s]href(.*)([&]|[?])do[=]([\w]+)[&][\w]*id[=]([\d]{1,})([&]|[\"])(.*)[>](.*)[<][\][/]a[>]#U",$value['note'],$matches, PREG_SET_ORDER);
		foreach($matches as $item){
		$sub_type = $item[3];
		$sub_id = $item[4];
		$text = $item[7];
		}
		
		$result[] = array('notice_id'=>$value[id],
		'notice_authorpic'=>avatar($value[authorid],middle),
		'notice_authorid'=>$value[authorid],
		'notice_type'=>$value[type],
		'notice_text'=>$text,
		'notice_time'=>$value['dateline'],
		'notice_author'=>$_SN[$value[authorid]],
		'notice_sub_id'=>$sub_id);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>