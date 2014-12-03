<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$cpid = empty($_GET['cpid'])?0:intval($_GET['cpid']);
$opid = empty($_GET['opid'])?0:intval($_GET['opid']);
if ($_GET['op'] == 'delete') {
    if (submitcheck('deletesubmit')) {
        include_once(S_ROOT.'./source/function_delete.php');
        deletedoings(array($doid));
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'down') {
    $confirm = isset($_GET['confirm']) ? 1 : 0;
    $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid and id = $cpid");
    $complain = $_SGLOBAL['db']->fetch_array($query);
    if (empty($complain)) {
        showmessage('error_op');
    }
    if (submitcheck('down') || $confirm) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op")." where id = $opid");
        $op = $_SGLOBAL['db']->fetch_array($query);
        if (empty($op)) {
            if ($confirm) {
                echo 'error_op';
                exit();
            }
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid and id = $cpid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            if ($confirm) {
                echo 'error_op';
                exit();
            }
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid] and updown = 2");
        $down = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($down)) {
            if ($confirm) {
                echo 'updown_again';
                exit();
            }
            showmessage('updown_again', $_POST['refer'], 1);
        }
        $downarr = array();
        $downarr['opid'] = $opid;
        $downarr['uid'] = $_SGLOBAL['supe_uid'];
        $downarr['updown'] = 2;
        $downarr['username'] = $_SGLOBAL['supe_username'];
        $downarr['dateline'] = $_SGLOBAL['timestamp'];
        inserttable("complain_op_updown", $downarr);
        $_SGLOBAL['db']->query("update ".tname('complain_op')." set downnum=downnum+1 where id=$opid");

        $q = $_SGLOBAL['db']->query("select * from ".tname('complain')." where uid=$_SGLOBAL[supe_uid] and doid=$doid and lastopid=$opid and status=1");
        if ($r = $_SGLOBAL['db']->fetch_array($q)) {
            updatetable('complain', array('status' => 0, 'dateline'=>$_SGLOBAL['timestamp'], 'times'=>1, 'issendmsg'=>0), array('id'=>$r['id']));
            $note = cplang("complain_down", array("space.php?do=complain_item&doid=$complain[doid]&cpid=$r[id]"));
            notification_complain_add($complain["atuid"], "complain", $note);
            $oparr = array();
            $oparr['doid'] = $doid;
            $oparr['message'] = '';
            $oparr['uid'] = $_SGLOBAL['supe_uid'];
            $oparr['username'] = $_SGLOBAL['supe_username'];
            $oparr['optype'] = 5;
            $oparr['dateline'] = $_SGLOBAL['timestamp'];
            inserttable("complain_op", $oparr);
        }
        if ($confirm) {
            $q = $_SGLOBAL['db']->query("select downnum from ".tname('complain_op')." where id=$opid");
            if($r = $_SGLOBAL['db']->fetch_array($q)){
                $num = $r['downnum'];
                echo $num;
                exit();
            }
        }
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'up') {
    $confirm = isset($_GET['confirm']) ? 1 : 0;
    $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid and id = $cpid");
    $complain = $_SGLOBAL['db']->fetch_array($query);
    if (empty($complain)) {
        showmessage('error_op');
    }
    if (submitcheck('up') || $confirm) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op")." where id = $opid");
        $op = $_SGLOBAL['db']->fetch_array($query);
        if (empty($op)) {
            if ($confirm) {
                echo 'error_op';
                exit();
            }
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid and id = $cpid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            if ($confirm) {
                echo 'error_op';
                exit();
            }
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid] and updown = 1");
        $up = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($up)) {
            if ($confirm) {
                echo 'updown_again';
                exit();
            }
            showmessage('updown_again', $_POST['refer'], 1);
        }
        $downarr = array();
        $downarr['opid'] = $opid;
        $downarr['uid'] = $_SGLOBAL['supe_uid'];
        $downarr['updown'] = 1;
        $downarr['username'] = $_SGLOBAL['supe_username'];
        $downarr['dateline'] = $_SGLOBAL['timestamp'];
        inserttable("complain_op_updown", $downarr);
        $_SGLOBAL['db']->query("update ".tname('complain_op')." set upnum=upnum+1 where id=$opid");

        $q = $_SGLOBAL['db']->query("select * from ".tname('complain')." where uid=$_SGLOBAL[supe_uid] and doid=$doid and lastopid=$opid and status=1");
        if ($r = $_SGLOBAL['db']->fetch_array($q)) {
            updatetable('complain', array('status' => 2), array('id'=>$r['id']));
            $oparr = array();
            $oparr['doid'] = $doid;
            $oparr['message'] = '';
            $oparr['uid'] = $_SGLOBAL['supe_uid'];
            $oparr['username'] = $_SGLOBAL['supe_username'];
            $oparr['optype'] = 6;
            $oparr['dateline'] = $_SGLOBAL['timestamp'];
            $oparr['opvalue'] = 1;
            inserttable("complain_op", $oparr);
        }
        if ($confirm) {
            $q = $_SGLOBAL['db']->query("select upnum from ".tname('complain_op')." where id=$opid");
            if($r = $_SGLOBAL['db']->fetch_array($q)){
                $num = $r['upnum'];
                echo $num;
                exit();
            }
        }
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'continue') {
    if (submitcheck('continuesubmit')) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid and id = $cpid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            showmessage('error_op');
        }
        preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
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
        if (strlen($message) < 1) {
            showmessage('should_write_that', $_SGLOBAL['refer'], 3);
        }
        $optype = empty($_POST['optype'])?2:intval($_POST['optype']);
        $doid = intval($_POST['doid']);
        $oparr = array();
        $oparr['doid'] = $doid;
        $oparr['message'] = $message;
        $oparr['uid'] = $_SGLOBAL['supe_uid'];
        $oparr['username'] = $_SGLOBAL['supe_username'];
        $oparr['optype'] = 4;
        $oparr['dateline'] = $_SGLOBAL['timestamp'];
        if ($complain['status'] == 1) {
            if ($optype == 4) {
                updatetable('complain', array('status'=>0, 'dateline'=>$_SGLOBAL['timestamp'], 'times'=>1, 'issendmsg'=>'0'), array('id'=>$cpid));
            } else {
                showmessage('error_op');
            }
            inserttable('complain_op', $oparr);

            $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
            $updo = $_SGLOBAL['db']->fetch_array($query);
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
                'grade' => $updo['grade']+1,
                'complainBorn' => 1
            );
            if($updo['grade'] >= 3) {
                $setarr['upid'] = $updo['upid'];
            }
            $newid = inserttable('docomment', $setarr, 1);
            $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");

            $note = cplang("complain_continue", array("space.php?do=complain_item&doid=$complain[doid]&cpid=$cpid"));
            notification_complain_add($complain["atuid"], "complain", $note);
            showmessage('do_success', $_POST['refer'], 0);
        }
    }
    showmessage('error_op');
} elseif ($_GET['op'] == 'add') {
    if (submitcheck('addsubmit')) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid and id = $cpid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            showmessage('error_op');
        }
        preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
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
        if (strlen($message) < 1) {
            showmessage('should_write_that', $_SGLOBAL['refer'], 3);
        }
        
        $legalEntity = $_SGLOBAL['supe_uid'];
        $legalEntityName = $_SGLOBAL['supe_username'];
        if (!$_SGLOBAL['isdept']) {
            $q = $_SGLOBAL['db']->query("select * from ".tname("powerlevel")." where dept_uid=$complain[atuid]");
            if (($r = $_SGLOBAL['db']->fetch_array($q)) && in_array("$_SGLOBAL[supe_uid]", explode(',',$r['up_uid']))) {
                $legalEntity = $r['dept_uid'];
                $legalEntityName = getUsername($r['dept_uid'],$_SGLOBAL['db']);
            }
        }

        $optype = empty($_POST['optype'])?2:intval($_POST['optype']);
        $doid = intval($_POST['doid']);
        $oparr = array();
        $oparr['doid'] = $doid;
        $oparr['message'] = $message;
        $oparr['uid'] = $legalEntity;
        $oparr['username'] = $legalEntityName;
        $oparr['optype'] = $optype;
        $oparr['dateline'] = $_SGLOBAL['timestamp'];
        $oparr['opvalue'] = $_POST['relay_depid'];
        if (empty($_POST['relay_depid'])) {
            showmessage('error_op');
        }
        if ($complain['status'] == 0) {
            if ($optype != 3 && $optype != 2) {
                showmessage('error_op');
            }
            if ($complain['relay_times'] >= 3 && $optype == 3) {
                showmessage('complain_relay_too_much', $_POST['refer'], 3);
            }
            $opid = inserttable('complain_op', $oparr, true);

            $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
            $updo = $_SGLOBAL['db']->fetch_array($query);
            $updo['id'] = intval($updo['id']);
            $updo['grade'] = intval($updo['grade']);
            $setarr = array(
                'doid' => $updo['doid'],
                'upid' => $updo['id'],
                'uid' => $legalEntity,
                'username' => $legalEntityName,
                'dateline' => $_SGLOBAL['timestamp'],
                'message' => $message,
                'ip' => getonlineip(),
                'grade' => $updo['grade']+1,
                'complainBorn' => 1
            );
            if($updo['grade'] >= 3) {
                $setarr['upid'] = $updo['upid'];
            }
            $newid = inserttable('docomment', $setarr, 1);
            $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");

            if ($optype == 3) {
                if ($complain["atuid"] != $legalEntity) {
                    showmessage('error_op');
                }

                $query = $_SGLOBAL['db']->query("select * from ".tname("space")." where uid = $_POST[relay_depid]");
                $relay_dep = $_SGLOBAL['db']->fetch_array($query);
                if (empty($relay_dep)) {
                    showmessage('error_op');
                }

                updatetable('complain', array("status"=>3, 'lastopid'=>$opid), array('id'=>$cpid));

                $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid=$doid and atuid=$_POST[relay_depid] and status != 3");
                $already = $_SGLOBAL['db']->fetch_array($query);
                if (!$already) {
                    if ($complain['relayed_by']) {
                        $relayed_by = $complain['relayed_by'].$legalEntity.',';
                    } else {
                        $relayed_by = ','.$legalEntity.',';
                    }
                    
                    $newComplain = $complain;
                    unset($newComplain['id']);
                    $newComplain['atdeptuid'] = $_POST['relay_depid'];
                    $newComplain['atuid'] = $_POST['relay_depid'];
                    $newComplain['atuname'] = $relay_dep['name'];
                    $newComplain['atdepartment'] = $relay_dep['name'];
                    $newComplain['atdeptuid'] = $_POST['relay_depid'];
                    $newComplain['dateline'] = $_SGLOBAL['timestamp'];
                    $newComplain['times'] = 1;
                    $newComplain['issendmsg'] = 0;
                    $newComplain['relay_times'] = $complain['relay_times']+1;
                    $newComplain['relayed_by'] = $relayed_by;
                    $newComplainId = inserttable('complain', $newComplain, 1);

                    $note = cplang('complain_relay', array($complain['atuname'], "space.php?do=complain_item&doid=$complain[doid]&cpid=$newComplainId"));
                    notification_complain_add($_POST['relay_depid'], 'complain', $note);
                }
            } elseif ($optype == 2 && $legalEntity == $complain['atuid']) {
                updatetable('complain', array('status'=>1, 'lastopid'=>$opid, 'replytime'=>$_SGLOBAL['timestamp'], 'dateline'=>$_SGLOBAL['timestamp']), array('id'=>$cpid));
                if ($complain['lastopid'] == 0) {
                    $result = $_SGLOBAL['db']->query("select * from ".tname('complain_dep')." where uid = $legalEntity");
                    $dep = $_SGLOBAL['db']->fetch_array($result);
                    if (empty($dep)) {
                        $arr = array();
                        $arr['uid'] = $legalEntity;
                        $arr['username'] = $legalEntityName;
                        $arr['upnum'] = 0;
                        $arr['downnum'] = 0;
                        $arr['allreplynum'] = 1;
                        $arr['allreplysecs'] = $_SGLOBAL['timestamp'] - $complain['dateline'];
                        $arr['score'] = 0;
                        $arr['aversecs'] = 0;
                        $arr['lastupdate'] = 0;
                        inserttable('complain_dep', $arr);
                    } else {
                        $arr['allreplynum'] = $dep['allreplynum'] + 1;
                        $arr['allreplysecs'] = $dep['allreplysecs'] + $_SGLOBAL['timestamp'] - $complain['dateline'];
                        updatetable("complain_dep", $arr, array('uid'=>$legalEntity));
                    }
                }

                $note = cplang('complain_reply', array("space.php?do=complain_item&doid=$complain[doid]&cpid=$cpid"));
                notification_complain_add($complain['uid'], 'complain', $note);
            }
            showmessage('do_success', $_POST['refer'], 0);
        }
    }
    showmessage('error_op');
}
include template("cp_complain");
?>
