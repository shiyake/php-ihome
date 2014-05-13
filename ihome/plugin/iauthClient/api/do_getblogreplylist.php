<?php
/*
     getblogreplylist.php用于获取某篇日志的评论列表
     Add by am@ihome.2012-10-09  09:14
	 modified by xuxing@ihome. 2012-12-6 15:44

*/
    
	//include_once(S_ROOT.'./uc_client/client.php');
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
	//@include_once(S_ROOT.'./data/data_profield.php');

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$blogid = intval(trim($_POST['blogid']));
	
	/*$blogid=89;
	$userid=18;
	$username='xuxing';*/
	//$_SGLOBAL['supe_uid'] = $userid;
	//$_SGLOBAL['supe_username'] = $username;
	
	getmember();

	$result = array();
	$replylist = array();
	
	$query = $_SGLOBAL['db']->query("SELECT bf.target_ids, b.* FROM ".tname('blog')." b left join ".tname('blogfield')." bf  on b.blogid=bf.blogid where b.blogid=$blogid ");
	$blog = $_SGLOBAL['db']->fetch_array($query);
	if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
		$result = array('flag'=>'no_privilege');
	}else{
	
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')."  where id=$blogid and idtype='blogid' order by dateline desc LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$replylist[] = $value;
			realname_set($value['authorid'],$value['author']);
		}
		realname_get();	
		if($replylist){		
			foreach($replylist as $value){
				$result[] = array('comm_authorpic'=>avatar($value['authorid'],small),'comm_id'=>$value['cid'],'comm_userid'=>$value['authorid'],'comm_username'=>$_SN[$value['authorid']],'comm_text'=>$value['message'],'comm_time'=>$value['dateline']);
			}
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>