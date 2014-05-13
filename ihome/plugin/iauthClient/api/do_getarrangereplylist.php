<?php
/*
     do_getarrangereplylist.php用于获取校园日历的评论列表
     Add by am@ihome.2012-12-17  10:14

*/
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
    include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$arrangementid = intval(trim($_POST['arrangeid']));
	
	/*$arrangementid=14;
	$userid=96;
	$username='anminghao';*/
	
	getmember();

	$result = array();
	$replylist = array();
	
	
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')."  where id=$arrangementid and idtype='arrangementid' order by dateline desc LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$replylist[] = $value;
			realname_set($value['authorid'],$value['author']);
		}
		realname_get();	
		if($replylist){		
			foreach($replylist as $value){
				$result[] = array('arrange_authorpic'=>avatar($value['authorid'],small),'arrange_id'=>$value['cid'],'arrange_userid'=>$value['authorid'],'arrange_username'=>$_SN[$value['authorid']],'arrange_text'=>$value['message'],'arrange_time'=>$value['dateline']);
			}
		}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>