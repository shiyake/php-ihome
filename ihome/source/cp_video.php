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

//$FILE--�ϴ��ļ��� һ����˵��$FILES['name']
//$title--��Ƶ����
//$desc--��Ƶ������
//$tovideo--��Ϊ���Ժ������Ƶ�õ�
//$type--��Ƶ�����ͻ���ר��
function video_save($FILE, $title, $desc, $tovideoid=0, $albumid) {
	global $_SGLOBAL, $_SCONFIG, $space, $_SC;
	//�����ϴ�����
	$allowpictype = array('flv');

	//���
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('lack_of_access_to_upload_file_size');
	}

	//�жϺ�׺
	$fileext = fileext($FILE['name']);
	if(!in_array($fileext, $allowpictype)) {
		return cplang('only_allows_upload_file_types');
	}

	//��ȡĿ¼
	if(!$filepath = getfilepath($fileext, true)) {
		return cplang('unable_to_create_upload_directory_server');
	}

	//���ռ��С
	if(empty($space)) {
		$space = getspace($_SGLOBAL['supe_uid']);
	}
	
	//�û���
	if(!checkperm('allowupload')) {
		ckspacelog();
		return cplang('inadequate_capacity_space');
	}
	
	//ʵ����֤
	if(!ckrealname('album', 1)) {
		return cplang('inadequate_capacity_space');
	}
	
	//��Ƶ��֤
	if(!ckvideophoto('album', array(), 1)) {
		return cplang('inadequate_capacity_space');
	}
	
	//���û���ϰ
	if(!cknewuser(1)) {
		return cplang('inadequate_capacity_space');
	}

	$maxattachsize = checkperm('maxattachsize');//��λMB
	if($maxattachsize) {//0Ϊ������
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

	//�����ϴ�
	$new_name = $_SC['attachdir'].'./'.$filepath;
	$tmp_name = $FILE['tmp_name'];
	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('mobile_picture_temporary_failure');
	}
	
	//���
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
		showmessage("��������ˣ��������20�������ڣ�");
	}
	if (strlen($title) < 4) {
		showmessage("������̣�����2����������20�������£�");
	}
	if (strlen($desc) > 400) {
		showmessage("���ݹ����ˣ��������200�������ڣ�");
	}
	if (strlen($desc) > 20) {
		showmessage("���ݹ��̣�����10����������!");
	}
	
	$title = getstr($title, 40, 1, 1, 1);//����Ϊ20����
	$desc = getstr($desc, 400, 1, 1, 1);//����Ϊ200����
} else showmessage('no_file');

if (submitcheck('uploadflv')) {
	$videosave = video_save($file, $title, $desc);//д���ϴ���Ƶ�ĺ���--�ϴ���Ƶ
	if ($videosave && is_array($videosave)) {//--�ϴ���Ƶ�ɹ�֮��,����feed����󹦸����
		feed_publish($videosave['id'],'videoid');//--����feed
	}
}
?>