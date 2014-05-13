<?php
/*
     addtopicreply.php评论一篇话题
     Add by am@ihome.2012-10-18  11:34

*/
    //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
	//@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');
	/*$username = 'seen';
	$userid = 18 ;
	$Message = '999992222';
	$TagId = '3';
	$Commentid = '8';*/
	$Message =empty($_POST['message'])?'':getstr($_POST['message']);
	$TagId =empty($_POST['tagid'])?0:intval($_POST['tagid']);
	$Commentid =empty($_POST['commentid'])?0:intval($_POST['commentid']);
	if(trim($Message)==null){
		$arrs = array('flag'=>'null');
	}else if(strlen($Message) < 2){
		$arrs = array('flag'=>'content_is_too_short');
	}else{
	
		//处理评论的@功能 Add by am 2013-12-07 start
		//提取AT用户
		preg_match_all("/[@](.*)[(]([\d]+)[)]\s/U",$Message, $matches, PREG_SET_ORDER);

		foreach($matches as $value){

			$TmpString = $value[0]; 
			$TmpName = $value[1]; 
			$UserId = $value[2];

			$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");

			if($rs = $_SGLOBAL['db']->fetch_array($result)){
				$realname = $rs['name'];
				if(empty($realname)){
					$realname = $rs['username'];
				}

				//调用检查函数将@后的内容进行验证，为UID对应的姓名相同则返回@与姓名，不相同则继续判断下一个@，没有找到匹配的最终将返回false
				$ValidValue = getAtName($TmpString, $TmpName, $realname);
				$ValidValue = trim($ValidValue);
				$at_friend= "space.php?uid=".$UserId;

				if($ValidValue != false){
					$Message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $Message);
					$UserIds[] = $UserId;

				}
			}
		}
		//Add by Add by am 2013-12-07  end

		$arr = array(
		'tid' => intval($Commentid),
		"tagid" => intval($TagId),
		"uid" => intval($userid), 
		"username" => getstr($username, 15, 1, 1, 1),
		"message" => getstr($Message, 5000, 1, 1, 1),
		"ip" => getonlineip(),
		'dateline' => $_SGLOBAL['timestamp'],
		"isthread" => 0,
		);
	$pid = inserttable('post',$arr,1);
	//更新统计数据
	$_SGLOBAL['db']->query("UPDATE ".tname('thread')."
	SET replynum=replynum+1, lastpost='$_SGLOBAL[timestamp]', lastauthor='$username', lastauthorid='$userid'
	WHERE tid='$Commentid'");
	//通知
	$note = cplang('note_thread_reply')." <a href=\"space.php?uid=$userid&do=thread&id=$Commentid&pid=$pid\" target=\"_blank\">$thread[subject]</a>";
	notification_add($userid, 'post', $note);

	//统计
	updatestat('post');
	if($pid){
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