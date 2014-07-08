<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//È¨ÏÞ
if(!$allowmanage = checkperm('managefeed')) {
	$_GET['uid'] = $_SGLOBAL['supe_uid'];//Ö»ÄÜ²Ù×÷±¾ÈËµÄ
	$_GET['username'] = '';
}


if(submitcheck('feedsubmit')) {
	
	if(!$allowmanage) {
		cpmessage('no_authority_management_operation');
	}
	
	$feedid = intval($_POST['feedid']);
	
	if(empty($_POST['feeduid']) || empty($feedid)) {
		$setarr = array(
			'title_template' => trim($_POST['title_template']),
			'body_template' => trim($_POST['body_template'])
		);
		if(empty($setarr['title_template']) && empty($setarr['body_template'])) {
			cpmessage('sitefeed_error');
		}
	} else {
		$setarr = array();
	}
	
	//Ê±¼äÎÊÌâ
	$_POST['dateline'] = trim($_POST['dateline']);
	if($_POST['dateline']) {
		$newtimestamp = sstrtotime($_POST['dateline']);
		if($newtimestamp > $_SGLOBAL['timestamp']) {
			$_SGLOBAL['timestamp'] = $newtimestamp;
		}
	}
	
	if(empty($feedid)) {
		$_SGLOBAL['supe_uid'] = 0;
		
		include_once(S_ROOT.'./source/function_cp.php');
		$feedid = feed_add('sitefeed',
			trim($_POST['title_template']),array(),
			trim($_POST['body_template']),array(),
			trim($_POST['body_general']),
			array(trim($_POST['image_1']),trim($_POST['image_2']),trim($_POST['image_3']),trim($_POST['image_4'])),
			array(trim($_POST['image_1_link']),trim($_POST['image_2_link']),trim($_POST['image_3_link']),trim($_POST['image_4_link'])),
			'','','',1
		);
		
	} else {
		if(empty($_POST['feeduid'])) {
			$setarr['body_general'] = trim($_POST['body_general']);
		}
		$setarr['image_1'] = trim($_POST['image_1']);
		$setarr['image_1_link'] = trim($_POST['image_1_link']);
		$setarr['image_2'] = trim($_POST['image_2']);
		$setarr['image_2_link'] = trim($_POST['image_2_link']);
		$setarr['image_3'] = trim($_POST['image_3']);
		$setarr['image_3_link'] = trim($_POST['image_3_link']);
		$setarr['image_4'] = trim($_POST['image_4']);
		$setarr['image_4_link'] = trim($_POST['image_4_link']);
		
		$setarr['dateline'] = $newtimestamp;
		$setarr['hot'] = intval($_POST['hot']);
		
		updatetable('feed', $setarr, array('feedid'=>$feedid));
		
		if($setarr['hot'] && $_POST['id'] && $_POST['idtype']) {
			include_once(S_ROOT.'./source/function_cp.php');
			if($tablename = gettablebyidtype($_POST['idtype'])) {
				updatetable($tablename, array('hot'=>$setarr['hot']), array($_POST['idtype']=>$_POST['id']));
			}
		}
	}
	cpmessage('do_success', 'admincp.php?ac=feed&feedid='.$feedid);
	
} elseif (submitcheck('deletesubmit')) {
	
	include_once(S_ROOT.'./source/function_delete.php');
	if(!empty($_POST['ids']) && deletefeeds($_POST['ids'])) {
		cpmessage('do_success', $_POST['mpurl']);
	} else {
		cpmessage('choose_to_delete_events', $_POST['mpurl']);
	}
}

if($_GET['op'] == 'add') {
	
	if(!$allowmanage) {
		cpmessage('no_authority_management_operation');
	}
	
	$feed = array();
	$feed['dateline'] = sgmdate('Y-m-d H:i', $_SGLOBAL['timestamp']);

} elseif($_GET['op'] == 'edit') {
	
	if(!$allowmanage) {
		cpmessage('no_authority_management_operation');
	}
	
	$_GET['feedid'] = intval($_GET['feedid']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." WHERE feedid='$_GET[feedid]'");
	$feed = $_SGLOBAL['db']->fetch_array($query);
	
	if($feed['uid']) {
		realname_set($feed['uid'], $feed['username']);
		realname_get();
		
		$feed = mkfeed($feed);
	}
	$feed['title_template'] = shtmlspecialchars($feed['title_template']);
	$feed['body_general'] = shtmlspecialchars($feed['body_general']);

	$feed['dateline'] = sgmdate('Y-m-d H:i', $feed['dateline']);
	
} elseif($_GET['op'] == 'delete') {
	
	$_GET['feedid'] = intval($_GET['feedid']);
	include_once(S_ROOT.'./source/function_delete.php');
	if(deletefeeds(array($_GET['feedid']))) {
		cpmessage('do_success', 'admincp.php?ac=feed');
	} else {
		cpmessage('choose_to_delete_events');
	}
	
} elseif($_GET['op'] == 'irecommend') {

	$search_res = array();
	if ($_POST['recop'] == 'set_weight') {
		$feedid = $_POST['feedid'];
		$edit_input = $_POST['edit_input'];

		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("recommendation")." WHERE recfrom_i = 1 AND feedid=".$feedid);

		if ($res = $_SGLOBAL['db']->fetch_array($query)) {
			$_SGLOBAL['db'] -> query("UPDATE ".tname("recommendation")." SET weight=".$edit_input." WHERE recfrom_i = 1 AND feedid=".$feedid);
		}
	} else if ($_POST['recop'] == 'unrecommend') {
		$feedid = $_POST['feedid'];		
		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("recommendation")." WHERE recfrom_i = 1 AND feedid=".$feedid);

		if ($res = $_SGLOBAL['db']->fetch_array($query)) {
			$_SGLOBAL['db'] -> query("UPDATE ".tname("recommendation")." SET recfrom_i = 0, weight = 0 WHERE feedid =".$feedid);
		}
	} else if ($_POST['recop'] == 'add') {
		$feedid = $_POST['feedid'];		
		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("recommendation")." WHERE feedid=".$feedid);

		if ($res = $_SGLOBAL['db']->fetch_array($query)) {
			if ($res['recfrom_i'] == 1) {
				echo "<span>该项已经在推荐中，请勿重复推荐</span>";
				exit();
			} else {
				$_SGLOBAL['db'] -> query("UPDATE ".tname("recommendation")." SET recfrom_i = 1, weight = 0 WHERE feedid = ".$feedid);
			}
		} else {
			$_SGLOBAL['db'] -> query("INSERT INTO ".tname("recommendation")." SELECT *, 1, 0 FROM ".tname("feed")." WHERE feedid = ".$feedid);
		}
	} else if ($_POST['recop'] == 'search') {
		$feedid = $_POST['feedid'];
		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("feed")." WHERE feedid=".$feedid);
		
		while ($res = $_SGLOBAL['db']->fetch_array($query)) {
			$search_res[] = $res;
		}
		
		$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("recommendation")." WHERE recfrom_i=1 AND feedid=".$feedid);
		if ($res = $_SGLOBAL['db']->fetch_array($query)) {
			$recommended = 1;
		}
	} else {
		
	}

	$actives = array('rec' => ' class="active"');

	$reclist = array();
	$count = 0;

	//´¦Àí²éÑ¯
	 $wheresql = "recfrom_i = 1";
	if ($space[feedfriend]==''){
	    $wheresql = "uid IN ($space[uid])";
	}
	$ordersql = "dateline DESC";
	$theurl = "admincp.php?ac=feed&op=irecommend";
	$f_index = '';

	if(empty($count)) {
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('recommendation')." WHERE $wheresql"), 0);
	}
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('recommendation')." $f_index
			WHERE $wheresql
			ORDER BY weight DESC, feedid DESC");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$reclist[] = $value;
		}
	}

	//ÊµÃû
	realname_get();
} else {
		
	$mpurl = 'admincp.php?ac=feed';
	
	//´¦ÀíËÑË÷
	$intkeys = array('uid', 'feedid');
	$strkeys = array('username', 'icon');
	$randkeys = array(array('sstrtotime','dateline'), array('intval','hot'));
	$likekeys = array();
	$results = getwheres($intkeys, $strkeys, $randkeys, $likekeys);
	$wherearr = $results['wherearr'];
	$wheresql = empty($wherearr)?'1':implode(' AND ', $wherearr);
	$mpurl .= '&'.implode('&', $results['urls']);
	
	//ÅÅÐò
	$orders = getorders(array('dateline','hot'), 'feedid');
	$ordersql = $orders['sql'];
	if($orders['urls']) $mpurl .= '&'.implode('&', $orders['urls']);
	$orderby = array($_GET['orderby']=>' selected');
	$ordersc = array($_GET['ordersc']=>' selected');
	
	//¼¤»î
	if (isset($_GET['uid']) && strlen($_GET['uid'])) {
		$actives = array('site' => ' class="active"');
	} elseif($_GET['orderby'] == 'hot') {
		$actives = array('hot' => ' class="active"');
	} else {
		$actives = array('all' => ' class="active"');
	}

	$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
	if(!in_array($perpage, array(20,50,100,1000))) $perpage = 20;
	
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//¼ì²é¿ªÊ¼Êý
	ckstart($start, $perpage);
	
	if($perpage > 100) {
		$count = 1;
		$selectsql = 'feedid';
	} else {
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('feed')." WHERE $wheresql"), 0);
		$selectsql = '*';
	}
	$mpurl .= '&perpage='.$perpage;
	$perpages = array($perpage => ' selected');
	
	$list = array();
	$multi = '';
	$managebatch = checkperm('managebatch');
	$allowbatch = true;
	if($count) {
		
		$query = $_SGLOBAL['db']->query("SELECT $selectsql FROM ".tname('feed')." WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['uid'], $value['username'], $value['username'], 1);
			if(!$managebatch && $value['uid'] != $_SGLOBAL['supe_uid']) {
				$allowbatch = false;
			}
			$list[] = $value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	}
	
	if($perpage > 100) {
		$count = count($list);
	}
	
	realname_get();
}

?>