<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By avatar ，matin，Ancon
	Last Modfile By Ancon
	Last Time : 2013年1月18日14:51:39 --添加usertype
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

require_once(S_ROOT.'./plugin/invite/reader.php');

$isfile = 0;
$file_pointer = '';
$theurl = "cp.php?ac=invitefriend";

$yearhtml = '';
$loop = sgmdate('Y') - 1952 ;
$nowy = sgmdate('Y');
for ($i=0; $i<=$loop; $i++) {
	$they = $nowy - $i;
	$yearhtml .= "<option value=\"$they\">$they</option>";
}

if(empty($op)){
	if(submitcheck('all')){
		$isfile = 0;
		$realname = $_POST['realname'];
		$sex = $_POST[sex];
		$birthday = $_POST[birthday];
		$email = $_POST[email];
		$academy = $_POST[academy];
		$startyear = $_POST[startyear];
		$collegeid = $_POST[collegeid];
		$class = $_POST['class'];
		$mobile = $_POST[mobile];
		$unit = $_POST[unit];



		if(empty($realname))
			{
				showmessage('realname_is_null');
			}
		if(empty($startyear))
			{
				showmessage('请选择入学年份！');
			}
		if(empty($email) && empty($mobile))
			{
				showmessage('both_is_null');
			}
		if(!empty($email) && !isemail($email))
			{
				showmessage('email_error');
			}
		if(empty($birthday))
			{
				showmessage('birthday_is_not_legitimate');			
			}	
	

		$query = $_SGLOBAL['db']->query("SELECT userid FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' and isactive=1 limit 1");
		if($active= $_SGLOBAL['db']->result($query))
			{
				showmessage('邀请不成功，该用户已开通个人空间');
			}		
		
		if(!empty($mobile))
			{
				$mobile = ismobile($mobile);
				if(!$mobile)
					{
						showmessage('对不起，输入手机号有误，请重新输入');			
					}
	
				$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE mobile = '$mobile'  and	status=1 limit 1");
				if ($value = $_SGLOBAL['db']->result($query))
					{
						showmessage('该手机号已经激活开通个人主页。' );		
					}
				else{
				$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' and status=0 ORDER BY dateline DESC LIMIT 1");
				if ($value = $_SGLOBAL['db']->fetch_array($query))
					{
						if (($_SGLOBAL['timestamp'] - $value['dateline']) <= 60)
							{
								showmessage('对不起，您的操作过快，请等待30秒再接收验证码');					
							}
						$yesterday = $_SGLOBAL['timestamp'] - 86400;
						$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' AND dateline > '".$yesterday."' ");
						$count = $_SGLOBAL['db']->num_rows($query);
						if ($count >= 3)
							{
								 showmessage('您已经邀请手机号：'.$mobile.'发出的'.$count.'条邀请短信。');		
							}
					}
				else
					{
						$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE mobile = '$mobile' limit 1");
						if ($value = $_SGLOBAL['db']->result($query))
							{
								 showmessage('该手机号已经激活开通个人主页。');					
							}
					}
				}
			}

		$arr = array('realname' => $realname, 'sex' => $sex, 'birthday' => $birthday, 'otheremail' => $email, 'academy' => $academy, 'startyear' => $startyear, 'collegeid' => $collegeid, 'class' => $class, 'mobile' => $mobile, 'unit' => $unit, 'usertype' =>'6', 'inviter' => $_SGLOBAL[supe_uid]);
		inserttable('baseprofile', $arr, 1);

		if(empty($email)) 
			{
				if(!empty($mobile))
					{
						send_sms1($mobile, $realname);
						getreward('InviteFriendsOnlyByMobile', 0);
						showmessage('已经通过手机邀请码邀请您的好友，谢谢！', $theurl, 2);
					}
			}
		else
			{	
				$hash = authcode("$arr[realname]\t$arr[otheremail]", 'ENCODE');
				$url = getsiteurl().'do.php?ac='.$_SCONFIG['EmailInviteRegister'].'&amp;hash='.urlencode($hash);
				$mailsubject = cplang('active_email_subject');
				$mailmessage = cplang('active_email_msg', array($url));
				$cid = inserttable('mailcron', array('email'=>$email), 1);
				$setarr = array(
					'cid' => $cid,
					'subject' => addslashes(stripslashes($mailsubject)),
					'message' => addslashes(stripslashes($mailmessage)),
					'dateline' => $_SGLOBAL['timestamp']
				);
				inserttable('mailqueue', $setarr, 1);

				if(!empty($mobile))
					{
						send_sms2($mobile, $realname);
						getreward('InviteFriendsByEmailAndMobile', 0);
						showmessage('已经通过Email和手机邀请码通知您的好友，谢谢！', $theurl, 2);
					}
				else
					{
						getreward('InviteFriendsOnlyByEmail', 0);
						showmessage('已经通过Email发送给您的好友，谢谢！', $theurl, 2);
					}
			}	
	}
}


	
function send_sms1($mobile, $realname){
	global $_SGLOBAL, $_SN;
	$verifycode = rand(100000,999999);
	$InviterName = $_SN[$_SGLOBAL[supe_uid]]?$_SN[$_SGLOBAL[supe_uid]]:$_SGLOBAL[supe_username];
	$contents = "尊敬的".$realname."，".$InviterName."邀请您加入i北航(i.buaa.edu.cn)大家庭，邀请码为".$verifycode." 期待您的加入，谢谢！";

	$smsuid = 'TCLKJ0003';
	$smspassword = '215215';
	$contents = urlencode(iconv('UTF-8', 'GB2312', "$contents"));
	$sendurl = "http://inolink.com/WS/Send.aspx?CorpID={$smsuid}&Pwd={$smspassword}&Mobile={$mobile}&Content={$contents}&Cell=&SendTime=";
	$result = file_get_contents($sendurl);
	if (is_numeric($result)){
		if($result == 0 ){
			$setarr = array(
				'mobile' => $mobile,
				'realname' => $realname,
				'verifycode' => $verifycode,
				'dateline' => $_SGLOBAL['timestamp'],
				'ip' => getonlineip()
			);
			inserttable('mobilereg', $setarr, 1);
		}
	}else{
		showmessage('手机邀请码发送失败...');
	}
}

function send_sms2($mobile, $realname){
	global $_SGLOBAL, $_SN;
	$verifycode = rand(100000,999999);
	$InviterName = $_SN[$_SGLOBAL[supe_uid]]?$_SN[$_SGLOBAL[supe_uid]]:$_SGLOBAL[supe_username];
	$contents = "尊敬的".$realname."，".$InviterName."邀请您加入i北航(i.buaa.edu.cn)大家庭，邀请码为".$verifycode." 期待您的加入，谢谢！";

	$smsuid = 'TCLKJ0003';
	$smspassword = '215215';
	$contents = urlencode(iconv('UTF-8', 'GB2312', "$contents"));
	$sendurl = "http://inolink.com/WS/Send.aspx?CorpID={$smsuid}&Pwd={$smspassword}&Mobile={$mobile}&Content={$contents}&Cell=&SendTime=";
	$result = file_get_contents($sendurl);
	if (is_numeric($result)){
		if($result == 0 ){
			$setarr = array(
				'mobile' => $mobile,
				'realname' => $realname,
				'verifycode' => $verifycode,
				'dateline' => $_SGLOBAL['timestamp'],
				'ip' => getonlineip()
			);
			inserttable('mobilereg', $setarr, 1);
		}
	}else{
		showmessage('发送Email成功，但发送手机邀请码失败！');
	}
}



if(submitcheck("upload"))
{
	//允许上传类型
	$FILE = $_FILES['file'];
	$allowsheettype = array('xls','xlsx');

	//检查
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		showmessage('对不起，无法获取上传文件大小');
	}

	//判断后缀	fileext为全局变量
	$fileext = fileext($FILE['name']);
	if(!in_array($fileext, $allowsheettype)) {
		showmessage('上传文件不合法...');
	}

	//获取目录	getfilepath为全局变量
	if(!$filepath = getfilepath($fileext, true)) {
		showmessage('服务器无法创建上传目录');
	}

	//本地上传
	$new_name = $_SC['attachdir'].'./'.$filepath;
	$tmp_name = $FILE['tmp_name'];
	if(@copy($tmp_name, $new_name)) {//移动文件
		@unlink($tmp_name);//删除POST的临时文件
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		showmessage('对不起，无法转移临时文件到服务器指定目录。~~~~(>_<)~~~~ ');
	}

	$filedownload = '';
	$result = process_file($new_name, &$filedownload);
	if($result == 1)
		{
			showmessage('上传成功，感谢您的邀请！', $_POST[refer], 0);
		}
	else
		{
			showmessage('文件存在部分问题，请根据链接地址下载后更新重新提交'."<a href=".'./plugin/invite/download/'.$filedownload." style=color:red;".">点击下载无效记录</a>");
		}
}//43




include template("cp_invitefriend");


//读取excel文件的内容
function process_file($filename, &$tempname){
	global $_SGLOBAL;
	$isfile = 1;
	$data = new Spreadsheet_Excel_Reader();
	$data->setOutputEncoding('UTF-8');
	$data->read($filename);
	$tempname = $_SGLOBAL['timestamp'].'_download_'.rand().'.xls';
	$filedownload = S_ROOT.'./plugin/invite/download/'.$tempname;
	
	//初始化一个反馈结果的文件
	require_once(S_ROOT.'./plugin/invite/phpwritexcel/Writer.php');
	$workbook = new Spreadsheet_Excel_Writer($filedownload);
	$worksheet = & $workbook->addWorksheet('Sheet1');
	$worksheet->setInputEncoding('UTF-8');
	$format_column = & $workbook->addformat(array('Size'=>9,'Bold'=>1));
	//读取结果文件的信息
	$rows = 0;
	$recordindex = array('realname', 'sex', 'birthday', 'otheremail', 'academy', 'startyear', 'collegeid', 'class', 'mobile', 'unit');
	$record = array('好友姓名（必填）', '好友性别' ,'生日（8位）', '邮箱（必填）','学院', '入学年份','学号', '班别', '手机（必填）','所在单位', '备注');
	$dataindexinfo = array();
	encode_record(&$record);
	input_downloadfile($worksheet, $rows, $record, $format_column);
	
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		$datainfo = array();
		for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
			$datainfo[$j - 1] = $data->sheets[0]['cells'][$i][$j]; 
			$dataindexinfo[$recordindex[$j-1]] = $data->sheets[0]['cells'][$i][$j];
		}
		$nopass = checkinfo($datainfo[0], $datainfo[3], $datainfo[8]);
		if(!empty($nopass)){
			$datainfo[$j - 1] = $nopass;
			encode_record(&$datainfo);
			input_downloadfile($worksheet, &$rows, $datainfo, $format_column);
			continue;
		}
		$dataindexinfo[inviter] = $_SGLOBAL[supe_uid];
		$dataindexinfo[usertype] = '6';
		inserttable('baseprofile', $dataindexinfo, 1);
		invite_alumni($datainfo);
	}
	$workbook->close();
	return $rows;
}

function encode_record(&$recordarray){
	foreach($recordarray as $key => $value){
		$recordarray[$key] = iconv('UTF-8', 'GB2312', $value);
	}
}

function close_downloadfile($book){
	$book->close();
}

function input_downloadfile($writesheet, &$rows, $dataarray, $format){
	$ct = count($dataarray);
	for($j = 0; $j < $ct; $j++){
		$writesheet->write($rows, $j, $dataarray[$j], $format);
	}
	$rows++;
}

function checkinfo($realname, $email, $mobile){

	global $_SGLOBAL;
	$message = '';
	if(empty($realname)){
		$message = '对不起，姓名不能为空！';
		return $message;
	}
	if(empty($email) && empty($mobile)){
		$message = '对不起，Email和手机不能全为空！';
		return $message;
	}
	if(!empty($email) && !isemail($email)){
		$message = '对不起，Email的格式不对！';
		return $message;
	}
	
	/*检查该用户是否已经激活开通*/
	$query = $_SGLOBAL['db']->query("SELECT userid FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' and isactive=1 limit 1");
	if($active= $_SGLOBAL['db']->result($query)) {
		$message = '邀请不成功，该用户已开通个人空间';
		return $message;
	}		
		
	if(!empty($mobile)){
		$mobile = ismobile($mobile);
		if(!$mobile){
			$message = '对不起，输入手机号有误，请重新输入';
			return $message;
		}
	
	/*判断该手机号是否已经开通过个人主页，是否一天之内邀请同一个人的次数超过3次*/
	$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE mobile = '$mobile'  and status=1 limit 1");
	if ($value = $_SGLOBAL['db']->result($query)) {
		$message = '该手机号已经激活开通个人主页。' ;
		return $message;
	}else{
		$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' and status=0 ORDER BY dateline DESC LIMIT 1");
		if ($value = $_SGLOBAL['db']->fetch_array($query))
			{
				if (($_SGLOBAL['timestamp'] - $value['dateline']) <= 60)
					{
						$message = '对不起，您的操作过快，请等待30秒再接收验证码';
						return $message;
					}
				$yesterday = $_SGLOBAL['timestamp'] - 86400;
				$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' AND dateline > '".$yesterday."' ");
				$count = $_SGLOBAL['db']->num_rows($query);
				if ($count >= 3)
					{
						$message = '您已经邀请手机号：'.$mobile.'发出的'.$count.'条邀请短信。';
						return $message;
					}
			}
			else{
				$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE mobile = '$mobile' limit 1");
				if ($value = $_SGLOBAL['db']->result($query)) {
					$message = '该手机号已经激活开通个人主页。';
					return $message;
				}
			}
		}
	}
	return $message;
}

function invite_alumni($arr){
/*
 * $arr：包含邀请用户的所有信息
 * isfile:是否通过文件邀请
 * file_pointer:通过文件邀请时的文件
 * */
	//没有邮箱信息
	global $_SGLOBAL, $_SCONFIG;
	if(empty($arr[3])) {
		if(!empty($arr[8])) {
			send_message($arr[8], $arr[0]);
			getreward('InviteFriendsOnlyByMobile', 0);
		}
	}
	//有邮箱，或者邮箱与手机
	else {	
			$hash = authcode("$arr[realname]\t$arr[email]", 'ENCODE');
			$url = getsiteurl().'do.php?ac='.$_SCONFIG['EmailInviteRegister'].'&amp;hash='.urlencode($hash);
			$mailsubject = cplang('active_email_subject');
			$mailmessage = cplang('active_email_msg', array($url));
			$cid = inserttable('mailcron', array('email'=>$arr[3]), 1);
			$setarr = array(
				'cid' => $cid,
				'subject' => addslashes(stripslashes($mailsubject)),
				'message' => addslashes(stripslashes($mailmessage)),
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable('mailqueue', $setarr, 1);

			if(!empty($arr[8]))
				{
					send_message($arr[8], $arr[0]);
					getreward('InviteFriendsByEmailAndMobile', 0);
				}
			else
				{
					getreward('InviteFriendsOnlyByEmail', 0);
				}
		}
	
}

//发送短信
function send_message($mobile, $realname){
	global $_SGLOBAL, $_SN;
	$verifycode = rand(100000,999999);
	$InviterName = $_SN[$_SGLOBAL[supe_uid]]?$_SN[$_SGLOBAL[supe_uid]]:$_SGLOBAL[supe_username];
	$contents = "尊敬的".$realname."，".$InviterName."邀请您加入i北航(i.buaa.edu.cn)大家庭，邀请码为".$verifycode." 期待您的加入，谢谢！";

	$smsuid = 'TCLKJ0003';
	$smspassword = '215215';
	$contents = urlencode(iconv('UTF-8', 'GB2312', "$contents"));
	$sendurl = "http://inolink.com/WS/Send.aspx?CorpID={$smsuid}&Pwd={$smspassword}&Mobile={$mobile}&Content={$contents}&Cell=&SendTime=";
	$result = file_get_contents($sendurl);
	if (is_numeric($result)){
		if($result == 0 ){
			$setarr = array(
				'mobile' => $mobile,
				'realname' => $realname,
				'verifycode' => $verifycode,
				'dateline' => $_SGLOBAL['timestamp'],
				'ip' => getonlineip()
			);
			inserttable('mobilereg', $setarr, 1);
		}
	}else{
		$mgs = '注册验证码发送失败...';
		return $mgs;
	}
}



?>