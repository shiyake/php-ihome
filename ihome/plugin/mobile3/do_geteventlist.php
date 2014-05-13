<?php
/*
     do_geteventlist.php用于活动列表
     Add by am@ihome.2013-10-31  11:09


*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
    
	$recommendevents = array();
	$time = time();
		// 只在全部活动下显示
	//echo $time;	
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("event")."  where endtime > $time");
	
		while($value = $_SGLOBAL['db']->fetch_array($query)){
				if($value['poster']){
					$value['pic'] = pic_get($value['poster'], $value['thumb'], $value['remote']);
				} else {
					$value['pic'] = $_SGLOBAL['eventclass'][$value['classid']]['poster'];
				}
				$recommendevents[] = $value;
			realname_set($value['uid'], $value['username']);
		}
		realname_get();
	//echo $value[starttime];
	//echo $value[endtime];
	foreach($recommendevents as $value){
		$result[] = array(
		'user_name'=>$_SN[$value[uid]],
		'user_id'=>$value[uid],
		'creattime'=>$value[dateline],
		'event_id'=>$value['eventid'],
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
		);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>