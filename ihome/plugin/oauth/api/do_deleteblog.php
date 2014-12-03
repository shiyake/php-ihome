<?php
/*
     deletenews.php删除日志
     Add by am@ihome.2012-10-19  09:55

*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	$blogid =intval($_POST['blogid']);
    //$userid = 96 ; 
	//$blogid = 146;
	$query = $_SGLOBAL['db']->query("SELECT uid from ".tname('blog')." where blogid=$blogid ");
	$blog = $_SGLOBAL['db']->fetch_array($query);	
	/*print_r($blog[uid]);
	echo "SELECT uid from ".tname('blog')." where blogid=$blogid ";
	exit;*/
	if($blog[uid]==$userid){
		$delete=deleteblogs(array($blogid));
	if($delete){
		$arrs = array('flag'=>'success');
	}else{
		$arrs = array('flag'=>'fail');
	}
		$result = json_encode($arrs);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
    }else{
		$arrs = array('flag'=>'fail');
		$result = json_encode($arrs);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
}



function deleteblogs($blogids) {
	global $_SGLOBAL;


	//获取博客信息
	$spaces = $blogs = $newblogids = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')." WHERE blogid IN (".simplode($blogids).")");
	$value = $_SGLOBAL['db']->fetch_array($query);
	

	//数据删除
	$_SGLOBAL['db']->query("DELETE FROM ".tname('blog')." WHERE blogid IN (".simplode($blogids).")");
	$_SGLOBAL['db']->query("DELETE FROM ".tname('blogfield')." WHERE blogid IN (".simplode($blogids).")");
	//评论
	$_SGLOBAL['db']->query("DELETE FROM ".tname('comment')." WHERE id IN (".simplode($blogids).") AND idtype='blogid'");
	//删除举报
	$_SGLOBAL['db']->query("DELETE FROM ".tname('report')." WHERE id IN (".simplode($blogids).") AND idtype='blogid'");

	//删除feed
	$_SGLOBAL['db']->query("DELETE FROM ".tname('feed')." WHERE id IN (".simplode($blogids).") AND idtype='blogid'");
	
	//删除脚印
	$_SGLOBAL['db']->query("DELETE FROM ".tname('clickuser')." WHERE id IN (".simplode($blogids).") AND idtype='blogid'");

	return true;
	
}

	
	
	
	
?>