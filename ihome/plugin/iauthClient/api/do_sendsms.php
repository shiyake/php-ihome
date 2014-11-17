<?php
/*
     sendsms.php发送短信
	 $MsgFrom		为发送者的用户名
	 $MsgFromId		为发送者的UID
	 $msgTo			为接收者的手机号码,多个号码之间用";"隔开
	 $message		为短信的内容
	 $sendTime		为定时短信的时间,如定时时间为2013年05月04号08点20分30秒,则为20130504082030;即时短信则该项留空
*/

include_once('../iauth_verify_forward.php');	
$userid = intval(iauth_verify());

include_once('../../../common.php');
include_once(S_ROOT.'./uc_client/client.php');
@include_once(S_ROOT.'./data/data_profield.php');
	

/*
//测试用数据
$MsgFrom = 'yangdali';
$MsgFromId = 0;
$MsgTo = '15210505872;18046504552;';
$message = '北航ihome短信接口测试信息~!打扰见谅~';
$sendTime = 20130506163000;
*/

$MsgFrom = $username;
$MsgFromId = $userid;
$MsgTo = trim($_POST['msgto']);
$Message = trim($_POST['message']);
$sendTime = trim($_POST['sendtime']);


$arrs = array();

//定时发送的时间是否合法
if(!empty($sendTime)){
	if (strtotime($sendTime) < time()){
		$arrs[0]['flag'] = 'fail';
		$arrs[0]['tomobile'] = 'All';
		$arrs[0]['msg'] = '设定的时间不合法';
		$result = json_encode($arrs);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
}
//短信内容是否为空
if(empty($Message)){
	$arrs[0]['flag'] = 'fail';
	$arrs[0]['tomobile'] = 'All';
	$arrs[0]['msg'] = '短信内容不能为空';
	$result = json_encode($arrs);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
}

//根据短信内容字数计算发送条数
$length = mb_strlen($Message,'UTF8') + 4;
$num = ceil($length/63);


//手机号加密密钥
$aeskeyMobile = getAESKey('Mobile');

$MsgTo = explode(';' ,$MsgTo);
$jsonIndex = 0;
foreach($MsgTo as $toMobile){
	if(!empty($toMobile)){
		//发送短信
		$SendResult = verifycodesms($toMobile, $Message ,$sendTime);

		if (!is_numeric($SendResult)){
			$msg = '其他错误';
		}else{
			switch($SendResult){
				case 0:$msg = '发送成功';$flag = 'success';break;
				case -2:$msg = '其他错误';$flag = 'fail';break;
				case -4:$msg = '手机号格式不对';$flag = 'fail';break;
				case -6:$msg = '定时发送时间不是有效的时间格式';$flag = 'fail';break;
				default:$msg = '系统错误';$flag = 'fail';break;
			}
		}
		//将要返回的提示信息
		$arrs[$jsonIndex]['flag'] = $flag;
		$arrs[$jsonIndex]['tomobile'] = $toMobile;
		$arrs[$jsonIndex]['msg'] = $msg;
		$jsonIndex++;
		
		$sms = array(
			'uid' => $MsgFromId,
			'username' => $MsgFrom,
			'tomobile' => M_encode($toMobile,$aeskeyMobile),//加密手机号
			'mssage' => $Message,
			'sendtime' => strtotime($sendTime),
			'addtime' => time(),
			'status' => $SendResult,
			'num' => $num
		);
		//入库
		inserttable('apisms', $sms, 0);
	}
}
//返回json信息
$result = json_encode($arrs);
$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
echo $result;
exit();

	
?>