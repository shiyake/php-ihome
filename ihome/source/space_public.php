﻿<?php
	if(!defined('iBUAA')) {
		exit('Access Denied');
	}

	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET audnum=friendnum WHERE groupid=3 AND audnum=0");
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 AND aud=''");
	
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	
		$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$value[uid]");
		$value1 = $_SGLOBAL['db']->fetch_array($query1);
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET aud='$value1[friend]' WHERE uid=$value[uid]");
		

	}
	//echo $space[uid];exit();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$space[uid]");	
	$value = $_SGLOBAL['db']->fetch_array($query);
	$myfeedfriend= explode(",", $value['feedfriend']);


	$nouids = $myfeedfriend;
	//$nouids[] = $space['uid'];
	

	$i = 0;
	$topplist = array();
	if ($_GET['sort'] == 'hot')
	{
		if ($_GET['type'] == 'nameorder')
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY username DESC limit 9");
		else if ($_GET['type'] == 'fansnum')
    		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY friendnum DESC limit 9");
		else if ($_GET['type'] == 'informationnum')
 			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY sharenum DESC limit 9");
		else if ($_GET['type'] == 'visitnum')
 			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY viewnum DESC limit 9");
		else if ($_GET['type'] == 'all')
            $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9");
		if ($_GET['type'] == 'nameorder')
        	$actives = array('nameorder'=>' class="active"');
     	else if ($_GET['type'] == 'fansnum')
        	 $actives = array('fansnum'=>' class="active"');
     	else if ($_GET['type'] == 'informationnum')
         	$actives = array('information'=>' class="active"');
     	else if ($_GET['type'] == 'visitnum')
          	$actives = array('visitnum'=>' class="active"');
		else if ($_GET['type'] == 'all')
			$actives = array('all'=>' class="active"');
	}
	else
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {	
		if($value['name']=='')$value['name']=$value['username'];
		
		if(in_array($value['uid'], $nouids)) {
			$value['a']=1;
		}else{
			$value['a']=0;
		}

		$topplist[] = $value;
		
		$i++;
		if($i>=9) break;		
	}
	$i = 0;
	$m = 0;
	//1为学院、2为部处、3为名人、4为学生组织、5为兴趣社团、6为学生党组织、7为活动主页、8为品牌主页、20为班级主页、100为航路研语、200为名师工作坊，默认0为其他；
	$publiclist = array();
	$addedplist = array();
	$sublist_1 = array();//学院
	$sublist_2 = array();//部处
	$sublist_3 = array();//名人
	$sublist_4 = array();//学生组织
	$sublist_5 = array();//兴趣社团
	$sublist_6 = array();//学生党组织
	$sublist_7 = array();//活动主页
	$sublist_8 = array();//品牌主页
	$sublist_20 = array();//班级主页
	$sublist_100 = array();//航路研语
	$sublist_200 = array();//名师工作坊
	$sublist_0 = array();//other
	

	//$query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY ppnum,name") ;
	if ($_GET['sort'] == 'not' || $_GET['sort'] == 'my')
	{
		if ($_GET['type'] == 'nameorder')
        	 $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY name");
    	else if ($_GET['type'] == 'fansnum')
        	 $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY friendnum");
    	else if ($_GET['type'] == 'fansnum')
        	 $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY sharenum");
    	else if ($_GET['type'] == 'visitnum')
        	 $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY viewnum");
		else if ($_GET['type'] == 'all')
             $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY ppnum,name");
        if ($_GET['type'] == 'nameorder')
            $actives = array('nameorder'=>' class="active"');
        else if ($_GET['type'] == 'fansnum')
             $actives = array('fansnum'=>' class="active"');
        else if ($_GET['type'] == 'informationnum')
            $actives = array('information'=>' class="active"');
        else if ($_GET['type'] == 'visitnum')
            $actives = array('visitnum'=>' class="active"');
        else if ($_GET['type'] == 'all')
            $actives = array('all'=>' class="active"');
	}
	else
		$query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY ppnum,name");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {	
		if($value['name']=='')$value['name']=$value['username'];
		if(in_array($value['uid'], $nouids)) {
			$value['a']=1;
		}else {
			$value['a']=0;
		}
		$publiclist[] = $value;
		if($value['pptype']=='1')$sublist_1[] = $value;
		if($value['pptype']=='2')$sublist_2[] = $value;
		if($value['pptype']=='3')$sublist_3[] = $value;
		if($value['pptype']=='4')$sublist_4[] = $value;
		if($value['pptype']=='5')$sublist_5[] = $value;
		if($value['pptype']=='6')$sublist_6[] = $value;
		if($value['pptype']=='7')$sublist_7[] = $value;
		if($value['pptype']=='8')$sublist_8[] = $value;
		if($value['pptype']=='20')$sublist_20[] = $value;
		if($value['pptype']=='100')$sublist_100[] = $value;
		if($value['pptype']=='200')$sublist_200[] = $value;
		if($value['pptype']=='0' || $value['pptype']=='')$sublist_0[] = $value;

		//$i++;
		if(in_array($value['uid'], $nouids)) {
			$addedplist[]= $value;
			//$j++;
		}
		
	}
	realname_get();
	

include_once template("space_public");
?>
