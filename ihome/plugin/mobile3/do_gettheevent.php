<?php
/*
     do_gettheevent.php用于活动详情
     Add by am@ihome.2013-10-31  11:09


*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
	$eventid = intval(trim($_POST[eventid]));
	//$eventid = 12;
	$recommendevents = array();
	$time = $_SGLOBAL['timestamp'];
		// 只在全部活动下显示
		
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("event")." e LEFT JOIN ".tname("eventfield")." ef ON e.eventid=ef.eventid WHERE e.eventid='$eventid'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	$recommendevents[] = $value;
	foreach($recommendevents as $value){
		$result = array(
		'user_name'=>$_SN[$value[uid]],
		'user_id'=>$value[uid],
		'creattime'=>$value[dateline],
		'event_title'=>$value[title],
		'event_class'=>$value[classid],
		'event_province'=>$value[province],
		'event_city'=>$value['city'],
		'event_location'=>$value['location'],
		'event_pic'=>$value['pic'],
		'event_starttime'=>$value['starttime'],
		'event_endtime'=>$value['endtime'],
		'event_public'=>$value['public'],
		'event_membernum'=>$value['membernum'],
		'event_viewnum'=>$value['viewnum'],
		'event_hot'=>$value['hot'],
		'event_detail'=>$value['detail']
		);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>