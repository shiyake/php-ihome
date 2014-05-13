<?php
/*
     gettheshare.php用于获取某分享的具体信息
     Add by am@ihome.2012-10-09  09:46


*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$sid = intval(trim($_POST[shareid]));
	//$sid=240;

	$result = array();
	$where_sql = "sid=$sid";
	$query = $_SGLOBAL['db']->query("SELECT id,uid,type,dateline,body_template,body_general FROM ".tname('share')."  where ".$where_sql." LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					realname_set($value['uid']);
		    }
			realname_get();
			
	foreach($topiclist as $value){
	if($value[type]=='arrangement'){
		$wheresql .= " arrangementid=".$value[id];
		$query1 = $_SGLOBAL['db']->query("SELECT uid,subject,pic,message,viewnum,replynum,dateline from ".tname('arrangement')." where  $wheresql  ");
		while ($value = $_SGLOBAL['db']->fetch_array($query1)) {
					$value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
					if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
					realname_set($value['uid']);
					$list[] = $value;
			}
			realname_get();
		foreach($list as $value){
					$result[] = array('flag'=>'success','blog_authorpic'=>avatar($value['uid'],small),
					'blog_title'=>$value['subject'],'blog_author'=>$_SN[$value[uid]],'blog_authorid'=>$value[uid],
					'blog_text'=>$value['message'],'blog_readnum'=>$value['viewnum'],
					'blog_replynum'=>$value['replynum'],'blog_image'=>$value['pic'],'blog_noreply'=>'',
					'blog_time'=>$value[dateline]);
				}
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
		$result = array('share_authorpic'=>avatar($value[uid],small),'share_type'=>$value[type],
		'share_typeid'=>$value[id],'share_username'=>$_SN[$value[uid]],'share_userid'=>$value[uid],
		'share_time'=>$value[dateline],'share_text'=>$value[body_template],'share_describe'=>$value[body_general]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>