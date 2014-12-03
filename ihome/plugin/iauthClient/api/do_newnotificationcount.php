<?php
/*
     do_newnotificationcount.php用于获得当前用户的新消息数目
     Add by am@ihome.2012-12-07  14:09


*/
    include_once('../iauth_verify_forward.php');
    include_once('../../../common.php');	
    $userid = intval(iauth_verify());
    //$userid = 1;
	
	$query = $_SGLOBAL['db']->query("SELECT count(new) FROM " .tname('notification')."  where uid = $userid and new = 1 ");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					}
	foreach($topiclist as $value){
		
		$result = array('count'=>$value['count(new)']);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>