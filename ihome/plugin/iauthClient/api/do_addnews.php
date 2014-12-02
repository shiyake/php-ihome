<?php
/*
     addnews.php发布纪录
     Add by am@ihome.2012-10-15  11:34

*/

    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	//$userid = 96;
	//$username = 'anminghao';
	$Message =trim($_POST['message']);
	//$Message ='@@钟(1)     1111系马达111';
	
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
	"username" => getstr($username, 15, 1, 1, 1),
	"message" => getstr($Message, 280, 1, 1, 1),
	"uid" => intval($userid),
	"replynum"=>0,
	"mood"=>0,
	'dateline' => $_SGLOBAL['timestamp'],
	'ip' => getonlineip(),
	);
	$newdoid = inserttable('doing', $arr,1);

	//事件feed
	$feedarr = array(
		'appid' => UC_APPID,
		'icon' => 'doing',
		'uid' => $userid,
		'username' =>$username,
		'dateline' => $_SGLOBAL['timestamp'],
		'title_template' => cplang('feed_doing_title'),
		'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$Message)))),
		'body_template' => '',
		'body_data' => '',
		'id' => $newdoid,
		'idtype' => 'doid'
		);
		$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//喜好hash
		$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//合并hash
		inserttable('feed', $feedarr,1);
		updatestat('doing');
		
		//更新空间note
		$setarr = array('note'=>$Message);		
		if(!empty($_POST['spacenote'])) {
		             $reward = getreward('updatemood', 0);
		             $setarr['spacenote'] = $Message;
	    } else {
		$reward = getreward('doing', 0);
	    }
		updatetable('spacefield', $setarr, array('uid'=>$userid));

	
	
    //返回flag
	if($newdoid){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
?>
