<?php
/*
     do_getpubliclist.php获得公共主页列表信息
     Add by am@ihome.2013-08-30  11:07


*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
	//$userid = 96;
	$perpage = 20;
    $page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;

	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT f.fusername, s.name, s.namestatus, s.groupid, s.uid, sf.note 
                                     FROM ".tname('friend')." f , ".tname('spacefield')." sf , ".tname('space')." s
                                     WHERE s.uid = f.fuid
                                     AND f.fuid = sf.uid
                                     AND f.uid =".$userid."
                                     AND f.status = '1' AND groupid=3 LIMIT $start,$perpage");
								 
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
			$publist[] = $value;
			realname_set($value['uid'],$value[name]);
			}
		realname_get();
	if($publist){
		foreach($publist as $value){
			$result[] = array('pub_thumb_pic'=>avatar($value[uid],middle),
							'pub_name'=>$_SN[$value[uid]],
							'pub_id'=>$value[uid],
							'pub_last_message'=>$value[note]);
		}
}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>