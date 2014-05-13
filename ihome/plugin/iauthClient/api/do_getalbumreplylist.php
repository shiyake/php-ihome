<?php
/*
     do_getalbumreplylist.php用于获取某张照片的评论列表
     Add by am@ihome.2012-12-12  14:50

*/
    include_once('../iauth_verify_forward.php');
    include_once('../../../common.php');	
    $userid = intval(iauth_verify());
    
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$picid = intval(trim($_POST['picid']));
	
	//$picid=135;
	//$userid=96;
	//$username='anminghao';
	

	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')."  where id=$picid and idtype='picid' order by dateline desc LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$replylist[] = $value;
			realname_set($value['authorid'],$value['author']);
		}
	realname_get();
	
			foreach($replylist as $value){
				$result[] = array('pic_authorpic'=>avatar($value['authorid'],small),
				'pic_id'=>$value['cid'],
				'pic_userid'=>$value['authorid'],
				'pic_username'=>$_SN[$value['authorid']],
				'pic_text'=>$value['message'],
				'pic_time'=>$value['dateline']);
			}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>