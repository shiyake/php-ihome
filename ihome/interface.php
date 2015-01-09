<?php
include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
function getEmpty($var) {
	if (empty($var))	{
		return "";
	}
	else {
		return $var;
	}
}

function public_interface($uid,$username,$cat) {
	global $_SGLOBAL;
	$cat_rel = array("1"=>"学院","2"=>"部处","3"=>"名人","4"=>"学生组织","5"=>"兴趣社团","6"=>"学生党组织","7"=>"活动主页","8"=>"品牌主页","20"=>"班级主页","100"=>"航路研语","200"=>"名师工作坊");
	if($cat)	{
		foreach( $cat_rel as $key=>$value )	{
			if ($value == $cat)	{
				$cat = $key;
				break;
			}
		}
	}
	if ($uid)	{
		$sql = "SELECT uid,username,pptype FROM ihome_space where uid=".$uid." and groupid=3";
		$res = $_SGLOBAL['db']->query($sql);
		$arr = array();
		if (empty($res))	{
			$arr = array("status"=>"This uid not exists or not a public page!");
		}
		else {
			$resuid = $uid;
			$resusername = "";
			$rescat = "";
			while($value = $_SGLOBAL['db']->fetch_array($res))	{
				$resusername = $value['username'];
				$rescat = $cat_rel[$value['pptype']];
			}
			$arr = array("status"=>"success","uid"=>$resuid,"username"=>$resusername,"category"=>$rescat);
		}
		echo json_encode($arr);
		return json_encode($arr);
	}
	elseif ($username)	{
		$sql = "SELECT uid,username,pptype FROM ihome_space where username='".$username."' and groupid=3";
		$res = $_SGLOBAL['db']->query($sql);
		$arr = array();
		if (empty($res))	{
			$arr = array("status"=>"This username not exists or not a public page!");
		}
		else {
			$resuid = "";
			$resusername = $username;
			$rescat = "";
			while($value = $_SGLOBAL['db']->fetch_array($res))	{
				$resuid = $value['uid'];
				$rescat = $cat_rel[$value['pptype']];
			}
			$arr = array("status"=>"success","uid"=>$resuid,"username"=>$resusername,"category"=>$rescat);
		}
		echo json_encode($arr);
		return json_encode($arr);
	}
	elseif ($cat)	{
		$sql = "SELECT uid,username,pptype FROM ihome_space where pptype=".$cat." and groupid=3";
		$res = $_SGLOBAL['db']->query($sql);
		$arr = array();
		if (empty($res))	{
			$arr = array("status"=>"This category not exists or not a public page!");
		}
		else {
			$resuid = $uid;
			$resusername = "";
			$rescat = "";
			$cats = array();
			while($value = $_SGLOBAL['db']->fetch_array($res))	{
				$resusername = $value['username'];
				$rescat = $value['pptype'];
				$resuid = $value['uid'];
				$cats[] = array("uid"=>$value['uid'],"username"=>$value['username'],"category"=>$cat_rel[$value['pptype']]);
			}
			$arr = array("status"=>"success","categroies"=>$cats);
		}
		echo json_encode($arr);
		return json_encode($arr);
	}
	else {
		echo json_encode($cat_rel);
		return json_encode($cat_rel);
	}
}
function freshmanregister_interface($realname,$birthday,$email)	{
	global $_SCONFIG,$_SGLOBAL;
	$res_json = array();
	$email = isemail($email)?$email:'';
	if (empty($realname))	{
		$res_json = array("status"=>"error","reason"=>"Realname is empty!");
	}
	if (empty($birthday))	{
		$res_json = array("status"=>"error","reason"=>"Birthday is empty!");
	}
	if (empty($email))	{
		$res_json = array("status"=>"error","reason"=>"Email is empty or format error!");
	}
	if($_SCONFIG['checkemail'])	{
		if($count = getcount('spacefield',array('email'=>$email)))	{
			$res_json = array("status"=>"error","reason"=>"Email has been registered!");
		}
	}
	$ThisYear = date('Y');//获取当前年
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' and startyear=$ThisYear limit 1");
	$bp = $_SGLOBAL['db']->fetch_array($query);
	if(empty($bp))	{
		$res_json = array("status"=>"error","reason"=>"Realname with birthday is invalid!");
	}
	if($bp['isactive'] == 1)
	{
		$res_json = array("status"=>"error","reason"=>"The user have actived!");
	}
	if($bp['startyear'] < $ThisYear )
	{
		$res_json = array("status"=>"error","reason"=>"This user is frashman!");
	}
	if(!@include_once S_ROOT.'./uc_client/client.php')
	{
		$res_json = array("status"=>"error","reason"=>"System error!");
	}
	$num = strpos($email,'@');
	$num = ($num > 15) ? 15 : $num;
	$username = substr($email, 0 ,$num);
	$password = $birthday;
	$newuid = uc_user_register($username, $password, $email);
	if($newuid <= 0) {
		if($newuid == -1)	{
			$res_json = array("status"=>"error","Username is not legitimate!");
		}
		elseif($newuid == -2)	{
			$res_json = array("status"=>"error","Include not registered words!");
		}
		elseif($newuid == -3)	{
			$res_json = array("status"=>"error","Please change an email address!");
		}
		elseif($newuid == -4)	{
			$res_json = array("status"=>"error","Email format is wrong");
		}
		elseif($newuid == -5)	{
			$res_json = array("status"=>"error","Email not registered");
		}
		else	{
			$res_json = array("status"=>"error","Register error");
		}
	}
	else {
		//检查uid是否在ucenter里面，如果不在，就采取野蛮方式插入新纪录
		$q = $_SGLOBAL['db']->query("SELECT uid FROM ihomeuser_members WHERE uid='$newuid'");
		$members_match = $_SGLOBAL['db']->fetch_array($q);
		$members_match = $members_match['uid'];
		$q = $_SGLOBAL['db']->query("SELECT uid FROM ihomeuser_memberfields WHERE uid='$newuid'");
		$memberfields_match = $_SGLOBAL['db']->fetch_array($q);
		$memberfields_match = $memberfields_match['uid'];
		if(!$members_match && !$memberfields_match)	{
			$salt = substr(uniqid(rand()), -6);
            $hhpassword = md5(md5($password).$salt);
            $sqladd = "uid='".intval($newuid)."',";
            $sqladd .= " secques='',";
            $_SGLOBAL['db']->query("INSERT INTO ihomeuser_members SET $sqladd username='$username', password='$hhpassword', email='$email', regip='".$_SERVER["HTTP_X_FORWARDED_FOR"]."', regdate='".time()."', salt='$salt'");
            $_SGLOBAL['db']->query("INSERT INTO ihomeuser_memberfields SET uid='$newuid'");
        }
		$setarr = array(
			'uid' => $newuid,
			'username' => $username,
			'password' => md5($password)//本地密码随机生成
		);
        inserttable('actionlog', array('uid'=>"$newuid", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'register', 'value'=>'freshman'));
		//更新本地用户库
		inserttable('member', $setarr, 0, true);
		//开通空间
		include_once(S_ROOT.'./source/function_space.php');
		$space = space_open($newuid, $username, 0, $email);
		//默认好友
		$flog = $inserts = $fuids = $pokes = array();
		if(!empty($_SCONFIG['defaultfusername']))
		{
			$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('space')." WHERE	username IN (".simplode(explode(',', $_SCONFIG['defaultfusername'])).")");
			while ($value = $_SGLOBAL['db']->fetch_array($query))	{
				$value = saddslashes($value);
				$fuids[] = $value['uid'];
				$inserts[] = "('$newuid','$value[uid]','$value[username]','1','$_SGLOBAL[timestamp]')";
				$inserts[] = "('$value[uid]','$newuid','$username','1','$_SGLOBAL[timestamp]')";
				$pokes[] = "('$newuid','$value[uid]','$value[username]','".addslashes($_SCONFIG['defaultpoke'])."','$_SGLOBAL[timestamp]')";
				//添加好友变更记录
				$flog[] = "('$value[uid]','$newuid','add','$_SGLOBAL[timestamp]')";
			}
			if($inserts)	{
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $inserts));
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('poke')." (uid,fromuid,fromusername,note,dateline) VALUES ".implode(',', $pokes));
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('friendlog')." (uid,fuid,action,dateline) VALUES ".implode(',', $flog));
				//添加到附加表
				$friendstr = empty($fuids)?'':implode(',', $fuids);
				updatetable('space', array('friendnum'=>count($fuids), 'pokenum'=>count($pokes)), array('uid'=>$newuid));
				updatetable('spacefield', array('friend'=>$friendstr, 'feedfriend'=>$friendstr), array('uid'=>$newuid));
				//更新默认用户好友缓存
				include_once(S_ROOT.'./source/function_cp.php');
				foreach ($fuids as $fuid)	{
					friend_cache($fuid);
				}
			}
		}

		//加入新用户
		inserttable('spacefield', array('uid'=>$newuid), 0, true);

		//baseprofile的事情了!!
		$birth_year = intval(substr($birthday, 0, 4));
		$birth_month = intval(substr($birthday, 4, 2));
		$birth_day = intval(substr($birthday, 6, 2));			
		if( $bp['sex'] == '男')
		{
			$sexc = 1;
		}
		elseif($bp['sex'] == '女')
		{
			$sexc = 2;
		}
		else
		{
			$sexc = 0;
		}			
		if(empty($bp['identifier']))
		{
			$insertinfo = array('realname' => $bp['realname'], 'realbirth' => $birthday, 'sex' => $sexc, 'email' => $email, 'birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
			updatetable('spacefield', $insertinfo, array('uid' => $newuid));
		}
		else
		{
			$insertinfo = array('identifier' =>$bp['identifier'],'realname' => $bp['realname'], 'realbirth' => $birthday, 'sex' => $sexc, 'email' => $email, 'birthyear'=>$birth_year, 'birthmonth'=>$birth_month, 'birthday'=>$birth_day);
			updatetable('spacefield', $insertinfo, array('uid' => $newuid));
		}
		if($birth_year && $birth_month && $birth_day){
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",3)");
		}
		$space = array('uid'=>$newuid, 'name'=>$bp['realname'], 'namestatus'=>1);
		updatetable('space', $space, array('uid'=>$newuid));	

		//获取该用户的所有基础信息用于填充其教育经历
		$EduArray = array();
		$userids = '';
		$query = $_SGLOBAL['db']->query("SELECT userid,collegeid,school,academy,startyear,class,sourcearea FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' order by startyear");
		while($EduResult = $_SGLOBAL['db']->fetch_array($query)){
			$userids .= $EduResult['userid'].",";
			if($EduResult['startyear']){
				if($EduArray[$EduResult["startyear"]]){
					if($EduResult['class']){
						$EduArray[$EduResult["startyear"]] = array('collegeid'=>$EduResult['collegeid'],'school'=>$EduResult['school'],'academy'=>$EduResult['academy'],'sourcearea'=>$EduResult['sourcearea'],'class'=>$EduResult['class'],'startyear'=>$EduResult['startyear']);
					}
				}else{
					$EduArray[$EduResult["startyear"]] = array('collegeid'=>$EduResult['collegeid'],'school'=>$EduResult['school'],'academy'=>$EduResult['academy'],'sourcearea'=>$EduResult['sourcearea'],'class'=>$EduResult['class'],'startyear'=>$EduResult['startyear']);
				}
			}
		}
		foreach($EduArray as $key => $value)	{
			if(empty($value['collegeid']))	{
				//教育信息
				if(!empty($value['startyear']))
				{
					$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle' => $value['academy'],	'startyear'=>$value['startyear']);
					inserttable('spaceinfo', $eduinfo, 1);

					//应该要加一个段记录该学生为本科还是研究生********************（缺）
					//还要考虑没有生日信息但有身份证号存在的情况................（缺）



					//加入群组:1,同年级;2,区域.
					$tagname = $value['startyear'].'级本科生';				
					joinGrade($newuid, $tagname, $_SGLOBAL['db']);
					$tagname = $value['startyear'].'级'.$value['sourcearea'].'本科生';
					joinArea($newuid, $tagname, $_SGLOBAL['db']);

				}
			}
			elseif(!empty($value['collegeid']))
			{
				$thefour = intval(substr($value['collegeid'], 3, 1));
				if($thefour == 2 || $value['class'])
				{
					$newclass = substr($value['collegeid'], 0, 7);
					$class = (!empty($value['class']))?$value['class']:$newclass;
					$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$value['academy'].$value['startyear'].'级'.$class.'班', 'startyear'=>$value['startyear']);
					inserttable('spaceinfo', $eduinfo, 1);

					$tagname = $value['startyear'].'年'.$class.'班';
					auto_join($newuid, $tagname, $_SGLOBAL['db']);

					$classB = preg_replace('/([a-zA-Z]*\d{4})\d*/','${1}', $class);
					$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$value['academy'].$value['startyear'].'级'.$classB.'大班', 'startyear'=>$value['startyear']);
					inserttable('spaceinfo', $eduinfo, 1);

					$tagname = $value['startyear'].'年'.$classB.'大班';
					$tagid = auto_join($newuid, $tagname, $_SGLOBAL['db']);

					$assts = getGroupAsst($tagid);
					foreach ($assts as $asst) {
						$q = $_SGLOBAL['db']->query("SELECT username FROM ".tname("space")." WHERE uid=".$asst);
						if ($v = $_SGLOBAL['db']->fetch_array($q)) {
							$asstname = $v['username'];
							friend_update($newuid, $username, $asst, $asstname, 'invite');
						}
					}
				}
			}

		}
		if(substr($userids,-1,1)==','){
			$userids = substr($userids,0,-1);
		}
		$_SGLOBAL['db']->query("update " . tname("baseprofile") . " set isactive='1',uid=$newuid WHERE userid in ($userids)");
		$res_json = array("status"=>"correct","uid"=>$newuid,"email"=>$email,"username"=>$username,"password"=>$password);
	}
	echo json_encode($res_json);
	return json_encode($res_json);
}
function quickregister_interface($quickcollegeid,$quickpassword)	{
	//先是验证是否已经激活
	$collegeid = trim($quickcollegeid);
	$collegepw = $quickpassword;
	$verifyname = verifycollegeid($collegeid, $collegepw);
	$res_json = array();
	if($verifyname == -1){
		$res_json = array('status'=>"error","reason"=>'collegeid_is_null');
	}elseif($verifyname == -2){
		$res_json = array('status'=>'error','reason'=>'collegepassword_is_null');
	}
	if(empty($verifyname->out->string)){
		$res_json = array('status'=>'error','reason'=>'verify_fail');
	}
	$username = $collegeid;
	$password = $collegepw;
	$query = $_SGLOBAL['db']->query("SELECT identifier,identifier_not_use, realname,birthday, sex, defaultemail, isactive, emaildateline FROM ".tname('baseprofile')." WHERE collegeid='$collegeid'  and (usertype like binary '教师' or (usertype between 1 and 5) or usertype like binary '学生') limit 1");
	$one = $_SGLOBAL['db']->fetch_array($query);
	$id = $one['identifier_not_use'];
	$realname = $one['realname'];
	$birthday_exist = $one['birthday'];		
	if(strlen($id)==18){
		$birthday_id = substr($id,6,8);
	}elseif(strlen($id)==16){
		$birthday_id = '19'.substr($id,6,6);
	}
	if($one){
		$wheresql="0";
		if($id){
			$wheresql .= " or identifier_not_use='".$id."'";
		}
		if(strlen($birthday_exist)==8){
			$wheresql .= " or (realname='".$realname."' and birthday='".$birthday_exist."')";
		}
		if($birthday_id){
			$wheresql .= " or (realname='".$realname."' and birthday='".$birthday_id."')";
		}
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE $wheresql");
		$flagnotactive = 0;
		$flagactive = 0;
		$userlines = $recordids = array();
		$c_uid = 0;

		while($row = $_SGLOBAL['db']->fetch_array($query)){
			$userlines[] = $row;
			if($row['isactive'] == '1'){
				$flagactive = 1;
			}else{
				$flagnotactive = 1;
				$recordids[] = $row['userid'];
			}

			if($row['uid']){
				if(!$c_uid){
					$c_uid = $row['uid'];
				}elseif($c_uid != $row['uid']){
					$act_err = 1;
				}
			}
		}

		//如果一个人激活了多个ihome账号时，系统将向ihome邮箱发送检查邮件
		if($act_err){
			$title = cplang('active_different_uids_title');
			$content = $collegeid." ".$realname." ".cplang('active_different_uids_content');
			$cid = inserttable('mailcron', array('email'=>'ihome@buaa.edu.cn'), 1);
			$setarr = array(
				'cid' => $cid,
				'subject' => addslashes(stripslashes($title)),
				'message' => addslashes(stripslashes($content)),
				'dateline' => $_GLOBAL['timestamp']
			);
			inserttable('mailqueue', $setarr);
		}
		//如果既有激活的 也有没激活的 更新没激活的信息
		if($flagactive == 1 && $flagnotactive == 1){
			$useridlist = implode(',',$recordids);
			$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1, uid=$c_uid WHERE userid in ($useridlist)");					
			foreach($userlines as $value){
				if($value['isactive'] != '1'){
					if($value['academy']){
						if($value['usertype'] == '教师'||$value['usertype']==5||$value['usertype']==4){
							$workinfo = array('uid'=>$c_uid, 'type'=>'work', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear'], 'city'=>'北京');
							inserttable('spaceinfo', $workinfo, 1);
						}
						if(strlen($value['collegeid']) != 5 && strlen($value['collegeid']) != 6){
							if(!in_array($value['collegeid'],$collegeids)){
								$collegeids[]=$value['collegeid'];
								$eduinfo = array('uid'=>$c_uid, 'type'=>'edu', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear']);
								inserttable('spaceinfo', $eduinfo, 1);
							}
						}
					}

				}						
			}
			$res_json = array("status"=>"error","indentifier is active");
		}elseif($flagactive == 1){
			$res_json = array("status"=>"error","indentifier is active");
		}
	}else{
		$res_json = array('status'=>"error","reason"=>"Please use correct register method!");
	}
	if($_SCONFIG['seccode_register'])
	{
		include_once(S_ROOT.'./source/function_cp.php');
		if(!ckseccode($_POST['quickseccode']))
		{
			$res_json = array("status"=>"error","reason"=>'incorrect_code');
		}
	}
	if(!@include_once S_ROOT.'./uc_client/client.php')
	{
		$res_json = array("status"=>"error","reason"=>'system_error');
	}			
	$email = isemail(trim($_POST['quickemail']))?trim($_POST['quickemail']):'';
	if(empty($email))
	{
		$res_json = array('status'=>'error','reason'=>'email_format_is_wrong');
	}
	if($count = getcount('space', array('username'=>$username)))
	{
		$res_json = array('status'=>'error','reason'=>'user_name_already_exists');
	}
	if($count = getcount('spacefield', array('email'=>$email)))
	{
		$res_json = array('status'=>'error','reason'=>'email_has_been_registered');
	}
	$onlineip = getonlineip();
	if($_SCONFIG['regipdate'])
	{
		$query = $_SGLOBAL['db']->query("SELECT dateline FROM ".tname('space')." WHERE regip='$onlineip' ORDER BY dateline DESC LIMIT 1");
		if($value = $_SGLOBAL['db']->fetch_array($query))
		{
			if($_SGLOBAL['timestamp'] - $value['dateline'] < $_SCONFIG['regipdate']*3600)
			{
				$res_json = array('status'=>'regip_has_been_registered');
			}
		}
	}

	//验证完成
	//创建新用户.开始
	$newuid = uc_user_register($username, $password, $email);
	if($newuid <= 0)
	{
		if($newuid == -1)
		{
			$res_json = array('status'=>'error','reason'=>'user_name_is_not_legitimate');
		}
		elseif($newuid == -2)
		{
			$res_json = array('status'=>'error','reason'=>'include_not_registered_words');
		}
		elseif($newuid == -3)
		{
			$res_json = array('status'=>'error','reason'=>'user_name_already_exists');
		}
		elseif($newuid == -4)
		{
			$res_json = array('status'=>'error','reason'=>'email_format_is_wrong');
		}
		elseif($newuid == -5)
		{
			$res_json = array('status'=>'error','reason'=>'email_not_registered');
		}
		elseif($newuid == -6)
		{
			$res_json = array('status'=>'error','reason'=>'email_has_been_registered');
		}
		else
		{
			$res_json = array('status'=>'error','reason'=>'register_error');
		}
	}
	else
	{
		//检查uid是否在ucenter里面，如果不在，就采取野蛮方式插入新纪录
		$q = $_SGLOBAL['db']->query("SELECT uid FROM ihomeuser_members WHERE uid='$newuid'");
		$members_match = $_SGLOBAL['db']->fetch_array($q);
		$members_match = $members_match['uid'];
		$q = $_SGLOBAL['db']->query("SELECT uid FROM ihomeuser_memberfields WHERE uid='$newuid'");
		$memberfields_match = $_SGLOBAL['db']->fetch_array($q);
		$memberfields_match = $memberfields_match['uid'];
		if(!$members_match && !$memberfields_match)
		{
			$salt = substr(uniqid(rand()), -6);
			$hhpassword = md5(md5($password).$salt);
			$sqladd = "uid='".intval($newuid)."',";
			$sqladd .= " secques='',";
			$_SGLOBAL['db']->query("INSERT INTO ihomeuser_members SET $sqladd username='$username', password='$hhpassword', email='$email', regip='".$_SERVER["HTTP_X_FORWARDED_FOR"]."', regdate='".time()."', salt='$salt'");
			$_SGLOBAL['db']->query("INSERT INTO ihomeuser_memberfields SET uid='$newuid'");
		}

		$setarr = array(
			'uid' => $newuid,
			'username' => $username,
			'password' => md5($password)
		);
		inserttable('member', $setarr, 0, true);
		//add action log
		inserttable('actionlog', array('uid'=>"$newuid", 'dateline'=>"$_SGLOBAL[timestamp]", 'action'=>'register', 'value'=>'quick'));
		include_once(S_ROOT.'./source/function_space.php');
		$space = space_open($newuid, $username, 0, $email);

		//默认好友
		$flog = $inserts = $fuids = $pokes = array();
		if(!empty($_SCONFIG['defaultfusername']))
		{
			$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('space')." WHERE	username IN (".simplode(explode(',', $_SCONFIG['defaultfusername'])).")");
			while ($value = $_SGLOBAL['db']->fetch_array($query))
			{
				$value = saddslashes($value);
				$fuids[] = $value['uid'];
				$inserts[] = "('$newuid','$value[uid]','$value[username]','1','$_SGLOBAL[timestamp]')";
				$inserts[] = "('$value[uid]','$newuid','$username','1','$_SGLOBAL[timestamp]')";
				$pokes[] = "('$newuid','$value[uid]','$value[username]','".addslashes($_SCONFIG['defaultpoke'])."','$_SGLOBAL[timestamp]')";
				$flog[] = "('$value[uid]','$newuid','add','$_SGLOBAL[timestamp]')";
			}
			if($inserts)
			{
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('friend')." (uid,fuid,fusername,status,dateline) VALUES ".implode(',', $inserts));
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('poke')." (uid,fromuid,fromusername,note,dateline) VALUES ".implode(',', $pokes));
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('friendlog')." (uid,fuid,action,dateline) VALUES ".implode(',', $flog));

				//添加到附加表
				$friendstr = empty($fuids)?'':implode(',', $fuids);
				updatetable('space', array('friendnum'=>count($fuids), 'pokenum'=>count($pokes)), array('uid'=>$newuid));
				updatetable('spacefield', array('friend'=>$friendstr, 'feedfriend'=>$friendstr), array('uid'=>$newuid));

				//更新默认用户好友缓存
				include_once(S_ROOT.'./source/function_cp.php');
				foreach ($fuids as $fuid)
				{
					friend_cache($fuid);
				}
			}
		}

		//好友邀请
		if($invitearr) {
			include_once(S_ROOT.'./source/function_cp.php');
			invite_update($invitearr['id'], $setarr['uid'], $setarr['username'], $invitearr['uid'], $invitearr['username'], $app);
			//如果提交的邮箱地址与邀请相符的则直接通过邮箱验证
			if($invitearr['email'] == $email) {
				updatetable('spacefield', array('emailcheck'=>1), array('uid'=>$newuid));
			}

			//统计更新
			include_once(S_ROOT.'./source/function_cp.php');
			if($app) {
				updatestat('appinvite');
			} else {
				updatestat('invite');
			}
		}

		//标记为已激活，并反写uid
		if($recordids){
			$useridlist = implode(',',$recordids);
			$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1, uid=$newuid WHERE userid in ($useridlist)");
		}

		$insertinfo = array('identifier' => $one['identifier'], 'realname' => $realname, 'defaultemail' => $one['defaultemail']);

		//获得用户生日数据
		//$decid = M_decode($value['identifier'], aeskeyA);
		$UserBirthday = '';
		if($birthday_id){
			$UserBirthday = $birthday_id;
		}elseif($birthday_exist){
			$UserBirthday = $birthday_exist;
		}

		if($UserBirthday){
			$insertinfo['birthyear'] = intval(substr($UserBirthday, 0, 4));
			$insertinfo['birthmonth'] = intval(substr($UserBirthday, 4, 2));
			$insertinfo['birthday'] = intval(substr($UserBirthday, 6, 2));
		}

		if( $one['sex'] == '男') {
			$sexc = 1;
		}else if($one['sex'] == '女') {
			$sexc = 2;
		}else{
			$sexc = 0;
		}
		$insertinfo['sex'] = $sexc;
		//print_r($insertinfo);exit();
		//更新spacefield
		updatetable('spacefield', $insertinfo, array('uid' => $newuid));
		if($insertinfo['birthyear'] && $insertinfo['birthmonth'] && $insertinfo['birthday']){
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend) VALUES ('base','birth',".$newuid.",3)");
		}

		//更新space
		$space = array('uid'=>$newuid, 'name'=>$realname, 'namestatus'=>1);
		//print_r($space);
		//exit();
		updatetable('space', $space, array('uid'=>$newuid));
		foreach($userlines as $value){
			if($value['isactive'] != '1'){

				if($value['academy']){
					if($value['usertype'] == '教师'||$value['usertype']==5||$value['usertype']==4){
						$workinfo = array('uid'=>$newuid, 'type'=>'work', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear'], 'city'=>'北京');
						inserttable('spaceinfo', $workinfo, 1);
					}
					if(strlen($value['collegeid']) != 5 && strlen($value['collegeid']) != 6){
						if(!empty($value['class']) && !empty($value['startyear'])){
							$eduinfo = array('uid' => $newuid, 'type'=>'edu', 'title' => '北京航空航天大学', 'subtitle'=>$value['academy'].$value['startyear'].'级'.$value['class'].'班', 'startyear'=>$value['startyear']);
							$tagname = $value['startyear'].'年'.$value['class'].'班';				
							auto_join($newuid, $tagname, $_SGLOBAL['db']);
							inserttable('spaceinfo', $eduinfo, 1);
						}
					}
				}
			}	
		}

		//毕业校友的就业信息
		$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('stuemp')." WHERE collegeid='$value[collegeid]'");
		if($value1 = $_SGLOBAL['db']->fetch_array($query1)) {	
			$setarr1 = array( 'uid' => $newuid , 'type'=>'work' , 'title'=>$value['unit'] , 'province'=>$value['province'] ,'city' => $value['city']);
			inserttable('spaceinfo',$setarr1,1); 
		}

		//变更记录
		if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$newuid, 'action'=>'add', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
		//创建新用户结束
		$res_json = array('status'=>'correct','uid'=>$newuid,'username'=>$username,'password'=>$password,'email'=>$email);
	}

	//自动为用户添加好友
	if($userlines) {
		autobefriends($userlines,$newuid,$_POST['username']);
	}
	echo json_encode($res_json);
	return json_encode($res_json);	
}
$dos = array('categroies','freshmanregister','quickregister');

if( in_array($_GET['action'],$dos) && $_GET['action']=='categories' )	{
	$uid = $_GET['uid'];
	$username = $_GET['username'];
	$cat = $_GET['cat'];
	public_interface($uid,$username,$cat);
}
elseif ( in_array($_GET['action'],$dos) && $_GET['action']=='freshmanregister')	{
	$realname = trim($_GET['realname']);
	$birthday = trim($_GET['birthday']);
	$email = trim($_GET['email']);
	freshmanregister_interface($realname,$birthday,$email);	
}
elseif ( in_array($_GET['action'],$dos) && $_GET['action']=='quickregister')	{
	$quickcollegeid = $_GET['quickcollegeid'];
	$quickpassword = $_GET['quickpassword'];
	quickregister_interface($quickcollegeid,$quickpassword);	
}
?>
