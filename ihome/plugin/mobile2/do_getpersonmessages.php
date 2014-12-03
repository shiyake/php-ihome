<?php
/*
	getmessages.php文件用于获取私信收件箱中的信息。
	Add by xuxing@ihome. 2012-09-13  20:33
*/
	//include_once('../../common.php');
	include_once('./do_mobileverify.php');
	
	include_once(S_ROOT.'./uc_client/client.php');

	$touid = intval(trim($_POST[touid]));
	if(empty($touid)){
		verifyerror();
	}
	
	$filter = 'privatepm';
	
	//分页
	$perpage = 10;
	//$perpage = mob_perpage($perpage);
	
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page<1) $page = 1;
//$userid=3;	$touid=18;
	//获取与对方的私信内容
	$list = $list = uc_pm_view($userid, 0, $touid, 5);;
	
	//$count = $result['count'];
	//$list = $result['data'];
	
	$result = array();
	//$result['count'] = $count;
	
	//获取姓名
	foreach($list as $values){
		realname_set($values['msgfromid'], $values['msgfrom']);
	}
	realname_get();	
	
	//生成数组
	foreach($list as $values){
	//将公告中的图片进行绝对路径化。  start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$TmpString = $item[1]; 
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	
			$value['message'] = str_replace($TmpString, $HrefString, $value['message']);
			}
		$result[] = array('msg_userid'=>$values[msgfromid],'msg_username'=>$_SN[$value[msgfromid]],'msg_user_pic'=>avatar($values[msgfromid],middle),'msg_peeruid'=>$values[msgtoid],'msg_id'=>$values[pmid],'msg_content'=>$values[message],'msg_time'=>$values[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>