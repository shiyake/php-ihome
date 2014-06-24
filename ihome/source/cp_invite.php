<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$flag=0;
$tmpuid = $_SGLOBAL['supe_uid'] ? $_SGLOBAL['supe_uid'] : $uid;
if($tmpuid){
	$querygroupid = $_SGLOBAL['db']->query("SELECT pptype,caninvite FROM ".tname('space')." WHERE uid='$tmpuid'");
	$valuegroupid = $_SGLOBAL['db']->fetch_array($querygroupid);
	if(isDepartMent($_SGLOBAL['supe_uid'],0)||$valuegroupid['pptype']==1 ||$valuegroupid['caninvite']==1 ){//显示邀请功能
		$flag=1;	
	}else{//不显示邀请功能
		$flag=0;
	}
}else{
	$flag=0;
}
if(!$flag)	{
	showmessage("您没有邀请权限",'space.php',3);
}
$siteurl = getsiteurl();
$maxcount = 50;//×î¶àºÃÓÑÑûÇë
$reward = getreward('invitecode', 0);
$appid = empty($_GET['app']) ? 0 : intval($_GET['app']);

$inviteapp = $invite_code = '';
if(empty($reward['credit']) || $appid) {
	$reward['credit'] = 0;
	$invite_code = space_key($space, $appid);
}
$siteurl = getsiteurl();
function getGrantString($instream)	{
	$str="";
	for($i=0;$i<strlen($instream);$i++)	{
		if($instream[$i]=='(')	{
			break;
		}
		else	{
			$str.=$instream[$i];
		}
	}
	return $str;
}
function getGrantNum($instream)	{
	$str="";
	for($i=0;$i<strlen($instream);$i++)	{
		if($instream[$i]=='(')	{
			for ($j=$i+1;$j<strlen($instream);$j++)	{
				if($instream[$j]==')')	{
					break;
				}
				else	{
					$str.=$instream[$j];
				}
			}
			break;
		}
	}
	return $str;
}
$spaceurl='';
if(!empty($_GET['grant']))	{
	$str=getGrantNum($_GET['grant']);
	$spaceurl=$siteurl.'space.php?u='.$str;
}
else {
	$spaceurl = $siteurl.'space.php?u='.$_SGLOBAL['supe_uid'];
}
$mailvar=array();
if(!empty($_GET['grant']))	{
	$num=getGrantNum($_GET['grant']);
	$str=getGrantString($_GET['grant']);
	array_push($mailvar,
		"<a href=\"$spaceurl\"><div class='round_avatar'>".avatar($num, 'big',False,2)."</div></a><div class='Left_mainname' style='margin-top:10px;'>".$_SN[$num].'</div>',
		$str,
		$_SCONFIG['sitename'],
		'',
		'',
		$spaceurl,
		''
	);
}
else	{
	array_push($mailvar,
		"<a href=\"$spaceurl\"><div class='round_avatar'>".avatar($space['uid'], 'big',False,2)."</div></a><div class='Left_mainname' style='margin-top:10px;'>".$_SN[$space['uid']]."</div>",
		$_SN[$space['uid']],
		$_SCONFIG['sitename'],
		'',
		'',
		$spaceurl,
		''
	);
}
$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE caninvite=1 and uid=".$_SGLOBAL['supe_uid']);
$row=$_SGLOBAL['db']->fetch_array($query);
if(empty($row))	{//该用户不是通过授权得到邀请好友功能的
	$_SCONFIG['isgranted']=0;

}
else {
	$_SCONFIG['isgranted']=1;
	$query=$_SGLOBAL['db']->query("SELECT public_uid FROM ".tname('grantinvite')." WHERE uid=".$_SGLOBAL['supe_uid']);
	$space['grantlist']=array();
	$str=getGrantNum($_GET['grant']);
	while($row=$_SGLOBAL['db']->fetch_array($query))	{
		$query1=$_SGLOBAL['db']->query("SELECT * FROM ".tname('space')."	WHERE uid=".$row['public_uid']);
		while($row1=$_SGLOBAL['db']->fetch_array($query1))		{
			array_push($space['grantlist'],$row1);
		}
	}

}
//È¡³öÏàÓ¦µÄÓ¦ÓÃ
$appinfo = array();
if($appid) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('myapp')." WHERE appid='$appid'");
	$appinfo = $_SGLOBAL['db']->fetch_array($query);
	if($appinfo) {
		$inviteapp = "&amp;app=$appid";
		$mailvar[6] = $appinfo['appname'];
	} else {
		$appid = 0;
	}
}
//´¦ÀíÓÊ¼þÑûÇë
if(submitcheck('emailinvite')) {
	set_time_limit(0);//ÉèÖÃ³¬Ê±Ê±¼ä
	if($_SCONFIG['closeinvite']) {
		showmessage('close_invite');
	}

	if(!strcmp('student',$_POST['invite_usertype']))	{
		if(empty($_POST['invited_num'])||empty($_POST['invited_name'])||empty($_POST['invite_num'])||empty($_POST['subtitle'])||empty($_POST['startyear']))	{
			showmessage("请完整填写表单，所有项均为必填，请不要遗漏");
		}
	}
	elseif (!strcmp('worker',$_POST['invite_usertype']))	{
		if(empty($_POST['invited_num'])||empty($_POST['invited_name'])||empty($_POST['invite_num']))	{
			showmessage("请完整填写表单，所有项均为必填，请不要遗漏");
		}
	}
	else {
		if(empty($_POST['invite_num'])||empty($_POST['invited_name']))	{
			showmessage("请完整填写表单，所有项均为必填，请不要遗漏");
		}
	}
	$verifycode = rand(100000,999999);
	$mails = array_unique(explode(",", $_POST['invite_num']));
	$invitenum = 0;
	$failingmail = array();
	foreach($mails as $key => $value) {
		$value = trim($value);
		if(empty($value) || !isemail($value)) {
			$failingmail[] = $value;
			continue;
		}

		if($reward['credit']) {
			//¼ÆËã»ý·Ö¿Û¼õ»ý·Ö
			$credit = intval($reward['credit'])*($invitenum+1);
			if(!isemail($value) || ($reward['credit'] && $credit > $space['credit'])) {
				$failingmail[] = $value;
				continue;
			}

			$code = strtolower(random(6));
			$setarr = array(
				'uid' => $_SGLOBAL['supe_uid'],
				'code' => $code,
				'email' => saddslashes($value),
				'type' => 1
			);
			$id = inserttable('invite', $setarr, 1);
			if($id) {
				if(empty($_GET['grant']))	{
					$str=getGrantNum($_POST['grant']);
					$mailvar[4] = "{$siteurl}invite.php?u={$str}&amp;c=".md5($email.strval($verifycode));
				}
				else {
					$mailvar[4] = "{$siteurl}invite.php?u={$space[uid]}&amp;c=".md5($email.strval($verifycode));
                }
                createmail($value, $mailvar);

				$invitenum++;
			} else {
				$failingmail[] = $value;
			}
		} else {
			if(empty($_POST['grant']))	{
				$str=getGrantNum($_POST['grant']);
				$mailvar[4] = "{$siteurl}invite.php?u={$str}&amp;c=".md5($email.strval($verifycode));
			}
			else
				$mailvar[4] = "{$siteurl}invite.php?u={$space[uid]}&amp;c=".md5($email.strval($verifycode));
			if($appid) {
				$mailvar[6] = $appinfo['appname'];
			}
			createmail($value, $mailvar);
		}
	}
	$now_uid=0;
	if(!empty($_POST['grant'])&&intval($_POST['grant']))	{	
		$now_uid=getGrantNum($_POST['grant']);
	}
	else {
	   	$now_uid=$_SGLOBAL['supe_uid'];
	}
	if($reward['credit'] && $invitenum) {
		$credit = intval($reward['credit'])*$invitenum;
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET credit=credit-$credit WHERE uid='$now_uid'");
	}
	if($failingmail) {
		showmessage('send_result_2', '', 1, array(implode('<br>', $failingmail)));
	} else {
		$map=array('student'=>'学生','worker'=>'教师','friend'=>'校友');
		if(!strcmp('student',$_POST['invite_usertype'])){//学生
			inserttable('emailinvite',array('uid'=>$now_uid,'collegeid'=>$_POST['invited_num'],'var'=>$verifycode,'email'=>$_POST['invite_num'],'already_invite'=>0,'name'=>$_POST['invited_name'],'usertype'=>$_POST['invite_usertype'],'md5'=>md5($_POST['invited_num'].strval($verifycode))));
			if(!strcmp($_POST['to_select'],'other')||!strcmp($_POST['to_select'],'')) 
				inserttable('baseprofile',array('invite_or_not'=>1,'realname'=>$_POST['invited_name'],'collegeid'=>$_POST['invited_num'],'academy'=>$_POST['subtitle'],'startyear'=>$_POST['startyear'],'usertype'=>$map[$_POST['invite_usertype']]));
		}
		elseif(!strcmp('worker',$_POST['invite_usertype'])){
			inserttable('emailinvite',array('uid'=>$now_uid,'collegeid'=>$_POST['invited_num'],'var'=>$verifycode,'email'=>$_POST['invite_num'],'already_invite'=>0,'name'=>$_POST['invited_name'],'usertype'=>$_POST['invite_usertype'],'md5'=>md5($_POST['invited_name'].strval($verifycode))));
			if(!strcmp($_POST['to_select'],'other')||!strcmp($_POST['to_select'],'')) 
				inserttable('baseprofile',array('invite_or_not'=>1,'realname'=>$_POST['invited_name'],'collegeid'=>$_POST['invited_num'],'usertype'=>$map[$_POST['invite_usertype']]));

		}
		else{
			inserttable('emailinvite',array('uid'=>$now_uid,'email'=>$_POST['invite_num'],'var'=>$verifycode,'already_invite'=>0,'name'=>$_POST['invited_name'],'usertype'=>$_POST['invite_usertype'],'md5'=>md5($_POST['invite_num']+strval($verifycode))));
			if(!strcmp($_POST['to_select'],'other')||!strcmp($_POST['to_select'],'')) 
				inserttable('baseprofile',array('invite_or_not'=>1,'realname'=>$_POST['invited_name'],'collegeid'=>$_POST['invited_num'],'academy'=>$_POST['subtitle'],'startyear'=>$_POST['startyear'],'usertype'=>$map[$_POST['invite_usertype']]));
		}
		$query=$_SGLOBAL['db']->query("SELECT max(userid) FROM ".tname('baseprofile'));
		$res=$_SGLOBAL['db']->fetch_array($query);
		$_SGLOBAL['db']->query("UPDATE ".tname('emailinvite')." SET profile_id=".$res['max(userid)']." WHERE var=".$verifycode);
		showmessage('send_result_1',"/cp.php?ac=invite",3);
	}
}


elseif(submitcheck("messageinvite")) {

	if(!strcmp('student',$_POST['invite_usertype']))	{
		if(empty($_POST['invited_num'])||empty($_POST['invited_name'])||empty($_POST['invite_num'])||empty($_POST['subtitle'])||empty($_POST['startyear']))	{
			showmessage("请完整填写表单，所有项均为必填，请不要遗漏");
		}
	}
	elseif (!strcmp('worker',$_POST['invite_usertype']))	{
		if(empty($_POST['invited_num'])||empty($_POST['invited_name'])||empty($_POST['invite_num']))	{
			showmessage("请完整填写表单，所有项均为必填，请不要遗漏");
		}
	}
	else {
		if(empty($_POST['invite_num'])||empty($_POST['invited_name']))	{
			showmessage("请完整填写表单，所有项均为必填，请不要遗漏");
		}
	}


	$verifycode = rand(100000,999999);
	$now_uid=0;
	if(!empty($_POST['grant'])&&intval($_POST['grant']))
		$now_uid=getGrantNum($_POST['grant']);
	else $now_uid=$_SGLOBAL['supe_uid'];
	$str="?uid=".$now_uid;
	$map=array('student'=>'学生','worker'=>'教职工','friend'=>'校友');
	$content = 	"Hi，我是".$mailvar[1]."，在i北航上建立了主页，邀请你也加入并关注我的主页！请访问链接http://i.buaa.edu.cn/invite.php{$str}。 你的邀请码是：".$verifycode."，快来体验吧！";	
	if(!empty($_POST['Method'])) {

		if(!strcmp('student',$_POST['invite_usertype'])){//学生
			inserttable('mobileinvite',array('uid'=>$now_uid,'collegeid'=>$_POST['invited_num'],'mobile'=>$_POST['invite_num'],'already_invite'=>0,'name'=>$_POST['invited_name'],'usertype'=>$_POST['invite_usertype'],'var'=>$verifycode));
			if(!strcmp($_POST['to_select'],'other')||!strcmp($_POST['to_select'],''))
				inserttable('baseprofile',array('invite_or_not'=>1,'realname'=>$_POST['invited_name'],'collegeid'=>$_POST['invited_num'],'academy'=>$_POST['subtitle'],'startyear'=>$_POST['startyear'],'usertype'=>$map[$_POST['invite_usertype']]));
		}
		elseif(!strcmp('worker',$_POST['invite_usertype'])){
			inserttable('mobileinvite',array('uid'=>$now_uid,'collegeid'=>$_POST['invited_num'],'mobile'=>$_POST['invite_num'],'already_invite'=>0,'name'=>$_POST['invited_name'],'usertype'=>$_POST['invite_usertype'],'var'=>$verifycode));
			if(!strcmp($_POST['to_select'],'other')||!strcmp($_POST['to_select'],''))

				inserttable('baseprofile',array('invite_or_not'=>1,'realname'=>$_POST['invited_name'],'collegeid'=>$_POST['invited_num'],'usertype'=>$map[$_POST['invite_usertype']]));

		}
		else{
			inserttable('mobileinvite',array('uid'=>$now_uid,'mobile'=>$_POST['invite_num'],'already_invite'=>0,'name'=>$_POST['invited_name'],'usertype'=>$_POST['invite_usertype'],'var'=>$verifycode));
			if(!strcmp($_POST['to_select'],'other')||!strcmp($_POST['to_select'],'')) 	
				inserttable('baseprofile',array('invite_or_not'=>1,'realname'=>$_POST['invited_name'],'collegeid'=>$_POST['invited_num'],'usertype'=>$map[$_POST['invite_usertype']]));
		}
	}
	else	{
		inserttable('mobileinvite',array('uid'=>$now_uid,'collegeid'=>$_POST['invited_num'],'mobile'=>$_POST['invite_num'],'already_invite'=>0,'name'=>$_POST['invited_name'],'academy'=>$_POST['subtitle'],'startyear'=>$_POST['startyear'],'usertype'=>$_POST['invite_usertype'],'var'=>$verifycode));

	}
	//获取baseprofile这项的userid
	$query=$_SGLOBAL['db']->query("SELECT max(userid) FROM ".tname('baseprofile'));
	$res=$_SGLOBAL['db']->fetch_array($query);
	$_SGLOBAL['db']->query("UPDATE ".tname('mobileinvite')." SET profile_id=".$res['max(userid)']." WHERE var=".$verifycode);
	if (sendsms($_POST['invite_num'], '邀请短信', $content)) {
		showmessage("send_ok","cp.php?ac=invite",3);
	}
	showmessage('对不起，信息发送失败，请核对后再发送！',"cp.php?ac=invite",3);
}

if($_GET['op'] == 'resend') {

	$id = $_GET['id'] ? intval($_GET['id']) : 0;
	if(submitcheck('resendsubmit')) {
		if(empty($id)) {
			showmessage('send_result_3');
		}
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('invite')." WHERE id='$id' AND uid='$_SGLOBAL[supe_uid]' ORDER BY id DESC");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($reward['credit']) {
				$inviteurl = "{$siteurl}invite.php?{$value[id]}{$value[code]}";
			} else {
				$inviteurl = "{$siteurl}invite.php?u={$space[uid]}&amp;c=$invite_code";
			}
			$mailvar[4] = $inviteurl;
			createmail($value['email'], $mailvar);
			showmessage('send_result_1', $_POST['refer'],3);
		} else {
			showmessage('send_result_3');
		}
	}
}elseif($_GET['op'] == 'delete') {

	$id = $_GET['id'] ? intval($_GET['id']) : 0;
	if(empty($id)) {
		showmessage('there_is_no_record_of_invitation_specified');
	}
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('invite')." WHERE id='$id' AND uid='$_SGLOBAL[supe_uid]'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(submitcheck('deletesubmit')) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('invite')." WHERE id='$id'");
			showmessage('do_success', $_POST['refer']);
		}
	} else {
		showmessage('there_is_no_record_of_invitation_specified');
	}

}
elseif($_GET['op'] == 'grant') {
	$message=$_POST['invite_inputarea'];
	$at_array=array();
	$at_uid=array();
	$str="";
	for($i=0;$i<strlen($message);$i++)	{
		if($message[$i]=='@')	{
			for($j=$i;$j<strlen($message);$j++)	{
				if($message[$j]!='@')	{
					$str.=$message[$j];
				}
				if($message[$j]==')'&&$message[$j-1]<='9'&&$message[$j-1]>=0) {

					array_push($at_array,$str);
					$str="";
				}
			}
			$i=$j;
		}
	}
	array_push($at_array,$str);
	foreach($at_array as $i) {
		for ($j=0;$j<strlen($i);$j++)	{
			if($i[$j]=='(')	{
				$str="";
				for ($k=$j+1;$k<strlen($i);$k++)	{
					if($i[$k]==')')	{
						array_push($at_uid,$str);
						$str="";
					}
					else	{
						$str.=$i[$k];
					}
				}
			}
		}		
	}
	$flag=0;
	foreach($at_uid as $i)	{
		$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid=".$i);
		$row=$_SGLOBAL['db']->fetch_array($query);
		if(!empty($row))	{
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET caninvite=1 WHERE uid=".$i);
			$query=$_SGLOBAL['db']->query("SELECT * FROM ".tname('grantinvite')." WHERE uid=".$i." AND public_uid=".$_SGLOBAL['supe_uid']);
			$row=$_SGLOBAL['db']->fetch_array($query);
			if(empty($row))		{
				$_SGLOBAL['db']->query("INSERT INTO ".tname('grantinvite')." set uid=".$i." ,public_uid=".$_SGLOBAL['supe_uid']);
			}
			else $flag=1;	
		}

	}
	if(!$flag)	{
		showmessage("以上用户已经得到邀请权限");
	}
	else	{
		showmessage("以上用户已经的到邀请权限，但是有些用户已经有邀请权限，无需重复授权！");
	}
}
else {
	$list = $flist = array();
	$count = 0;

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('invite')." WHERE uid='$_SGLOBAL[supe_uid]' ORDER BY id DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['fuid'], $value['fusername']);
		if($value['fuid']) {
			$flist[] = $value;
		} else {
			if($reward['credit']) {
				$inviteurl = "{$siteurl}invite.php?{$value[id]}{$value[code]}";
			} else {
				$inviteurl = "{$siteurl}invite.php?u={$space[uid]}&amp;c=$invite_code{$inviteapp}";
			}
			if($value['type']) {
				$maillist[] = array(
					'email' => $value['email'],
					'url' => $inviteurl,
					'id' => $value['id']
				);
			} else {
				$list[] = $inviteurl;//Ã»ÓÐ·¢ËÍµÄ
				$count++;
			}
		}
	}

	if($inviteurl) {
		$mailvar[4] = $inviteurl;
	} elseif($reward['credit']) {
		$mailvar[4] = "{$siteurl}invite.php?{$value[id]}{xxxxxx}";
	} else {
		$mailvar[4] = "{$siteurl}invite.php?u={$space[uid]}&amp;c=$invite_code{$inviteapp}";
	}

	realname_get();

	if($reward['credit']) {
		$list_str = empty($list)?'':implode("\n", $list);

		$maxcount_my = $maxcount - $count;
		$maxinvitenum = empty($reward['credit'])?$maxcount_my:intval($space['credit']/$reward['credit']);
		if($maxinvitenum > $maxcount_my) $maxinvitenum = $maxcount_my;
		if($maxinvitenum < 0) $maxinvitenum = 0;

		//Ìá½»
		if(submitcheck('invitesubmit')) {
			if($_SCONFIG['closeinvite']) {
				showmessage('close_invite');
			}
			$invitenum = intval($_POST['invitenum']);
			if($invitenum > $maxinvitenum) $invitenum = $maxinvitenum;
			//¿Û¼õ»ý·Ö
			$credit = intval($reward['credit'])*$invitenum;
			if(empty($invitenum) || ($reward['credit'] && $credit > $space['credit'])) {
				showmessage('invite_error');
			}

			$codes = array();
			for ($i=0;$i<$invitenum;$i++) {
				$code = strtolower(random(6));
				$codes[] = "('$_SGLOBAL[supe_uid]', '$code')";
			}
			if($codes) {
				$_SGLOBAL['db']->query("INSERT INTO ".tname('invite')." (uid, code) VALUES ".implode(',', $codes));

				if($credit) {
					$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET credit=credit-$credit WHERE uid='$_SGLOBAL[supe_uid]'");
				}
			}
			showmessage('do_success', 'cp.php?ac=invite', 0);
		}
	}
	$uri = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
	$uri = substr($uri, 0, strrpos($uri, '/')+1);
	$actives = array('invite'=>' class="active"');
}

if (!empty($_GET['find'])&&!strcmp($_GET['find'],'invitename')) {
	$query=$_SGLOBAL['db']->query("SELECT userid,realname,usertype,collegeid FROM ".tname('baseprofile')." WHERE realname='".$_POST['invite_name']."'");
	if (!empty($query)) {
		$result=array();
		while($value=$_SGLOBAL['db']->fetch_array($query)) {
			array_push($result,$value);
		}
		$space['already_input']=$result;
		if (empty($result))	{
			include template('cp_invite_school');
		}
		else {

			include template('cp_invite');
		}		

        return;
	}
}


if(!empty($_GET['work'])&&!strcmp($_GET['work'],'goinvite')) {
	$userid='other';
	$userid=empty($_POST['to_select'])?'other':$_POST['to_select'];	
	if (!strcmp($userid,'other')) {

		if (!strcmp($_GET['method'],'school')) {
			include template('cp_invite_school');
		}
	}
	else {
		$query=$_SGLOBAL['db']->query("SELECT userid,startyear,realname,usertype,collegeid,academy FROM ".tname('baseprofile')."  WHERE userid=".$userid);
		$value=$_SGLOBAL['db']->fetch_array($query);
		$space['result']=$value;
		include template('cp_invite_school');

	}
    return ;
}
if (!strcmp($_GET['method'],'school')){
    include template('cp_invite_school');
    return;
}
else {
	include template('cp_invite');
    return;
}
function createmail($mail, $mailvar) {
	global $_SGLOBAL, $_SCONFIG, $space, $_SN, $appinfo;
	smail(0, $mail, cplang($appinfo ? 'app_invite_subject' : 'invite_subject', array($_SN[$space['uid']], $_SCONFIG['sitename'], $appinfo['appname'])), cplang($appinfo ? 'app_invite_massage' : 'invite_massage', $mailvar));
}
?>
