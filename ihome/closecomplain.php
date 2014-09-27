<?php
include_once('./common.php');

$nowtime = time() - 3 * 24 * 3600;

$complains = $_SGLOBAL['db']->query("select * from ".tname("complain")." use index(dateline) where status=1 and dateline < $nowtime");
$num = 0;
while ($result = $_SGLOBAL['db']->fetch_array($complains)) {
    updatetable("complain", array("status"=>2), array("id"=>$result['id']));
    $oparr = array();
    $oparr['doid'] = $result['doid'];
    $oparr['uid'] = 0;
    $oparr['username'] = 'system';
    $oparr['message'] = '';
    $oparr['optype'] = 6;
    $oparr['dateline'] = $_SGLOBAL['timestamp'];
    inserttable("complain_op", $oparr);
    $num += 1;
}
echo "一共处理了{$num}个诉求";
?>
