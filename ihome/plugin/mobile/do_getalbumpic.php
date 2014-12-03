<?php
	/*
		do_getalbumpic.php用于获取指定相册的图片列表，或具体图片的信息
		added by xuxing@ihome. 2012-12-15 16:56
	*/
	//include_once('../../common.php'); 
    	include_once('do_mobileverify.php');

	$id = empty($_POST['albumid'])?0:intval($_POST['albumid']);
	$picid = empty($_POST['picid'])?0:intval($_POST['picid']);
	//$uid = empty($_POST['ownerid'])?$userid:intval($_POST['ownerid']);//相册的所有者uid

	//$perpage = 20;
	
	/*$userid=3;
	$username='xuxing';
	//$id=419;
	$picid=10547;
	$uid=1;
	$_SGLOBAL['supe_uid'] = $userid;
	$_SGLOBAL['supe_username'] = $username;*/
	
	$result = array();
	
	/*if(empty($uid)){
		$result = array('flag'=>'failed');
		returnvalue($result);
		exit();
	}*/
	
	//是否传递了相册id
	if($id) {
		
		if($id > 0) {
			$perpage = empty($_POST['count'])?9:intval($_POST['count']);
			$page = empty($_POST['page'])?0:intval($_POST['page']);
			if($page < 1) $page = 1;
			$start = ($page-1)*$perpage;
			
			//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$id' and uid='$uid' LIMIT 1");
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$id' LIMIT 1");
			$album = $_SGLOBAL['db']->fetch_array($query);
			//不存在该相册，返回
			if(empty($album)) {
				$result = array('flag'=>'album_not_exist');
				returnvalue($result);
				exit();
			}

			//检查是否具有访问权限
			ckfriend_album($album);

			//设置sql查询条件
			$wheresql = "albumid='$id'";
			$count = $album['picnum'];
		}/* else {
			//当属于系统默认相册时的条件
			$wheresql = "albumid='0' AND uid='$uid'";
			$count = getcount('pic', array('albumid'=>0, 'uid'=>$uid));

			$album = array(
				'uid' => $uid,
				'albumid' => -1,
				'albumname' => lang('default_albumname'),
				'picnum' => $count
			);
		}*/

		//获取相册中的图片信息
		$list = array();
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('pic')." WHERE $wheresql ORDER BY dateline DESC LIMIT $start,$perpage");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['pic'] = pic_get($value['filepath'], $value['thumb'], $value['remote']);
				realname_set($value['uid'],$value['username']);
				$picreplynum = getcount('comment', array('idtype'=>'picid', 'id'=>$value['picid']));
				$value['replynum'] = $picreplynum;
				$list[] = $value;
			}
		}
		realname_get();
		
		foreach($list as $value){
			$markpos = strpos($_SC['attachurl'], "ttp://");
			if($markpos != 1){
				$picpath = $_SCONFIG[siteallurl].$_SC['attachurl'].$value['filepath'];					
			}else{
				$picpath = $_SC['attachurl'].$value['filepath'];
			}
			$markpos = strpos($value['pic'], "ttp://");
                        if($markpos != 1){
                                $picthumb = $_SCONFIG[siteallurl].$value['pic'];
                        }else{
                                $picthumb = $value['pic'];
                        }
			$result[] = array('pic_id'=>$value['picid'], 'pic_desc'=>$value['title'],'pic_uid'=>$value['uid'],'pic_userfullname'=>$_SN[$value['uid']],
				'pic_time'=>$value['dateline'],'pic_url'=>$picpath,
				'pic_thumb'=>$picthumb,'pic_replynum'=>$value['replynum']);

		}
		returnvalue($result);
		exit();
	}elseif($picid > 0){
		$query = $_SGLOBAL['db']->query("SELECT a.picid,a.albumid,a.dateline,a.title,a.filepath,b.albumname,b.username,b.uid FROM ".tname('pic')." a, ".tname('album').
			" b WHERE picid='$picid' and a.albumid=b.albumid and a.uid=b.uid limit 1");
		$pic = $_SGLOBAL['db']->fetch_array($query);
		
		//当图片不存在时，进行返回
		if(empty($pic)){
			$result = array('flag'=>'picture_not_exist');
			returnvalue($result);
			exit();
		}
		
		realname_set($pic['uid'],$pic['username']);
		$picreplynum = getcount('comment', array('idtype'=>'picid', 'id'=>$pic['picid']));
		$pic['replynum'] = $picreplynum;
		realname_get();
		$markpos = strpos($_SC['attachurl'], "ttp://");
		if($markpos != 1){
			$picpath = $_SCONFIG[siteallurl].$_SC['attachurl'].$pic['filepath'];					
		}else{
			$picpath = $_SC['attachurl'].$pic['filepath'];
		}
		$result = array('user_thumbpic'=>avatar($pic[uid],small),'pic_id'=>$pic['picid'], 'pic_desc'=>$pic['title'],'pic_uid'=>$pic['uid'],
			'pic_userfullname'=>$_SN[$pic['uid']],'pic_time'=>$pic['dateline'],'pic_url'=>$picpath,
			'pic_replynum'=>$pic['replynum'], 'pic_albumid'=>$pic['albumid'], 'pic_albumname'=>$pic['albumname']);
			returnvalue($result);
			exit();
	}
	
	//检查相册的访问权限
	function ckfriend_album($album) {
		global $_SGLOBAL;
		if(!ckfriend($album['uid'], $album['friend'], $album['target_ids'])) {
			$result = array('flag'=>'no_privilege');
			returnvalue($result);
			exit();
		} elseif($album['uid']!=$_SGLOBAL['supe_uid'] && $album['friend'] == 4) {
			$result = array('flag'=>'need_password');
			returnvalue($result);
			exit();
		}
	}
	
	//返回结果
	function returnvalue($result){
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
?>
