<?php
	include_once('../../common.php');
 	include_once(S_ROOT.'./source/function_space.php');
 	$space = getspace($_SGLOBAL['supe_uid']);

	$query = $_SGLOBAL['db']->query("select friend from ".tname('spacefield')." where uid='$_SGLOBAL[supe_uid]'");
	$rs0 = $_SGLOBAL['db']->fetch_array($query);
	$rs1 = explode(",",$rs0['friend']);
	$length = count($rs1);

	$query = $_SGLOBAL['db']->query("select uid from ".tname('session'));
	$onlineID = array();
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$onlineID[] = $value['uid'];
	}

	$query = $_SGLOBAL['db']->query("select fuid,gid from ".tname('friend')." where uid='$_SGLOBAL[supe_uid]'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$fuid2gid[$value['fuid']] = $value['gid'];
	}

	$gid2gname = getfriendgroup();
	$group = array();
	for($i=0; $i<$length; $i++) {
		$uid = $rs1[$i];
		$query = $_SGLOBAL['db']->query("select avatar,name,username from ".tname('space')." where uid='$uid'");
		if ($rs2 = $_SGLOBAL['db']->fetch_array($query)) {
			if(empty($rs2['name'])) $rs2['name'] = $rs2['username'];
			if ($rs2['avatar']) {
				$face = avatar($uid,'small',TRUE);
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
				$face = UC_API.'/images/avatar/'.$gender.'_small_1.png';
			}
			
			$friend = array('id'=>$uid,'namequery'=>$rs2['name'].' '.Pinyin($rs2['name'],1).' '.$uid,'name'=>$rs2['name'],'face'=>$face);
			
			$all[] = $friend;
			if (in_array($uid, $onlineID)) {
				$online[] = $friend;
			}

			$group[$gid2gname[$fuid2gid[$uid]]][] = $friend;
		}
	}

	if ($all) {
		$result['status']=1;
		$result['msg']='ok';
		if ($online) {
			$result['data'][]=array('name' => '在线好友', 'nums' => count($online), 'id' => 1, 'item' => $online);
		}
		$result['data'][]=array('name' => '全部好友', 'nums' => count($all), 'id' => 2, 'item' => $all);
		ksort($group);
		foreach ($group as $key => $value) {
			$result['data'][]=array('name' => $key, 'nums' => count($value), 'id' => 2, 'item' => $value);
		}
	} else {
		$result['status']=0;
		$result['msg']='呜哇~~小伙伴们都不见鸟~~';
	}
	
	$friends = json_encode($result);
	echo $friends;
	exit();
?>