<?php

	//testapi.php just for test. by xuxing@ihome 2013-4-14.

	$username=trim($_POST["username"]);
	$password=trim($_POST["password"]);

	$arr=array('username'=>$username,'password'=>$password);
	echo json_encode($arr);
?>