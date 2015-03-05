<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$opid = empty($_GET['opid'])?0:intval($_GET['opid']);

if ($_GET['op'] == 'credit') {
    $need = 0;
    $remain = intval($space['credit']);
    $q = $_SGLOBAL['db']->query('select * from '.tname('creditrule')." where action='complain' limit 1");
    if (($r = $_SGLOBAL['db']->fetch_array($q)) && (intval($r['credit']) > $remain)) {
        $need = intval($r['credit']);
    }
    include template("cp_complain");
    exit();
}

$query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid");
$complain = $_SGLOBAL['db']->fetch_array($query);
if (empty($complain)) {
    showmessage('error_op');
}
if ($_GET['op'] == 'delete') {
    if (submitcheck('deletesubmit')) {
        include_once(S_ROOT.'./source/function_delete.php');
        deletedoings(array($doid));
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'down') {
    $confirm = isset($_GET['confirm']) ? 1 : 0;
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

        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid]");
        $updown = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($updown)) {
            if ($updown['uid'] == $complain['uid'] || $updown['updown'] == 1) {
                if ($confirm) {
                    echo 'updown_again';
                    exit();
                }
                showmessage('updown_again', $_POST['refer'], 1);
            }
            $_SGLOBAL['db']->query("delete from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid] and updown = 2");
            $_SGLOBAL['db']->query("update ".tname('complain_op')." set downnum=downnum-1 where id=$opid");
        } else {
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
                updatetable('complain', array('status' => 0, 'lastopid'=>0, 'dateline'=>$_SGLOBAL['timestamp'], 'times'=>1, 'issendmsg'=>0), array('id'=>$r['id']));
                $note = cplang("complain_down", array("space.php?do=complain_item&doid=$complain[doid]"));
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
        
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid]");
        $updown = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($updown)) {
            if ($updown['uid'] == $complain['uid'] || $updown['updown'] == 2) {
                if ($confirm) {
                    echo 'updown_again';
                    exit();
                }
                showmessage('updown_again', $_POST['refer'], 1);
            }
            $_SGLOBAL['db']->query("delete from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid] and updown = 1");
            $_SGLOBAL['db']->query("update ".tname('complain_op')." set upnum=upnum-1 where id=$opid");
        } else {
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
    // if (submitcheck('continuesubmit')) {
    //     preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
    //     $message = rawurldecode(getstr($_POST['message'], 1000, 1, 1, 1, 2));
    //     preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);
    //     foreach($matches as $value){
    //         $TmpString = $value[0]; 
    //         $TmpName = $value[1]; 
    //         $UserId = $value[2];
    //         $result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
    //         if($rs = $_SGLOBAL['db']->fetch_array($result)){
    //             $realname = $rs['name'];
    //             if(empty($realname)){
    //                 $realname = $rs['username'];
    //             }
    //             $ValidValue = getAtName($TmpString, $TmpName, $realname);
    //             $ValidValue = trim($ValidValue);
    //             $at_friend= "space.php?uid=".$UserId;
    //             if($ValidValue != false){
    //                 $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
    //                 $UserIds[] = $UserId;
    //             }
    //         }
    //     }	
    //     //Ìæ»»±íÇé
    //     $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
    //     $message = preg_replace("/\<br.*?\>/is", ' ', $message);
    //     if (strlen($message) < 1) {
    //         showmessage('should_write_that', $_SGLOBAL['refer'], 3);
    //     }
    //     $optype = empty($_POST['optype'])?2:intval($_POST['optype']);
    //     $doid = intval($_POST['doid']);
    //     $oparr = array();
    //     $oparr['doid'] = $doid;
    //     $oparr['message'] = $message;
    //     $oparr['uid'] = $_SGLOBAL['supe_uid'];
    //     $oparr['username'] = $_SGLOBAL['supe_username'];
    //     $oparr['optype'] = 4;
    //     $oparr['dateline'] = $_SGLOBAL['timestamp'];
    //     if ($complain['status'] == 1) {
    //         if ($optype == 4) {
    //             updatetable('complain', array('status'=>0, 'dateline'=>$_SGLOBAL['timestamp'], 'times'=>1, 'issendmsg'=>'0'), array('id'=>$cpid));
    //         } else {
    //             showmessage('error_op');
    //         }
    //         inserttable('complain_op', $oparr);

    //         $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
    //         $updo = $_SGLOBAL['db']->fetch_array($query);
    //         $updo['id'] = intval($updo['id']);
    //         $updo['grade'] = intval($updo['grade']);
    //         $setarr = array(
    //             'doid' => $updo['doid'],
    //             'upid' => $updo['id'],
    //             'uid' => $_SGLOBAL['supe_uid'],
    //             'username' => $_SGLOBAL['supe_username'],
    //             'dateline' => $_SGLOBAL['timestamp'],
    //             'message' => $message,
    //             'ip' => getonlineip(),
    //             'grade' => $updo['grade']+1,
    //             'complainBorn' => 1
    //         );
    //         if($updo['grade'] >= 3) {
    //             $setarr['upid'] = $updo['upid'];
    //         }
    //         $newid = inserttable('docomment', $setarr, 1);
    //         $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");

    //         $note = cplang("complain_continue", array("space.php?do=complain_item&doid=$complain[doid]&cpid=$cpid"));
    //         notification_complain_add($complain["atuid"], "complain", $note);
    //         showmessage('do_success', $_POST['refer'], 0);
    //     }
    // }
    showmessage('error_op');
} elseif ($_GET['op'] == 'add') {
    if (submitcheck('addsubmit')) {
        $add_type = empty($_POST['type'])?0:intval($_POST['type']);
        $isrelay = 0;
        $relay_depid = 0;

        preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
        $message = rawurldecode(getstr($_POST['message'], 1000, 1, 1, 1, 2));
        preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);
        if ($add_type && count($matches)>1) {
            echo 'relay_too_much';
            exit();
        } else if ($add_type && count($matches) == 1) {
            $isrelay = 1;
        }

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
            if ($isrelay) {
                $q = $_SGLOBAL['db']->query("select * from ".tname('powerlevel')." where dept_uid = $UserId");
                if ($r = $_SGLOBAL['db']->fetch_array($q)) {
                    $relay_depid = $UserId;
                }
            }
        }	
        //Ìæ»»±íÇé
        $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
        $message = preg_replace("/\<br.*?\>/is", ' ', $message);
        if (strlen($message) < 1) {
            // showmessage('should_write_that', $_SGLOBAL['refer'], 3);
            echo "say_something";
            exit();
        }
        
        if (!$add_type) {
            $_SGLOBAL['db']->query("UPDATE ".tname('complain')." SET dateline=$_SGLOBAL[timestamp] WHERE doid='$doid' AND uid=$_SGLOBAL[supe_uid] AND dateline=0");
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
                'grade' => $updo['grade']+1
            );
            if($updo['grade'] >= 3) {
                $setarr['upid'] = $updo['upid'];
            }
            $newid = inserttable('docomment', $setarr, 1);
            $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");
            echo "do_success";
            exit();
        }

        $atuids = array();
        $query = $_SGLOBAL['db']->query("select atuid from ".tname("complain")." where doid=$doid and status=0");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $atuids[] = $value['atuid'];
        }
        $legalEntity = 0;
        if ($_SGLOBAL['isdept'] == 1 && in_array("$_SGLOBAL[supe_uid]", $atuids)) {
            $legalEntity = $_SGLOBAL['supe_uid'];
        } else {
            $q = $_SGLOBAL['db']->query("select * from ".tname("powerlevel")." where dept_uid in (".implode(',',$atuids).")");
            while ($r = $_SGLOBAL['db']->fetch_array($q)) {
                if (in_array("$_SGLOBAL[supe_uid]", explode(',',$r['up_uid']))) {
                    $legalEntity = $r['dept_uid'];
                    break;
                }
            }
        }

        if (!$legalEntity || ($isrelay && !$relay_depid)) {
            echo 'error_op';
            exit();
        }

        $legalEntityName = getUsername($legalEntity,$_SGLOBAL['db']);
        $optype = 2;
        if ($isrelay) {
            $optype = 3;
            $add_type = 0;
        }

        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid=$doid and atuid=$legalEntity and status=0");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            echo 'error_op';
            exit();
        }
        if ($complain['relay_times'] >= 3 && $optype == 3) {
            echo 'relay_not_allowed';
            exit();
        }
        $cpid = $complain['id'];
        $oparr = array();
        $oparr['doid'] = $doid;
        $oparr['message'] = $message;
        $oparr['uid'] = $legalEntity;
        $oparr['username'] = $legalEntityName;
        $oparr['optype'] = $optype;
        $oparr['dateline'] = $_SGLOBAL['timestamp'];
        $oparr['opvalue'] = $relay_depid;
        $oparr['finish'] = $add_type == 2 ? 1 : 0;

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
            'complainBorn' => 1,
            'complainopid' => $opid
        );
        if($updo['grade'] >= 3) {
            $setarr['upid'] = $updo['upid'];
        }
        $newid = inserttable('docomment', $setarr, 1);
        $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");

        if ($optype == 3) {
            $query = $_SGLOBAL['db']->query("select * from ".tname("space")." where uid = $relay_depid");
            $relay_dep = $_SGLOBAL['db']->fetch_array($query);
            if (empty($relay_dep)) {
                echo 'error_op';
                exit();
            }

            updatetable('complain', array("status"=>3, 'lastopid'=>$opid), array('id'=>$cpid));

            $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid=$doid and atuid=$relay_depid and status != 3");
            $already = $_SGLOBAL['db']->fetch_array($query);
            if (!$already) {
                if ($complain['relayed_by']) {
                    $relayed_by = $complain['relayed_by'].$legalEntity.',';
                } else {
                    $relayed_by = ','.$legalEntity.',';
                }
                
                $newComplain = $complain;
                unset($newComplain['id']);
                $newComplain['atdeptuid'] = $relay_depid;
                $newComplain['atuid'] = $relay_depid;
                $newComplain['atuname'] = $relay_dep['name'];
                $newComplain['atdepartment'] = $relay_dep['name'];
                $newComplain['atdeptuid'] = $relay_depid;
                $newComplain['dateline'] = $_SGLOBAL['timestamp'];
                $newComplain['times'] = 1;
                $newComplain['issendmsg'] = 0;
                $newComplain['relay_times'] = $complain['relay_times']+1;
                $newComplain['relayed_by'] = $relayed_by;
                $newComplainId = inserttable('complain', $newComplain, 1);

                $note = cplang('complain_relay', array($complain['atuname'], "space.php?do=complain_item&doid=$complain[doid]"));
                notification_complain_add($relay_depid, 'complain', $note);
            }
        } elseif ($optype == 2) {
            if ($add_type == 2) {
                updatetable('complain', array('status'=>1, 'lastopid'=>$opid, 'replytime'=>$_SGLOBAL['timestamp'], 'dateline'=>$_SGLOBAL['timestamp']), array('id'=>$cpid));
            } else {
                updatetable('complain', array('replytime'=>$_SGLOBAL['timestamp'], 'dateline'=>0), array('id'=>$cpid));
            }
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
            inserttable('complain_resp',array('uid'=>$legalEntity,'doid'=>$doid,'opid'=>$opid,'replysecs'=>$_SGLOBAL['timestamp'] - $complain['dateline']));

            $note = cplang('note_doingcomplain_reply', array("space.php?do=complain_item&doid=$complain[doid]"));
            notification_complain_add($complain['uid'], 'complain', $note, $legalEntity, $legalEntityName);

        }
        echo "do_success";
        exit();
    }
    echo "error_op";
    exit();
}
include template("cp_complain");
?>
