<?php
/*
	do_getweekarrang.php用于返回本周的校园日历
	added by am@ihome 2012-12-13
*/
    include_once('../data_oauth_check.php');	
s	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');

    $perpage = 20;
    $page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
    $result = array();

	

    //摘要截取
	$summarylen = 100;
	$orderby = " order by starttime asc";
	$wheresql .= " starttime between ".time()." and ".(time()+(7*24*60*60)); 

	$query = $_SGLOBAL['db']->query("SELECT uid,message,subject,starttime,pic from ".tname('arrangement')." where  ".$wheresql."  LIMIT $start,$perpage");
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid']);
				$value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
				if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				$list[] = $value;
		}
	realname_get();
    foreach($list as $value){
		$result[] = array('user_thumbpic'=>avatar($value[uid],small),'feed_uid'=>$value[uid],'feed_name'=>$_SN[$value[uid]],'feed_id'=>'',
		'feed_type'=>'arrangement','feed_target_id'=>'',
		'feed_comment_flag'=>'arrangement',
		'feed_image_2'=>'','feed_image_3'=>'','feed_image_4'=>'','feed_detail'=>$value['message'],
		'feed_quote'=>$value[subject],'creat_at'=>$value[starttime],'feed_image_1'=>$value[pic]);
			}
    $result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();


?>