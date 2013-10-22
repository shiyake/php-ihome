<?php

/*
**邮件没有加密!
**把名字写进mobilereg数据库,不然匹配不了.
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./reader.php');
include_once(S_ROOT.'./oleread.inc');

$isfile = 0;
$file_pointer = '';
			//echo getsiteurl();
			//exit;
//姓名、email或mobile必填其一
if(empty($op)){
	if(submitcheck('all')){
		$isfile = 0;
		$realname = $_POST[realname];
		$sex = $_POST[sex];
		$birthday = $_POST[birthday];
		$email = $_POST[email];
		$academy = $_POST[academy];
		$startyear = $_POST[startyear];
		$collegeid = $_POST[collegeid];
		$class = $_POST[classes];
		$mobile = $_POST[mobile];
		$unit = $_POST[now];

		//检查信息
		checkinfo($realname, $birthday, $email, $mobile, $isfile, $startyear);
		
		//将信息加入到baseprofile表中
		$arr = array('realname' => $realname, 'sex' => $sex, 'birthday' => $birthday, 'otheremail' => $email, 'academy' => $academy, 'startyear' => $startyear, 'collegeid' => $collegeid, 'class' => $class, 'mobile' => $mobile, 'unit' => $unit);
		inserttable('baseprofile', $arr, 1);

		//发送邀请信--处理好了之后才...
		$arr = array('realname'=>$realname, 'sex'=>$sex, 'birthday'=>$birthday, 'email'=>$email, 'academy'=>$academy, 'collegeid'=>$collegeid, 'class'=>$class, 'mobile'=>$mobile, 'unit'=>$unit);
		invite_alumni($arr);

	}
}
	

if(submitcheck("upload")){
	//如果成功接收到文件
	if((!empty($_FILES["file"])) && ($_FILES['file']['error'] == 0)){
		$isfile = 1;
		$filename = basename($_FILES['file']['name']);
		$ext = substr($filename, strpos($filename, '.') + 1);
		if (($ext == "xls") && ($_FILES["file"]["size"] < 100000)) {
		  	//检测是否有同名的文件存在
	    	//if (!file_exists($newname)) {
	        	//存储在一个地址
	        //确定存储地址
			//$newname = getsiteurl().'\upload2\\'.$filename;

			$newname = S_ROOT.'./plugin/invite/upload/'.$filename;

	       	if ((move_uploaded_file($_FILES['file']['tmp_name'],$newname))) {
	       		//重命名文件
				$renamefilename = S_ROOT.'./plugin/invite/phpreadexcel/upload/'.date("Y-m-d").'_upload_'.rand().'.'.$ext;
				rename($newname, $renamefilename);
				
				$filedownload = '';
			
	       		$r = process_file($renamefilename, &$filedownload);
				//echo "文件已被保存和上传
		   		if($r == 1) {
					showmessage('upload_success'); }
				else {
					//exit(getsiteurl);
					showmessage('文件存在部分问题，请根据链接地址下载后更新重新提交'."<a href=".'./plugin/invite/download/'.$filedownload." style=color:red;".">点击下载无效记录</a>");
				}
	       	} else {
	       		showmessage('upload_failure');
	       	}
	 	} else {
	 		showmessage('file_limit');
	  	}
	} else {
		showmessage('no_file_upload');
	}
}

include template("cp_invite2");

//读取excel文件的内容
function process_file($filename, &$tempname){
	global $_SGLOBAL;
	$isfile = 1;
	$data = new Spreadsheet_Excel_Reader();
	//exit('adsf');
	$data->setOutputEncoding('gbk');
	$data->read($filename);
	$tempname = date("Y-m-d").'_download_'.rand().'.xls';
	$filedownload = S_ROOT.'./plugin/invite/download/'.$tempname;
	
	//初始化一个反馈结果的文件
	require_once(S_ROOT.'./plugin/invite/phpwritexcel/Writer.php');
	$workbook = new Spreadsheet_Excel_Writer($filedownload);
	$worksheet = & $workbook->addWorksheet('Sheet1');
	$worksheet->setInputEncoding('utf-8');
	$format_column = & $workbook->addformat(array('Size'=>9,'Bold'=>1));
	//读取结果文件的信息
	$rows = 0;
	$recordindex = array('realname', 'sex', 'birthday', 'otheremail', 'academy', 'collegeid', 'class', 'mobile', 'unit');
	$record = array('好友姓名（必填）', '好友性别' ,'生日（8位）', '邮箱（必填）','学院', '学号', '班别', '手机（必填）','所在单位', '备注');
	$dataindexinfo = array();
	encode_record(&$record);
	input_downloadfile($worksheet, $rows, $record, $format_column);
	
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		//以下注释的for循环打印excel表数据
		$datainfo = array();
		//$datainfo = array('name', 'sex', 'birthday', 'otheremail', 'academy', 'collegeid', 'class', 'mobile', 'unit');
		for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
			$datainfo[$j - 1] = $data->sheets[0]['cells'][$i][$j]; 
			$dataindexinfo[$recordindex[$j-1]] = $data->sheets[0]['cells'][$i][$j];
		}
		//var_dump($datainfo[0]);
		//检查记录的正确性
		$nopass = checkinfo($datainfo[0], $datainfo[2], $datainfo[3], $datainfo[7], $isfile);
		if(!empty($nopass)){
			//没有通过的记录加入到一个新文件中
			$datainfo[$j - 1] = $nopass;
			encode_record(&$datainfo);
			//var_dump($datainfo);
			//var_dump($rows);
			input_downloadfile($worksheet, &$rows, $datainfo, $format_column);
			continue;
		}
		//邀请处理
		//var_dump($dataindexinfo);
		inserttable('baseprofile', $dataindexinfo, 1);
		//var_dump($datainfo);
		invite_alumni($datainfo);
	}
	$workbook->close();
	return $rows;
}

function encode_record(&$recordarray){
	foreach($recordarray as $key => $value){
		$recordarray[$key] = iconv('utf-8', 'gb2312', $value);
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

function myshowmessage($strmessage, $isfile){
	global $_SGLOBAL;
	echo '---'.$isfile;
	if($isfile){
		//语言
		include_once(S_ROOT.'./language/lang_showmessage.php');
		//echo $_SGLOBAL['msglang'][$strmessage];
		if(isset($_SGLOBAL['msglang'][$strmessage])) {
			$message = lang_replace($_SGLOBAL['msglang'][$strmessage]);
		} else {
			$message = $msgkey;
		}
		return $message;
		//fwrite($file_pointer, $strmessage.'\r\n');
	}else{
		showmessage($strmessage);
	}
}

function checkinfo($realname, $birthday, $email, $mobile, $isfile, $startyear){
/*
 * email:将要检查的邮箱
 * name:将要检查的名字
 * birthday:将要检查的生日
 * mobile:将要检查的手机号码
 * isfile:是否通过文件邀请
 * startyear:将要检查的入学年份
 * file_pointer:通过文件邀请时的文件
 */
 
	global $_SGLOBAL;
	$message = '';
	if(empty($realname)){
		$message = myshowmessage('realname_is_null', $isfile);
		return $message;
	}
	if(empty($email) && empty($mobile)){
		$message = myshowmessage('both_is_null', $isfile);
		return $message;
	}
	if(!empty($email) && !isemail($email)){
		$message = myshowmessage('email_error', $isfile);
		return $message;
	}
	
	
	
	/*检查该用户是否已经激活开通*/
	$query = $_SGLOBAL['db']->query("SELECT userid FROM ".tname('baseprofile')." WHERE realname='$realname' and birthday='$birthday' and isactive=1");
	$active = $_SGLOBAL['db']->fetch_array($query);
	if(!empty($active)) {
		$message = myshowmessage('邀请不成功，该用户已开通个人空间');
		return $message;
	}		
	

	/*if(!empty($email)){
		$query = $_SGLOBAL['db']->query("SELECT otheremail FROM ".tname('baseprofile')." WHERE otheremail='$email'");
		$otheremail = $_SGLOBAL['db']->fetch_array($query);
		if(!empty($otheremail)) {
			$message = myshowmessage('email_is_wrong', $isfile);
			return $message;
		}		
	}*/
	
	if(!empty($mobile)){
		$mobile = ismobile($mobile);
		if(!$mobile){
			$message = myshowmessage('对不起，输入手机号有误，请重新输入');
			return $message;
		}
	
	/*判断该手机号是否已经开通过个人主页，是否一天之内邀请同一个人的次数超过3次*/
	$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."'  and status=1 limit 1");
	if ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$message = myshowmessage('该手机号已经激活开通个人主页。');
		return $message;
	}else{
		$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' and status=0 ORDER BY dateline DESC LIMIT 1");
		/*myshowmessage("SELECT * FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' and status=0 ORDER BY dateline DESC LIMIT 1");
		exit();*/
		if ($value = $_SGLOBAL['db']->fetch_array($query)){
				//24小时之前发布多少条~
				if (($_SGLOBAL['timestamp'] - $value['dateline']) <= 60){
						$message = myshowmessage('对不起，您的操作过快，请等待30秒再接收验证码','',2);
						return $message;
					}
				$yesterday = $_SGLOBAL['timestamp'] - 86400;
				$query = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."' AND dateline > '".$yesterday."' ");
				$count = $_SGLOBAL['db']->num_rows($query);
				if ($count >= 3){
					$message = myshowmessage('您已经邀请手机号：'.$mobile.'发出的'.$count.'条邀请短信。');
					return $message;
				}
			}
			else{
				/*$query = $_SGLOBAL['db']->query("SELECT m.uid,m.username FROM ".tname('spacefield')." s join ".tname('member')." m on s.uid = m.uid WHERE s.mobile = '".$mobile."'");*/
				$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spacefield')." WHERE mobile = '".$mobile."' limit 1");
				if ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$message = myshowmessage('该手机号已经激活开通个人主页。');
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
	global $_SGLOBAL;
	if(empty($arr['email'])) {
		if(!empty($arr['mobile'])) {
			$verifycode = rand(100000, 999999);
			send_message($arr['mobile'], $verifycode, $_SGLOBAL['db'], $_SGLOBAL['timestamp'], $arr['realname']);
			myshowmessage('mobile_send');
		}
	}
	//有邮箱，或者邮箱与手机
	else {
		$verifycode = rand(100000, 999999);
		$mailsubject = cplang('active_vertify_subject');
		$mailmessage = cplang('active_email_vertify', array($verifycode));
		$url = getsiteurl().'./do.php?ac='.$_SCONFIG['register_action'];
		$mailmessage1 = cplang('activate_url', array($url));
		$mailmessage = $mailmessage.$mailmessage1;
		$cid = inserttable('mailcron', array('email'=>$arr['email']), 1);
		$setarr = array(
			'cid' => $cid,
			'subject' => addslashes(stripslashes($mailsubject)),
			'message' => addslashes(stripslashes($mailmessage)),
			'dateline' => $_SGLOBAL['timestamp']
		);
		inserttable('mailqueue', $setarr, 1);
		if(!empty($arr['mobile'])) {
			send_message($arr['mobile'], $verifycode, $_SGLOBAL['db'], $_SGLOBAL['timestamp'], $arr['realname']);
			myshowmessage('email_and_mobile_send');
		}else{
			myshowmessage('email_send');
		}
	}
	
}

//发送短信
function send_message($mobile, $verifycode, $db, $nowtime, $realname){
	global $_SGLOBAL;
	$contents = "尊敬的北航校友 ".$realname."，".$_SGLOBAL['supe_name']." 邀请您加入i北航大家庭，邀请码为".$verifycode." 请登录i.buaa.edu.cn完成注册，谢谢！[i北航]";
	//$querymobile = $db->query("SELECT mobile, dateline FROM ".tname('mobilereg')." WHERE mobile = '".$mobile."'");

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
			myshowmessage('验证码已经成功发送！');
		}
	}else{
		myshowmessage('注册验证码发送失败...');
	}
}

?>