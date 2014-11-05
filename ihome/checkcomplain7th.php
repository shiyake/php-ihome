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

function addNeedSend($complain, $uid, $nexttime, $msg, $userInfo, $cc, $level) {
    global $needSend;
    $atuid = $complain['atuid'];
    if (!array_key_exists($uid, $needSend) || !array_key_exists($atuid, $needSend[$uid])|| $nexttime < $needSend[$uid][$atuid]['dateline']) {
        $needSend[$uid][$atuid]['dateline'] = $nexttime;
        $needSend[$uid][$atuid]['msg'] = $msg;
        $needSend[$uid][$atuid]['mobile'] = $userInfo['mobile'];
        $needSend[$uid][$atuid]['cc'] = $cc;
        $needSend[$uid][$atuid]['level'] = $level;
        if (!array_key_exists('count', $needSend[$uid][$atuid])) {
            $needSend[$uid][$atuid]['count'] = 0;
            $needSend[$uid][$atuid]['name'] = $complain['atuname'];
        }
    }
    $needSend[$uid][$atuid]['count']++;
}
$log = Logger::getLogger("checkcomplain");
$log->debug("check complain");

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
    if ($result['times'] == 1) {
        $up_arr = explode("," , $UserArray['up_uid']);
        $UpUserArray = isDepartment($up_arr[0] ,0);
        if ($result['issendmsg'] == 0 && $nowtime - $result['dateline'] > 6 * 3600) {
            $nexttime = $result['dateline'] + 24 * 3600;
            addNeedSend($result,$result['atuid'], $nexttime, '条诉求未处理,最早的一条将于'.fancyDate($nexttime).'上报给负责人,请您及时处理.', $UserArray, array(), 1);
            updatetable('complain', array("issendmsg"=>1), array("id"=>$result['id']));
            $note = cplang("note_complain_buchu", array($complain_url, date('Y-m-d H:i', $nexttime)));
            notification_complain_add($result['atuid'], 'complain', $note);
            $log->debug("complain doid $result[doid] send message buchu");
        }
        if ($UpUserArray && $nowtime - $result['dateline'] > 24 * 3600) {
            $nexttime = $result['dateline'] + 24 * 3600 * 3;
            addNeedSend($result,$UpUserArray['dept_uid'], $nexttime, "条诉求待处理,最早的一条将于".fancyDate($nexttime)."上报给主管副校长,请您安排处理.", $UpUserArray, array($result['atuid'] => $UserArray['mobile'].',1'), 3);
            updatetable("complain", array("issendmsg"=>0, "times"=>3), array("id"=>$result['id']));
            $note = cplang("note_complain_user", array($complain_url, $result['atdepartment'], '处长'));
            notification_complain_add($result['uid'], 'complain', $note);
            $note = cplang("note_complain_buchu1", array($complain_url, date('Y-m-d H:i', $nexttime)));
            notification_complain_add($UserArray['dept_uid'], 'complain', $note);
            $note = cplang('note_complain_chuzhang', array($complain_url, date('Y-m-d H:i', $nexttime)));
            notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
            $log->debug("complain doid $result[doid] send message chuzhang");
        }
    } elseif ($result['times'] == 3 && $result['issendmsg'] == 0 && $nowtime - $result['dateline'] > 2 * 24 * 3600) {
        $up_arr = explode("," , $UserArray['up_uid']);
        $UpUserArray = isDepartment($up_arr[0] ,0);
        $nexttime = $result['dateline'] + 24 * 3600 * 3;
        addNeedSend($result,$UpUserArray['dept_uid'], $nexttime, "条诉求待处理,最早的一条将于".fancyDate($nexttime)."上报给主管副校长,请您安排处理.", $UpUserArray, array($result['atuid'] => $UserArray['mobile'].',1'), 3);
        updatetable("complain", array("issendmsg"=>1), array("id"=>$result['id']));
        $note = cplang("note_complain_user", array($complain_url, $result['atdepartment'], '处长'));
        notification_complain_add($result['uid'], 'complain', $note);
        $note = cplang("note_complain_buchu1", array($complain_url, date('Y-m-d H:i', $nexttime)));
        notification_complain_add($UserArray['dept_uid'], 'complain', $note);
        $note = cplang('note_complain_chuzhang', array($complain_url, date('Y-m-d H:i', $nexttime)));
        notification_complain_add($UpUserArray['dept_uid'], 'complain', $note);
        $log->debug("complain doid $result[doid] send message chuzhang");
    }
}
var_dump($needSend);
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
    $aeskeyMobile = getAESKey('Mobile');
//给领导集中发送短信通知
    foreach ($needSend as $uid => $allmsg) {
        $mergedContent = '【温馨提示】领导您好,';
        $mergedMobile = '';
        foreach ($allmsg as $atuid => $info) {
            $present = '';
            $next = '';
            switch ($info['level']) {
                case 1:
                    $header = '【温馨提示】领导您好,'.$info['name'];
                    $present = '部处';
                    $next = '单位负责人';
                    break;
                case 3:
                    $header = '【温馨提示】领导您好,'.$info['name'];
                    $present = '单位负责人';
                    $next = '主管副校长';
                    break;
                case 7:
                    $header = '【温馨提示】领导您好,'.$info['name'];
                    $present = '主管副校长';
                    $next = '校长';
                    break;
                case 10:
                    if ($mergedMobile) {
                        $mergedContent .= '、'.$info['name'].'有'.$info['count'].'条';
                    } else {
                        $mergedMobile = $info['mobile'];
                        $mergedContent = '【温馨提示】领导您好,'.$info['name'].'有'.$info['count'].'条';
                    }
                    $present = '校长';
                    $next = '校长';
                    break;
                default:
                    $header = '【温馨提示】领导您好,'.$info['name'];
                    break;
            }

            if ($info['level'] != 10) {
                $content = $header.'有'.$info['count'].$info['msg'];
                $mobile = M_decode($info['mobile'],$aeskeyMobile);
                $sendtime = '';
                
                insertMsg($mobile, $uid, $info['mobile'], $content, $sendtime);
            }

            foreach ($info['cc'] as $ccuid => $ccmix) {
                list($ccmobile, $cclevel) = explode(',',$ccmix);
                // switch ($cclevel) {
                //     case 1:
                //         $header = '【温馨提示】领导您好,您';
                //         break;
                //     default:
                //         $header = '【温馨提示】领导您好,'.$info['name'];
                //         break;
                // }
                // if ($info['level'] != 10) {
                //     $content = $header.'有'.$info['count'].'条诉求在规定的时间内未处理,已上报给'.$present.'处,若不处理,将于'.fancyDate($info['dateline']).'上报给'.$next.'.';
                // } else {
                //     $content = $header.'有'.$info['count'].'条诉求在规定的时间内未处理,已上报给'.$present.'处.';
                // }
                $header = '【温馨提示】领导您好,'.$info['name'];
                $content = $header.'有'.$info['count'].'条诉求在规定的时间内未处理,已上报给'.$present.'处.';

                $mobile = M_decode($ccmobile,$aeskeyMobile);
                $sendtime = '';
                
                insertMsg($mobile, $ccuid, $ccmobile, $content, $sendtime);
            }
        }
        if ($mergedMobile) {
            $content = $mergedContent.'诉求未处理,请您安排处理.';
            $mobile = M_decode($mergedMobile,$aeskeyMobile);
            $sendtime = '';
            
            insertMsg($mobile, $uid, $mergedMobile, $content, $sendtime);
        }
    }
}


function insertMsg($mobile, $uid, $tomobile, $content, $sendtime) {
    //将发送信息存入数据库
    $MobileMsg = array(
        'issend' => 0,
        'uid' => $uid,
        'tomobile' => $tomobile,
        'content' => $content,
        'addtime' => time(),
        'sendtime' => $sendtime,
        'num' => 1,
        'atuname' => 'system'
    );
    $SendResult=sendsms($mobile,'网络信息中心发领导',$content);
    if($SendResult) {
        $MobileMsg['issend'] = 1;
        $MobileMsg['sendtime']=time();
    }
    inserttable('mobilemsg', $MobileMsg, 0);
}

function fancyDate($time) {
    // $hajime = mktime(8,3);
    // if (time()<$hajime) {
    //     return date('m月d日H时', $time);
    // }
    return date('Y-m-d H:i', $time);
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
