<?php

if(!defined('iBUAA')) {
    exit('Access Denied');
}


$rootid = empty($_GET['rootid'])?0:$_GET['rootid'];
$id = empty($_GET['id'])?0:intval($_GET['id']);
if ($_GET['op'] == 'add') {
if (submitcheck('commentsubmit')) {
        $upid = empty($_POST['upid'])?0:intval($_POST['upid']);
        $message=$_POST['message'];
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
                $ValidValue = getAtName($TmpString, $TmpName, $realname);
                $ValidValue = trim($ValidValue);
                $at_friend= "space.php?uid=".$UserId;
                if($ValidValue != false){
                    $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
                    $UserIds[] = $UserId;
                }
            }
        }
        $message = preg_replace("/\[am:(\d+):]/is", "<img src=\"image/face_new/face_1/\\1.gif\" class=\"face\">", $message);
        $message = preg_replace("/\<br.*?\>/is", ' ', $message);
        
        $message = preg_replace("/\[bm:(\d+):]/is", "<img src=\"image/face_new/face_2/\\1.gif\" class=\"face\">", $message);
        $message = preg_replace("/\<br.*?\>/is", ' ', $message);  
        if(strlen($message) < 1) {
            showmessage('should_write_that');
        }
        $commentarr = array();
        $commentarr['rootid'] = $rootid;
        $commentarr['uid'] = $_SGLOBAL['supe_uid'];
        $commentarr['username'] = $_SGLOBAL['supe_username'];
        $commentarr['message'] = $message;
        $commentarr['dateline'] = $_SGLOBAL['timestamp'];
        inserttable('treecomments', $commentarr);
        showmessage('do_success');

    }
} elseif ($_GET['op'] == 'getcomment') {
    include_once(S_ROOT.'./source/class_tree.php');
    $tree = new tree();
    $query = $_SGLOBAL['db']->query("select * from ".tname('treecomments')." use index(rootid) where rootid = '$rootid' order by dateline");
    $list = array();
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        realname_set($value['uid'], $value['username']);
        if (empty($value['upid'])) {
            $value['upid'] = $value['rootid'];
        }
        $tree->setNode($value['id'], $value['upid'], $value);
    }
    $values = $tree->getChilds($rootid);
    foreach ($values as $id) {
        $one = $tree->getValue($id);
        $one['layer'] = $tree->getLayer($id) * 2 -2;
        $one['style'] = "padding-left:${one['layer']}em;";
        $list[] = $one;
    }
}
realname_get();

include template("cp_treecomment");

?>

