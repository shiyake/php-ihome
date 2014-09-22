<?php
/********************************************
此文件用于对诉求信息进行管理。
2013-03-25
yangdali
*************************************************/

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('managepublic')) {
	cpmessage('no_authority_management_operation');
}
$superuid = $_SGLOBAL['supe_uid'];

$type = $_GET['type'] ? trim($_GET['type']) : 'baseinfo';
$page = $_GET['page'] ? trim($_GET['page']) : '1';
$op = $_GET['op'] ? trim($_GET['op']) : '';

//print_r($_GET);exit;

if($type == 'forleaders' && $superuid == 3){
	$tab = 3;
	if($_GET['ajax'] == 'true'){
		$uid = $_GET['uid'] ? trim($_GET['uid']) : '0';
		if($_GET['return'] == 'uname'){
			$UserQuery = $_SGLOBAL['db']->query("SELECT name,username FROM ".tname('space')." WHERE uid=$uid");
			if($UserArray = $_SGLOBAL['db']->fetch_array($UserQuery)) echo $UserArray['name'] ? $UserArray['name'] : $UserArray['username'];
			else  echo 0;
		}
		if($_GET['return'] == 'leader'){
			include S_ROOT.'./data/powerlevel/powerlevel.php';
			echo isDepartment($uid ,0) ? $_POWERINFO[$uid]['department'] : 0;
		}
		exit();
	}
	$submit = $_GET['submit'] ? trim($_GET['submit']) : '0';
	if($submit == '添加'){
		$uid = $_GET['uid'] ? trim($_GET['uid']) : '0';
		$foruid = $_GET['foruid'] ? trim($_GET['foruid']) : '0';
		$complain_uid = array(
			'uid' => $uid,
			'foruid' => $foruid,
		);
		inserttable('complain_uid', $complain_uid, 0);
		
		header("Location:admincp.php?ac=complain&type=forleaders");exit();
	}
	if($submit == '修改'){
		$id = trim($_GET['id']);
		$uid = $_GET['uid'] ? trim($_GET['uid']) : '0';
		$foruid = $_GET['foruid'] ? trim($_GET['foruid']) : '0';
		$complain_uid = array(
			'uid' => $uid,
			'foruid' => $foruid,
		);
		updatetable('complain_uid', $complain_uid, array('id'=>$id));
		
		header("Location:admincp.php?ac=complain&type=forleaders");exit();
	}
	
	
	if($op == 'edit'){
		$id = $_GET['id'] ? trim($_GET['id']) : '0';
		$uid = $_GET['uid'] ? trim($_GET['uid']) : '0';
		$foruid = $_GET['foruid'] ? trim($_GET['foruid']) : '0';
	}
	if($op == 'delete'){
		$id = $_GET['id'] ? trim($_GET['id']) : '0';
		$_SGLOBAL['db']->query("DELETE FROM ".tname('complain_uid')." WHERE id=$id");
	}

	$Complain = array();
	
	$mpurl = "admincp.php?ac=complain&type=forleaders";
	$perpage = 30;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('complain_uid')), 0);
	if($count) {
		include S_ROOT.'./data/powerlevel/powerlevel.php';
		$ComplainQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('complain_uid')." LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($ComplainQuery)) {	
			$value['leader'] = $_POWERINFO[$value['foruid']]['department'];
			realname_set($value['uid'], $value['uname']);
			$Complain[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		realname_get();
	}
	

	
	
	
}elseif($type == 'setting' && $superuid == 3){
	$tab = 2;
	$aeskeyMobile = getAESKey('Mobile');
	if($_GET['ajax'] == 'true'){
		$uid = $_GET['uid'] ? trim($_GET['uid']) : '0';
		if($_GET['return'] == 'uname'){
			$UserQuery = $_SGLOBAL['db']->query("SELECT name,username FROM ".tname('space')." WHERE uid=$uid");
			if($UserArray = $_SGLOBAL['db']->fetch_array($UserQuery)) echo $UserArray['name'] ? $UserArray['name'] : $UserArray['username'];
			else  echo 0;
		}
		if($_GET['return'] == 'mobile'){
			$UserQuery = $_SGLOBAL['db']->query("SELECT mobile FROM ".tname('spacefield')." WHERE uid=$uid");
			if($UserArray = $_SGLOBAL['db']->fetch_array($UserQuery)) echo $UserArray['mobile'];
			else  echo 0;
		}
		if($_GET['return'] == 'official'){
			$dept = $_GET['dept'] ? trim($_GET['dept']) : '0';
			$official = '';
			$officials = getOfficial($uid ,$official).$dept;
			echo $officials;
		}
		if($_GET['return'] == 'deptexist'){
			if(isDepartment($uid ,0))
				echo '1';
			else
				echo '0';
		}
		exit();
	}
	$submit = $_GET['submit'] ? trim($_GET['submit']) : '0';
	if($submit == '添加'){
		$dept_uid = $_GET['dept_uid'] ? trim($_GET['dept_uid']) : '';
		$department = $_GET['department'] ? trim($_GET['department']) : '';
		$up_uid = $_GET['up_uid'] ? trim($_GET['up_uid']) : '';
		$official = $_GET['official'] ? trim($_GET['official']) : '';
		$isdept = $_GET['isdept'] ? trim($_GET['isdept']) : '0';
		$mobile = $_GET['mobile'] ? trim($_GET['mobile']) : '0';
		//加密手机号
		$aeskeyMobile = getAESKey('Mobile');
		$mobile = M_encode($mobile,$aeskeyMobile);
		$powerlevel = array(
			'dept_uid' => $dept_uid,
			'department' => $department,
			'up_uid' => $up_uid,
			'official' => $official,
			'isdept' => $isdept,
			'mobile' => $mobile
		);
		inserttable('powerlevel', $powerlevel, 0);
		
		//更新缓存中的powerlevel.php文件
		updatePowerlevelFile();
		
		header("Location:admincp.php?ac=complain&type=setting");exit();
	}
	if($submit == '修改'){
		$pid = trim($_GET['pid']);
		$dept_uid = $_GET['dept_uid'] ? trim($_GET['dept_uid']) : '';
		$department = $_GET['department'] ? trim($_GET['department']) : '';
		$up_uid = $_GET['up_uid'] ? trim($_GET['up_uid']) : '';
		$official = $_GET['official'] ? trim($_GET['official']) : '';
		$isdept = $_GET['isdept'] ? trim($_GET['isdept']) : '0';
		$mobile = $_GET['mobile'] ? trim($_GET['mobile']) : '0';
		//加密手机号
		$mobile = M_encode($mobile,$aeskeyMobile);
		$powerlevel = array(
			'dept_uid' => $dept_uid,
			'department' => $department,
			'up_uid' => $up_uid,
			'official' => $official,
			'isdept' => $isdept,
			'mobile' => $mobile
		);
		updatetable('powerlevel', $powerlevel, array('pid'=>$pid));
		
		//更新缓存中的powerlevel.php文件
		updatePowerlevelFile();
		
		header("Location:admincp.php?ac=complain&type=setting");exit();
	}
	
	
	if($op == 'edit'){
		$pid = $_GET['pid'] ? trim($_GET['pid']) : '0';
		$dept_uid = $_GET['dept_uid'] ? trim($_GET['dept_uid']) : '';
		$department = $_GET['department'] ? trim($_GET['department']) : '';
		$up_uid = $_GET['up_uid'] ? trim($_GET['up_uid']) : '';
		$official = $_GET['official'] ? trim($_GET['official']) : '';
		$isdept = $_GET['isdept'] ? trim($_GET['isdept']) : '0';
		$mobile = $_GET['mobile'] ? trim($_GET['mobile']) : '0';
	}
	if($op == 'delete'){
		$pid = $_GET['pid'] ? trim($_GET['pid']) : '0';
		$_SGLOBAL['db']->query("DELETE FROM ".tname('powerlevel')." WHERE pid=$pid");
		
		//更新缓存中的powerlevel.php文件
		updatePowerlevelFile();
	}
	if($op == 'updateofficials'){
		$AllQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('powerlevel'));
		while ($AllArray = $_SGLOBAL['db']->fetch_array($AllQuery)) {
			$powerlevel['official'] = '';
			$officials = '';
			$powerlevel['official'] = getOfficial($AllArray['up_uid'] ,$officials).$AllArray['dept_uid'];
			updatetable('powerlevel', $powerlevel, array('pid'=>$AllArray['pid']));
		}
		//更新缓存中的powerlevel.php文件
		updatePowerlevelFile();
	}
	$Powerlevel = array();//存放powerlevel记录
	
	$mpurl = "admincp.php?uid=$uid&uname=$uname&message=$message&atuname=$atuname&ac=complain&type=setting";
	$perpage = 30;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('powerlevel')), 0);
	if($count) {
		$PowerlevelQuery = $_SGLOBAL['db']->query("SELECT * FROM ".tname('powerlevel')." LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($PowerlevelQuery)) {	
			$value['mobile'] = M_decode($value['mobile'],$aeskeyMobile);
			$Powerlevel[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
	

	
	
	
}elseif($type == 'complains'){
	$tab = 1;
	$Complains = array();//存放complain记录
	
	
	$perpage = 20;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	
	$wheresql = '1';
	$isSearch = FALSE;
	if($uid = $_GET['uid'] ? trim($_GET['uid']) : ''){
		$wheresql .= " AND temp.uid=$uid";
	}
	if($uname = $_GET['uname'] ? trim($_GET['uname']) : ''){
		$wheresql .= " AND temp.uname like '%$uname%'";
	}	
	if($message = $_GET['message'] ? trim($_GET['message']) : ''){
		$wheresql .= " AND temp.atdepartment like '%$message%'";
	}
	if($atuname = $_GET['atuname'] ? trim($_GET['atuname']) : ''){
		$wheresql .= " AND temp.atuname like '%$atuname%'";
	}
	if($isreply = $_GET['isreply'] ? trim($_GET['isreply']) : ''){
		if($isreply == 1){
			$isreply = 1;
			$wheresql .= " AND temp.isreply=$isreply";
		}elseif($isreply == 2){
			$isreply = 0;
			$wheresql .= " AND temp.isreply=$isreply";
		}
	}
	$where = " WHERE ".$wheresql;
	
	$mpurl = "admincp.php?uid=$uid&uname=$uname&message=$message&atuname=$atuname&ac=complain&type=complains";
	//echo $where;exit();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(DISTINCT doid,atdeptuid) FROM ".tname('complain')." temp".$where), 0);
	if($count) {
		include S_ROOT.'./data/powerlevel/powerlevel.php';
		$query = $_SGLOBAL['db']->query("SELECT * FROM (SELECT * FROM ".tname('complain')." USE INDEX(id) ORDER BY id DESC) temp".$where." GROUP BY doid,atdeptuid ORDER BY doid DESC LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['addtime'] = date("Y-m-d H:i",$value['addtime']);
			realname_set($value['uid'], $value['uname']);
			$value['atuname'] = $_POWERINFO[$value['atuid']]['department'];
			if (!$value['isreply']) {
				$exist = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('doing')." WHERE doid=".$value['doid']));
				if (!$exist) {
					continue;
				}
			}
			$Complains[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		realname_get();
	}

}else{
	$tab = 0;
	$complains = array();
	$totalNum = 0;
	$isreplyNum = 0;
	
	$firstday = date("Y-m-01" ,time());
	$nowday = date("Y-m-d");
	$startDay = $_GET['starttime'] ? trim($_GET['starttime']) : $firstday;
	$endDay = $_GET['endtime'] ? trim($_GET['endtime']) : $nowday;
	
	$startTime = strtotime($startDay);
	$endTime = strtotime($endDay);
	$endTime = strtotime("+1 days",$endTime);
	
	$times = $_GET['times'] ? trim($_GET['times']) : 0;

	$sql_where = "WHERE addtime<".$endTime." AND addtime>".$startTime;
	
	if($times != 0)
		$sql_where .= " AND expire=0 AND times=".$times;
	$query = $_SGLOBAL['db']->query("SELECT * FROM (SELECT * FROM ".tname('complain')." USE INDEX(id) ORDER BY id DESC) temp ".$sql_where." GROUP BY doid,atdeptuid ORDER BY doid DESC");
	
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(isset($complains[$value['atdeptuid']])){
			$complains[$value['atdeptuid']]['total']++;
			if($value['isreply']){
				$complains[$value['atdeptuid']]['isreply']++;
				$isreplyNum++;
			}
		}else{
			$complains[$value['atdeptuid']]['department'] = $value['atdepartment'];
			$complains[$value['atdeptuid']]['atdeptuid'] = $value['atdeptuid'];
			$complains[$value['atdeptuid']]['total'] = 1;
			$complains[$value['atdeptuid']]['isreply'] = 0;
			if($value['isreply']){
				$complains[$value['atdeptuid']]['isreply']++;
				$isreplyNum++;
			}
		}
		$totalNum++;
	}
	$complains = array_sort($complains ,'total');
	//print_r($complains);exit;
	
}
//激活
$actives = array($tab => ' class="active"');
if(!isset($tab)) {
	$actives = array('all' => ' class="active"');
} else {
	$mpurl .= '&tab='.$tab;
}
include_once template("admin/tpl/complain");







//逐级获取官方代表UID
function getOfficial($uid ,$officials = ''){
	//STATIC $officials = '';
	$UserInfo = isDepartment($uid ,0);
	$officials .= $UserInfo['dept_uid'].',';
	if($UserInfo['dept_uid'] == $UserInfo['up_uid']){
		return $officials;
	}
	$officials = getOfficial($UserInfo['up_uid'] ,$officials);
	return $officials;
}



?>
