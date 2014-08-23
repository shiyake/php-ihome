<?php

if(!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$id = empty($_GET['id'])?0:intval($_GET['id']);
if(empty($_POST['refer'])) $_POST['refer'] = "space.php?do=doing&view=me";
if(submitcheck('addsubmit')) {
    $add_doing = 1;
    if(empty($_POST['spacenote'])) {
        if(!checkperm('allowdoing')) {
            ckspacelog();
            //showmessage('no_privilege');
            echo "privilege_error";
            exit;
        }
        //ÊµÃûÈÏÖ¤
        ckrealname('doing');
        //ÊÓÆµÈÏÖ¤
        ckvideophoto('doing');
        //ÐÂÓÃ»§¼ûÏ°
        cknewuser();
        //ÑéÖ¤Âë
        if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
            //showmessage('incorrect_code');
            echo "code_error";
            exit;
        }
        //ÅÐ¶ÏÊÇ·ñ²Ù×÷Ì«¿ì
        $waittime = interval_check('post');
        if($waittime > 0) {
            //showmessage('operating_too_fast', '', 1, array($waittime));
            echo "fast_error";
            exit;
        }
    } else {
        if(!checkperm('allowdoing')) {
            $add_doing = 0;
        }
        //ÊµÃû
        if(!ckrealname('doing', 1)) {
            $add_doing = 0;
        }
        //ÊÓÆµ
        if(!ckvideophoto('doing', array(), 1)) {
            $add_doing = 0;
        }
        //ÐÂÓÃ»§
        if(!cknewuser(1)) {
            $add_doing = 0;
        }
        $waittime = interval_check('post');
        if($waittime > 0) {
            $add_doing = 0;
        }
    }
    //»ñÈ¡ÐÄÇé
    $mood = 0;
    preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
    $mood = empty($ms[1])?0:intval($ms[1]);
    //$message = $_POST['message'];
    $isComplain = $_POST['complain'] ? TRUE : FALSE;
    //var_dump($isComplain);exit();
    $message = rawurldecode(getstr($_POST['message'], 1000, 1, 1, 1, 2));
    preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);
    foreach($matches as $value){
        $TmpString = $value[0]; 
        $TmpName = $value[1]; 
        $UserId = $value[2];
        $result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
        if($rs = $_SGLOBAL['db']->fetch_array($result)){
            $realname = $rs['name'];
            if(empty($realname)){
                $realname = $rs['username'];
            }
            $ValidValue = getAtName($TmpString, $TmpName, $realname);
            $ValidValue = trim($ValidValue);
            $at_friend= "space.php?uid=".$UserId;
            if($ValidValue != false){
                $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
                $UserIds[] = $UserId;
            }
        }
    }	
    //Ìæ»»±íÇé
    $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
    $message = preg_replace("/\<br.*?\>/is", ' ', $message);
    //Æ¥Åä´ø#ºÅµÄ»°Ìâ
    preg_match_all("/^[#](.*)[#](.*)$/U",$message, $matches, PREG_SET_ORDER);
    foreach($matches as $item){
        $wallname = trim($item[1]);
        $wallcontent = trim($item[2]);
        $Query = $_SGLOBAL['db']->query("select id,uid from ".tname(wall)." where pass > 0 and starttime-30<".time()." and endtime+30>".time()." and wallname='".$wallname."' limit 1");
        if($getwall = $_SGLOBAL['db']->fetch_array($Query)){
            $pass = 0;
            $hot = 0;
            if($getwall['uid'] == $_SGLOBAL['supe_uid']){
                $pass = 1;
                $hot = 1;
            }
            $wallarr = array(
                'uid' => $_SGLOBAL['supe_uid'],
                'username' => $_SGLOBAL['supe_username'],
                'message' => $wallcontent,
                'ip' => getonlineip(),
                'pass' => $pass,
                'timeline' => $_SGLOBAL['timestamp'],
                'hot' => $hot,
                'wallid' => $getwall['id'],
                'fromdevice' => 'topic'
            );
            //Èë¿â
            inserttable('wallfield', $wallarr, 0);
            $message = str_replace('#'.$item[1].'#', "<a href=\"plugin.php?pluginid=wall&ac=track&wallid=".$getwall['id']."\">#".$item[1]."#</a> ", $message);
        }
        break;
    }
   
    if($end<$start) {
        $message=substr($message,0,$start-1);
    }  
    if(strlen($message) < 1) {
        //showmessage('should_write_that');
        echo "num_error";
        exit;
    }
    $picid = empty($_POST['datapicid'])?0:intval($_POST['datapicid']);
    $filepath = empty($_POST['datapicpath'])?0:trim($_POST['datapicpath']);
    if($add_doing) {
        if($filepath) {
            $setarr = array(
                'uid' => $_SGLOBAL['supe_uid'],
                'username' => $_SGLOBAL['supe_username'],
                'dateline' => $_SGLOBAL['timestamp'],
                'message' => $message,
                'mood' => $mood,
                'ip' => getonlineip(),
                'fromdevice' => 'web',
                'image_1'=>pic_get($filepath, 1, 0),
                'image_1_link'=>"space.php?uid=$_SGLOBAL[supe_uid]&do=album&picid=$picid"
            );
        }
        else {
            $setarr = array(
                'uid' => $_SGLOBAL['supe_uid'],
                'username' => $_SGLOBAL['supe_username'],
                'dateline' => $_SGLOBAL['timestamp'],
                'message' => $message,
                'mood' => $mood,
                'ip' => getonlineip(),
                'fromdevice' => 'web'
            );
        }
        //Èë¿â
        $newdoid = inserttable('doing', $setarr, 1);
        /*
         *	´¦ÀíÍ¶ËßÐÅÏ¢
         *	2013-04-18
         */
        $nowtime = time();
        if($isComplain){
            $complainOK = FALSE;
        }
        //»ý·ÖµÍÓÚ»ý·Ö¹æÔòÖÐÉèÖÃµÄÊýÖµÊ±,½ûÖ¹·¢ÆðËßÇó,½«ËßÇó×ªÎªÆÕÍ¨¼ÇÂ¼
        @include_once(S_ROOT.'./data/data_creditrule.php');
        if($isComplain && ($_SGLOBAL['member']['credit'] < $_SGLOBAL['creditrule']['complain']['credit'])){
            $isComplain = FALSE;
            $note = cplang('note_complain_credit_failed', array("space.php?do=doing&doid=$newdoid"));
            notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
        }
        foreach($UserIds as $UserId){
            if($isComplain){
                //¸ù¾Ý@µ½µÄÓÃ»§ID,²éÑ¯¸ÃÓÃ»§ÊÇ·ñÎª²¿ÃÅ
                $UserDept = isDepartment($UserId ,1);
                if($UserDept){
                    $nowtime = time();
                    $dateline = strtotime("+1 days", $nowtime);
                    $complain = array(
                        'doid' => $newdoid,
                        'uid' => $_SGLOBAL['supe_uid'],
                        'uname' => $_SGLOBAL['supe_username'],
                        'atdepartment' => $UserDept['department'],
                        'atdeptuid' => $UserId,
                        'from' => $_SGLOBAL['supe_uid'],
                        'atuid' => $UserId,
                        'atuname' => $UserDept['department'],
                        'isreply' => 0,
                        'addtime' => $nowtime,
                        'dateline' => $dateline,
                        'expire' => 0,
                        'times' => 1,
                        'issendmsg' =>0,
						'message' => $message,
						'datatime' => date("Ymd",$nowtime)
                    );
                    inserttable('complain', $complain, 0);
                    //Í¨Öª±»@µÄ²¿ÃÅ,ÓÐÓÃ»§Í¶Ëß
                    $note = cplang('note_complain_buchu', array("space.php?do=doing&doid=$newdoid",date('Y-m-d H:i' ,$dateline)));
                    notification_complain_add($UserId, 'complain', $note);
                    $complainOK = TRUE;
                }else{
                    //Í¨Öª±»@µÄÓÃ»§
                    $note = cplang('note_doing_at', array("space.php?do=doing&doid=$newdoid"));
                    notification_add($UserId, 'atyou', $note);
                }
            }else{
                //Í¨Öª±»@µÄÓÃ»§
                $note = cplang('note_doing_at', array("space.php?do=doing&doid=$newdoid"));
                notification_add($UserId, 'atyou', $note);
            }
        }
        if($complainOK){//Í¨ÖªÓÃ»§ËßÇó·¢Æð³É¹¦
            $note = cplang('note_complain_user_success', array("space.php?do=doing&doid=$newdoid"));
            notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
            getreward('complain', 1, $_SGLOBAL['supe_uid']);
        }
        if(!$complainOK && $isComplain){//ËßÇó·¢ÆðÊ§°Ü
            if ($UserId == '0000') {
                $note = cplang( "您好，您的诉求已发送成功。谢谢您对ihome社区的大力支持!", array("space.php?do=doing&doid=$newdoid"));
                notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
            } else {
                $note = cplang('note_complain_user_failed', array("space.php?do=doing&doid=$newdoid"));
                notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
            }
        }
        //ÒÔÉÏ´¦ÀíÍ¶ËßÐÅÏ¢//////////////////////////
    }
    //¸üÐÂ¿Õ¼änote
    $setarr = array('note'=>$message);
    $credit = $experience = 0;
    if(!empty($_POST['spacenote'])) {
        $reward = getreward('updatemood', 0);
        $setarr['spacenote'] = $message;
    } else {
        $reward = getreward('doing', 0);
    }
    updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
    if($reward['credit']) {
        $credit = $reward['credit'];
    }
    if($reward['experience']) {
        $experience = $reward['experience'];
    }
    $setarr = array(
        'mood' => "mood='$mood'",
        'updatetime' => "updatetime='$_SGLOBAL[timestamp]'",
        'credit' => "credit=credit+$credit",
        'experience' => "experience=experience+$experience",
        'lastpost' => "lastpost='$_SGLOBAL[timestamp]'"
    );
    if($add_doing) {
        if(empty($space['doingnum'])) {//µÚÒ»´Î
            $doingnum = getcount('doing', array('uid'=>$space['uid']));
            $setarr['doingnum'] = "doingnum='$doingnum'";
        } else {
            $setarr['doingnum'] = "doingnum=doingnum+1";
        }
    }
    $_SGLOBAL['db']->query("UPDATE ".tname('space')." SET ".implode(',', $setarr)." WHERE uid='$_SGLOBAL[supe_uid]'");
    //ÊÂ¼þfeed
    if($add_doing) {
        if($picid && $filepath) {
            $feedarr = array(
                'appid' => UC_APPID,
                'icon' => 'doing',
                'uid' => $_SGLOBAL['supe_uid'],
                'username' => $_SGLOBAL['supe_username'],
                'dateline' => $_SGLOBAL['timestamp'],
                'title_template' => cplang('feed_doing_title'),
                'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
                'body_template' => '',
                'body_data' => '',
                'id' => $newdoid,
                'idtype' => 'doid',
                'fromdevice' => 'web',
                'image_1'=>pic_get($filepath, 1, 0),
                'image_1_link'=>"space.php?uid=$_SGLOBAL[supe_uid]&do=album&picid=$picid"
            );
        }
        else {
            $feedarr = array(
                'appid' => UC_APPID,
                'icon' => 'doing',
                'uid' => $_SGLOBAL['supe_uid'],
                'username' => $_SGLOBAL['supe_username'],
                'dateline' => $_SGLOBAL['timestamp'],
                'title_template' => cplang('feed_doing_title'),
                'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
                'body_template' => '',
                'body_data' => '',
                'id' => $newdoid,
                'idtype' => 'doid',
                'fromdevice' => 'web'
            );
        }
        $feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//Ï²ºÃhash
        $feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//ºÏ²¢hash
        $feedid = inserttable('feed', $feedarr, 1);
    }
    //Í³¼Æ
    updatestat('doing');
    //·ÖÏíÖÁÐÂÀËÎ¢²©
    @include_once(S_ROOT.'./source/weibo/config.php');
    @include_once(S_ROOT.'./source/weibo/saetv2.ex.class.php' );
    $weibo = $message;
    $pic = $_POST['datapicpath'] ? 'http://i.buaa.edu.cn/'.$_SC['attachurl'].$_POST['datapicpath'] : '';
    $ToWEIBO = $_POST["sina"];
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid='$uid'");
    if($updo = $_SGLOBAL['db']->fetch_array($query))
        $token = $updo['sina_token']; 
    else
        $token = $_POST['valsina']; 
    if($ToWEIBO){
        $setarr = array('sina_token' => $token);
        updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
        $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token );	
        $ret = $pic ? $c->upload_url_text($weibo, $pic) : $c->update($weibo);
        if( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
            //showmessage($ret['error_code'].":".$ret['error']);
            echo "weibo_error";
            exit;
        } 
    }
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." WHERE feedid='$feedid'");
    if ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $value['share_url'] = get_shareurl($value['idtype'], $value['id']);
        if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
            realname_set($value['uid'], $value['username']);
            $value['num'] = get_commentnum($value['idtype'],$value['id']);
        }
    }
    $value = mkfeed($value);

    $tpl = $_GET['view'] ? 'space_feed_li' : 'space_doing_li_ajax';

    include template($tpl);
    exit;


    //showmessage('do_success', $_POST['refer'], 0);
} elseif (submitcheck('commentsubmit')) {
    if(!checkperm('allowdoing')) {
        ckspacelog();
        showmessage('no_privilege');
    }
    //ÊµÃûÈÏÖ¤
    ckrealname('doing');
    //ÐÂÓÃ»§¼ûÏ°
    cknewuser();
    //ÅÐ¶ÏÊÇ·ñ²Ù×÷Ì«¿ì
    $waittime = interval_check('post');
    if($waittime > 0) {
        showmessage('operating_too_fast', '', 1, array($waittime));
    }
    $message = getstr($_POST['message'], 480, 1, 1, 1);
    //ÌáÈ¡ATÓÃ»§	
    preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$_POST['message'], $matches, PREG_SET_ORDER);
    foreach($matches as $value){
        $TmpString = $value[0]; 
        $TmpName = $value[1]; 
        $UserId = $value[2];
        $result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
        if($rs = $_SGLOBAL['db']->fetch_array($result)){
            $realname = $rs['name'];
            if(empty($realname)){
                $realname = $rs['username'];
            }
            //µ÷ÓÃ¼ì²éº¯Êý½«@ºóµÄÄÚÈÝ½øÐÐÑéÖ¤£¬ÎªUID¶ÔÓ¦µÄÐÕÃûÏàÍ¬Ôò·µ»Ø@ÓëÐÕÃû£¬²»ÏàÍ¬Ôò¼ÌÐøÅÐ¶ÏÏÂÒ»¸ö@£¬Ã»ÓÐÕÒµ½Æ¥ÅäµÄ×îÖÕ½«·µ»Øfalse
            $ValidValue = getAtName($TmpString, $TmpName, $realname);
            $ValidValue = trim($ValidValue);
            $at_friend= "space.php?uid=".$UserId;
            if($ValidValue != false){
                $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
                $UserIds[] = $UserId;
            }
        }
    }	
    //Ìæ»»±íÇé
    if(preg_match("/\[em:(\d+):]/is")) {
        showmessage("Ç×£¬Ô­ÁÂÎÒÃÇ²»¹ÄÀøÄú¼ÌÐøÊ¹ÓÃ¾É±íÇé£¬^_^","location.href=-1");
    }
    $message = preg_replace("/\[am:(\d+):]/is", "<img src=\"image/face_new/face_1/\\1.gif\" class=\"face\">", $message);
    $message = preg_replace("/\<br.*?\>/is", ' ', $message);
	
	$message = preg_replace("/\[bm:(\d+):]/is", "<img src=\"image/face_new/face_2/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);  
	if(strlen($message) < 1) {
        showmessage('should_write_that');
    }
    $updo = array();
    if($id) {
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." WHERE id='$id'");
        $updo = $_SGLOBAL['db']->fetch_array($query);
    }
    if(empty($updo) && $doid) {
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
        $updo = $_SGLOBAL['db']->fetch_array($query);
    }
    if(empty($updo)) {
        showmessage('docomment_error');
    } else {
        //ºÚÃûµ¥
        if(isblacklist($updo['uid'])) {
            showmessage('is_blacklist');
        }
    }
    $updo['id'] = intval($updo['id']);
    $updo['grade'] = intval($updo['grade']);
    $setarr = array(
        'doid' => $updo['doid'],
        'upid' => $updo['id'],
        'uid' => $_SGLOBAL['supe_uid'],
        'username' => $_SGLOBAL['supe_username'],
        'dateline' => $_SGLOBAL['timestamp'],
        'message' => $message,
        'ip' => getonlineip(),
        'grade' => $updo['grade']+1
    );
    //×î¶à²ã¼¶
    if($updo['grade'] >= 3) {
        $setarr['upid'] = $updo['upid'];//¸üÄ¸Ò»¸ö¼¶±ð
    }
    $newid = inserttable('docomment', $setarr, 1);
    //¸üÐÂ»Ø¸´Êý
    $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");
    $isReplyComplain = FALSE;
    $nowtime = time();
    $UserDept = isDepartment($_SGLOBAL['supe_uid'] ,0);
    if($UserDept){
        $isComplainQuery = $_SGLOBAL['db']->query("SELECT atdepartment FROM ".tname('complain')." USE INDEX(doid) WHERE doid='$updo[doid]' AND isreply=0 AND atuid IN($UserDept[official]) LIMIT 1");
        if($isComplainArray = $_SGLOBAL['db']->fetch_array($isComplainQuery)){
            $_SGLOBAL['db']->query("UPDATE ".tname('complain')." USE INDEX(doid) SET isreply=1,replytime='$nowtime' WHERE doid='$updo[doid]' AND atuid IN ($UserDept[official])");
            $isReplyComplain = TRUE;
            $_SGLOBAL['db']->query("UPDATE ".tname('mobilemsg')." USE INDEX(atuname) SET num=num-1 WHERE atuname='$isComplainArray[atdepartment]' AND issend=0");
        }
	}
	/*
    $isReplyComplain = FALSE;
    $nowtime = time();
    $UserDept = isDepartment($_SGLOBAL['supe_uid'] ,0);
    if($UserDept){
        $isComplainQuery = $_SGLOBAL['db']->query("SELECT atdepartment,atdeptuid FROM ".tname('complain')." USE INDEX(doid) WHERE doid='$updo[doid]' AND isreply=0 GROUP BY atdeptuid");
        while($isComplainArray = $_SGLOBAL['db']->fetch_array($isComplainQuery)){
            $officials = getOfficialsss($isComplainArray['atdeptuid'] ,'');
            $officials = substr($officials ,0 ,-1);
            print_r($officials);exit;
            $officials_arr = explode("," ,$officials);
            if(in_array($_SGLOBAL['supe_uid'],$officials_arr)){
                $_SGLOBAL['db']->query("UPDATE ".tname('complain')." USE INDEX(doid) SET isreply=1,replytime='$nowtime' WHERE doid='$updo[doid]' AND atuid IN ($officials)");
                $isReplyComplain = TRUE;
                $_SGLOBAL['db']->query("UPDATE ".tname('mobilemsg')." USE INDEX(atuname) SET num=num-1 WHERE atuname='$isComplainArray[atdepartment]' AND issend=0");
            }
        }
    }
	
	*/
	if($updo['uid'] != $_SGLOBAL['supe_uid']) {
        if($isReplyComplain){
            $note = cplang('note_doingcomplain_reply', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
            notification_complain_add($updo['uid'], 'complain', $note, $_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
        }else{
            $note = cplang('note_doing_reply', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
            notification_add($updo['uid'], 'doing', $note);
        }
        //½±Àø»ý·Ö
        getreward('comment',1, 0, 'doing'.$updo['doid']);
    }
    foreach($UserIds as $UserId){		
        $note = cplang('note_doingcomment_at', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
        notification_add($UserId, 'atyou', $note);
    }
    //Í³¼Æ
    updatestat('docomment');
    showmessage('do_success', $_POST['refer'], 0);
}
//É¾³ý
if($_GET['op'] == 'delete') {
    if(submitcheck('deletesubmit')) {

        if($id) {

            $allowmanage = checkperm('managedoing');
            $query = $_SGLOBAL['db']->query("SELECT dc.*, d.uid as duid FROM ".tname('docomment')." dc, ".tname('doing')." d WHERE dc.id='$id' AND dc.doid=d.doid");
            if($value = $_SGLOBAL['db']->fetch_array($query)) {
                if($allowmanage || $value['uid'] == $_SGLOBAL['supe_uid'] || $value['duid'] == $_SGLOBAL['supe_uid'] ) {
                    //¸üÐÂÄÚÈÝ
                    updatetable('docomment', array('uid'=>0, 'username'=>'', 'message'=>''), array('id'=>$id));
                    $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum-1 WHERE doid='$doid'");
                    if($value['uid'] != $_SGLOBAL['supe_uid'] && $value['duid'] != $_SGLOBAL['supe_uid']) {
                        //¿Û³ý»ý·Ö
                        getreward('delcomment', 1, $value['uid']);
                    }
                }
            }
            
        } else {
            include_once(S_ROOT.'./source/function_delete.php');
            deletedoings(array($doid));
        }
        
        showmessage('do_success', $_POST['refer'], 0);
    }
} 
elseif ($_GET['op'] == 'getnumber') {
    $Query = $_SGLOBAL['db']->query("select replynum from ".tname(doing)." WHERE doid=$doid ");
    $num = $_SGLOBAL['db']->result($Query);
    if ($num) {
        echo "<div>$num</div>";
        exit();
    }
    else {
        echo "<div></div>";
        exit();
    }
}

elseif ($_GET['op'] == 'getcomment') {
    include_once(S_ROOT.'./source/class_tree.php');
    $tree = new tree();
    $list = array();
    $highlight = 0;
    $count = 0;
    if(empty($_GET['close'])) {
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('docomment')." WHERE doid='$doid' ORDER BY dateline");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            realname_set($value['uid'], $value['username']);
            $tree->setNode($value['id'], $value['upid'], $value);
            $count++;
            if($value['authorid'] = $space['uid']) $highlight = $value['id'];
        }
    }
    if($count) {
        $values = $tree->getChilds();
        foreach ($values as $key => $vid) {
            $one = $tree->getValue($vid);
            $one['layer'] = $tree->getLayer($vid) * 2;
            $one['style'] = "padding-left:{$one['layer']}em;";
            if($one['id'] == $highlight && $one['uid'] == $space['uid']) {
                $one['style'] .= 'color:red;font-weight:bold;';
            }
            $list[] = $one;
        }
    }
    realname_get();
}

if($_GET['sync']=='true') {
        
    $msg = $_POST['msg'];
    $uid = $_POST['uid'];
    $remember = $_POST['remember'];

    if($remember=='true')   {

        $_SGLOBAL['db'] -> query("UPDATE ".tname("spaceforeign")." SET sync='yes' WHERE uid=".$_POST['uid']);
        $_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET overseas_tip='never' WHERE uid=".$_SGLOBAL['supe_uid']);
    } 
    $query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("spaceforeign")." WHERE uid='$uid'");
    if($res = $_SGLOBAL['db']->fetch_array($query))    {
        $school = $res['school'];
        $query1 = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("mtag")." WHERE tagname='$school'");
        if( $r = $_SGLOBAL['db']-> fetch_array($query1) )   {
            $tagid = $r['tagid'];
        }
    }

    $setarr = array(
        'tagid' => $tagid,
        'uid' => $_SGLOBAL['supe_uid'],
        'username' => $_SGLOBAL['supe_username'],
        'dateline' => $_SGLOBAL['timestamp'],
        'subject' => $msg,
        'lastpost' => $_SGLOBAL['timestamp'],
        'lastauthor' => $_SGLOBAL['supe_username'],
        'lastauthorid' => $_SGLOBAL['supe_uid']
    );
    $tid = inserttable('thread',$setarr,1);
	$psetarr = array(
		'tagid' => $tagid,
		'tid' => $tid,
		'uid' => $_SGLOBAL['supe_uid'],
		'username' => $_SGLOBAL['supe_username'],
		'ip' => getonlineip(),
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $msg,
		'isthread' => 1
	);
	//添加
	inserttable('post', $psetarr);
	
	//更新群组统计
	$_SGLOBAL['db']->query("UPDATE ".tname("mtag")." SET threadnum=threadnum+1 WHERE tagid='$tagid'");
	
	//统计
	updatestat('thread');
	
	//更新用户统计
	if(empty($space['threadnum'])) {
		$space['threadnum'] = getcount('thread', array('uid'=>$space['uid']));
		$threadnumsql = "threadnum=".$space['threadnum'];
	} else {
		$threadnumsql = 'threadnum=threadnum+1';
	}
	//积分
	$reward = getreward('publishthread', 0);
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET {$threadnumsql}, lastpost='$_SGLOBAL[timestamp]', updatetime='$_SGLOBAL[timestamp]', credit=credit+$reward[credit], experience=experience+$reward[experience] WHERE uid='$_SGLOBAL[supe_uid]'");
    $returnarr = array("tagid"=>$tagid,"tid"=>$tid);
    echo json_encode($returnarr);
    return ;
}
if($_GET['sync']=='false') {
    if($_POST['remember']=="true")  {
        $_SGLOBAL['db'] -> query("UPDATE ".tname("space")." SET overseas_tip='never' WHERE uid='".$_SGLOBAL['supe_uid']."'");
        $_SGLOBAL['db'] -> query("UPDATE ".tname("spaceforeign")." SET sync='no'  WHERE uid='".$_SGLOBAL['supe_uid']."'");
    }
    return ;
}
include template('cp_doing');
//É¸Ñ¡
function ckicon_uid($feed) {
    global $_SGLOBAL, $space, $_SCONFIG;

    if($space['filter_icon']) {
        $key = $feed['icon'].'|0';
        if(in_array($key, $space['filter_icon'])) {
            return false;
        } else {
            $key = $feed['icon'].'|'.$feed['uid'];
            if(in_array($key, $space['filter_icon'])) {
                return false;
            }
        }
    }
    if($space['black_feed']) {
        $key = $feed['uid'];
        if(in_array($key, $space['black_feed'])) {
            return false;
        }
    }
    if ($space['blacklist']) {
        if (in_array($feed['uid'], $space['blacklist'])) {
            return false;
        }
    }
    return true;
}
?>
