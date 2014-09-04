<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(!in_array($_GET['op'], array('base','contact','edu','work','info','cour','recommed','flink','sync','asst'))) {
	$_GET['op'] = 'base';
}

$theurl = "cp.php?ac=profile&op=$_GET[op]";
if($_GET['op'] == 'base') {
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		
		if(!@include_once(S_ROOT.'./data/data_profilefield.php')) {
			include_once(S_ROOT.'./source/function_cache.php');
			profilefield_cache();
		}
		$profilefields = empty($_SGLOBAL['profilefield'])?array():$_SGLOBAL['profilefield'];
	
		//提交检查
		$setarr = array(
			'birthyear' => intval($_POST['birthyear']),
			'birthmonth' => intval($_POST['birthmonth']),
			'birthday' => intval($_POST['birthday']),
			'blood' => getstr($_POST['blood'], 5, 1, 1),
			'marry' => intval($_POST['marry']),
			'birthprovince' => getstr($_POST['birthprovince'], 20, 1, 1),
			'birthcity' => getstr($_POST['birthcity'], 20, 1, 1),
			'resideprovince' => getstr($_POST['resideprovince'], 20, 1, 1),
			'residecity' => getstr($_POST['residecity'], 20, 1, 1)
		);
		
		//性别
		$_POST['sex'] = intval($_POST['sex']);
		if($_POST['sex'] && empty($space['sex'])) $setarr['sex'] = $_POST['sex'];
	
		foreach ($profilefields as $field => $value) {
			if($value['formtype'] == 'select') $value['maxsize'] = 255;
			$setarr['field_'.$field] = getstr($_POST['field_'.$field], $value['maxsize'], 1, 1);
			if($value['required'] && empty($setarr['field_'.$field])) {
				showmessage('field_required', '', 1, array($value['title']));
			}
		}
		
		updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
		
		//隐私
		$inserts = array();
		foreach ($_POST['friend'] as $key => $value) {
			$value = intval($value);
			$inserts[] = "('base','$key','$space[uid]','$value')";
		}
		if($inserts) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='base'");
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend)
				VALUES ".implode(',', $inserts));
		}

		//主表实名
		$setarr = array(
			'name' => getstr($_POST['name'], 40, 1, 1, 1),
			'namestatus' => $_SCONFIG['namecheck']?0:1
		);
		if(checkperm('managename')) {
			 $setarr['namestatus'] = 1;
		}
	
		if($setarr['name'] && strlen($setarr['name']) < 4) {//不能小于4个字符			
			showmessage('realname_too_short');
		}
		if($setarr['name'] != $space['name'] || $setarr['namestatus']) {
			
			//第一次填写实名
			if($_SCONFIG['realname'] && empty($space['name']) &&  $setarr['name'] != $space['name'] && $setarr['namestatus']) {
				$reward = getreward('realname', 0);
				if($reward['credit']) {
					$setarr['credit'] = $space['credit'] + $reward['credit'];
				}
				if($reward['experience']) {
					$setarr['experience'] = $space['experience'] + $reward['experience'];
				}
			
			} elseif($_SCONFIG['realname'] && $space['namestatus'] && !checkperm('managename')) {	//扣减积分
				$reward = getreward('editrealname', 0);
				//积分
				if($space['name'] && $setarr['name'] != $space['name'] && ($reward['credit'] || $reward['experience'])) {
					//验证经验值
					if($space['experience'] >= $reward['experience']) {
						$setarr['experience'] = $space['experience'] - $reward['experience'];
					} else {
						showmessage('experience_inadequate', '', 1, array($space['experience'], $reward['experience']));
					}
				
					if($space['credit'] >= $reward['credit']) {
						$setarr['credit'] = $space['credit'] - $reward['credit'];
					} else {
						showmessage('integral_inadequate', '', 1, array($space['credit'],  $reward['credit']));
					}
				}
			}
			updatetable('space', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
		}
		//国外校友事件处理
		if(!empty($_POST['sync']))	{
			$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET overseas_tip = '".$_POST['sync']."' WHERE uid=".$_SGLOBAL['supe_uid']);
		}

		
		
		if( $_SGLOBAL['overseas'] == 'overseas' )	{

			$country = trim($_POST['country']);
			$overseas_school = trim($_POST['overseas_school']);
			//更改表中spaceforeign信息
			//如果已经存在，且结果和当前输入一样
			$flag_different = false;
			$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid=".$_SGLOBAL['supe_uid']);
			if($res = $_SGLOBAL['db'] -> fetch_array($query))	{
				if( $res['country']==$country && $res['school']==$overseas_school )	{
					$flag_different = true;
				}
			}
			
			if(!$flag_different&&!empty($country)&&!empty($overseas_school))	{
				$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." as a left join ".tname("space")." as b on a.uid=b.uid WHERE a.uid='".$_SGLOBAL['supe_uid']."'");
				if($value = $_SGLOBAL['db']->fetch_array($query))	{
					$name = $value['name'];
					$username = $value['username'];
					$_SGLOBAL['db'] -> query("UPDATE ".tname("spaceforeign")." SET school='".$overseas_school."' , country = '".$country."' , dataline = '".$_SGLOBAL[timestamp]."',cer=0 WHERE uid='".$_SGLOBAL['supe_uid']."' ");
					$_SGLOBAL['db'] -> query("UPDATE ".tname("forgienCreate")." SET school='".$overseas_school."', country = '".$country."' WHERE username='".$value['username']."'");
				}
				else {//spaceforeign表没有则进行添加
					$res = getIpDetails();
					$lng = $res['longitude'];
					$lat = $res['latitude'];
					$forg = array(
						"uid"=>$_SGLOBAL['supe_uid'],
						"ip"=>getonlineip(),
						"country"=>$country,
						"school"=>$overseas_school,
						"lng"=>$lng,
						"lat"=>$lat,
						'dataline'=>$_SGLOBAL['timestamp']
					);
					inserttable("spaceforeign",$forg);
					//forgienCreate表插入数据
					$username = $_SGLOBAL['supe_username'];
					$insert_msg = array(
						"username" => $_SGLOBAL['username'],
						"country" => $country,
						"school" => $overseas_school
					);
					inserttable("forgienCreate",$insert_msg);
				}
				//发送给外事处
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("space")." WHERE consul=1");
				if($res = $_SGLOBAL['db']->fetch_array($query))	{
					$recver = $res['uid']; 
				}
				$setarr = array(
					'uid' => $recver,
					'type' => "friend",
					'new' => 1,
					'authorid' => $_SGLOBAL['supe_uid'],
					'author' => $value['name'],
					'note' => "{$value['name']}登录名{$value['username']}来自$country,$school".'向您发起了认证请求<br/><a href="space.php?do=friend&view=confirmoverseas&uid=%27'.$_SGLOBAL['supe_uid'].'%27&type=overseas">通过请求</a><span class="pipe">|</span><a href="space.php?do=friend&view=refuseoverseas&uid=%27'.$_SGLOBAL['supe_uid'].'%27&type=overseas">忽略</a>',
					'dateline' => $_SGLOBAL['timestamp']
				) ;
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$recver'");
				inserttable('notification', $setarr);	
			}	
			
		}
		//变更记录
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>0), 0, true);
		}
		
		//产生feed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_base'));
		}
	
		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=contact';
		} else {
			$url = 'cp.php?ac=profile&op=base';
		}
		showmessage('update_on_successful_individuals', $url);
	}

	//性别
	$sexarr = array($space['sex']=>' checked');
	
	//生日:年
	$birthyeayhtml = '';
	$nowy = sgmdate('Y');
	for ($i=0; $i<100; $i++) {
		$they = $nowy - $i;
		$selectstr = $they == $space['birthyear']?' selected':'';
		$birthyeayhtml .= "<option value=\"$they\"$selectstr>$they</option>";
	}
	//生日:月
	$birthmonthhtml = '';
	for ($i=1; $i<13; $i++) {
		$selectstr = $i == $space['birthmonth']?' selected':'';
		$birthmonthhtml .= "<option value=\"$i\"$selectstr>$i</option>";
	}
	//生日:日
	$birthdayhtml = '';
	for ($i=1; $i<32; $i++) {
		$selectstr = $i == $space['birthday']?' selected':'';
		$birthdayhtml .= "<option value=\"$i\"$selectstr>$i</option>";
	}
	//血型
	$bloodhtml = '';
	foreach (array('A','B','O','AB') as $value) {
		$selectstr = $value == $space['blood']?' selected':'';
		$bloodhtml .= "<option value=\"$value\"$selectstr>$value</option>";
	}
	//婚姻
	$marryarr = array($space['marry'] => ' selected');
	
	//栏目表单
	$profilefields = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('profilefield')." ORDER BY displayorder");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$fieldid = $value['fieldid'];
		$value['formhtml'] = '';
	
		if($value['formtype'] == 'text') {
			$value['formhtml'] = "<input type=\"text\" name=\"field_$fieldid\" value=\"".$space["field_$fieldid"]."\" class=\"t_input\">";
		} else {
			$value['formhtml'] .= "<select name=\"field_$fieldid\">";
			if(empty($value['required'])) {
				$value['formhtml'] .= "<option value=\"\"></option>";
			}
			$optionarr = explode("\n", $value['choice']);
			foreach ($optionarr as $ov) {
				$ov = trim($ov);
				if($ov) {
					$selectstr = $space["field_$fieldid"]==$ov?' selected':'';
					$value['formhtml'] .= "<option value=\"$ov\"$selectstr>$ov</option>";
				}
			}
			$value['formhtml'] .= "</select>";
		}
	
		$profilefields[$value['fieldid']] = $value;
	}
	
	if(empty($_SCONFIG['namechange'])) {
		$_GET['namechange'] = 0;//不允许修改
	}
	
	//隐私
	$friendarr = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='base'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$friendarr[$value['subtype']][$value['friend']] = ' selected';
	}


} elseif ($_GET['op'] == 'contact') {
	
	if($_GET['resend']) {
		//重新发送邮箱验证
		$toemail = $space['newemail']?$space['newemail']:$space['email'];
		emailcheck_send($space['uid'], $toemail);
		showmessage('do_success', "cp.php?ac=profile&op=contact");
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//提交检查
		$setarr = array(
			'mobile' => getstr($_POST['mobile'], 40, 1, 1),
			'qq' => getstr($_POST['qq'], 20, 1, 1),
			'msn' => getstr($_POST['msn'], 80, 1, 1),
		);
		
		//邮箱问题
		$newemail = isemail($_POST['email'])?$_POST['email']:'';
		if(isset($_POST['email']) && $newemail != $space['email']) {
			
			//检查邮箱唯一性
			if($_SCONFIG['uniqueemail']) {
				if(getcount('spacefield', array('email'=>$newemail, 'emailcheck'=>1))) {
					showmessage('uniqueemail_check');
				}
			}
			
			//验证密码
			if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
				showmessage('password_is_not_passed');
			}
			
			//邮箱修改
			if(empty($newemail)) {
				//邮箱删除
				$setarr['email'] = '';
				$setarr['emailcheck'] = 0;
			} elseif($newemail != $space['email']) {
				//之前已经验证
				if($space['emailcheck']) {
					//发送邮件验证，不修改邮箱
					$setarr['newemail'] = $newemail;
				} else {
					//修改邮箱
					$setarr['email'] = $newemail;
				}
				emailcheck_send($space['uid'], $newemail);
			}
		}
		
		updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
		
		//如果是部处,则对应更新powerlevel表中的手机号
		if(isDepartment($_SGLOBAL['supe_uid'] ,1)){
			$mobile = $setarr['mobile'];
			$aeskeyMobile = getAESKey('Mobile');
			$mobile = M_encode($mobile,$aeskeyMobile);
			$powerlevel['mobile'] = $mobile;
			updatetable('powerlevel', $powerlevel, array('dept_uid'=>$_SGLOBAL['supe_uid']));
			//更新缓存中的powerlevel.php文件
			updatePowerlevelFile();
		}
		
		
		//隐私
		$inserts = array();
		foreach ($_POST['friend'] as $key => $value) {
			$value = intval($value);
			$inserts[] = "('contact','$key','$space[uid]','$value')";
		}
		if($inserts) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='contact'");
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend)
				VALUES ".implode(',', $inserts));
		}

		//变更记录
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//产生feed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_contact'));
		}
		
		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=edu';
		} else {
			$url = 'cp.php?ac=profile&op=contact';
		}
		showmessage('update_on_successful_individuals', $url);
	}
	
	//隐私
	$friendarr = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='contact'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$friendarr[$value['subtype']][$value['friend']] = ' selected';
	}
	
} elseif ($_GET['op'] == 'edu') {
	
	if($_GET['subop'] == 'delete') {
		$infoid = intval($_GET['infoid']);
		if($infoid) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE infoid='$infoid' AND uid='$space[uid]' AND type='edu'");
		}
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//提交检查
		$inserts = array();
		foreach ($_POST['title'] as $key => $value) {
			$value = getstr($value, 100, 1, 1);
			if($value) {
				$subtitle= getstr($_POST['subtitle'][$key], 20, 1, 1);
				$startyear = intval($_POST['startyear'][$key]);
				$class = getstr($_POST['class'][$key], 20, 1, 1);
				$friend = intval($_POST['friend'][$key]);
				$inserts[] = "('$space[uid]','edu','$value','$subtitle','$startyear','$class','$friend')";
			}
		}
		if($inserts) {
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')."(uid,type,title,subtitle,startyear,class,friend) VALUES ".implode(',', $inserts));
		}
		
		//变更记录
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//产生feed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_edu'));
		}

		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=work';
		} else {
			$url = 'cp.php?ac=profile&op=edu';
		}
		showmessage('update_on_successful_individuals', $url);
	}
	
	//当前已经设置的学校
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='edu'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['title_s'] = urlencode($value['title']);
		$list[] = $value;
	}
	
} elseif ($_GET['op'] == 'work') {
	
	
	if($_GET['subop'] == 'delete') {
		$infoid = intval($_GET['infoid']);
		if($infoid) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE infoid='$infoid' AND uid='$space[uid]' AND type='work'");
		}
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//提交检查
		$inserts = array();
		foreach ($_POST['title'] as $key => $value) {
			$value = getstr($value, 100, 1, 1);
			if($value) {
				$provincenum = intval($_POST['province'][$key]); 
				switch($provincenum){
					case 1:  $province = '北京';break;
					case 3:  $province = "上海";break;
					case 2:  $province = "天津";break;
					case 4:  $province = "重庆";break;
					case 5:  $province = "河北";break;
					case 6:  $province = "山西";break;
					case 7:  $province = "内蒙古";break;
					case 8:  $province = "辽宁";break;
					case 9:  $province = "吉林";break;
					case 10: $province = "黑龙江";break;
					case 11: $province = "江苏";break;
					case 12: $province = "浙江";break;
					case 13: $province = "安徽";break;
					case 14: $province = "福建";break;
					case 15: $province = "江西";break;
					case 16: $province = "山东";break;
					case 17: $province = "河南";break;
					case 18: $province = "湖北";break;
					case 19: $province = "湖南";break;
					case 20: $province = "广东";break;
					case 21: $province = "广西";break;
					case 22: $province = "海南";break;
					case 23: $province = "四川";break;
					case 24: $province = "贵州";break;
					case 25: $province = "云南";break;
					case 26: $province = "西藏";break;
					case 27: $province = "陕西";break;
					case 28: $province = "甘肃";break;
					case 29: $province = "宁夏";break;
					case 30: $province = "青海";break;
					case 31: $province = "新疆";break;
					case 32: $province = "香港";break;
					case 33: $province = "澳门";break;
					case 34: $province = "台湾";break;
					default : break;
				}
				$city = getstr($_POST['city'][$key],20,1,1);
				$subtitle= getstr($_POST['subtitle'][$key], 20, 1, 1);
				$startyear = intval($_POST['startyear'][$key]);
				$startmonth = intval($_POST['startmonth'][$key]);
				$endyear = intval($_POST['endyear'][$key]);
				$endmonth = $endyear?intval($_POST['endmonth'][$key]):0;
				$friend = intval($_POST['friend'][$key]);
				$inserts[] = "('$space[uid]','work','$value','$subtile','$startyear','$startmonth','$endyear','$endmonth','$friend','$city','$province')";
			}
		}
		if($inserts) {
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')."
				(uid,type,title,subtitle,startyear,startmonth,endyear,endmonth,friend,city,province)
				VALUES ".implode(',', $inserts));
		}

		//变更记录
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//产生feed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_work'));
		}


		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=info';
		} else {
			$url = 'cp.php?ac=profile&op=work';
		}
		showmessage('update_on_successful_individuals', $url);
	}
	
	//当前已经设置
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='work'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['title_s'] = urlencode($value['title']);
		$list[] = $value;
	}
	
} elseif ($_GET['op'] == 'info') {
	
	if($_GET['subop'] == 'delete') {
		$infoid = intval($_GET['infoid']);
		if($infoid) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE infoid='$infoid' AND uid='$space[uid]' AND type='info'");
		}
	}
	if(submitcheck('profilesubmit')) {
		$infoarr = array(

			'book' => '喜欢的书籍',
			'movie' => '喜欢的电影',
			'tv' => '喜欢的电视',
			'music' => '喜欢的音乐',
			'game' => '喜欢的游戏',
			'sport' => '喜欢的运动',
			'trainwith' => '我想结交',
			'interest' => '兴趣爱好',
			'idol' => '偶像',
			'motto' => '座右铭',
			'wish' => '最近心愿',
			'intro' => '我的简介'
		);
		$inserts = array();
		mysql_set_charset('utf8');
		//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info'");
		foreach($infoarr as $s_key => $s_value) {
				$temp = array();

			foreach ($_POST['name_'.$s_key] as $key => $value) {
					if(!getstr($value, 100, 1, 1)) {
						break;
					}
					$temp[]= getstr($value, 100, 1, 1);
					foreach ($temp as $ikey => $ivalue) {
						$temp[$ikey] = '《'.$temp[$ikey].'》';
						if(!get_magic_quotes_gpc()) {
							$temp[$ikey] = addslashes($temp[$ikey]);
						}
					}
				}
			if($temp) {
				$fname_value = implode(',',$temp);
			} 
			$fclass_value = null;
			if(!empty($_POST[$s_key])) {
				$class = array();
				$class = $_POST[$s_key];
				foreach ($class as $ikey => $ivalue) {
					$class[$ikey] = '['.$class[$ikey].']';
					//$class[$ikey] = $class[$ikey];
					if(!get_magic_quotes_gpc()) {
						$class[$ikey] = addslashes($class[$ikey]);
					}
					
				}
				$fcalss_value = implode(',',$class);

			}
			
			
			
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info' AND subtype='$s_key'");
			while ($sourcevalue = $_SGLOBAL['db']->fetch_array($query)) {
				if($sourcevalue['title']) {
					$tempresult_value = $sourcevalue['title'];
					//$str = "DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info' AND subtype='$s_key' AND title='".$sourcevalue[title]."'";
					$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info' AND subtype='$s_key' AND title='".$sourcevalue[title]."'");
				}
			}
			
			if($fname_value || $fcalss_value || $tempresult_value) {
				if(!empty($tempresult_value)) {
					$result_value = $tempresult_value;
				}
				
				if(!empty($fname_value)) {
					if(empty($result_value)) {
						$result_value = $fname_value;
					} else {
						$result_value .= ','.$fname_value; 
					}	
				}
				
				if(!empty($fcalss_value)) {
					if(empty($result_value)) {
						$result_value = $fcalss_value;
					} else {
						$result_value = $fcalss_value.','.$result_value;
					}
				}
				$inserts[] = "('$space[uid]','info','$s_key','$result_value')";
				$fname_value = null;
				$fcalss_value = null;
				$tempresult_value = null;
				$result_value = null;
			}
		}

		
		
		if($inserts) {
			//$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info'");
		
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')."
				(uid,type,subtype,title)
				VALUES ".implode(',', $inserts));
		}
	
		//变更记录
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//产生feed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_info'));
		}


		$url = 'cp.php?ac=profile&op=info';
		showmessage('update_on_successful_individuals', $url);
	}
	
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!get_magic_quotes_gpc()) {
			$value['title'] = stripcslashes($value['title']);
		}
		if($value['subtype'] == 'book') {
			$value['showsubtype'] = '书籍';
		} else if($value['subtype'] == 'movie') {
			$value['showsubtype'] = '电影';
		} else if($value['subtype'] == 'music') {
			$value['showsubtype'] = '音乐';
		} else if($value['subtype'] == 'intro') {
			$value['showsubtype'] = '简介';
		} else if($value['subtype'] == 'interest') {
			$value['showsubtype'] = '爱好';
		} else if($value['subtype'] == 'trainwith') {
			$value['showsubtype'] = '交友';
		} else if($value['subtype'] == 'tv') {
			$value['showsubtype'] = '电视';
		} else if($value['subtype'] == 'game') {
			$value['showsubtype'] = '游戏';
		} else if($value['subtype'] == 'sport') {
			$value['showsubtype'] = '运动';
		} else if($value['subtype'] == 'idol') {
			$value['showsubtype'] = '偶像';
		} else if($value['subtype'] == 'motto') {
			$value['showsubtype'] = '座右铭';
		} else if($value['subtype'] == 'wish') {
			$value['showsubtype'] = '愿望';
		}
		
		
		$list[$value['subtype']] = $value;
	}
	
} elseif ($_GET['op'] == 'cour') {
	
	
	if($_GET['subop'] == 'delete') {
		$courseid = intval($_GET['courseid']);
		if($courseid) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('course')." WHERE courseid='$courseid' AND uid='$space[uid]'");
		}
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//提交检查
		$inserts = array();
		if($value) {
				$day = getstr($_POST['day'],10,1,1);
				$times = intval($_POST['times']);
				$timef= intval($_POST['timef']);
				$coursename = getstr($_POST['coursename'],20,1,1);
				$inserts[] = "('$space[uid]','$day','$times','$timef','$coursename')";
			}
		}
		if($inserts) {
			$_SGLOBAL['db']->query("INSERT INTO ".tname('course')."
				(uid,day,times,timef,coursename)
				VALUES ".implode(',', $inserts));
		}

		//变更记录
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//产生feed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_work'));
		}
	
	//当前已经设置
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('course')." WHERE uid='$space[uid]'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$gquery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." WHERE tagname='$value[coursename]'");
		if ($gresult = $_SGLOBAL['db']->fetch_array($gquery)) {
			$gpath = "space.php?do=mtag&tagid=".$gresult['tagid'];
		} else {
			$gpath = "cp.php?ac=mtag";
		}
		$fquery = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('course')." WHERE coursename='$value[coursename]' AND uid!='$space[uid]'");
		if ($fresult = $_SGLOBAL['db']->fetch_array($fquery)) {
			$partner[] = $fresult ;
			$fpath = "cp.php?searchsubmit=查找&ac=friend&op=search&uid=".$fresult['uid'];
		}		
		$value['gpath'] = $gpath;
		$value['fpath'] = $fpath;
		$list[] = $value;
	}
	
} elseif($_GET['op'] == 'flink'){
	if(submitcheck('flinksubmit')) {
		$flink[0]['fname'] = trim(strip_tags($_POST['fname'][0]));
		$flink[0]['flink'] = $_POST['flink'][0];
		$flink[1]['fname'] = trim(strip_tags($_POST['fname'][1]));
		$flink[1]['flink'] = $_POST['flink'][1];
		$flink[2]['fname'] = trim(strip_tags($_POST['fname'][2]));
		$flink[2]['flink'] = $_POST['flink'][2];
		$flink[3]['fname'] = trim(strip_tags($_POST['fname'][3]));
		$flink[3]['flink'] = $_POST['flink'][3];
		$flink[4]['fname'] = trim(strip_tags($_POST['fname'][4]));
		$flink[4]['flink'] = $_POST['flink'][4];
		$flink[5]['fname'] = trim(strip_tags($_POST['fname'][5]));
		$flink[5]['flink'] = $_POST['flink'][5];
		//$data['flink'] = json_encode($flink,JSON_UNESCAPED_UNICODE);
		$data['flink'] = encode_json($flink);
		$isSuccess = $_SGLOBAL['db']->query("REPLACE INTO ".tname("publicflink")." (uid,flink) VALUES (".$_SGLOBAL[supe_uid].",'".$data['flink']."')"); 
		$msg = 0;
		if($isSuccess){
			$msg = 1;
		}
	}else{
		$fquery = $_SGLOBAL['db']->query("SELECT flink FROM ".tname('publicflink')." WHERE uid=$_SGLOBAL[supe_uid]");
		if ($fresult = $_SGLOBAL['db']->fetch_array($fquery)) {
			$flink = json_decode($fresult['flink'],true);
		}
	}

	//print_r($isSuccess);
	
} elseif( $_GET['op']=='sync' ){
	if(submitcheck("syncsubmit"))	{
		$sync = $_POST['sync'] ;
		$_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET overseas_tip='".$POST['sync']."'");
	}
} elseif ($_GET['op']=='asst') {
	if(submitcheck('asstsubmit')) {
		// $degree = $_POST['degree'];
		$degree = '本科';
		$year = $_POST['year'];
		$academy = $_POST['academy'];
		$q = $_SGLOBAL['db']->query("SELECT username, name FROM ".tname("space")." WHERE uid=$_SGLOBAL[supe_uid]");
		$r = $_SGLOBAL['db']->fetch_array($q);
		$username = $r['username'];
		$name = $r['name'];

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("asst")." WHERE uid=$_SGLOBAL[supe_uid] and passed=0");
		if ($res = $_SGLOBAL['db']->fetch_array($query)) {
			showmessage("您的申请正在审查中，请耐心等候~");
		} else {
			$q = $_SGLOBAL['db']->query("SELECT realbirth FROM ".tname("spacefield")." WHERE uid=$_SGLOBAL[supe_uid]");
			$r = $_SGLOBAL['db']->fetch_array($q);
			$birthday = $r['realbirth'];
			$_SGLOBAL['db']->query("INSERT INTO ".tname('asst')." SET uid=".$_SGLOBAL[supe_uid].", username='".$username."', name='".$name."', birthday='".$birthday."', applydate='".$_SGLOBAL[timestamp]."', degree='".$degree."', year='".$year."', academy='".$academy."'");
		}

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("space")." WHERE asstConsul=1");
		if($res = $_SGLOBAL['db']->fetch_array($query))	{
			$recver = $res['uid']; 
		}
		$setarr = array(
			'uid' => $recver,
			'type' => "friend",
			'new' => 1,
			'authorid' => $_SGLOBAL['supe_uid'],
			'author' => $name,
			'note' => "{$name}登录名{$username}".'向您发起了'.$degree.$year.'级'.$academy.'辅导员的认证请求<br/><a href="space.php?do=friend&view=confirmasst&uid=%27'.$_SGLOBAL['supe_uid'].'%27&type=asst">通过请求</a><span class="pipe">|</span><a href="space.php?do=friend&view=refuseasst&uid=%27'.$_SGLOBAL['supe_uid'].'%27&type=asst">拒绝</a>',
			'dateline' => $_SGLOBAL['timestamp']
		);
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid='$recver'");
		inserttable('notification', $setarr);

		$url = 'cp.php?ac=profile&op=asst';
		showmessage('do_success', $url);
	} else {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("asst")." WHERE uid=$_SGLOBAL[supe_uid] ORDER BY applydate desc LIMIT 1");
		$asst_verified = 13;
		if ($res = $_SGLOBAL['db']->fetch_array($query)) {
			$asst_verified = $res['state'];
			$degree = $res['degree'];
			$year = $res['year'];
			$academy = $res['academy'];
		}
	}
}
$cat_actives = array($_GET['op'] => ' class="active"');


if($_GET['op'] == 'edu' || $_GET['op'] == 'work') {
	$yearhtml = '';
	$nowy = sgmdate('Y');
	for ($i=0; $i<61; $i++) {
		$they = $nowy - $i;
		$yearhtml .= "<option value=\"$they\">$they</option>";
	}
	
	$monthhtml = '';
	for ($i=1; $i<13; $i++) {
		$monthhtml .= "<option value=\"$i\">$i</option>";
	}
}
$overseas_verified = 13;
if($_SGLOBAL['overseas'])	{
	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid='".$_SGLOBAL['supe_uid']."'");
	
	if($res = $_SGLOBAL['db']->fetch_array($query))	{
		$overseas_verified = $res['cer'];
		$country = $res['country'] ;
		$school = $res['school'] ; 

	}

}
include template("cp_profile");



function encode_json($str) {  
	return urldecode(json_encode(url_encode($str)));      
} 
function url_encode($str) {  
	if(is_array($str)) {  
		foreach($str as $key=>$value) {
			$str[urlencode($key)] = url_encode($value);  
		}
	}else{  
		$str = urlencode($str);  
	}  
	return $str;  
}
?>
