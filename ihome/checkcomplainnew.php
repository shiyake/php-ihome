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

$needSend = array();

function addNeedSend($uid, $nexttime, $msg, $userInfo) {
    global $needSend;
    if (!array_key_exists($uid, $needSend) || $nexttime < $needSend[$uid]['dateline']) {
        $needSend[$uid] = array();
        $needSend[$uid]['dateline'] = $nexttime;
        $needSend[$uid]['msg'] = $msg;
        $needSend[$uid]['mobile'] = $userInfo['mobile'];
    }
}

$nowtime = time();
//从complain表中筛选出已到期.但尚未处理的投诉记录
$ComplainQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('complain')." USE INDEX(dateline) WHERE status=0 AND times<10");
while($result = $_SGLOBAL['db']->fetch_array($ComplainQuery)) {
	//根据投诉记录,取得被投诉部门的的信息
    $complain_url = "space.php?do=complain_item&doid=$result[doid]";
	$UserArray = isDepartment($result['atuid'] ,0);
    if (empty($UserArray)) {
        echo "bad atuid $result[atuid]";
        continue;
    }
    var_dump($result);
    if ($result['times'] == 1) {
        $up_arr = explode("," , $UserArray['up_uid']);
        $UpUserArray = isDepartment($up_arr[0] ,0);
        if ($result['issendmsg'] == 0 && $nowtime - $result['dateline'] > 6 * 3600) {
            $nexttime = $result['dateline'] + 24 * 3600;
            addNeedSend($result['atuid'], $nexttime, '【温馨提示】领导您好,有诉求未处理，最早的一条将于'.date('Y-m-d H:i', $nexttime).'上报给处长，请您及时处理', $UserArray);
            updatetable('complain', array("issendmsg"=>1), array("id"=>$result['id']));
            $note = cplang("note_complain_buchu", array($complain_url, date('Y-m-d H:i', $nexttime)));
            notification_complain_add($result['atuid'], 'complain', $note);
        }
        if ($UpUserArray && $nowtime - $result['dateline'] > 24 * 3600) {
            $nexttime = $result['dateline'] + 24 * 3600 * 3;
            addNeedSend($UpUserArray['dept_uid'], $nexttime, "诉求待处理,最早的一条将于".date('Y-m-d H:i', $nexttime)."上报给主管副校长,请您安排处理", $UpUserArray);
            updatetable("complain", array("issendmsg"=>1, "times"=>3), array("id"=>$result['id']));
            $note = cplang("note_complain_user", array($complain_url, $result['atdepartment'], '处长'));
            notification_complain_add($result['uid'], 'complain', $note);
            $note = cplang("note_complain_buchu1", array($complain_url, date('Y-m-d H:i', $nexttime)));
            notification_complain_add($UserArray['dept_uid'], 'complain', $note);
            $note = cplang('note_complain_chuzhang', array($complain_url, date('Y-m-d H:i', $nexttime)));
            notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
        }
    } elseif ($result['times'] == 3 && $nowtime - $result['dateline'] > 3 * 24 * 3600) {
        $up_arr = explode("," , $UserArray['up_uid']);
        $UpUserArray = isDepartment($up_arr[0] ,0);
        if (empty($UpUserArray)) {
            continue;
        }
        $up_arr = explode("," , $UpUserArray['up_uid']);
        $UpUserArray2 = isDepartment($up_arr[0] ,0);
        if (empty($UpUserArray2)) {
            continue;
        }
        $nexttime = $result['dateline'] + 24 * 3600 * 7;
        addNeedSend($UpUserArray2['dept_uid'], $nexttime, "诉求待处理,最早的一条将于".date('Y-m-d H:i', $nexttime)."上报给校长,请您安排处理", $UpUserArray2);
        updatetable("complain", array("issendmsg"=>1, "times"=>7), array("id"=>$result['id']));
        $note = cplang("note_complain_user", array($complain_url, $result['atdepartment'], '副校长'));
        notification_complain_add($result['uid'], 'complain', $note);
        $note = cplang("note_complain_buchu2", array($complain_url, date('Y-m-d H:i', $nexttime)));
        notification_complain_add($UserArray['dept_uid'], 'complain', $note);
        $note = cplang('note_complain_chuzhang1', array($complain_url, date('Y-m-d H:i', $nexttime)));
        notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
        $note = cplang('note_complain_fuxiaozhang', array($complain_url, date('Y-m-d H:i', $nexttime), $result['atdepartment']));
        notification_complain_add($UpUserArray2['dept_uid'], 'complain', $note);
    } elseif ($result['times'] == 7 && $nowtime - $result['dateline'] > 7 * 24 * 3600) {
        $up_arr = explode("," , $UserArray['up_uid']);
        $UpUserArray = isDepartment($up_arr[0] ,0);
        if (empty($UpUserArray)) {
            continue;
        }
        $up_arr = explode("," , $UpUserArray['up_uid']);
        $UpUserArray2 = isDepartment($up_arr[0] ,0);
        if (empty($UpUserArray2)) {
            continue;
        }
        $up_arr = explode("," , $UpUserArray2['up_uid']);
        $UpUserArray3 = isDepartment($up_arr[0] ,0);
        if (empty($UpUserArray3)) {
            continue;
        }
        addNeedSend($UpUserArray3['dept_uid'], $nexttime, "诉求未处理,请您安排处理", $UpUserArray3);
        updatetable("complain", array("issendmsg"=>1, "times"=>10), array("id"=>$result['id']));
        $note = cplang("note_complain_user", array($complain_url, $result['atdepartment'], '校长'));
        notification_complain_add($result['uid'], 'complain', $note);
        $note = cplang("note_complain_buchu3", array($complain_url, date('Y-m-d H:i', $nexttime)));
        notification_complain_add($UserArray['dept_uid'], 'complain', $note);
        $note = cplang('note_complain_chuzhang2', array($complain_url, date('Y-m-d H:i', $nexttime)));
        notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
        $note = cplang('note_complain_fuxiaozhang1', array($complain_url, date('Y-m-d H:i', $nexttime), $result['atdepartment']));
        notification_complain_add($UpUserArray2['dept_uid'], 'complain', $note);
        $note = cplang('note_complain_xiaozhang', array($complain_url, date('Y-m-d H:i', $nexttime), $result['atdepartment']));
        notification_complain_add($UpUserArray3['dept_uid'], 'complain', $note);

    }
    var_dump($needSend);
}
//以上处理投诉的逐级汇报//////////////////////



//发送上次发送未成功的短信
sendDelayMsg();

sendMobileMsg();

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
        echo $mobile;
		$sendtime = '';
        $SendResult = sendsms($mobile,'未完成',$content); 
        if($SendResult)  {
            $_SGLOBAL['db']->query("UPDATE ".tname('mobilemsg')." SET issend=1 WHERE msgid=$MsgArray[msgid]");
        }
	}
	echo '堆积的短信发送完毕~!<br />';
}

function sendMobileMsg(){
    global $needSend;
//给领导集中发送短信通知
    foreach ($needSend as $uid => $info) {
		$content = $info['msg'];
		$aeskeyMobile = getAESKey('Mobile');
		$mobile = M_decode($info['mobile'],$aeskeyMobile);
		$sendtime = '';
		
		//将发送信息存入数据库
		$MobileMsg = array(
			'issend' => 0,
			'uid' => $uid,
			'tomobile' => $info['mobile'],
			'content' => $content,
			'addtime' => time(),
			'sendtime' => $sendtime,
			'num' => 1,
			'atuname' => 'system'
		);
        $SendResult=sendsms($mobile,'网络信息中心发领导',$content);
        if($SendResult)  {
            $MobileMsg['issend'] = 1;
            $MobileMsg['sendtime']=time();
		}
		inserttable('mobilemsg', $MobileMsg, 0);
	}
}



function addMobileMsg($tomobile ,$content ,$uid ,$atuname , $level, $isIgnoreWeekend = 0){
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
			'atuname' => $atuname,
			'level' => $level
		);
		//入库
		inserttable('mobilemsg', $MobileMsg, 0);
	}
	echo '短信入库完毕~!<br />';
}

?>
