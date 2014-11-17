<?php
/*
     gettherecoding.php用于获取某条记录的数据
     Add by am@ihome.2012-10-16  10:11


*/
    //include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');

	$doid = intval(trim($_POST[doingid]));
	//$doid = 232;
	$result = array();
    $perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$wheresql = "doid=$doid";
	$query = $_SGLOBAL['db']->query("SELECT uid,username,uid,message,dateline,doid FROM ".tname('doing')."  where ".$wheresql." LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					realname_set($value['uid'],$value[username]);
					}
					realname_get();
//将公告中的图片进行绝对路径化。  start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$TmpString = $item[1]; 
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	
			$value['message'] = str_replace($TmpString, $HrefString, $value['message']);
			}
	foreach($topiclist as $value){
		$result = array('news_userid'=>$value[uid],'news_username'=>$_SN[$value[uid]],'news_userpic'=>avatar($value[uid],small),'news_id'=>$value[doid],'news_text'=>$value[message],'news_time'=>$value[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>