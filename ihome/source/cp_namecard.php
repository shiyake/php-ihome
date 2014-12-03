<?php
/*
	cp_namecard.php is get the ajax post, and then return the userbaseinfo.
	writen by xuxing@ihome. 2013-4-27
*/

	if(!defined('iBUAA')) {
		exit('Access Denied');
	}

	//$op = empty($_GET['op'])?0:intval($_GET['op']);
	$uid = empty($_GET['uid'])?0:intval($_GET['uid']);

	
		$result = getuserbaseinfo($uid);
		if($uid != $space['uid']){
			$result['common'] = getcommonfriendlist($space['uid'],$uid,1);
		}
		$dept = isDepartment($uid);
		if ($dept) {
			$result['duty'] = $dept['depduty'];
		}
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	
?>