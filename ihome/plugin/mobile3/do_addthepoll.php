<?php
/*
     addthepoll.php提交投票
     Add by am@ihome.2012-10-15  11:34

*/
	//include_once('../../common.php');
    include_once('do_mobileverify.php');	
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	
	/*
	$option = array(305);
	$pid = 65;
	$sex = 1;
	$userid = 3;
	$username = 'xuxing';
	*/
	
	$option = array_unique($_POST['option']);
	$pid = $_POST['pid'];
	$sex = $_POST['sex'];
	//限制最多50项
	$maxoption = 50;
	$newoption = $preview = $optionarr = $setarr = array();
	
	//整理投票项
	
	$query = $_SGLOBAL['db']->query("SELECT pf.*, p.* FROM ".tname('poll')." p 
	LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid 
	WHERE p.pid='$pid'");
	$poll = $_SGLOBAL['db']->fetch_array($query);
	
	
//投票start
		//计票
		if(empty($poll)) {
			$arrs = array('flag'=>'fail');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}
		/*
		//验证性别
		if($poll['sex'] && $poll['sex'] != $sex) {
			$arrs = array('flag'=>'fail');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}
		*/
		//验证是否投过票
		$query = $_SGLOBAL['db']->query("SELECT `option` FROM ".tname('polloption')." WHERE oid IN (".implode(",", $option).") AND pid='$pid'");
		
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			$list[] = saddslashes($value['option']);
		}
		
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('polluser')." WHERE uid=$userid AND pid='$pid'"));
		if($count >=1) {
			$arrs = array('flag'=>'voted');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}else
		if (count($option) > $poll['maxchoice']) {
			$arrs = array('flag'=>'fail');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}else	if (count($option) < $poll['minchoice']) {
			$arrs = array('flag'=>'fail');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}else	if(empty($list)) {
			$arrs = array('flag'=>'fail');
			$result = json_encode($arrs);
			$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
			echo $result;
			exit();
		}else{
		//累计投票数
		$_SGLOBAL['db']->query("UPDATE ".tname('polloption')." SET votenum=votenum+1 WHERE oid IN (".implode(",", $option).") AND pid='$pid'");
		$setarr = array(
			'uid' => $userid,
			'username' => $username,
			'pid' => $pid,
			'option' => saddslashes('"'.implode(cplang('poll_separator'), $list).'"'),
			'dateline' => $_SGLOBAL['timestamp']
		);
		$newpollid = inserttable('polluser', $setarr);
		
		$sql = '';
		$_SGLOBAL['db']->query("UPDATE ".tname('poll')." SET voternum=voternum+1, lastvote='$_SGLOBAL[timestamp]', credit=credit-$poll[percredit] $sql WHERE pid='$pid'");
		
		//实名
		realname_get();
		//统计
		updatestat('pollvote');

		//事件feed
		
			$fs = array();
			$fs['icon'] = 'poll';

			$fs['images'] = $fs['image_links'] = array();
				
			$fs['title_template'] = cplang('take_part_in_the_voting');
			$fs['title_data'] = array(
				'touser' => "<a href=\"space.php?uid=$poll[uid]\">".$_SN[$poll['uid']]."</a>",
				'url' => "space.php?uid=$poll[uid]&do=poll&pid=$pid",
				'subject' => $poll['subject'],
				'reward' => $poll['percredit'] ? cplang('reward') : ''
			);
	
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			include_once(S_ROOT.'./source/function_cp.php');
			feed_add($fs['icon'], $fs['title_template'], $fs['title_data'], $fs['body_template'], $fs['body_data']);
//投票end
		$arrs = array('flag'=>'success');
		//返回flag
	    $result = json_encode($arrs);
	    $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
		}
	
		//返回flag
	    $result = json_encode($arrs);
	    $result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	
	
?>