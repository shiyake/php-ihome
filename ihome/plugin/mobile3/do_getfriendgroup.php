<?php
/*
     getfriendgrouplist.php获得当前登录用户或者用户好友分组下的的好友列表信息
     Add by am@ihome.2014-04-15  09:20

*/
    include_once('../../common.php'); 
    //include_once('do_mobileverify.php');

	//$perpage = 20;
	//$userid=5618;
	//获得好友分组的id
			$result[] = array('其他'=>0,
							'通过本站认识'=>1,
							'通过活动认识'=>2,
							'通过朋友认识'=>3,
							'亲人'=>4,
							'同事'=>5,
							'同学'=>6,
							'不认识'=>7);
		

	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>