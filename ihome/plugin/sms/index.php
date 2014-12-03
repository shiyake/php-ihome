<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2012年9月10日15:12:39
	更改了数据库,正式库也必须更改!
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(!checkperm('sendsms')) {
	showmessage('对不起，您所在的用户组不允许发送手机短信');
}

$reward = getreward('sendsms', 0);

$paysms = $reward['credit'];

$gid = $_SGLOBAL['member']['groupid'];

$maxsmsnum = $_SGLOBAL['usergroup'][$gid]['maxsmsnum'];

$sendend = checksendsms();

$yearhtml = '';

$nowy = sgmdate('Y');

$loop = sgmdate('Y') - 1952 ;

for ($i=0; $i<=$loop; $i++) {
	$they = $nowy - $i;
	$yearhtml .= "<input type=\"checkbox\" name=\"year[]\" value=\"$they\" \/>$they";
}


if(submitcheck('sendsmssubmit')) {

	$smsmessage = $_POST['smsmessage'];

	$smsmessage = getstr($smsmessage, 140, 1, 1, 1);

	if($sendend >= $maxsmsnum) {
		showmessage('您今天短信套餐已经发完，请24小时之后再来吧！');
		}

	if(strlen($smsmessage) < 10) {
		showmessage('字数太少了，请确认是不是误操作？');
	}

	if(strlen($smsmessage) > 120) {
		showmessage('对不起，字数不能大于60个汉字！');
	}


	$checkmobile = $_POST['mobile'];

	$checkmobile = trim($checkmobile, ","); 

	$checkmobiles = explode(",",$checkmobile);

	$checkmobile_count = count($checkmobiles) * $paysms;

	$query = $_SGLOBAL['db']->query("SELECT credit FROM ".tname('space')." WHERE uid = ".$uid."");
	if ($value = $_SGLOBAL['db']->result($query)) {
		if ($value['credit'] < $checkmobile_count) {
			showmessage('对不起，您的积分不够');
		}
	}

	foreach ($_POST['mobile'] as $key => $mobile) {//缺少判断~手机号,人名,入学时间--应该预先检查一下!
		$mobile = ismobile(trim($mobile));
		if ($mobile) {
			$realname = getstr($_POST['realname'][$key],30,1,1);
			$startyear = intval(getstr($_POST['startyear'][$key],6,1,1));

			$smsuid = 'TCLKJ0003';
			$smspassword = '215215';
			$smsmessage = urlencode(iconv('UTF-8', 'GB2312', "$smsmessage"));
			$sendurl = "http://inolink.com/WS/Send.aspx?CorpID={$smsuid}&Pwd={$smspassword}&Mobile={$mobile}&Content={$smsmessage}&Cell=&SendTime=";
			$result = file_get_contents($sendurl);
			if (is_numeric($result)) {
				if($result == 0 ) {
					$insert_sms = array
					(
						'uid' => $_SGLOBAL['supe_uid'],'username' => $_SGLOBAL['supe_username'],'realname' => $_SN['uid'],'receivernum' => $mobile,'receivername' => $realname,'startyear' =>'$startyear','message' => $smsmessage,'postip' => getonlineip(),'dateline' => $_SGLOBAL['timestamp']
					);

				inserttable('sms', $insert_sms, 1);
				getreward('sendsms', 0);
				}
			}
			else {
				getreward('smsfail',0);
			}
		}
	}//foreach

	//第二次foreach不用检查其信息,因为是数据库里面的!!
	$year = $_POST['year'];
	$mrs = $_SGLOBAL['db']->query("select mobile,realname,startyear FROM ".tname('baseprofile')." WHERE mobile>0 AND academy=".$_SN[$uid]." AND satrtyear in $year ");
	if ($value = $_SGLOBAL['db']->fetch_array($mrs)) {
		foreach ($_POST['mobile'] as $key => $mobile) {
		$mobile = ismobile(trim($mobile));
		if ($mobile) {
			$realname = getstr($_POST['realname'][$key],30,1,1);
			$startyear = intval(getstr($_POST['startyear'][$key],6,1,1));

			$smsuid = 'TCLKJ0003';
			$smspassword = '215215';
			$smsmessage = urlencode(iconv('UTF-8', 'GB2312', "$smsmessage"));
			$sendurl = "http://inolink.com/WS/Send.aspx?CorpID={$smsuid}&Pwd={$smspassword}&Mobile={$mobile}&Content={$smsmessage}&Cell=&SendTime=";
			$result = file_get_contents($sendurl);
			if (is_numeric($result)) {
				if($result == 0 ) {
					$insert_sms = array
					(
						'uid' => $_SGLOBAL['supe_uid'],'username' => $_SGLOBAL['supe_username'],'realname' => $_SN['uid'],'receivernum' => $mobile,'receivername' => $realname,'startyear' =>'$startyear','message' => $smsmessage,'postip' => getonlineip(),'dateline' => $_SGLOBAL['timestamp']
					);

				inserttable('sms', $insert_sms, 1);
				getreward('sendsms', 0);
				}
			}
			else {
				getreward('smsfail',0);
			}
		}
	}//foreach
	}//if($value)
	//减少用户积分
	//$query = $_SGLOBAL['db']->query("update ".tname('space')." set credit = credit - ".$checkmobile_count." WHERE uid = ".$_SGLOBAL['supe_uid']."");
	//动态推送
	//feed_add("sms", "{actor} 给".count($checkmobiles)."人发送了<a href='plugin.php?pluginid=sms'>手机短信。</a>" );

	showmessage('短信发送完毕，谢谢使用！','index.php',2);

}//sendsmssubmit



include template("/plugin/sms/template/sendsms");

?>