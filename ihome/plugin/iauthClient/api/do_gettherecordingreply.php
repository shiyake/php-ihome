﻿<?
/*
     gettherecodingreply.php用于获取某条记录回复的数据
     Add by am@ihome.2012-10-08  14:11


*/
    
    include_once('../iauth_verify_forward.php');
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
    $userid = intval(iauth_verify());
	$username =getstr($_POST['username']);
	@include_once(S_ROOT.'./data/data_profield.php');

	$doid = intval(trim($_POST[doingid]));
	//$doid = 171;
	$result = array();
    $perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$query = $_SGLOBAL['db']->query("SELECT uid,username,id,message,dateline FROM ".tname('docomment')."  where doid=$doid LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					}
	foreach($topiclist as $value){
		$result[] = array('news_userid'=>$value[uid],'news_username'=>$value[username],'news_userpic'=>avatar($value[uid],small),'news_id'=>$value[id],'news_text'=>$value[message],'news_time'=>$value[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	
?>