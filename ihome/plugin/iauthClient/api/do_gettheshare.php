<?php
/*
     gettheshare.php用于获取某分享的具体信息
     Add by am@ihome.2012-10-09  09:46


*/
    //include_once('../../common.php'); 
	
    include_once('../iauth_verify_forward.php');	
	include_once('../../../common.php');
	@include_once(S_ROOT.'./data/data_profield.php');
    include_once(S_ROOT.'./uc_client/client.php');
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$sid = intval(trim($_POST[shareid]));
	$userid = intval(iauth_verify());
	//$sid=94;

	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('share')."  where sid=$sid LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					realname_set($value['uid']);
					}
			realname_get();
	foreach($topiclist as $value){
		$result = array('share_authorpic'=>avatar($value[uid],small),'share_type'=>$value[type],'share_typeid'=>$value[id],'share_username'=>$_SN[$value[uid]],'share_userid'=>$value[uid],'share_time'=>$value[dateline],'share_text'=>$value[body_template],'share_describe'=>$value[body_general]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>