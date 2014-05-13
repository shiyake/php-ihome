<?php
/*
     addnewsreply.php评论一条纪录
     Add by am@ihome.2012-10-15  11:34

*/
    include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');
	$Doid = intval($_POST['doingid']);
	$Message =trim($_POST['message']);
	$Id = empty($_POST['commentid'])?0:intval($_POST['commentid']);
	//$userid = 100;
	//$username = '1号';
	if(trim($Message)==null){
		$arrs = array('flag'=>'null');
	}else if( strlen($Message) < 2 ){
		$arrs = array('flag'=>'content_is_too_short');
	}else{

	preg_match_all("/[@](.*)[(]([\d]+)[)]\s/U",$Message, $matches, PREG_SET_ORDER);

	foreach($matches as $value){
		$TmpString = $value[0]; 
		$TmpName = $value[1]; 
		$UserId = $value[2];
		$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
		$rs = $_SGLOBAL['db']->fetch_array($result);
		$realname = $rs['name'];	
			
       
			//调用检查函数将@后的内容进行验证，为UID对应的姓名相同则返回@与姓名，不相同则继续判断下一个@，没有找到匹配的最终将返回false
			$ValidValue = getAtName($TmpString, $TmpName, $realname);
			$ValidValue = trim($ValidValue);
			$at_friend= "space.php?uid=".$UserId;
			$Message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $Message);

			
}
	//替换表情
	$Message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $Message);
	$Message = preg_replace("/\<br.*?\>/is", ' ', $Message);
	

	
	$arr = array(
	'upid' => intval($Id),
	"username" => getstr($username, 15, 1, 1, 1),
	"message" => $Message,
	"doid" => intval($Doid),
	"uid" => intval($userid),
	"grade"=> 0 ,
	'dateline' => $_SGLOBAL['timestamp'],
	'ip' => getonlineip(),
	//'upid' => 0,
	);
	$replyid = inserttable('docomment', $arr,1);
	
	//更新回复数
	$_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$Doid'");
	//通知被评论用户
	$note = cplang('note_doing_reply', array("space.php?do=doing&doid=$Doid&highlight=$replyid"));
	notification_add($updo['uid'], 'doing', $note);

	//统计
	updatestat('docomment');
	
	
	if($replyid){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
?>