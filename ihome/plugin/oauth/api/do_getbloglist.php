<?php
/*
     do_getbloglist.php用于获得某个用户的日志列表
     Add by am@ihome.2012-10-08  11:25
	 


*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	//include_once(S_ROOT.'./data/data_profield.php');
	$touid = intval(trim($_POST[userid]));
	
	/*$userid=18;
	$username='seen';
    $touid = 3;
	$_SGLOBAL['supe_uid'] = $userid;
	$_SGLOBAL['supe_username'] = $username;*/
	
	getmember();
	
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')."  where  uid=$touid order by dateline desc LIMIT $start,$perpage ");
	$query = $_SGLOBAL['db']->query("SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ".tname('blog')." b LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
		WHERE b.uid =  '".$touid."' ORDER BY b.dateline DESC LIMIT $start,$perpage ");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
		                   realname_set($value['uid'], $value['username']);
		                   $bloglist[] = $value;
					}
				}
				realname_get();
	if($bloglist){
		foreach($bloglist as $value){
			$result[] = array('blog_username'=>$_SN[$value[uid]],'blog_id'=>$value[blogid],'blog_title'=>$value[subject],'blog_readcount'=>$value[viewnum],'blog_replycount'=>$value[replynum],'blogtime'=>$value[dateline]);
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>