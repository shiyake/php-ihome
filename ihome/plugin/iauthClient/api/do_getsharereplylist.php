<?php
/*
     getsharereplylist.php用于获取某个分享的评论列表
     Add by am@ihome.2012-10-05  09:50


*/
    
    include_once('../iauth_verify_forward.php');
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');	
    $userid = intval(iauth_verify());
	@include_once(S_ROOT.'./data/data_profield.php');

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$shareid = intval(trim($_POST[shareid]));
	//$shareid=77;

	$result = array();

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')."  where id=$shareid and idtype='sid' LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					realname_set($value['authorid'],$value[author]);
					}
			realname_get();
	foreach($topiclist as $value){
		$result[] = array('share_authorpic'=>avatar($value[authorid],small),'share_id'=>$value[cid],'share_type'=>$value[idtype],'share_typeid'=>$value[id],'share_userid'=>$value[authorid],'share_username'=>$_SN[$value[authorid]],'share_text'=>$value[message],'share_time'=>$value[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>