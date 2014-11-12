<?
/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013年1月7日15:42:29
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}
$ac = $_GET['ac'];
$ac_array = array('view','list','upload','delete');
if (!in_array($ac, $ac_array)) {
	$ac = 'upload';
}

if ($ac == 'upload') {
	if (submitcheck('uploadflv')) {
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		if (strlen($title) > 40) {
			showmessage("标题过长了，请控制在20汉字以内！");
		}
		if (strlen($title) < 4) {
			showmessage("标题过短！请在2个汉字以上20汉字以下！");
		}
		if (strlen($desc) > 400) {
			showmessage("内容过长了，请控制在200汉字以内！");
		}
		if (strlen($desc) < 10) {
			showmessage("内容过短，请在5个汉字以上!");
		}
	
		$title = getstr($title, 40, 1, 1, 1);
		$desc = getstr($desc, 400, 1, 1, 1);
		//$pic = $_FILE["uploadpic"];
		$video = $_FILES["uploadvideo"];
		if (!isset($video)) {
			showmessage('no_file!!');
		}
		//$picsave = pic_save($pic);
		$videosave = video_save($video, $title, $desc);
		if ($videosave && is_array($videosave)) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($videosave['id'],'videoid');
			showmessage('post_video_OK','space.php?do=home');
		}
	}
	include_once template("/plugin/video/template/upload");
}
elseif ($ac == 'list') {
	//增加一个页数的功能是必要的--降序
	$listsql = "pass >=1";

	$perpage = 20;
	$perpage = mob_perpage($perpage);
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) $page=1;
	$start = ($page-1)*$perpage;
	ckstart($start, $perpage);
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('video')." WHERE $listsql "));
	$url = "plugin.php?pluginid=video&ac=list";
	$multi = multi($count, $perpage, $page, $url);

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(video)." WHERE $listsql ORDER BY dateline DESC LIMIT ".$start.",".$perpage);
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$list[] = $value;
	}
	include_once template("/plugin/video/template/list");
}
elseif ($ac == 'view') {
	//接收id,依据id来显示该页!
	$vid = $_GET['vid'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(video)." WHERE id = $vid ");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$video[] = $value;
		$url = $_SC['attachurl'].$value['filepath'];
		$title = $value['title'];
		$desc = $value['desc'];
		
		//接下来是评论
		//应该有个分页的功能--升序
		$wheresql = "id = $vid AND idtype = 'videoid'";

		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('comment')." WHERE $wheresql "));
		$perpage = 5;
		$perpage = mob_perpage($perpage);
		$page = empty($_GET['page'])?0:intval($_GET['page']);
		if($page<1) $page=1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$theurl = "plugin.php?pluginid=video&ac=view&vid=$vid";
		$multi = multi($count, $perpage, $page, $theurl);

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(comment)." WHERE $wheresql ORDER BY dateline ASC LIMIT ".$start.",".$perpage);
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			$comment[] = $value;
		}
	}
	include_once template("/plugin/video/template/view");
}

elseif ($ac == 'delete') {
	//接收id,依据id来删除!
	//检查权限
	//删除数据库--单独拿出来,删除分享,评论,文件信息,feed信息
	//删除文件--单独拿出来
	$vid = $_GET['vid'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(video)." WHERE id = $vid ");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$video[] = $value;
		//应该有个分页的功能--升序
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(comment)." WHERE vid = $vid AND idtype = 'videoid' ORDER BY datetime ASC ");
		while($value = $_SGLOBAL['db']->query($query)) {
			$comment[] = $value;
		}
	}
	include_once template("/plugin/video/template/view");
}


/*
elseif ($ac == 'comment') {

	/*****************************/
	/*其实这里不需要写!
	/*****************************
	$vid = $_GET['vid'];
	$message = $_POST['message'];
	//这里插入处理的@等信息;
	$m = $message;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(video)." WHERE id = $vid ");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$video[] = $value;
	}
		
	$setarr = array(
		'uid' => $video['uid'],
		'id' => $vid,
		'idtype' => 'videoid',
		'authorid' => $_SGLOBAL['supe_uid'],
		'author' => $_SGLOBAL['supe_username'],
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $m,
		'ip' => getonlineip()
	);
	$cid = inserttable('comment', $setarr, 1);
	if ($cid) {
		showmessage('success');
	}
}
*/

?>
