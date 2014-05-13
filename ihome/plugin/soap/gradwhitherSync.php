<?php
/*
   同步应届毕业签约/就业/升学/出国学生信息
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
			'serviceid'=> SOAP_SERV3,
	));
	//print_r($num);
	
	$t = intval($num/1000);
    if($num%1000 != 0)
    {
        $t = $t + 1;
    }
    for($j = 0;$j < $t;$j++)
    {
    
	$msg = $client->__call ('getData',array (
			'username' => SOAP_NAME,
			'password' => SOAP_KEY,
			'serviceid'=> SOAP_SERV3,
			'start' =>1000*$j,
			'count' =>1000,
	));
	
	//print_r($msg);
	//初始化
	foreach($msg as $item){
	//print_r($item);
	if($item[4]=='101590041'){
	  //echo "update ".tname('baseprofile')." set unit = '$item[5]' where collegeid = '$item[0]'";
		$setarr = array(
		'unit' => $item[5]
		);
		$wherearr = array(
		'collegeid' =>$item[0],
		'startyear' =>$item[1]
		);
		$rs = updatetable('baseprofile', $setarr, $wherearr);
		//print_r($rs);
	  //$query = $_SGLOBAL['db']->query("update ".tname('baseprofile')." set unit = '$item[5]' where collegeid = '$item[0]' and startyear = '$item[1]'");
	  $n =$n + 1;
	}else{
	 // echo "update ".tname('baseprofile')." set unit = '$item[3]' where collegeid = '$item[0]'";
		$setarr = array(
		'unit' => $item[3]
		);
		$wherearr = array(
		'collegeid' =>$item[0],
		'startyear' =>$item[1]
		);
		$rs = updatetable('baseprofile', $setarr, $wherearr);
		//print_r($rs);
	    //$query = $_SGLOBAL['db']->query("update ".tname('baseprofile')." set unit = '$item[3]' where collegeid = '$item[0]' and startyear = '$item[1]'");
 	    $m = $m + 1;
	}
	//$query = $_SGLOBAL['db']->query("select * from ".tname('baseprofile')." where collegeid = '$item[0]'");
    //print_r($item);
	//echo "insert into ".tname('baseprofile')."(collegeid,realname,identifier_not_use,sex,birthday,startyear) values($item[6],'$item[0]',$item[4],'$item[2]',$item[1],$item[9])";
    //$query = $_SGLOBAL['db']->query("insert into ".tname('baseprofile')."(collegeid,realname,identifier_not_use,sex,birthday,startyear) values($item[6],$item[0],$item[4],$item[2],$item[1],$item[9])");
	}
}
    $endtime = time();//date('H:i:s');
	//echo $endtime;
	//提升效率~(先放着~)
	$time = $endtime - $starttime;
	//echo $time;
	$number = $n + $m;
	//echo $number;
	$str ="gradwhitherSync操作时间:".$data.","."操作耗时:".$time.","."获得数据条数:".$num.","."操作条数:".$number."\r\n";
	
	$k=fopen(S_ROOT."/data/log/gradwhithersync_log.txt","a+");//此处用a+，读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之
	fwrite($k,$str);
	fclose($k);

?>
