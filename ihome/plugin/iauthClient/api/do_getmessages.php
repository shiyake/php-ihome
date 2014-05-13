<?php
/*
	getmessages.php文件用于获取私信收件箱中的信息。
	Add by xuxing@ihome. 2012-09-13  20:33
*/
	
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');

	//$filter = in_array($_GET['filter'], array('newpm', 'privatepm', 'systempm', 'announcepm'))?$_GET['filter']:($space['newpm']?'newpm':'privatepm');
	$filter = 'privatepm';
	
	//分页
	$perpage = 10;
	//$perpage = mob_perpage($perpage);
	
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page<1) $page = 1;
//$userid=3;	
	//获取私信收件箱信息
	$result = uc_pm_list($userid, $page, $perpage, 'inbox', $filter, 50);
	
	$count = $result['count'];
	$list = $result['data'];
	
	$result = array();
	//$result['count'] = $count;
	
	//获取姓名
	foreach($list as $values){
		realname_set($values['msgfromid'], $values['msgfrom']);
	}
	realname_get();	
	
	//生成数组
	foreach($list as $values){
		$result[] = array('msg_name'=>$_SN[$values[msgfromid]],'msg_userid'=>$values[msgfromid],'msg_username'=>$_SN[$value[msgfromid]],'msg_user_pic'=>avatar($values[msgfromid],small),'msg_id'=>$values[pmid],'msg_content'=>$values[message],'msg_time'=>$values[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>