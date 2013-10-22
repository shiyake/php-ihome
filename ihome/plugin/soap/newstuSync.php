<?php
/*
   同步所在读一年级的学生(包括本硕博)相关学籍信息
*/
	include_once ("config.php");
    include_once('../../common.php'); 
	include_once(S_ROOT.'./source/function_common.php');
    include_once(S_ROOT.'./uc_client/client.php');	
	$client=new SoapClient(SOAP_URL); 
	$starttime = time();//date('H:i:s');
	$data = date('Y-m-d H:i:s');
	$num = $client->__call ('getDataCount',array (
			'username' => SOAP_NAME,
			'password' => SOAP_KEY,
			'serviceid'=> SOAP_SERV2,
	));
	$t = intval($num/1000);
    if($num%1000 != 0)
    {
        $t = $t + 1;
    }
    for($j = 0;$j <= $t;$j++)
    {
	$msg = $client->__call ('getData',array (
			'username' => SOAP_NAME,
			'password' => SOAP_KEY,
			'serviceid'=> SOAP_SERV2,
			'start' =>1000*$j,
			'count' =>1000,
	));
    //print_r($msg);
	//exit;
	//初始化
	foreach($msg as $item){
	//print_r($item);
	$query = $_SGLOBAL['db']->query("select * from ".tname('baseprofile')."  where identifier_not_use ='$item[2]'");
		$id = $item[3];
		if(strlen($id)==18){
			$birthday = substr($id,6,8);
		}elseif(strlen($id) == 15){
			$birthday = '19'.substr($id,6,6);
		}
	if($value = $_SGLOBAL['db']->fetch_array($query)){
	//echo 1;
	/*
	   echo "update ".tname('baseprofile')." set collegeid = '$item[0]',longid = $item[14],academy = '$item[7]',
	   major = '$item[9]',startyear = $item[11],usertype = '$item[16]'  WHERE  identifier_not_use ='$item[2]'";
	   //$query = $_SGLOBAL['db']->query("update ".tname('baseprofile')." set collegeid = '$item[0]',longid = $item[14],academy = '$item[7]',major = '$item[9]',startyear = $item[11],usertype = '$item[16]'  WHERE  identifier_not_use =$item[2]'");
*/
		$setarr = array(
		'collegeid' => $item[0], 
		'longid' => $item[14],
		'academy' => $item[7],
		'major' => $item[9],
		'startyear' => $item[11],
		'usertype' => $item[16]
		);
		$wherearr = array(
		"identifier_not_use" => $item[2]
		);
		updatetable('baseprofile', $setarr, $wherearr);
	  $n = $n + 1;
	}else{
		$query = $_SGLOBAL['db']->query("select * from ".tname('baseprofile')."  where realname ='$item[1]' and  birthday = '$birthday'");
	   	//echo "select * from ".tname('baseprofile')."  where realname ='$item[1]' and  birthday = '$item[3]'";
		if($value = $_SGLOBAL['db']->fetch_array($query)){
		   //$sql =  "update ".tname('baseprofile')." set collegeid = '$item[0]',longid = $item[14],academy = '$item[7]',major = '$item[9]',startyear = $item[11],usertype = '$item[16]',identifier_not_use ='$item[2]' WHERE  realname ='$item[1]' and  birthday = '$item[3]' ";
		   //$query = $_SGLOBAL['db']->query("update ".tname('baseprofile')." set collegeid = '$item[0]',longid = $item[14],academy = '$item[7]',major = '$item[9]',startyear = $item[11],usertype = '$item[16]',identifier_not_use ='$item[2]'  WHERE  realname ='$item[1]' and  birthday = '$item[3]'");
			$setarr = array(
			'collegeid' => $item[0], 
			'longid' => $item[14],
			'academy' => $item[7],
			'major' => $item[9],
			'startyear' => $item[11],
			'usertype' =>$item[16],
			'identifier_not_use' =>$item[2]
			);
			$wherearr = array(
			'realname' =>$item[1],
			'birthday' =>$birthday
			);
			updatetable('baseprofile', $setarr, $wherearr);
		   $r = $r + 1;
		}else{
		   //$sql = "insert into ".tname('baseprofile')."(collegeid,longid,realname,identifier_not_use,sex,birthday,ethnic,sourcearea,academy,major,startyear,usertype) values('$item[10]','$item[14]','$item[1]','$item[2]','$item[5]','$item[3]','$item[4]','$item[15]','$item[7]','$item[9]',$item[11],'$item[16]')";
		   //$query = $_SGLOBAL['db']->query("insert into ".tname('baseprofile')."(collegeid,longid,realname,identifier_not_use,sex,birthday,ethnic,sourcearea,academy,major,startyear,usertype) values('$item[10]','$item[14]','$item[1]','$item[2]','$item[5]','$item[3]','$item[4]','$item[15]','$item[7]','$item[9]',$item[11],'$item[16]')");
			$arr = array(
			"collegeid" => $item[0],
			'longid' => $item[14],
			'realname' => $item[1], 
			'identifier_not_use' => $item[2],
			'sex' => $item[5],
			'birthday' => $birthday,
			'ethnic' => $item[4],
			'sourcearea' => $item[12],
			'academy' => $item[7],
			'major' => $item[9],
			'startyear' => $startyear,
			'usertype'=>$item[16],
			);
			inserttable('baseprofile', $arr,1);
		    $m = $m + 1;
			}
		}
	//$b = date('Ymd',strtotime($item[1]));
	}
}
    $endtime = time();//date('H:i:s');
	//提升效率~(先放着~)
	$time = $endtime - $starttime;
	$number = $n + $m + $r;
	$str ="newstuSync操作时间:".$data.","."操作耗时:".$time.","."获得数据条数:".$num.","."操作条数:".$number."\r\n";
	
	$k=fopen(S_ROOT."/data/log/newstusync_log.txt","a+");//此处用a+，读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之
	fwrite($k,$str);
	fclose($k);
	

    	
	
	
	
?>
