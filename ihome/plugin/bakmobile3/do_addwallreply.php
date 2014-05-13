<?php
/*
     do_addwallreply.php用于回复墙信息
     Add by am@ihome.2013-11-1  11:25
	 


*/
    //include_once('../../common.php'); 

    include_once('do_mobileverify.php');   	
	//include_once(S_ROOT.'./data/data_profield.php');
	$WallId = intval(trim($_POST[wallid]));
	//$WallId = 3;
	//$message = '今天天气真好啊 妹子的';
	$pass = empty($_POST['pass'])?1:intval($_POST['pass']);
	getmember();
	
	
	//$message = $_POST['message'];
	//替换表情
	$message = preg_replace("/\{em:(\d+):}/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
	
	

		$setarr = array(
			'uid' => $userid,
			'username' => $username,
			'message' => $message,
			'ip' => getonlineip(),
			'pass' => $pass,
			'timeline' => $_SGLOBAL['timestamp'],
			'hot' => 0,
			'wallid' => $WallId
		);
		//入库
		$newwallid = inserttable('wallfield', $setarr, 1);
			$message = "<a href=\"plugin.php?pluginid=wall&wallid=".$WallId."&ac=track\">#".$WallTitle."#</a> ".$message;
			$feedarr = array(
					'appid' => UC_APPID,
					'icon' => 'doing',
					'uid' => $uid,
					'username' => $username,
					'dateline' => $_SGLOBAL['timestamp'],
					'title_template' => cplang('feed_doing_title'),
					'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
					'body_template' => '',
					'body_data' => '',
					'id' => $newwallid,
					'idtype' => 'wallid'
				);
				$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);
				$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);
				$FeedId = inserttable('feed', $feedarr,1);
				
				if($FeedId)
				{
					updatetable('wallfield', array('feedid'=>$FeedId), array('id'=>$id));
				}
	if($newwallid){
		$result = array('flag'=>'success');
	}else{
		$result = array('flag'=>'failed');
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>