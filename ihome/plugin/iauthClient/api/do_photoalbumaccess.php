<?php
/*
     do_photoalbumaccess.php用于获得相册相关权限
     Add by am@ihome.2012-12-07  12:07


*/
    
	// include_once('../../common.php'); 
    include_once('../iauth_verify_forward.php');	
    $userid = intval(iauth_verify());

	//$userid = 3 ; 
    //$uid = 96;
    //$albumid = 14;
    $uid =empty($_POST['uid'])?0:intval($_POST['uid']);//被读取的用户id
	$albumid =empty($_POST['albumid'])?0:intval($_POST['albumid']);//相册id

	$result = array();

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE  uid=$uid and albumid = $albumid");
	        while($fd = $_SGLOBAL['db']->fetch_array($query)){
				$addlist[] = $fd[target_ids];
				$friend= $fd[friend];
			} 
	$query = $_SGLOBAL['db']->query("SELECT  friend  FROM  " .tname('spacefield')."  WHERE uid = $uid");
			while($rs = $_SGLOBAL['db']->fetch_array($query)){
				$starlist[] = $rs[friend];
			}
	if(!in_array($userid,$starlist)){
	   if($friend==0){
	      $result = array('viewflag'=>'viewsuccess');
	   }else{
	   	  $result = array('viewflag'=>'viewfailed');
	   }
	}else if(in_array($userid,$starlist)){
          if($friend==1){
		  $result = array('viewflag'=>'viewsuccess');
		}else if($friend==2){
		   if(in_array($userid,$addlist)){
		        $result = array('viewflag'=>'viewsuccess');
		   }else{
		        $result = array('viewflag'=>'viewfailed');
		   }
		}else if($friend==3){
		        $result = array('viewflag'=>'viewfailed');
		}else{
         		$result = array('viewflag'=>'viewsuccess');
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>