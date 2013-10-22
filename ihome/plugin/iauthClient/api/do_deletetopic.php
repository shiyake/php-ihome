<?php
/*
     deletetopic.php删除话题
     Add by am@ihome.2012-10-19  10:00

*/
    include_once('../iauth_verify_forward.php');
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
    $userid = intval(iauth_verify());
    //$userid = 96;
	//$username = 'anminghao';
	$tagid =intval($_POST['tagid']);
	$pids =intval($_POST['pid']);
    $tids = intval($_POST['topic_id']);
	$dtreply = deleteposts($tagid, array($pid));
	$delthreads = deletethreads($tagid, $tids);	
		
	if($dtreply && $delthreads){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
function deleteposts($tagid, $pids) {

	global $_SGLOBAL;

	//整理

	$nums = renum($postnums);

	foreach ($nums[0] as $pnum) {

		$_SGLOBAL['db']->query("UPDATE ".tname('thread')." SET replynum=replynum-$pnum WHERE tid IN (".simplode($tids).")");

	}



	//删除

	$_SGLOBAL['db']->query("DELETE FROM ".tname('post')." WHERE pid IN (".simplode($pids).")");



	return true;

}

function deletethreads($tagid, $tids) {

	global $_SGLOBAL;
	//删除

	$_SGLOBAL['db']->query("DELETE FROM ".tname('thread')." WHERE tid =$tids");

	$_SGLOBAL['db']->query("DELETE FROM ".tname('post')." WHERE tid =$tids");
	

	//删除feed

	$_SGLOBAL['db']->query("DELETE FROM ".tname('feed')." WHERE id =$tids AND idtype='tid'");

	

	//删除举报

	$_SGLOBAL['db']->query("DELETE FROM ".tname('report')." WHERE id =$tids AND idtype='tid'");

	

	//删除脚印

	$_SGLOBAL['db']->query("DELETE FROM ".tname('clickuser')." WHERE id =$tids AND idtype='tid'");



	return true;

}




	
	
	
	
?>