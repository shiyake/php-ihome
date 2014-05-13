<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-4-9 21:19:10
*/
	include_once('do_mobileverify.php');
	
	$File = $_FILES['mobilefile'];
	$Message =trim($_POST['message']);
	$FromDevice = trim($_POST['fromdevice']);
	
	if(empty($Message)) {
		$Message = cplang('upload_a_pic');
	}
	
	if ($File && $Message) {
		include_once('do_addtrackfileandmsg.php');
	}
	elseif ($Message && empty($File)) {
		include_once('do_addtrackmessage.php');
	}
	elseif ($File && empty($Message)) {
		include_once('do_addtrackfile.php');
	}
	else {
		$Result = array(
			'flag' => 'fail_track'
		);		
	}
	echo json_encode($Result);;
	exit();

?>