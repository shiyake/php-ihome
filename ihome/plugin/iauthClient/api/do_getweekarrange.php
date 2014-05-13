<?php
/*
	do_getweekarrang.php用于返回本周的校园日历
	added by am@ihome 2012-12-13
*/
    include_once('../iauth_verify_forward.php');	
    include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
    $perpage = 20;
    $page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
    $result = array();
    $userid = intval(iauth_verify());
	

    //摘要截取
	$summarylen = 100;
	$orderby = " order by starttime asc";
	$wheresql .= " starttime between ".time()." and ".(time()+(7*24*60*60)); 

	$query = $_SGLOBAL['db']->query("SELECT * from ".tname('arrangement')." where  $wheresql  LIMIT $start,$perpage");
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid']);
				$value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
				if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				$list[] = $value;
		}
	realname_get();
    foreach($list as $value){
				$result[] = array('arrange_pic'=>avatar($value['uid'],small),'arrange_id'=>$value['arrangementid'],'arrange_title'=>$value['subject'],'arrange_type'=>$value['classid'],'arrange_sttime'=>$value['starttime'],'arrange_message'=>$value['message'],'arrange_viewnum'=>$value['viewnum'],'arrange_replynum'=>$value['replynum'],'arrange_image'=>$value['pic'],'arrange_imgflag'=>$value['picflag']);
			}
    $result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();


?>