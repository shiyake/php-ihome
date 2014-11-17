<?php
/*
     do_getthepic.php获得相册内某个图片的相关信息
     Add by am@ihome.2012-12-17  11:07


*/
    //include_once('../../common.php'); 
    include_once('../iauth_verify_forward.php');	
    //$picid= 193;
	include_once('../../../common.php');
    $picid = empty($_POST['picid'])?0:intval($_POST['picid']);
    $userid = intval(iauth_verify());
	$result = array();
    $query = $_SGLOBAL['db']->query("SELECT p.albumid,p.uid,p.dateline,p.title,p.filepath,p.filename,p.albumid,a.albumname,p.username FROM ".tname('album')." a , ".tname('pic')." p  WHERE a.albumid = p.albumid and p.picid = $picid");	
		while($album = $_SGLOBAL['db']->fetch_array($query)){
		  $pic[] = $album;
		  realname_set($album['uid'],$album['username']);
		}
		realname_get();	
	foreach($pic as $album){
       
		$result[] = array('pic_userpic'=>avatar($album['uid'],small),'pic_username'=>$_SN[$album['uid']],'pic_userid'=>$album[uid],'pic_time'=>$album[dateline],'pic_note'=>$album[title],'pic_url'=>$album[filepath],'pic_name'=>$album[filename],'pic_albumid'=>$album[albumid],'pic_album'=>$album[albumname]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>