<?php
/*
     getfriendslist.php获得当前登录用户或者用户好友的的好友列表信息
     Add by am@ihome.2012-09-25  09:20

*/
    
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());
    include_once('../../../common.php'); 
	$perpage = 20;
	//$userid=96;
	//获得好友的id
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT f.fusername, s.name, s.namestatus, s.groupid, s.uid, sf.note 
                                     FROM ".tname('friend')." f , ".tname('spacefield')." sf , ".tname('space')." s
                                     WHERE s.uid = f.fuid
                                     AND f.fuid = sf.uid
                                     AND f.uid =".$userid."
                                     AND f.status = '1' LIMIT $start,$perpage");
									 
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					//将好友状态中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
					preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['note'], $matches, PREG_SET_ORDER);

					foreach($matches as $item){
						$TmpString = $item[1]; 
						$HrefString = $_SCONFIG[siteallurl].$item[1];
				//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
				
						$value['note'] = str_replace($TmpString, $HrefString, $value['note']);
						}
					//将公告中的图片进行绝对路径化。 by xuxing end
					$friendslist[] = $value;
					realname_set($value['uid'],$value[name]);
					}
            realname_get();
	if($friendslist){
		foreach($friendslist as $value){
			$result[] = array('user_thumb_pic'=>avatar($value[uid],small),'user_name'=>$_SN[$value[uid]],'user_id'=>$value[uid],'user_last_message'=>$value[note]);
		}
}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>