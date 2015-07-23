<?php
if(!defined('iBUAA')) {
	exit('Access Denied');
}
$ac = $_GET['ac'];
$ac_array = array('view','list','upload','uploadfile','delete','view_detail','getlist','index','add_view');
$clicks = empty($_SGLOBAL['click']['videoid'])?array():$_SGLOBAL['click']['videoid'];
if (!in_array($ac, $ac_array)) {
	$ac = 'list';
}
if ($ac == 'getlist') {
	$listsql = "pass >=1";
	if($_GET['view'] == 'me') {
		$listsql = "pass >=1 and uid=".$_SGLOBAL['supe_uid'];
	}
	$perpage = 18;
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
		$q = $_SGLOBAL['db']->query("SELECT * FROM ".tname(pic)." WHERE picid='".$value['picid']."'");
		$value['image'] = "http://placehold.it/235x170&text=!";
		while($filepath = $_SGLOBAL['db']->fetch_array($q)) {
			$value['image'] = "/attachment/".$filepath['filepath'];
		}
		$value['dateline'] = date("Y-m-d H:i:s",$value['dateline']);
		$list[] = $value;
	}
	$res = array('list'=>$list,"count"=>$count,"multi"=>$multi);
	echo json_encode($res);
	return json_encode($res); 
}
if ($ac == 'upload') {
	include_once template("/plugin/video/template/upload");
}
elseif ($ac == 'uploadfile')	{
	$abstract = $_POST['abstract'];
	$desc = $_POST['desc'];
	$video = $_FILES['video'];
	$image = $_FILES['page'];
	$uid = $_SGLOBAL['supe_uid'];
	$abstract = $_POST['abstract'];
	$title = $_POST['title'];	
	//if($video['type']!="video/x-flv")	{
//		showmessage("请上传FLV格式视频文件","plugin.php?pluginid=video&ac=upload");
//	}	
	if(!strstr($image['type'],"image")) {
		showmessage("封面请上传图片格式文件","plugin.php?pluginid=video&ac=upload");
	}
	if(!$abstract) {
		showmessage("请填写视频简介","plugin.php?pluginid=video&ac=upload");
	}
	if(!$desc) {
		showmessage("请填写视频描述","plugin.php?pluginid=video&ac=upload");
	}
	if(!$title) {
		showmessage("请填写视频标题","plugin.php?pluginid=video&ac=upload");
	}

	$video_detail = video_save($video,$title,$desc,$abstract);

	pic_save($image,0,$title);
	$sql = "SELECT * FROM ".tname("pic")." WHERE title='".$title."' order by dateline desc limit 1";
	$picid = 0;
	$query = $_SGLOBAL['db']->query($sql);	
	while($row = $_SGLOBAL['db']->fetch_array($query)){
		$picid = $row['picid'];
	}
	if($video_detail && is_array($video_detail))	{
		include_once(S_ROOT.'./source/function_feed.php');
		feed_publish($video_detail['id'],'videoid');
	}
	$sql = "UPDATE ".tname("video")." SET picid = ".$picid." WHERE id = ".$video_detail['id'];
$_SGLOBAL['db'] -> query($sql);
	showmessage("视频已经成功上传","plugin.php?pluginid=video");
	exit();	
}
elseif ($ac == 'add_view') {
	$query = $_SGLOBAL['db']->query("UPDATE ".tname(video)." SET view=view+1 WHERE id=".$_GET['vid']);
	echo "correct";
	exit();
}
elseif ($ac == 'view') {
	$vid = $_GET['vid'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(video)." WHERE id = $vid ");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$video[] = $value;
		$url = $_SC['attachurl'].$value['filepath'];
		$title = $value['title'];
		$desc = $value['desc'];
        $hash = md5($video['uid']."\t".$video['dateline']);
        $id = $vid;
		$idtype = 'videoid';
		$uid = $value['uid'];
		$author = $value['username'];
		$dateline = $value['dateline'];
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
			$avatar = avatar_file($value['authorid'],'middle');
			$value['avatar']=$avatar;
			$comment[] = $value;
		}
		$url = "vcastr_file=".$url."&LogoText=ihome&TextColor=0x0000FF";
		include_once template("/plugin/video/template/view");
	}
}

elseif ($ac == 'list') {
	include_once template("/plugin/video/template/list");
}
elseif ($ac == 'view_detail') {
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$video[] = $value;
		$url = $_SC['attachurl'].$value['filepath'];
		$title = $value['title'];
		$desc = $value['desc'];
        $hash = md5($video['uid']."\t".$video['dateline']);
        $id = $vid;
		$idtype = 'videoid';
		$uid = $value['uid'];
		$author = $value['username'];
		$dateline = $value['dateline'];
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
			$avatar = avatar_file($value['authorid'],'middle');
			$value['avatar']=$avatar;
			$comment[] = $value;
		}
		$res = array("id"=>$id,"url"=>$url,"title"=>$title,"desc"=>$desc,"author"=>$author,"date"=>$dateline,"comment"=>$comment,"page"=>$page,"count"=>$count);
	}
	include_once template("/plugin/video/template/view");
}
elseif ($ac == 'delete') {
	$vid = $_GET['vid'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(video)." WHERE id = $vid ");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$video[] = $value;
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(comment)." WHERE vid = $vid AND idtype = 'videoid' ORDER BY datetime ASC ");
		while($value = $_SGLOBAL['db']->query($query)) {
			$comment[] = $value;
		}
	}
	include_once template("/plugin/video/template/view");
}
?>
