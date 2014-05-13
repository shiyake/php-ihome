<?php
/*
     addnews.php发布日志
     Add by am@ihome.2012-10-17  10:34

*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	$Subject =getstr($_POST['subject']);
	$Message =getstr($_POST['message']);
	$FromDevice = trim($_POST['fromdevice']);
	//$Subject='    sfesefsf';
	//$Message='  fsesefs   ';
	//$userid = 96 ;
	//$username = 'anminghao';
	$wheresql = "uid = $userid";
	$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE  ".$wheresql);	
	$value = $_SGLOBAL['db']->fetch_array($query);
	$username = $value[username];

	if(trim($Message)==null || trim($Subject) == null){
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
		"topicid" => 0,
		"uid" => intval($userid), 
		"username" => getstr($username, 15, 1, 1, 1),
		"subject" => getstr($Subject, 80, 1, 1, 1),
		"classid" => 0,
		"viewnum" => 0,
		"replynum" => 0,
		"hot" => 0,
		"picflag" => 0,
		"noreply"=>0,
		'dateline' => $_SGLOBAL['timestamp'],
		'friend' => 1,
		'click_1' => 0,
		'click_2' => 0,
		'click_3' => 0,
		'click_4' => 0,
		'click_5' => 0,
		'fromdevice' => $FromDevice
		);
		$blogid = inserttable('blog', $arr,1);
		$arr1 = array(
		"blogid" => intval($blogid),
		"uid" => intval($userid), 
		"message" => getstr($Message, 5000, 1, 1, 1),
		"postip" => getonlineip(),
		"relatedtime" => 0,
		"magiccolor" => 0,
		"magicpaper" => 0,
		"magiccall" => 0
		);
		$blogfield = inserttable('blogfield',$arr1,1);
	
	include_once(S_ROOT.'./source/function_feed.php');
	feed_publish($blogid, 'blogid',0,$FromDevice);
	if($blogid){
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