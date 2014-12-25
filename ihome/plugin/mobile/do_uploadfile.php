<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon 
	Last Time : 2013-4-1 10:38:02
	statement:uploadfile & make a track to feed ~
*/
/*
if($ac != 'do_uploadfile') {
	header("location:../../plugin.php?pluginid=mobile&ac=do_uploadfile");
	exit();
}
 */
//showmessage(0);
//chdir("../../");
//echo getcwd();
//include_once('do_mobileverify.php');
//include_once('plugin/mobile/do_mobileverify.php');
//echo getcwd();
//exit("jjj");

include_once('do_mobileverify.php');
//mobilefile = $_GET['file']?$_GET['file']:0;
//$filetype = $_GET['type']?$_GET['type']:0;
//if ($filetype == 'pic') {
//	if ($mobilefile == 'upload') {
		chdir("../../");
		include_once ('source/function_cp.php');
		$mobile_file = pic_save($_FILES['mobilefile'], $_POST['albumid'], $_POST['pic_title'], $_POST['topicid']);
/*
		echo $userid;
		echo $username;
		echo $sessionid;
		echo $_POST['albumid'];
		echo $_POST['pic_title'];
		print_r($_FILES['mobilefile']);
		echo $_SGLOBAL[supe_uid];
		exit(aaa);
*/
		if ($mobile_file && is_array($mobile_file)) {
/*			$arr = array(
				'name'=>$mobile_file['filename'],
				'pic'=>$mobile_file['filepath'],
				'size'=>$mobile_file['size']
			);
*/
//make a feed && stat the doing
/*
			if($mobile_file) {
				$message = $mobile_file['title'];//200个字符的限制~
			}
			else {
				$message = $mobile_file['filename'];
			}

			$setarr = array(
				'uid' => $_SGLOBAL['supe_uid'],
				'username' => $_SGLOBAL['supe_username'],
				'dateline' => $_SGLOBAL['timestamp'],
				'message' => $message,
				'ip' => getonlineip()
			);
			$newdoid = inserttable('doing', $setarr, 1);
		
			$feedarr = array(
				'appid' => UC_APPID,
				'icon' => 'doing',
				'uid' => $_SGLOBAL['supe_uid'],
				'username' => $_SGLOBAL['supe_username'],
				'dateline' => $_SGLOBAL['timestamp'],
				'title_template' => cplang('feed_doing_title'),
				'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
				'body_template' => '',
				'body_data' => '',
				'id' => $newdoid,
				'idtype' => 'doid',
				'image_1'=>pic_get($mobile_file['filepath'], $mobile_file['thumb'], $mobile_file['remote']);
				'image_1_link'=>"space.php?uid=$mobile_file[uid]&do=album&picid=$mobile_file[picid]"
			);
			$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);
			$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);
			inserttable('feed', $feedarr);

			updatestat('doing');
*/
			$arr = array(
				'flag' => 'success'
			);
			echo json_encode($arr);
		}
		else {
			$arr = array(
				'flag' => 'fail'
			);
			echo json_encode($arr);
		}
		exit();
//	}
//}

?>
