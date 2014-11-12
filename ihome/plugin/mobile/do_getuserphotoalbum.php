<?php
/*
     do_getuserphotoalbum.php用于获得当前登录用户所发布的相册
     Add by am@ihome.2012-10-08  16:58


*/
    
	 //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
    include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');

	//$userid = 96 ; 
    

	$result = array();

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE  uid=$userid");
	
		while($album = $_SGLOBAL['db']->fetch_array($query)){
		  $pic[] = $album;
		}
			
	foreach($pic as $album){
       
		$result[] = array('Photoalbum_createtime'=>$album[dateline],'Photoalbum_title'=>$album[albumname],'Photoalbum_thumb_pic'=>$album[pic],'Photoalbum_id'=>$album[albumid],'Photoalbum_picnum'=>$album[picnum]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>