<?php
/*
     do_getselectphotoalbum.php用于获得当前登录用户所选择的相册内容
     Add by am@ihome.2012-11-18  16:58


*/
    include_once('../data_oauth_check.php');	
	include_once('../../../common.php');
   // $albumid= 1;
	//$uid = 1 ;
    $albumid = empty($_POST['albumid'])?0:intval($_POST['albumid']);
	$uid = empty($_POST['uid'])?0:intval($_POST['uid']);

	$result = array();
	$wheresql = "a.albumid = p.albumid and a.uid=$uid and a.albumid = $albumid";
	$query = $_SGLOBAL['db']->query("SELECT a.picnum,a.dateline,p.filepath  FROM ".tname('album')." a , ".tname('pic')." p  WHERE  ".$wheresql);
	
		while($album = $_SGLOBAL['db']->fetch_array($query)){
		  $pic[] = $album;
		}
	
	foreach($pic as $album){
       
		$result[] = array('Photo_count'=>$album[picnum],'Photo_createtime'=>$album[dateline],
		'Photo _pic'=>$album[filepath]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>