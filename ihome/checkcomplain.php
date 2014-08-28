<?php
include_once('./common.php');

if(is_numeric($_SERVER['QUERY_STRING'])) {
	showmessage('enter_the_space', "space.php?uid=$_SERVER[QUERY_STRING]", 0);
}

//二级域名
if(!isset($_GET['do']) && $_SCONFIG['allowdomain']) {
	$hostarr = explode('.', $_SERVER['HTTP_HOST']);
	$domainrootarr = explode('.', $_SCONFIG['domainroot']);
	if(count($hostarr) > 2 && count($hostarr) > count($domainrootarr) && $hostarr[0] != 'www' && !isholddomain($hostarr[0])) {
		showmessage('enter_the_space', $_SCONFIG['siteallurl'].'space.php?domain='.$hostarr[0], 0);
	}
}

/*
*	定时检查诉求记录的处理情况
*	2013-04-18
*/
echo '任务初始化完毕~!<br />';
//上下午开始与结束时间,只在这期间发送短信
$StartAM = mktime(8,0);
$EndAM = mktime(12,0);
$StartPM = mktime(14,0);
$EndPM = mktime(21,0);
$isWorkingTime = FALSE;
if(($StartAM < time() && $EndAM > time()) || ($StartPM < time() && $EndPM > time())){
	$isWorkingTime = TRUE;
}

$nowtime = time();
//从complain表中筛选出已到期.但尚未处理的投诉记录
$ComplainQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('complain')." USE INDEX(dateline) WHERE isreply=0 AND dateline<=$nowtime AND expire=0 AND times<10");
while($result = $_SGLOBAL['db']->fetch_array($ComplainQuery)) {
	//根据投诉记录,取得被投诉部门的的信息
	$UserArray = isDepartment($result['atuid'] ,0);
	//根据被投诉部门的的信息,取得上级部门的信息
	$up_arr = explode("," , $UserArray['up_uid']);
	$UpUserArray = isDepartment($up_arr[0] ,0);
	if ($UpUserArray) {		
		//根据诉求发送次数给出不同截止日期
		switch($result['times']){
			case 1:
				$dateline = strtotime("+2 days", $result['dateline']);
				$dateline = getDateline($dateline);
				$times = $result['times'] + 2;
				
				break;
			case 3:
				$dateline = strtotime("+4 days", $result['dateline']);
				$dateline = getDateline($dateline);
				$times = $result['times'] + 4;
				
				break;
			default:
				$dateline = strtotime("+3 days", $result['dateline']);
				$times = $result['times'] + 3;
				
				break;
		}
		$complain = array(
			'doid' => $result['doid'],
			'uid' => $result['uid'],
			'uname' => $result['uname'],
			'atdepartment' => $result['atdepartment'],
			'atdeptuid' => $result['atdeptuid'],
			'from' => $result['atuid'],
			'atuid' => $UpUserArray['dept_uid'],
			'atuname' => $UpUserArray['department'],
			'isreply' => 0,
			'addtime' => $result['addtime'],
			'dateline' => $dateline,
			'expire' => 0,
			'times' => $times,
			'issendmsg' =>1,
			'message' => $result['message']
		);
		//入库
		inserttable('complain', $complain, 0);
		echo 'complain入库完毕~!<br />';
		$readabletime = date('Y-m-d H:i' ,$dateline);
		switch($times){
			case 3://上报至处长
				//通知用户
				$note = cplang('note_complain_user', array("space.php?do=doing&doid=$result[doid]",$result['atdepartment'] ,'单位负责人'));
				notification_complain_add($result['uid'], 'complain', $note);
				//站内通知部处
				$note = cplang('note_complain_buchu1', array("space.php?do=doing&doid=$result[doid]",$readabletime));
				notification_complain_add($result['atdeptuid'], 'complain', $note);
				foreach($up_arr as $row){
					$UpUserArray = isDepartment($row ,0);
					//站内通知处长
					$note = cplang('note_complain_chuzhang', array("space.php?do=doing&doid=$result[doid]",$readabletime));
					notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
					//短信通知处长
					$tomobile = $UpUserArray['mobile'];
					$content = "诉求待处理,最早的一条将于".$readabletime."上报给主管副校长,请您安排处理";
					$uid = $UpUserArray['dept_uid'];
					$atuname = $result['atuname'];
					$isIgnoreWeekend = 0;
					addMobileMsg($tomobile ,$content ,$uid ,$atuname ,$isIgnoreWeekend);
				}
				
				break;
			
			case 7://上报至副校长
				//站内通知副校长
				$note = cplang('note_complain_fuxiaozhang', array("space.php?do=doing&doid=$result[doid]" ,$readabletime ,$result['atdepartment']));
				notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
				//站内通知用户
				$note = cplang('note_complain_user', array("space.php?do=doing&doid=$result[doid]",$result['atdepartment'] ,'主管副校长'));
				notification_complain_add($result['uid'], 'complain', $note);
				//站内通知部处
				$note = cplang('note_complain_buchu2', array("space.php?do=doing&doid=$result[doid]",$readabletime));
				notification_complain_add($result['atdeptuid'], 'complain', $note);
				//短信通知副校长
				$tomobile = $UpUserArray['mobile'];
				$content = "诉求未处理,最早的一条将于".$readabletime."上报给校长,请您安排处理";
				$uid = $UpUserArray['dept_uid'];
				$atuname = $result['atdepartment'];
				$isIgnoreWeekend = 1;
				addMobileMsg($tomobile ,$content ,$uid ,$atuname ,$isIgnoreWeekend);
				
				$Department = isDepartment($result['atdeptuid'] ,0);
				$up_arr = explode("," , $Department['up_uid']);
				foreach($up_arr as $row){
					$BC_Array = isDepartment($row ,0);
					//站内通知处长
					$note = cplang('note_complain_chuzhang2', array("space.php?do=doing&doid=$result[doid]",$readabletime));
					notification_complain_add($BC_Array['dept_uid'], 'complain', $note);
					//短信通知处长
					$tomobile = $BC_Array['mobile'];
					$content = "诉求未处理,最早的一条将于".$readabletime."上报给校长,请您安排处理";
					$uid = $BC_Array['dept_uid'];
					$atuname = $result['atdepartment'];
					$isIgnoreWeekend = 0;
					addMobileMsg($tomobile ,$content ,$uid ,$atuname ,$isIgnoreWeekend);
				}
				break;

			case 10://上报至校长
				//站内通知校长
				$note = cplang('note_complain_xiaozhang', array("space.php?do=doing&doid=$result[doid]" ,$result['atdepartment']));
				notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
				//站内通知用户
				$note = cplang('note_complain_user', array("space.php?do=doing&doid=$result[doid]",$result['atdepartment'] ,'校长'));
				notification_complain_add($result['uid'], 'complain', $note);
				//站内通知部处
				$note = cplang('note_complain_buchu3', array("space.php?do=doing&doid=$result[doid]"));
				notification_complain_add($result['atdeptuid'], 'complain', $note);
				//短信通知校长
				$tomobile = $UpUserArray['mobile'];
				$content = "诉求未处理";
				$uid = $UpUserArray['dept_uid'];
				$atuname = $result['atdepartment'];
				$isIgnoreWeekend = 1;
				addMobileMsg($tomobile ,$content ,$uid ,$atuname ,$isIgnoreWeekend);
				
				$Department = isDepartment($result['atdeptuid'] ,0);
				$up_arr = explode("," , $Department['up_uid']);
				foreach($up_arr as $row){
					$BC_Array = isDepartment($row ,0);
					//站内通知处长
					$note = cplang('note_complain_chuzhang3', array("space.php?do=doing&doid=$result[doid]"));
					notification_complain_add($BC_Array['dept_uid'], 'complain', $note);
					//短信通知处长
					$tomobile = $BC_Array['mobile'];
					$content = "诉求未处理,已上报给校长";
					$uid = $BC_Array['dept_uid'];
					$atuname = $result['atdepartment'];
					$isIgnoreWeekend = 0;
					addMobileMsg($tomobile ,$content ,$uid ,$atuname ,$isIgnoreWeekend);
				}
				break;
		}
		echo '通知处理完毕~!<br />';
		//将已报告上级的原投诉记录标记为过期
		$_SGLOBAL['db']->query("UPDATE ".tname('complain')." USE INDEX(id) SET ontrack=1 WHERE doid='$result[doid]'");
		$_SGLOBAL['db']->query("UPDATE ".tname('complain')." USE INDEX(id) SET expire=1 WHERE id='$result[id]' AND isreply=0");
		echo '原纪录已标记为过期~!<br />';
	}
}
//以上处理投诉的逐级汇报//////////////////////



//发送上次发送未成功的短信
sendDelayMsg();


//09:04:00到09:10:00之间发送短信通知处长,副校长及校长
if( $nowtime > mktime(9,5,0) && $nowtime < mktime(9,19,0) ){
	
	sendMobileMsg();
}
//诉求发起时间超过6个小时的部门发短信通知
if($isWorkingTime){
	sendDeptMessage();
}




//写入记录文件,以便查看定时任务是否正常执行
$fp = fopen("data/log/checkcomplain.log", "a+"); 
fwrite($fp, date("Y-m-d H:i:s") . "		检测完毕！\n"); 
fclose($fp); 
echo '任务执行完毕~!<br />';






function sendDelayMsg(){
//发送上次发送未成功的短信
	GLOBAL $_SGLOBAL;
	$MsgQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mobilemsg')." WHERE issend=0 AND atuname='system'");
	while($MsgArray = $_SGLOBAL['db']->fetch_array($MsgQuery)){
		$content = $MsgArray['content'];
		$aeskeyMobile = getAESKey('Mobile');
		$mobile = M_decode($MsgArray['tomobile'],$aeskeyMobile);
		$sendtime = '';
        $SendResult = sendsms($mobile,'未完成',$content); 
        if($SendResult)  {
            $_SGLOBAL['db']->query("UPDATE ".tname('mobilemsg')." SET issend=1 WHERE msgid=$MsgArray[msgid]");
        }
	}
	echo '堆积的短信发送完毕~!<br />';
}


function sendDeptMessage(){
//给超过6个小时不处理诉求信息的部门发短信通知
	GLOBAL $_SGLOBAL;
	$nowtime = time();
	$addtime = strtotime("-6 hours", $nowtime);
	$DeptComplainQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('complain')." USE INDEX(dateline) WHERE isreply=0 AND addtime<'$addtime' AND times=1 AND issendmsg=0 GROUP BY atuid");
	while($result = $_SGLOBAL['db']->fetch_array($DeptComplainQuery)) {
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('complain')." USE INDEX(atuid) WHERE atuid=$result[atuid] AND isreply=0 AND issendmsg=0 AND times=1"), 0);
		$dept = isDepartment($result['atuid'] ,0);
		
		$uid = $dept['dept_uid'];
		$aeskeyMobile = getAESKey('Mobile');
		$tomobile = M_decode($dept['mobile'],$aeskeyMobile);
		if($tomobile){
			$content = '【温馨提示】领导您好,'.$result['atuname'].'有'.$count.'条诉求待处理,最早的一条将于'.date('Y-m-d H:i' ,$result['dateline']).'上报给负责人处,请您及时处理';
			$sendtime = '';
			//将发送信息存入数据库
			$MobileMsg = array(
				'issend' => 0,
				'uid' => $uid,
				'tomobile' => $dept['mobile'],
				'content' => $content,
				'addtime' => $nowtime,
				'sendtime' => '',
				'num' => 1,
				'atuname' => 'system'
			);
			//发送短信
            $SendResult=sendsms($tomobile,'网络信息中心发部处',$content);
            if($SendResult) {
              $MobileMsg['issend'] = 1;
	     	}
			inserttable('mobilemsg', $MobileMsg, 0);
		}
		$_SGLOBAL['db']->query("UPDATE ".tname('complain')." USE INDEX(atuid) SET issendmsg=1 WHERE atuid=$result[atuid]");
		echo '给部处的短信发送完毕~!<br />';
	}
}

function sendMobileMsg(){
//给领导集中发送短信通知
	GLOBAL $_SGLOBAL;
	$_SGLOBAL['db']->query("DELETE FROM ".tname('mobilemsg')." WHERE num=0");
	$MsgQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mobilemsg')." WHERE issend=0 GROUP BY uid");
	while($MsgArray = $_SGLOBAL['db']->fetch_array($MsgQuery)){
		$content = '【温馨提示】领导您好,';
		$msgid = '0';
		$Msgs = $_SGLOBAL['db']->query("SELECT msgid,atuname,num FROM ".tname('mobilemsg')." WHERE uid=$MsgArray[uid] AND issend=0 AND atuname!='system'");
		while($MsgsArray = $_SGLOBAL['db']->fetch_array($Msgs)){
			$content .= $MsgsArray['atuname'].'有'.$MsgsArray['num'].'条,';
			$msgid .= ','.$MsgsArray['msgid'];
		}
		$content = substr($content ,0 ,-1);
		$content .= $MsgArray['content'];
		$aeskeyMobile = getAESKey('Mobile');
		$mobile = M_decode($MsgArray['tomobile'],$aeskeyMobile);
		$sendtime = '';
		
		//将发送信息存入数据库
		$MobileMsg = array(
			'issend' => 0,
			'uid' => $MsgArray['uid'],
			'tomobile' => $MsgArray['tomobile'],
			'content' => $content,
			'addtime' => time(),
			'sendtime' => $sendtime,
			'num' => 1,
			'atuname' => 'system'
		);
        $SendResult=sendsms($mobile,'网络信息中心发领导',$content);
        if($SendResult)  {
            $MobileMsg['issend'] = 1;
		}
		inserttable('mobilemsg', $MobileMsg, 0);
		$_SGLOBAL['db']->query("DELETE FROM ".tname('mobilemsg')." WHERE msgid IN ($msgid)");
	}
	echo '给领导的短信发送完毕~!<br />';
}



function addMobileMsg($tomobile ,$content ,$uid ,$atuname ,$isIgnoreWeekend = 0){
	GLOBAL $_SGLOBAL;
	$Msg = $_SGLOBAL['db']->query("SELECT msgid FROM ".tname('mobilemsg')." WHERE atuname='$atuname' AND issend=0 AND uid='$uid'");
	if($MsgArray = $_SGLOBAL['db']->fetch_array($Msg)){
		$_SGLOBAL['db']->query("UPDATE ".tname('mobilemsg')." SET num=num+1 WHERE msgid=$MsgArray[msgid]");
	}else{
		$nowtime = time();
		$sendtime = '';
		//将发送信息存入数据库
		$MobileMsg = array(
			'issend' => 0,
			'uid' => $uid,
			'tomobile' => $tomobile,
			'content' => $content,
			'addtime' => $nowtime,
			'sendtime' => $sendtime,
			'num' => 1,
			'atuname' => $atuname
		);
		//入库
		inserttable('mobilemsg', $MobileMsg, 0);
	}
	echo '短信入库完毕~!<br />';
}


function getDateline($nowtime){

	$time_arr = getdate($nowtime);
	$reset_time = mktime(0,0,0,$time_arr['mon'],$time_arr['mday'],$time_arr['year']);//将初始化时间设定为当时的00:00:00
	if($time_arr['weekday'] == 'Friday' && $time_arr['hours'] > 9){
		$sendtime = strtotime("+81 hours", $reset_time);//将时间后推81个小时,即下周一的 09:00:00
	}elseif($time_arr['weekday'] == 'Saturday'){
		$sendtime = strtotime("+57 hours", $reset_time);//将时间后推57个小时,即下周一的 09:00:00
	}elseif($time_arr['weekday'] == 'Sunday'){
		$sendtime = strtotime("+33 hours", $reset_time);//将时间后推33个小时,即下周一的 09:00:00
	}else{
		$sendtime = $nowtime;
	}
	return $sendtime;
}

?>
