<?php
/*
     getgroups.php用于获得当前登录用户“我的群组”列表
     Add by am@ihome.2012-09-17  09:55

*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	//include_once(S_ROOT.'./uc_client/client.php');
	//@include_once(S_ROOT.'./data/data_profield.php');

	$multi = '';
	$count = 0;

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
//$userid=95;
	$start = ($page-1)*$perpage;
	$wheresql = "main.uid='$userid'";
	$sql = "SELECT main.*,mt.* FROM ".tname('tagspace')." main 
				LEFT JOIN ".tname('mtag')." mt ON mt.tagid=main.tagid
				WHERE ".$wheresql." ORDER BY mt.threadnum DESC LIMIT $start,$perpage";	
    $query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['groupname'] = $_SGLOBAL['profield'][$value['fieldid']]['title'];
		if(empty($value['pic'])) $value['pic'] = 'image/nologo.png';
		$markpos = strpos($value['pic'], "ttp://");
		if($markpos != 1){
			$value['pic'] = $_SCONFIG[siteallurl].$value['pic'];
		}
		//将公告中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['announcement'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$TmpString = $item[1]; 
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$value['announcement'] = str_replace($TmpString, $HrefString, $value['announcement']);
			}
		//将公告中的图片进行绝对路径化。 by xuxing end
		$grouplist[] = $value;
	}
	
	$result = array();
	
	
	foreach($grouplist as $value){
		$result[] = array('tag_id'=>$value[tagid],'tag_title'=>$value[tagname],'tag_member'=>$value[membernum],'tag_topic'=>$value[threadnum],
		'tag_reply'=>$value[postnum],'tag_pic'=>$value[pic],'announcement'=>$value[announcement],'thread_viewperm'=>$value[viewperm],
		'thread_threadperm'=>$value[threadperm],'thread_postperm'=>$value[postperm]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	
	
	
	
	
	
?>