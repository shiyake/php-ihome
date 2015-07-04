<?php
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
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9");
	$hot = array('all'=>' class="active"');
	$display_hot = '""';
	$display_college = '"display:none;"';
	$display_department = '"display:none;"';
	$display_student = '"display:none;"';
	$display_interest = '"display:none;"';
	$display_student_party = '"display:none;"';
	$display_event = '"display:none;"';
	$display_brand = '"display:none;"';
	$display_classes = '"display:none;"';
	$display_english = '"display:none;"';
	$display_teacher = '"display:none;"';
	$display_others = '"display:none;"';
	$display_popular = '"display:none;"';
	$display_my = '"display:none;"';
	$types = array('hot'=>' class="active"');
	$more = ' class="more"';
	if ($_GET['sort'] == 'hot')
    {
        if ($_GET['type'] == 'nameorder')
            //select name, username, IF(name is NULL || name='', username, name) as s from ihome_space order by CONVERT (s using gbk);
            
            $query = $_SGLOBAL['db']->query("SELECT *,IF(name is NULL || name='',username,name) as s FROM (SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9) as t ORDER BY CONVERT (s using GBK)");
        else if ($_GET['type'] == 'fansnum')
            $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9");
        else if ($_GET['type'] == 'informationnum')
            $query = $_SGLOBAL['db']->query("SELECT * FROM (SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9) as t ORDER BY sharenum");
        else if ($_GET['type'] == 'visitnum')
            $query = $_SGLOBAL['db']->query("SELECT * FROM (SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9) as t ORDER BY viewnum");
        else if ($_GET['type'] == 'all')
            $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC limit 9");
		if ($_GET['sort'] == 'hot')
		{
        	if ($_GET['type'] == 'nameorder')
            	$hot = array('nameorder'=>' class="active"');
        	else if ($_GET['type'] == 'fansnum')
            	 $hot = array('fansnum'=>' class="active"');
        	else if ($_GET['type'] == 'informationnum')
            	$hot = array('information'=>' class="active"');
        	else if ($_GET['type'] == 'visitnum')
           		$hot = array('visitnum'=>' class="active"');
        	else if ($_GET['type'] == 'all')
            	$hot = array('all'=>' class="active"');
			$types = array('hot'=>' class="active"');
    	}
	} 
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
	$query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY ppnum,name");
	$college = array('all'=>' class="active"');
	$department = array('all'=>' class="active"');
	$student = array('all'=>' class="active"');
	$interest = array('all'=>' class="active"');
	$student_party = array('all'=>' class="active"');
	$event = array('all'=>' class="active"');
	$brand = array('all'=>' class="active"');
	$classes = array('all'=>' class="active"');
	$english = array('all'=>' class="active"');
	$teacher = array('all'=>' class="active"');
	$others = array('all'=>' class="active"');
	$popular = array('all'=>' class="active"');
	$my = array('all'=>' class="active"');
	if (!empty($_GET['sort']) && $_GET['sort'] != 'hot')
    {
        if ($_GET['type'] == 'nameorder')
            $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum,IF(name is NULL || name= '',username,name) as s FROM ".tname('space')." WHERE groupid=3 ORDER BY CONVERT (s using GBK)");
        else if ($_GET['type'] == 'fansnum')
            $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY audnum DESC");
        else if ($_GET['type'] == 'informationnum')
            $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY sharenum DESC");
        else if ($_GET['type'] == 'visitnum')
            $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY viewnum DESC");
        else if ($_GET['type'] == 'all')
            $query = $_SGLOBAL['db']->query("SELECT uid,name,username,pptype,audnum FROM ".tname('space')." WHERE groupid=3 ORDER BY ppnum DESC");
		if ($_GET['sort'] == 'my')
        {
			$types = array('my'=>' class="active"');
			$display_hot = '"display:none;"';
			$display_college = '"display:none;"';
			$display_department = '"display:none;"';
			$display_student = '"display:none;"';
			$display_interest = '"display:none;"';
			$display_student_party = '"display:none;"';
			$display_event = '"display:none;"';
			$display_brand = '"display:none;"';
			$display_classes = '"display:none;"';
			$display_english = '"display:none;"';
			$display_teacher = '"display:none;"';
			$display_others = '"display:none;"';
			$display_popular = '"display:none;"';
			$display_my = '"display:block;"';
            if ($_GET['type'] == 'nameorder')
                $my = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $my = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $my = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $my = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $my = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'college')
        {
			$types = array('college'=>' class="active"');
			$display_hot = '"display:none;"';
			$display_college = '"display:block;"';
			$display_department = '"display:none;"';
			$display_student = '"display:none;"';
			$display_interest = '"display:none;"';
			$display_student_party = '"display:none;"';
			$display_event = '"display:none;"';
			$display_brand = '"display:none;"';
			$display_classes = '"display:none;"';
			$display_english = '"display:none;"';
			$display_teacher = '"display:none;"';
			$display_others = '"display:none;"';
			$display_popular = '"display:none;"';
			$display_my = '"display:none;"';
            if ($_GET['type'] == 'nameorder')
                $college = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $college = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $college = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $college = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $college = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'department')
        {
			$types = array('department'=>' class="active"');
			$display_hot = '"display:none;"';
			$display_college = '"display:none;"';
			$display_department = '"display:block;"';
			$display_student = '"display:none;"';
			$display_interest = '"display:none;"';
			$display_student_party = '"display:none;"';
			$display_event = '"display:none;"';
			$display_brand = '"display:none;"';
			$display_classes = '"display:none;"';
			$display_english = '"display:none;"';
			$display_teacher = '"display:none;"';
			$display_others = '"display:none;"';
			$display_popular = '"display:none;"';
			$display_my = '"display:none;"';
            if ($_GET['type'] == 'nameorder')
                $department = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $department = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $department = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $department = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $department = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'student')
        {
			$types = array('student'=>' class="active"');
			$display_hot = '"display:none;"';
			$display_college = '"display:none;"';
			$display_department = '"display:none;"';
			$display_student = '"display:block;"';
			$display_interest = '"display:none;"';
			$display_student_party = '"display:none;"';
			$display_event = '"display:none;"';
			$display_brand = '"display:none;"';
			$display_classes = '"display:none;"';
			$display_english = '"display:none;"';
			$display_teacher = '"display:none;"';
			$display_others = '"display:none;"';
			$display_popular = '"display:none;"';
			$display_my = '"display:none;"';
            if ($_GET['type'] == 'nameorder')
                $student = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $student = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $student = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $student = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $student = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'interest')
        {
			$types = array('interest'=>' class="active"');
			$display_hot = '"display:none;"';
			$display_college = '"display:none;"';
			$display_department = '"display:none;"';
			$display_student = '"display:none;"';
			$display_interest = '"display:block;"';
			$display_student_party = '"display:none;"';
			$display_event = '"display:none;"';
			$display_brand = '"display:none;"';
			$display_classes = '"display:none;"';
			$display_english = '"display:none;"';
			$display_teacher = '"display:none;"';
			$display_others = '"display:none;"';
			$display_popular = '"display:none;"';
			$display_my = '"display:none;"';
            if ($_GET['type'] == 'nameorder')
                $interest = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $interest = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $interest = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $interest = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $interest = array('all'=>' class="active"');
         }
		/*
		else if ($_GET['sort'] == 'student_party')
        {
			$types = array('student_party'=>' class="active"');
			$display_hot = '"display:none;"';
			$display_college = '"display:none;"';
			$display_department = '"display:none;"';
			$display_student = '"display:none;"';
			$display_interest = '"display:none;"';
			$display_student_party = '"display:block;"';
			$display_event = '"display:none;"';
			$display_brand = '"display:none;"';
			$display_classes = '"display:none;"';
			$display_english = '"display:none;"';
			$display_teacher = '"display:none;"';
			$display_others = '"display:none;"';
			$display_popular = '"display:none;"';
			$display_my = '"display:none;"';
            if ($_GET['type'] == 'nameorder')
                $student_party = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $student_party = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $student_party = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $student_party = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $student_party = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'event')
        {
            if ($_GET['type'] == 'nameorder')
                $event = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $event = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $event = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $event = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $event = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'brand')
        {
            if ($_GET['type'] == 'nameorder')
                $brand = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $brand = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $brand = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $brand = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $brand = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'class')
        {
            if ($_GET['type'] == 'nameorder')
                $classes = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $classes = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $classes = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $classes = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $classes = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'english')
        {
            if ($_GET['type'] == 'nameorder')
                $english = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $english = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $english = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $english = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $english = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'teacher')
        {
            if ($_GET['type'] == 'nameorder')
                $teacher = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $teacher = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $teacher = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $teacher = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $teacher = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'others')
        {
            if ($_GET['type'] == 'nameorder')
                $others = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $others = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $others = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $others = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $others = array('all'=>' class="active"');
         }
		else if ($_GET['sort'] == 'popular')
        {
            if ($_GET['type'] == 'nameorder')
                $popular = array('nameorder'=>' class="active"');
            else if ($_GET['type'] == 'fansnum')
                $popular = array('fansnum'=>' class="active"');
            else if ($_GET['type'] == 'informationnum')
                $popular = array('information'=>' class="active"');
            else if ($_GET['type'] == 'visitnum')
                $popular = array('visitnum'=>' class="active"');
            else if ($_GET['type'] == 'all')
                $popular = array('all'=>' class="active"');
         }*/
	} 
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
