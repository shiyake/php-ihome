<?php
/*
     gethotgroups.php用于获得当前登录用户“热门群组”列表
     Add by am@ihome.2012-09-18  14:48

*/
   
    include_once('../iauth_verify_forward.php');
	include_once('../../../common.php');
	//include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');	
    $userid = intval(iauth_verify());
	$multi = '';
	$count = 0;

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
//$userid=96;
	$start = ($page-1)*$perpage;
	$wherearr = array();
	$sql = "SELECT mt.* FROM ".tname('mtag')." mt
			WHERE ".(empty($wherearr)?'1':implode(' AND ', $wherearr))." ORDER BY mt.threadnum DESC LIMIT $start,$perpage";
    $query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['groupname'] = $_SGLOBAL['profield'][$value['fieldid']]['title'];
		if(empty($value['pic'])) $value['pic'] = 'image/nologo.png';
		$grouplist[] = $value;
	}
	
	$result = array();
	
	foreach($grouplist as $value){
		$result[] = array('tag_id'=>$value[tagid],'tag_title'=>$value[tagname],'tag_group'=>$value[groupname],'tag_member'=>$value[membernum],'tag_topic'=>$value[threadnum],'tag_reply'=>$value[postnum],'tag_pic'=>$_SCONFIG[siteallurl].$value[pic]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>