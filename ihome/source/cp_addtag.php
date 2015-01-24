<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}

if ($_GET['op'] == 'menu'){
	$dotype = empty($_GET['dt'])?'':$_GET['dt'];
	$doid = empty($_GET['did'])?0:intval($_GET['did']);
	$tuid = empty($_GET['uid'])?0:intval($_GET['uid']);
	$whereid = $doid?" AND doid = '$doid'":"";
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('ntag_user')." tu LEFT JOIN ".tname('ntags')." t ON tu.tagid = t.tagid WHERE uid IN ('$tuid') AND dotype = '$dotype'" .$whereid);
	$tags = array();
	$count = 0;
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$tags[] = $value['tagid'];
		$count++;
	}
	$tagstr = implode(',',$tags);
	$wherein = "";
	$wherein2 = "";
	if ($tagstr) {
		$wherein = " AND tu.tagid NOT IN (".$tagstr.")";
		$wherein2 = " WHERE tagid NOT IN (".$tagstr.")";
	}
	
	$query_my = $_SGLOBAL['db']->query("SELECT distinct tagname FROM ".tname('ntag_user')." tu LEFT JOIN ".tname('ntags')." t ON tu.tagid = t.tagid WHERE uid='$tuid' ".$wherein." ORDER BY tuid DESC LIMIT 4");
	$tag_my = '<ul>';
	while ($value_my = $_SGLOBAL['db']->fetch_array($query_my)) {
		$tag_my .= '<li><span onclick="usetag(\''.$value_my['tagname'].'\')">'.$value_my['tagname'].'</span></li>';
	}
	$tag_my .= '</ul>';
	
	$query_hot = $_SGLOBAL['db']->query("SELECT tagname FROM ".tname('ntags')." ".$wherein2." ORDER BY count DESC LIMIT 4");
	$tag_hot = '<ul>';
	while ($value_hot = $_SGLOBAL['db']->fetch_array($query_hot)) {
		$tag_hot .= '<li><span onclick="usetag(\''.$value_hot['tagname'].'\')">'.$value_hot['tagname'].'</span></li>';
	}
	$tag_hot .= '</ul>';
	/**/
	include template('cp_addtag');
	
}elseif($_GET['op'] == 'save'){
	
	$dotype = $_POST['dotype'];
	$doid = empty($_POST['doid'])?0:intval($_POST['doid']);
	$uid = $_SGLOBAL['supe_uid'];
	if ($_POST['tagnames'] != ''){
	 $tagnames = explode(' ',$_POST['tagnames'].' '.$_POST['ntag']);
	 if (sizeof($tagnames)>0){
	 foreach ($tagnames as $tagname){
		if ($tagname != ''){
		 $query = $_SGLOBAL['db']->query("SELECT tagid FROM ".tname('ntags')." WHERE tagname = '".$tagname."'");
			if ($value = $_SGLOBAL['db']-> fetch_array($query))	{			
				$ntagid = $value['tagid'];
				$whereid = $doid?" AND doid = '$doid'":"";				
				$query_tu = $_SGLOBAL['db']->query("SELECT tuid FROM ".tname('ntag_user')." WHERE tagid = '".$ntagid."' AND uid='$uid' AND dotype = '$dotype'" .$whereid);
				
				if ($value_tu = $_SGLOBAL['db']-> fetch_array($query_tu)){
					continue;	
				}else{
					$_SGLOBAL['db']->query("UPDATE ".tname('ntags')." SET count=count+1 WHERE tagid=".$ntagid);					
				}			
			}else{
				$setarr = array(
					'tagname' => $tagname,
					'count' => 1
					);
				$ntagid = inserttable('ntags', $setarr, 1);
			}			
			$setarr_tu = array(
					'tagid' => $ntagid,
					'dotype' => $dotype,
					'doid' => $doid,
					'uid' => $uid
					);
			inserttable('ntag_user', $setarr_tu);
		 }
		}
	 }
		showmessage('do_success', $_POST['refer']);
	}else{ 
		showmessage('没有输入标签', $_POST['refer']);
	}
}elseif($_GET['op'] == 'del'){
	$tuid = $_GET['tuid'];
	$uid = $_SGLOBAL['supe_uid'];
	echo $uid;
	if (checkperm('admin')){
		$_SGLOBAL['db']->query("DELETE FROM ".tname('ntag_user')." WHERE tuid='$tuid'");
		echo '-1';
	}else{
		echo '-2';
		$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('ntag_user')." WHERE tuid = '$tuid'");
		if ($value = $_SGLOBAL['db']-> fetch_array($query))	{	
		  $uids = explode($value['uid']);
			print_r($uids);
			if (in_array($uid, $uids)){
				$_SGLOBAL['db']->query("DELETE FROM ".tname('ntag_user')." WHERE tuid='$tuid'");
			}
		}
	}	
	showmessage('删除成功', $_SGLOBAL['refer']);
}
?>