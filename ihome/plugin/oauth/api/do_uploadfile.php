<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon 
	Last Time : 2012-12-5 19:58:01
*/

include_once('do_mobileverify.php');
//include_once('../../common.php');

//$mobilefile = $_GET['file']?$_GET['file']:0;
//$filetype = $_GET['type']?$_GET['type']:0;
//if ($filetype == 'pic') {
//	if ($mobilefile == 'upload') {
		include_once (S_ROOT.'./source/function_cp.php');
		$mobile_file = pic_save($_FILES['mobilefile'], $_POST['albumid'], $_POST['pic_title'], $_POST['topicid']);

		echo $userid;
		echo $username;
		echo $sessionid;
		echo $_POST['albumid'];
		echo $_POST['pic_title'];
		print_r($_FILES['mobilefile']);
		echo "<br />";
		echo $_SGLOBAL[supe_uid];
/*		exit(aaa);
		

		if ($mobile_file && is_array($mobile_file)) {
			$arr = array(
				'name'=>$mobile_file['filename'],
				'pic'=>$mobile_file['filepath'],
				'size'=>$mobile_file['size']
			);
*/
			echo $mobile_file[filename];
//			echo json_encode($arr);
			exit(bbb);
//		}
//	}
//}

?>
