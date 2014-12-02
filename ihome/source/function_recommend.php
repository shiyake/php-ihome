<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//引入基础函数
/*include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./source/function_magic.php');*/
include_once(S_ROOT.'./source/function_common.php');




//获得空间信息
$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}




	$nouids = $space['friends'];
	$nouids[] = $space['uid'];
	$friendlist = array();
	$tempfriendlist = array();
	if($space['feedfriend']) {

		$query = $_SGLOBAL['db']->query("SELECT fuid AS uid, fusername AS username FROM ".tname('friend')."
			WHERE uid IN (".$space['feedfriend'].") LIMIT 0,10");

		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(!in_array($value['uid'], $nouids) && $value['username']) {
				realname_set($value['uid'], $value['username']);
				$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
				$value['commonfriendcount'] = count($value['commonfriend']);
				if($value['commonfriendcount'] > 0) {
					//$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
					$value['cause'] = '好友的好友';
					$tempfriendlist[$value['uid']] = $value;
				}
			}
		}
	}
	$friendlist = $tempfriendlist;
	foreach ($tempfriendlist as $key => $value) {
		$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
		$value = $_SGLOBAL['db']->fetch_array($query);	
		$friendlist[$value['uid']]['realname'] = $value['realname'];
	}


	//同事推荐
	$recommendcolleaguelist = array();
	$temprecommendcolleaguelist = array();
	$prequery = $_SGLOBAL['db']->query("SELECT isi.title FROM ".tname('spaceinfo')." AS isi WHERE isi.uid=".$space['uid']."  AND isi.title IS NOT NULL  AND isi.type='work'");
	while($prevalue = $_SGLOBAL['db']->fetch_array($prequery)){
		
		$title = $prevalue['title'];
	}
	$query = $_SGLOBAL['db']->query("SELECT si.uid, title, subtitle,username FROM ".tname('spaceinfo')." 
		AS si,".tname('space')." AS s WHERE si.uid=s.uid   AND s.uid!=".$space['uid']." 
		AND si.type = 'work'
		AND si.title='".$title."'  LIMIT 0,10");
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!in_array($value['uid'], $nouids) && $value['username']) {
			realname_set($value['uid'],$value['username']);
//			$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
//			$value['commonfriendcount'] = count($value['commonfriend']);
			$value['cause'] = $value['title'];
			$temprecommendcolleaguelist[$value['uid']] = $value;
				
		}
	}
	$recommendcolleaguelist = $temprecommendcolleaguelist;
	foreach ($temprecommendcolleaguelist as $key => $value) {
		$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
		$value = $_SGLOBAL['db']->fetch_array($query);	
		$recommendcolleaguelist[$key]['realname'] = $value['realname'];	
	}
		

	//老乡推荐
	$villagerlist = array();
	$tempvillagerlist = array();
	$prequery = $_SGLOBAL['db']->query("SELECT birthprovince,birthcity FROM ".tname('spacefield')." WHERE uid=".$space['uid']);
	while ($prevalue = $_SGLOBAL['db']->fetch_array($prequery)){
		$province = $prevalue['birthprovince'];
		$city = $prevalue['birthcity'];
	}
	if(!empty($province)) {
	
		$query = $_SGLOBAL['db']->query("SELECT sf.uid ,sf.birthprovince,s.username FROM ".tname('spacefield')." AS sf,".tname('space')." AS s
			 	WHERE   sf.birthprovince='".$province."'  AND sf.uid=s.uid
			 	AND sf.uid!=".$space['uid']." LIMIT 0,10" );
		
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(!in_array($value['uid'], $nouids) && $value['username']) {
				
				
				realname_set($value['uid'],$value['username']);
	//			$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
	//			$value['commonfriendcount'] = count($value['commonfriend']);
				
				$value['cause'] = $value['birthprovince'];
				$tempvillagerlist[$value['uid']] = $value;
						
			}
		}
		$villagerlist = $tempvillagerlist;
		foreach ($tempvillagerlist as $key => $value) {
			$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
			$value = $_SGLOBAL['db']->fetch_array($query);	
			$villagerlist[$value['uid']]['realname'] = $value['realname'];	
		}
	}

	


	//在同一个城市居住
	$samecitylist = array();
	$tempsamecitylist = array();

	$prequery = $_SGLOBAL['db']->query("SELECT resideprovince,residecity FROM ".tname('spacefield')." WHERE uid=".$space['uid']);
	while ($prevalue = $_SGLOBAL['db']->fetch_array($prequery)){
		$province = $prevalue['resideprovince'];
		$city = $prevalue['residecity'];
	}
	
	if(!empty($province) && !empty($city)) {
		
			$query = $_SGLOBAL['db']->query("SELECT sf.uid,s.username,sf.resideprovince,sf.residecity FROM ".tname('spacefield')." AS sf,".tname('space')." AS s
				WHERE  sf.uid=s.uid AND sf.resideprovince='".$province."' AND sf.residecity='".$city."'  
				AND  sf.uid!=".$space['uid']." LIMIT 0,10" );
	
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			
			
			if(!in_array($value['uid'], $nouids) && $value['username']) {
				
				
				realname_set($value['uid'],$value['username']);
	//			$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
	//			$value['commonfriendcount'] = count($value['commonfriend']);
				$value['cause'] = $value['residecity'];
				$tempsamecitylist[$value['uid']] = $value;
					
			}
			
		
	
		}
		$samecitylist = $tempsamecitylist;
		foreach ($tempsamecitylist as $key => $value) {
			$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
			$value = $_SGLOBAL['db']->fetch_array($query);	
			$samecitylist[$key]['realname'] = $value['realname'];	
		}
	}


/*	//在同一个城市工作
	$samecityworklist = array();
	$tempsamecityworklist = array();
	$prequery = $_SGLOBAL['db']->query("SELECT isi.title FROM ".tname('spaceinfo')." AS isi WHERE isi.uid=".$space['uid']." AND isi.type='work' AND isi.title IS NOT NULL");
	$prevalue = $value = $_SGLOBAL['db']->fetch_array($prequery);
	$query = $_SGLOBAL['db']->query("SELECT si.uid, si.title, si.subtitle,username,city FROM ".tname('spaceinfo')." 
			AS si,".tname('space')." AS s WHERE si.uid=s.uid  AND s.uid!=".$space['uid']." 
			AND si.type = 'work' 
			AND si.title IS NOT NULL
			AND si.uid NOT IN (SELECT f.fuid FROM ".tname('friend')." AS f WHERE f.uid=".$space['uid']." )
			AND si.title='".$prevalue['title']."' LIMIT 0,10");

		while($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'],$value['username']);
		$value['commonfriendcount'] = getcommonfriendcount($space['uid'],$value['uid']);
		$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
		$value['cause'] = $value['city'].$value['title'];
		$samecityworklist[$value['uid']] = $value;
	}
	$samecityworklist = $tempsamecityworklist;
	foreach ($tempsamecityworklist as $key => $value) {
		$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
		$value = $_SGLOBAL['db']->fetch_array($query);	
		$samecityworklist[$value['uid']]['realname'] = $value['realname'];	
	}*/
	
	
	

	
	
	
	
		
	
	
	
	//同班同学推荐
	$sameclasslist = array();
	$tempsameclasslist = array();
	
	$prequery = $_SGLOBAL['db']->query("SELECT isi.subtitle FROM ".tname('spaceinfo')." AS isi WHERE isi.uid=".$space['uid']."  AND isi.subtitle IS NOT NULL  AND isi.type='edu'");
	while($prevalue = $_SGLOBAL['db']->fetch_array($prequery)){
		$class = $prevalue['subtitle'];
	}
	if(!empty($class)) {
		$query = $_SGLOBAL['db']->query("SELECT si.uid, si.title, si.subtitle,username,city,si.type FROM ".tname('spaceinfo')." 
				AS si,".tname('space')." AS s 
				WHERE  si.uid=s.uid 
				AND si.subtitle='".$class."' AND si.type='edu' AND si.uid!=".$space['uid']);
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(!in_array($value['uid'], $nouids) && $value['username']) {
				realname_set($value['uid'],$value['username']);
	//			$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
	//			$value['commonfriendcount'] = count($value['commonfriend']);
				
				$value['cause'] = $value['subtitle'];
				$tempsameclasslist[$value['uid']] = $value;
					
			}
	
				
		}
		$sameclasslist = $tempsameclasslist;
		foreach ($tempsameclasslist as $key => $value) {
			$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
			$value = $_SGLOBAL['db']->fetch_array($query);
			$sameclasslist[$key]['realname'] = $value['realname'];	
		}
	}

		
		
		
		
	//	附近的人
	$nearlist = array();
	$templist = array();
	$myip = getonlineip(1);

	$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('session')."
		WHERE ip='$myip' LIMIT 0,200");

	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!in_array($value['uid'], $nouids)) {
			realname_set($value['uid'], $value['username']);
//			$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
//			$value['commonfriendcount'] = count($value['commonfriend']);
			$value['cause'] = 'TA在您附近';
			$templist[$value['uid']] = $value;
		}
	} 
	$nearlist = $templist;
	foreach ($templist as $key => $value) {
		$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
		$value = $_SGLOBAL['db']->fetch_array($query);	
		$nearlist[$value['uid']]['realname'] = $value['realname'];	
	}

	
	
	
	//在线
	$onlinelist = array();
	$temponlinelist = array();
	$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('session')." LIMIT 0,200");

	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!in_array($value['uid'], $nouids)) {
			realname_set($value['uid'], $value['username']);
//			$value['commonfriend']	= getcommonfriend($space['uid'],$value['uid']);
//			$value['commonfriendcount'] = count($value['commonfriend']);
			$value['cause'] = 'TA在线';
			$temponlinelist[$value['uid']] = $value;
		}
	}
	$onlinelist = $temponlinelist;
	foreach ($temponlinelist as $key => $value) {
		$query = $_SGLOBAL['db']->query("SELECT uid,realname  FROM ".tname('spacefield')." WHERE uid='".$key."'");
		$value = $_SGLOBAL['db']->fetch_array($query);	
		$onlinelist[$value['uid']]['realname'] = $value['realname'];	
	}
	


	//实名
	realname_get();
	$reclist = array();
	$tempreclist = array();
	$reclist = $friendlist;
	if(empty($reclist)) {
		$reclist = $villagerlist;
	}
	if(empty($reclist)) {
		$reclist = $samecitylist; 
	}
	if(empty($reclist)) {
		$reclist = $recommendcolleaguelist;
	} 
	if(empty($reclist)) {
		$reclist = $sameclasslist;
	} 
	if(!empty($reclist)) {
		shuffle($reclist);
	}	
	
	
?>