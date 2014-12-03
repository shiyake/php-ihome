<?php
/*
     addmessage.php发布站内信
     Add by am@ihome.2012-10-15  11:34

*/
    include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');

	//$MsgFrom =trim($_POST['msgfrom']);
	//$MsgFromId=intval($_POST['msgfromid']);
	$MsgFrom = $username;
	$MsgFromId = $userid;
	$MsgToId =intval($_POST['touid']);
	$Subject=$Message;
	$Pmid = empty($_POST['pmid'])?0:floatval($_POST['pmid']);
    $Message=trim($_POST['message']);
	$touid = $MsgToId;
	if(trim($Message)==null){
	    $arrs = array('flag'=>'null');
	}else if(strlen($Message) < 2){
		$arr = array('flag'=>'content_is_too_short');
	}else if($touid){
		if(isblacklist($touid)) {
			$arrs = array('flag'=>'fail');
		}
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
			//直接给一个用户发PM
			$return = uc_pm_send($MsgFromId, $touid, $Subject, $Message, 1, $Pmid, 0);
		if($return){
		$arrs = array('flag'=>'success');
		}else{
		$arrs = array('flag'=>'fail');
		}
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
?>