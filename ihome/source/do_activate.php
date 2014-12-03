<?php

/*
	do_active.php用于邮箱激活的处理，系统根据激活用户的信息判断是否有条记录，并将这些记录作为用户的教育或工作信息写入相应的数据表中，同时关联已开通的账号uid。
	modified by xuxing@ihome. 2012-12-13 16:40
	
	其中，将用户类型作一个规范，分别以数字进行表示： 本科生为1，硕士生为2，博士生为3，博士后为4，教职工为5，校友为6，留学生为7，其他为8。
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

define('COLLEGEID_CHECK_FAILED', -2);
define('COLLEGEID_NOT_LEGITIMATE', -1);
define('COLLEGEID_ACTIVATED', -3);
define('EMAIL_NOT_EXIST',-4);
define('MAIL_NOT_ADEQUENT',-5);
define('IN_UC', TRUE);

include_once(S_ROOT.'./buaasso.php');


$op = $_GET['op'] ? trim($_GET['op']) : '';

if(empty($op)){
	if(submitcheck('registersubmit'))
		{
			$collegeid = trim($_POST['collegeid']);
			if(empty($collegeid))
			{
					showmessage('collegeid_is_null', '', 3);
			}

			$result = check_collegeid($collegeid);
			if($result == -1){

				showmessage('collegeid_is_invalid');
			}elseif($result == -2){

				showmessage('collegeid_is_not_legitimate');
			}elseif($result == -3){
				showmessage('collegeid_is_active');
			}elseif($result == -4){
				showmessage('email_not_exist');
			}elseif($result == -5){
				showmessage('mail_not_adequent');
			}

			include_once(S_ROOT.'./source/function_cp.php');
			if(!ckseccode($_POST['emailseccode'])) {
				showmessage('incorrect_code');
			}

			//取得身份证号
			$query = $_SGLOBAL['db']->query("SELECT identifier_not_use,realname,birthday,defaultemail, isactive, emaildateline FROM ".tname('baseprofile')." WHERE collegeid='$collegeid'  and (usertype like binary '教师' or (usertype between 1 and 5) or usertype like binary '学生') limit 1");
			$one = $_SGLOBAL['db']->fetch_array($query);

			$id = $one['identifier_not_use'];
			$realname = $one['realname'];
			$birthday_exist = $one['birthday'];
			
			if(strlen($id)==18){
				$birthday_id = substr($id,6,8);
			}elseif(strlen($id) == 15){
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
					//存储学号信息
					//$_SGLOBAL['collegeid'] = $collegeid;
					$setarr = array(
					'cid' => $cid,
					'subject' => addslashes(stripslashes($title)),
					'message' => addslashes(stripslashes($content)),
					'dateline' => $_GLOBAL['timestamp']
					);
					//放入邮件队列
					inserttable('mailqueue', $setarr);
				}
				
				//如果既有激活的 也有没激活的 更新没激活的信息
				if($flagactive == 1 && $flagnotactive == 1){
					//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('baseprofile')." WHERE identifier='$id'");
					//$row = $_SGLOBAL['db']->fetch_array($query);
					
					$useridlist = implode(',',$recordids);
					$_SGLOBAL['db']->query("UPDATE ".tname('baseprofile')." SET isactive=1, uid=$c_uid WHERE userid in ($useridlist)");
					
					foreach($userlines as $value){
						if($value['isactive'] != '1'){
							
							//如果是老师，添加工作经历的信息,有校友后添加校友信息
							/*$idhash = M_encode($id, aeskeyA);
							$queryuid = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE identifier='$idhash'");
							$valueuid = $_SGLOBAL['db']->fetch_array($queryuid);*/
							//var_dump($valueuid);
							//exit();
							if($value['academy']){
								if($value['usertype'] == '教师'||$value['usertype']==5){
									$workinfo = array('uid'=>$c_uid, 'type'=>'work', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear'], 'city'=>'北京');
									inserttable('spaceinfo', $workinfo, 1);
								}//elseif($row['usertype'] == '学生'||$row['usertype']=='2'||$row['usertype']=='3'||$row['usertype']=='4'||$row['usertype']=='5'){
								if(strlen($value['collegeid']) != 5){
									if(!in_array($value['collegeid'],$collegeids)){
										$collegeids[]=$value['collegeid'];
										$eduinfo = array('uid'=>$c_uid, 'type'=>'edu', 'title'=>'北京航空航天大学', 'subtitle'=>$value['academy'], 'startyear'=>$value['startyear']);
										inserttable('spaceinfo', $eduinfo, 1);
									}
								}
							}
							//将baseprofile激活字段置1
							//$activate = array('isactive' => 1);
							//updatetable('baseprofile', $activate, array('collegeid' => $row['collegeid']));
						}
						//$row = $_SGLOBAL['db']->fetch_array($query);$_SGLOBAL['db']->fetch_array($query)
						
					}
					//提示用户已经激活过了
					showmessage('identifier_is_active', '', 3);
				}
			}
			//根据学号取得邮箱和激活信息
			//$query = $_SGLOBAL['db']->query("SELECT defaultemail, isactive, emaildateline FROM ".tname('baseprofile')." WHERE collegeid='$collegeid'");
			//$row = $_SGLOBAL['db']->fetch_array($query);
			if (empty($one))
			{
				showmessage('collegeid_is_invalid','',3 );
			}
			
			$defaultemail = $one['defaultemail'];
			$isactive = $one['isactive'];
			//没有邮箱信息
			if(empty($defaultemail) || !isemail($defaultemail)){
				showmessage('have_no_email', '', 10);
			}

			if($isactive > 0)
			{
				showmessage('collegeid_is_active','',3 );
			}
			elseif(empty($isactive))
			{
				$nowtime = explode(' ', microtime());
				$tmptime = $nowtime[1];
				//记录邮件发送时间,存入数据库
				$tmptime = $tmptime+$nowtime[0];
				if(($tmptime - intval($row['emaildateline'])) <= 1800){
					showmessage('sendtime_limit');
				}
				//激活成功
				$hash = authcode("$collegeid\t$defaultemail", 'ENCODE');
				$url = getsiteurl().'do.php?ac='.$_SCONFIG['buaaregister_action'].'&amp;hash='.urlencode($hash);
				$mailsubject = cplang('active_email_subject');
				$mailmessage = cplang('active_email_msg', array($url));
				$cid = inserttable('mailcron', array('email'=>$defaultemail), 1);
				//存储学号信息
				$_SGLOBAL['collegeid'] = $collegeid;
				$setarr = array(
				'cid' => $cid,
				'subject' => addslashes(stripslashes($mailsubject)),
				'message' => addslashes(stripslashes($mailmessage)),
				'dateline' => $_GLOBAL['timestamp']
				);
				//放入邮件队列
				inserttable('mailqueue', $setarr);
				$sendtime = array('emaildateline' => $tmptime);
				updatetable('baseprofile', $sendtime, array('collegeid' => $collegeid));
				showmessage('collegeid_not_active');	
			}
			else{
				showmessage('system_error','index.php', 3);
			}
		}

	include_once template('all_activate');

}elseif($op == 'checkcollegeid'){

	include_once S_ROOT.'../lib/db.class.php';
	include_once S_ROOT.'../model/base.php';

	$collegeid = trim($_GET['collegeid']);

	if(empty($collegeid)){
		showmessage('collegeid_is_null');
	}
	$result = check_collegeid($collegeid);

	if($result == -1){
		showmessage('collegeid_is_invalid');
	}elseif($result == -2){
		showmessage('collegeid_is_not_legitimate');
	}elseif($result == -3){
		showmessage('collegeid_is_active');
	}elseif($result == -4){
		showmessage('email_not_exist');
	}elseif($result == -5){
		showmessage('mail_not_adequent');
	}else{
		showmessage('succeed');
	}
	
}

elseif($op == "checkseccode") {
	
	include_once(S_ROOT.'./source/function_cp.php');
	if(ckseccode(trim($_GET['seccode']))) {
		showmessage('succeed');
	} else {
		showmessage('incorrect_code');
	}
}

?>