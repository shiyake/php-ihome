<?php
/*
     getuserinfo.php用于获得用户的具体信息
     Add by am@ihome.2012-09-26  15:35
	 Modify by am@ihome.2012-10-08 10:48 添加日志回复数


*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
    
	$uid = intval(trim($_POST[targetuid]));
	//$uid=3;
    //$userid = 96;
	$result  =  array();
	if(empty($uid)){
	   $id = $userid;
	}else{
	   $id = $uid;
	}
	$query = $_SGLOBAL['db']->query("SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ".tname('space')." s 
				, ".tname('spacefield')." sf ,".tname('usergroup')." ug where s.uid=sf.uid and s.groupid=ug.gid
                and s.uid =$id");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				    $value['mygroupname'] = $_SGLOBAL['profield'][$value['fieldid']]['title'];
					realname_set($value['uid'], $value['username']);
					$access = unserialize($value[privacy]);
					//将用户信息中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
					preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['note'], $matches, PREG_SET_ORDER);

					foreach($matches as $item){
						$TmpString = $item[1]; 
						$HrefString = $_SCONFIG[siteallurl].$item[1];
				//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
				
						$value['note'] = str_replace($TmpString, $HrefString, $value['note']);
						}
					//将用户信息中的图片进行绝对路径化。 by xuxing end
					$topiclist[] = $value;
					}
		realname_get();
		//权限判断    indexview个人主页的查看权限  feedview个人动态的查看权限 friendview好友列表的查看权限
	$query = $_SGLOBAL['db']->query("SELECT  friend  FROM  " .tname('spacefield')."  WHERE uid = $uid");
			while($rs = $_SGLOBAL['db']->fetch_array($query)){
				$s = $rs[friend];
			}
			$starlist= explode(',',$s);
	if($userid == $uid){
		   $indexview = 'indexviewsuccess';
		   $feedview = 'feedviewsuccess';
		   $friendview = 'friendviewsuccess';
	    }else if(!(in_array($userid,$starlist))){
	    if($access[view][index]==0 && $access[view][feed]==0 && $access[view][friend]==0){
		   $indexview = 'indexviewsuccess';
		   $feedview = 'feedviewsuccess';
		   $friendview = 'friendviewsuccess';
		}else if($access[view][index]==0 && $access[view][feed]==1 && $access[view][friend]==0){
		   $indexview = 'indexviewsuccess';
		   $feedview = 'feedviewfailed';
		   $friendview = 'friendviewsuccess';
		}else if($access[view][index]==0 && $access[view][feed]==1 && $access[view][friend]==1){
		   $indexview = 'indexviewsuccess';
		   $feedview = 'feedviewfailed';
		   $friendview = 'friendviewfailed';
		}else if($access[view][index]==0 && $access[view][feed]==1 && $access[view][friend]==2){
		   $indexview = 'indexviewsuccess';
		   $feedview = 'feedviewfailed';
		   $friendview = 'friendviewfailed';
		}else if($access[view][index]==0 && $access[view][feed]==0 && $access[view][friend]==1){
		   $indexview = 'indexviewsuccess';
		   $feedview = 'feedviewsuccess';
		   $friendview = 'friendviewfailed';
		}else{
		//echo 'aaaa';
		   $indexview = 'indexviewfailed';
		   $feedview = 'feedviewfailed';
		   $friendview = 'friendviewfailed';
		}   
    }else if(in_array($userid,$starlist)){
        if($access[view][index]==2){
		   $indexview = 'indexviewfailed';
		   $feedview = 'feedviewfailed';
		   $friendview = 'friendviewfailed';
        }else if($access[view][index]!=2){
            if($access[view][friend]==2){
		        $indexview = 'indexviewsuccess';
		        $feedview = 'feedviewsuccess';
		        $friendview = 'friendviewfailed';
		    }else{
			    $indexview = 'indexviewsuccess';
		        $feedview = 'feedviewsuccess';
		        $friendview = 'friendviewsuccess';
			}
    }	 
}
		
		
	foreach($topiclist as $value){
		$result = array(
		'indexviewflag'=>$indexview,
		'feedviewflag'=>$feedview,
		'friendviewflag'=>$friendview,
		'user_thumbpic'=>avatar($value[uid],middle),
		'user_name'=>$_SN[$value[uid]],
		'user_degree'=>$value[grouptitle],
		'user_lastfeed'=>$value[note],
		'user_friendcount'=>$value[friendnum],
		'user_topiccount'=>$value[threadnum],
		'user_blogcount'=>$value[blognum],
		'user_id' => $uid
		);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>