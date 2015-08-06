<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
	include_once('verify.php');

    $uids = $_POST['uids'];
    $uids = explode(',', $uids);
    $result = array();
    $content = array();
    foreach ($uids as $uid) {
        $uid = intval($uid);
        $query = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$uid' LIMIT 1");
        if ($rs = $_SGLOBAL['db']->fetch_array($query)) {
            $datum = array();
            if(empty($rs['name'])) $rs['name'] = $rs['username'];
            $name = $rs['name'];

            if ($rs['avatar']) {
                $face = avatar($uid,'big',TRUE);
            } else {
                $query = $_SGLOBAL['db']->query("SELECT sex FROM ".tname('spacefield')." WHERE uid='$uid' LIMIT 1");
                if($gd = $_SGLOBAL['db']->result($query))
                {
                    if($gd==1) $gender = 'm'; else $gender='f';
                }
                else
                {
                    $gender = "m";
                }
                $face = UC_API.'/images/avatar/'.$gender.'_big_1.png';
            }

            $datum['name'] = $name;
            $datum['face'] = $face;
            $datum['id'] = $uid;
            array_push($content, $datum);
        }
    }

	$result['status'] = 0;
    if (count($content)) {
        $result['status'] = 1;
        $result['content'] = $content;
    }
	echo json_encode($result);
	exit();
?>
