<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2012-11-7 20:39:02
	Add table:video
	Add table (stat) field : video
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//$FILE--上传文件名 一般来说是$FILES['name']
//$title--视频标题
//$desc--视频的描述
//$tovideo--是为了以后更新视频用的
//$type--视频的类型或者专辑
function video_save($FILE, $title, $desc, $tovideoid=0, $albumid) {
	global $_SGLOBAL, $_SCONFIG, $space, $_SC;
	//允许上传类型
	$allowpictype = array('flv');

	//检查
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('lack_of_access_to_upload_file_size');
	}

	//判断后缀
	$fileext = fileext($FILE['name']);
	if(!in_array($fileext, $allowpictype)) {
		return cplang('only_allows_upload_file_types');
	}

	//获取目录
	if(!$filepath = getfilepath($fileext, true)) {
		return cplang('unable_to_create_upload_directory_server');
	}

	//检查空间大小
	if(empty($space)) {
		$space = getspace($_SGLOBAL['supe_uid']);
	}
	
	//用户组
	if(!checkperm('allowupload')) {
		ckspacelog();
		return cplang('inadequate_capacity_space');
	}
	
	//实名认证
	if(!ckrealname('album', 1)) {
		return cplang('inadequate_capacity_space');
	}
	
	//视频认证
	if(!ckvideophoto('album', array(), 1)) {
		return cplang('inadequate_capacity_space');
	}
	
	//新用户见习
	if(!cknewuser(1)) {
		return cplang('inadequate_capacity_space');
	}

	$maxattachsize = checkperm('maxattachsize');//单位MB
	if($maxattachsize) {//0为不限制
		if($space['attachsize'] + $FILE['size'] > $maxattachsize + $space['addsize']) {
			return cplang('inadequate_capacity_space');
		}
	}


	if($albumid<0) $albumid = 0;
	$showtip = true;
	$albumfriend = 0;
	if($albumid) {
		preg_match("/^new\:(.+)$/i", $albumid, $matchs);
		if(!empty($matchs[1])) {
			$albumname = shtmlspecialchars(trim($matchs[1]));
			if(empty($albumname)) $albumname = sgmdate('Ymd');
			$albumid = album_creat(array('albumname' => $albumname));
		} else {
			$albumid = intval($albumid);
			if($albumid) {
				$query = $_SGLOBAL['db']->query("SELECT albumname,friend FROM ".tname('album')." WHERE albumid='$albumid' AND uid='$_SGLOBAL[supe_uid]'");
				if($value = $_SGLOBAL['db']->fetch_array($query)) {
					$albumname = addslashes($value['albumname']);
					$albumfriend = $value['friend'];
				} else {
					$albumname = sgmdate('Ymd');
					$albumid = album_creat(array('albumname' => $albumname));
				}
			}
		}
	} else {
		$albumid = 0;
		$showtip = false;
	}

	//本地上传
	$new_name = $_SC['attachdir'].'./'.$filepath;
	$tmp_name = $FILE['tmp_name'];
	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('mobile_picture_temporary_failure');
	}
	
	//入库
	$setarr = array(
		'albumid' => $albumid,
		'uid' => $_SGLOBAL['supe_uid'],
		'username' => $_SGLOBAL['supe_username'],
		'dateline' => $_SGLOBAL['timestamp'],
		'postip' => getonlineip(),
		'filename' => addslashes($FILE['name']),
		'title' => $title,
		'desc' => $desc,
		'size' => $FILE['size'],
		'filepath' => $filepath
	);
	$setarr['id'] = inserttable('video', $setarr, 1);

	$setsql = '';
	if($showtip) {
		$reward = getreward('uploadimage', 0);
		if($reward['credit']) {
			$setsql = ",credit=credit+$reward[credit]";
		}
		if($reward['experience']) {
			$setsql .= ",experience=experience+$reward[experience]";
		}
	}
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET attachsize=attachsize+'$FILE[size]', updatetime='$_SGLOBAL[timestamp]' $setsql WHERE uid='$_SGLOBAL[supe_uid]'");

	updatestat('video');

	return $setarr;
}



$title = $_POST['title'];
$desc = $_POST['desc'];
$file = $_FILES['uploadvideo'];
if ($file) {	
	if (strlen($title) > 40) {
		showmessage("标题过长了，请控制在20汉字以内！");
	}
	if (strlen($title) < 4) {
		showmessage("标题过短！请在2个汉字以上20汉字以下！");
	}
	if (strlen($desc) > 400) {
		showmessage("内容过长了，请控制在200汉字以内！");
	}
	if (strlen($desc) > 20) {
		showmessage("内容过短，请在10个汉字以上!");
	}
	
	$title = getstr($title, 40, 1, 1, 1);//标题为20个字
	$desc = getstr($desc, 400, 1, 1, 1);//描述为200个字
} else showmessage('no_file');

if (submitcheck('uploadflv')) {
	$videosave = video_save($file, $title, $desc);//写个上传视频的函数--上传视频
	if ($videosave && is_array($videosave)) {//--上传视频成功之后,增加feed就算大功告成了
		feed_publish($videosave['id'],'videoid');//--发布feed
	}
}
?>