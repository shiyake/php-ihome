<?php

/*
  admincp_wallcontentmanage.php 用于审核、管理足迹墙的内容。
  add by xuxing@ihome, 2012-8-20 15:56:00
	  Last Modify By Ancon
	  Last Time : 2012年10月22日10:58:17
*/

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

/*if(!checkperm('managewallmanage')) {
	cpmessage('no_authority_management_operation');
}*/

include_once(S_ROOT.'./uc_client/client.php');
include_once(S_ROOT.'./data/data_usergroup.php');
@include_once(S_ROOT.'./data/data_profilefield.php');

$Query = $_SGLOBAL['db']->query("select * from ".tname("wall")." where uid=".$_SGLOBAL['supe_uid']." and pass='1' and ".time()." between starttime-1800 and endtime+1800 order by starttime asc limit 1");
if($Value = $_SGLOBAL['db']->fetch_array($Query)){
	$WallTitle = $Value[wallname]; 
	$WallId = $Value[id];
}else{
	cpmessage('no_authority_management_operation');
}

$op = $_GET['op']?trim($_GET['op']):'';
$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
	$WallRecId = intval($_GET['id']);
$WallRecList = array();

if (submitcheck('listsubmit')) {  //批量删除操作
	if(empty($_POST['rdoption'])){
		cpmessage('未选择任务操作');
	}
	
	if(! $_POST['ids']){
		cpmessage("请至少正确选择一个要批量操作的记录", "admincp.php?ac=wallcontentmanage", 1); 
	}
	
	$ids = implode(",", $_POST['ids']);
	
	/*1为批量审核，2为批量删除*/
	if(intval($_POST['rdoption']) == 1){
		$_SGLOBAL['db']->query ("update ".tname("wallfield")." set pass=1,checktime=".$_SGLOBAL['timestamp']." WHERE id in ($ids)");
		//updatetable('wallfield', array('pass'=>1,'checktime'=>$_SGLOBAL['timestamp']), array('id'=>$WallRecId));
		foreach($_POST['ids'] as $id){
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wallfield')." where id=".$id);
			$value = $_SGLOBAL['db']->fetch_array($query);
			
			$message = "<a href=\"plugin.php?pluginid=wall&ac=track&wallid=".$WallId."\">#".$WallTitle."#</a> ".$value['message'];
			
			if($value['feedid'] == 0){
				$feedarr = array(
					'appid' => UC_APPID,
					'icon' => 'doing',
					'uid' => $value['uid'],
					'username' => $value['username'],
					'dateline' => $value['timeline'],
					'title_template' => cplang('feed_doing_title'),
					'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
					'body_template' => '',
					'body_data' => '',
					'id' => $value['id'],
					'idtype' => 'wallid'
				);
				$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);
				$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);
				$FeedId = inserttable('feed', $feedarr,1);
				
				if($FeedId)
				{
					updatetable('wallfield', array('feedid'=>$FeedId), array('id'=>$id));
				}
			}
		}
	}elseif(intval($_POST['rdoption'])=='2'){
		foreach($_POST['ids'] as $id){
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wallfield')." where id=".$id);
			$value = $_SGLOBAL['db']->fetch_array($query);
			if($value['feedid']>0){
				$_SGLOBAL['db']->query("DELETE FROM " . tname("feed") . " WHERE feedid = ".$value['feedid']);
			}
		}
		
		$_SGLOBAL['db']->query("DELETE FROM " . tname("wallfield") . " WHERE id in ($ids)");
	}
	cpmessage("do_success", "admincp.php?ac=wallcontentmanage", 1);
}

if(empty($op)){
	$perpage = 30;
	$perpage = mob_perpage($perpage);
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) $page=1;
	$start = ($page-1)*$perpage;
	ckstart($start, $perpage);
	$WhereSql = "wallid=".$WallId;
	if(empty($count)) {
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('wallfield')." WHERE ".$WhereSql), 0);
	}
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wallfield')." where ".$WhereSql." ORDER BY timeline DESC limit ".$start.",".$perpage);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid']);
			$WallRecList[] = $value;
		}
	}
	$theurl = "admincp.php?ac=wallcontentmanage";
	$multi = multi($count, $perpage, $page, $theurl);

}elseif($op == 'verify'){
	$WallRecId = intval($_GET['id']);
	$WallRecFlag = intval($_GET['flag']);
	if($WallRecId>0){
		$WallRecFlag = $WallRecFlag?0:1;
		if($WallRecFlag){
			updatetable('wallfield', array('pass'=>$WallRecFlag,'display'=>0,'checktime'=>$_SGLOBAL['timestamp']), array('id'=>$WallRecId));// 更新审批状态
		}else{
			updatetable('wallfield', array('pass'=>$WallRecFlag,'display'=>0,'checktime'=>0), array('id'=>$WallRecId));// 更新审批状态
		}
	}

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wallfield')." where id=".$WallRecId);
	$value = $_SGLOBAL['db']->fetch_array($query);
	$message = "<a href=\"plugin.php?pluginid=wall&ac=track&wallid=".$WallId."\">#".$WallTitle."#</a> ".$value['message'];
	if($WallRecFlag && $value['feedid'] == 0){
		$feedarr = array(
			'appid' => UC_APPID,
			'icon' => 'doing',
			'uid' => $value['uid'],
			'username' => $value['username'],
			'dateline' => $value['timeline'],
			'title_template' => cplang('feed_doing_title'),
			'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
			'body_template' => '',
			'body_data' => '',
			'id' => $value['id'],
			'idtype' => 'wallid'
			
		);
		$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);
		$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);
		$FeedId = inserttable('feed', $feedarr,1);		
		if($FeedId)
		{
			updatetable('wallfield', array('feedid'=>$FeedId), array('id'=>$WallRecId));
		}
	}elseif($WallRecFlag == 0 && $value['feedid']){
		$_SGLOBAL['db']->query("DELETE FROM " . tname("feed") . " WHERE feedid =".$value['feedid']);
		updatetable('wallfield', array('feedid'=>0), array('id'=>$WallRecId));
	}	
	cpmessage("do_success", "admincp.php?ac=wallcontentmanage", 1);

}elseif($op == 'delete'){
	$WallRecId = intval($_GET['id']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wallfield')." where id=".$WallRecId);
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value['feedid']>0){
		$_SGLOBAL['db']->query("DELETE FROM " . tname("feed") . " WHERE feedid =".$value['feedid']);
	}
	if($WallRecId>0){
		$_SGLOBAL['db']->query("DELETE FROM " . tname("wallfield") . " WHERE id = '$WallRecId'");
	}
	cpmessage("do_success", "admincp.php?ac=wallcontentmanage", 1);
}

realname_get();
include template('admin/tpl/wallcontentmanage');

?>