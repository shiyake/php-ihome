<?php
/*
     deletefriend.php删除好友
     Add by am@ihome.2012-10-19  09:55

*/
    include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');
	$uid = intval(trim($_POST[targetuid]));
	

    
	$fstatus = getfriendstatus($uid, $space['uid']);
	$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$uid'");
	$value1 = $_SGLOBAL['db']->fetch_array($query1);
		
		
	$m_gid = $value1['groupid'];
	$fstatus = getfriendstatus($uid, $_SGLOBAL['supe_uid']);
	if($m_gid == 3) {

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$_SGLOBAL[supe_uid]");	
		$value = $_SGLOBAL['db']->fetch_array($query);
		$myfeedfriend = explode(",", $value['feedfriend']);
		$myfeedfriend = array_flip(array_flip($myfeedfriend));//唯一化数组元素

		if(!in_array($uid, $myfeedfriend)) {
			$arrs = array('flag'=>'fail');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}
			//修改自己的feedfriend，不再接受feed
			$k = array_search($uid,$myfeedfriend);
			//$myfeedfriend = implode(',',$myfeedfriend);
//showmessage($myfeedfriend[$k]);
			//在数组中删除不再关注的用户ID
			unset($myfeedfriend[$k]);
			$f = implode(',',$myfeedfriend);
			
			$setarrAAA=array('feedfriend' => $f );
			$up = updatetable('spacefield',$setarrAAA,array('uid'=>$_SGLOBAL['supe_uid']));

			//减少粉丝数
			$auds = explode(",", $value1['aud']);
			$auds = array_flip(array_flip($auds));//唯一化数组元素
			$k = array_search($_SGLOBAL[supe_uid],$auds);
			unset($auds[$k]);
			$f = implode(',',$auds);			
			//减少publicpage的粉丝数
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET aud='".$f."', audnum=".count($auds)." WHERE uid='$uid'");
			
		}

		//////////lv///////////////
		//对方与我的关系
		//$fstatus = getfriendstatus($uid, $space['uid']);
		if($fstatus == 1) {
			//取消双向好友关系
			friend_update($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username'], $uid, '', 'ignore');
		} elseif ($fstatus == 0) {
			request_ignore($uid);
		}
		if($up){
			$arrs = array('flag'=>'success');
		}else{
			$arrs = array('flag'=>'fail');
		}
	$result = json_encode($arrs);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
	
	
?>