<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
if ($_GET['op'] == 'delete') {
    if (submitcheck('deletesubmit')) {
        include_once(S_ROOT.'./source/function_delete.php');
        deletedoings(array($doid));
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'add') {
    if (submitcheck('addsubmit')) {
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
        $optype = empty($_POST['optype'])?2:intval($_POST['optype']);
        $doid = intval($_POST['doid']);
        $oparr = array();
        $oparr['doid'] = $doid;
        $oparr['message'] = $message;
        $oparr['uid'] = $_SGLOBAL['supe_uid'];
        $oparr['username'] = $_SGLOBAL['supe_username'];
        $oparr['optype'] = $optype;
        $oparr['dateline'] = $_SGLOBAL['timestamp'];
        if ($optype == 3) {
            updatetable('complain', array('curuid'=>$_POST['relay_depid']), array('doid'=>$doid));
        }
        inserttable('complain_op', $oparr);
        showmessage('do_success', $_POST['refer'], 0);
    }
}
include template("cp_complain");
?>
