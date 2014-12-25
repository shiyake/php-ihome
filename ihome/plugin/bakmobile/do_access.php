<?php
/*
     do_access.php获取话题的具体权限
     Add by am@ihome.2012-12-05  09:10

*/
    //include_once('../../common.php'); 
	include_once('do_mobileverify.php');  
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
 	
	//$userid = 100 ; 
	//$tagid = 24;
	//$tid = 63 ; 
	$tagid =empty($_POST['tagid'])?0:intval($_POST['tagid']);//群组id
    $tid =empty($_POST['topic_id'])?0:intval($_POST['topic_id']);//具体某个话题的id

	$result = array();	
	
	$query = $_SGLOBAL['db']->query("SELECT  uid FROM  " .tname('tagspace')." where tagid = $tagid ");

	while($rs = $_SGLOBAL['db']->fetch_array($query)){
				$starlist[] = $rs[uid];
			}
	$query = $_SGLOBAL['db']->query("SELECT  grade  FROM  " .tname('tagspace')."    WHERE tagid=$tagid and uid = $userid");
    $gd = $_SGLOBAL['db']->fetch_array($query);
	
	$query = $_SGLOBAL['db']->query("SELECT  uid  FROM  " .tname('thread')."    WHERE tid=$tid ");
    $th = $_SGLOBAL['db']->fetch_array($query);
	$query = $_SGLOBAL['db']->query("SELECT  viewperm,threadperm,postperm  FROM  " .tname('mtag')."    WHERE tagid=$tagid");
    $value = $_SGLOBAL['db']->fetch_array($query);
 
			// 无查看此用户的权限    viewflag群组浏览的权限 threadflag发表话题的权限 postflag回复话题的权限
	if(!in_array($userid,$starlist)){
			if($value[viewperm]==0 && $value[threadperm]==1 && $value[postperm]==1 ){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadsuccess','postflag'=>'postsuccess');
			}else if($value[viewperm]==0 && $value[threadperm]==0 && $value[postperm]==1){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadfailed','postflag'=>'postsuccess');
			}else if($value[viewperm]==0 && $value[threadperm]==1 && $value[postperm]==0){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadsuccess','postflag'=>'postfailed');
			}else if($value[viewperm]==0 && $value[threadperm]==0 && $value[postperm]==0){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadfailed','postflag'=>'postfailed');
			}else if($value[viewperm]==1){
			   $result = array('viewflag'=>'viewfailed','threadflag'=>'threadfailed','postflag'=>'postfailed');
			}
    }else if(in_array($userid,$starlist) || $userid == $th[uid]){
		if($gd[grade]== -1){
		    $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadfailed','postflag'=>'postfailed');
		}else if($gd[grade]== -2){
		    if($value[viewperm]==0 && $value[threadperm]==1 && $value[postperm]==1 ){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadsuccess','postflag'=>'postsuccess');
			}else if($value[viewperm]==0 && $value[threadperm]==0 && $value[postperm]==1){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadfailed','postflag'=>'postsuccess');
			}else if($value[viewperm]==0 && $value[threadperm]==1 && $value[postperm]==0){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadsuccess','postflag'=>'postfailed');
			}else if($value[viewperm]==0 && $value[threadperm]==0 && $value[postperm]==0){
			   $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadfailed','postflag'=>'postfailed');
			}else if($value[viewperm]==1){
			   $result = array('viewflag'=>'viewfailed','threadflag'=>'threadfailed','postflag'=>'postfailed');
			}
		}else{
		    $result = array('viewflag'=>'viewsuccess','threadflag'=>'threadsuccess','postflag'=>'postsuccess');
		}
	}
  

	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
	

?>