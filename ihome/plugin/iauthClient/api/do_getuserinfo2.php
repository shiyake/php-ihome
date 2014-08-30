<?php
/*
     getuser.php用于活动用户的信息
	 Add by am@ihome.20130522  11:00 

*/
    include_once('../iauth_verify_forward.php');
    include_once('../../../common.php');
    include_once(S_ROOT.'./uc_client/client.php');	
	include_once(S_ROOT.'./source/function_space.php');
	//$uid = 107;
	$uid = intval(iauth_verify());
	$result = array();
	
		/*获取活跃用户姓名*/
		$wheresql = "uid = '$uid'";
		$query1 = $_SGLOBAL['db']->query("SELECT realname FROM ".tname('baseprofile')." where ".$wheresql);
		$realname = $_SGLOBAL['db']->fetch_array($query1);
		//print_r($value1['max(userid)']);
		
		/*获取用户多个collegeid*/
		$n=0
		$query1 = $_SGLOBAL['db']->query("SELECT collegeid FROM ".tname('baseprofile')." where ".$wheresql);
		while($value1 = $_SGLOBAL['db']->fetch_array($query1)){
			$collegeid[]=$value1['collegeid'];
			$n++;
		};
		
		/*生成数组result*/
		$result[] = array('uid'=>$uid,'realname'=>$realname,'collegeid'=>$collegeid,'n'=$n);
	}

	$result = json_encode($result);
    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);

	echo $result;
	exit();
?>
