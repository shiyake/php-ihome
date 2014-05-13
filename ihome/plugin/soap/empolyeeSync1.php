<?php
/*
   同步全校教职工信息(包括博士后)empolyeeSync.php;
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
		'serviceid'=> SOAP_SERV1,
	));
	$coprlist = $all = $leave = $list = array();
	$t = intval($num/1000);
    if($num%1000 != 0)
    {
        $t = $t + 1;
    }
    for($j = 0;$j < $t;$j++)
    
	//echo $j;
	$msg = $client->__call ('getData',array (
			'username' => SOAP_NAME,
			'password' => SOAP_KEY,
			'serviceid'=> SOAP_SERV1,
			'start' =>0,
			'count' =>20,
	));	
print_r($msg);	
	foreach($msg as $item){
	//print_r($item);
	if(strcmp($item[9],'离校')==0){
	 $leavelist[] = "'".$item[0]."'";
	}
	$all[] = "'".$item[0]."'";
	$coprlist[] = array("'".$item[0]."'","'".$item[10]."'");
}	
	//print_r($leave);
	//print_r($all);
	//print_r($coprlist);
	$leave_where = implode(',',$leavelist);
	$q = count($leavelist);
	//echo $q;
	$all_where  = implode(',',$all);
	$query = $_SGLOBAL['db']->query("update ".tname('baseprofile')." set usertype = '校友' where collegeid in ($leave_where) and usertype != '校友'");
    
    //echo "update ".tname('baseprofile')." set usertype = '校友' where collegeid in ($leave_where) and usertype != '校友'";
	$query = $_SGLOBAL['db']->query("SELECT collegeid,academy,usertype FROM  ".tname('baseprofile')."  where collegeid in ($all_where)");
	
    while($value = $_SGLOBAL['db']->fetch_array($query)){
	 	$locallist[] = "'".$value[collegeid]."'";
	}
	//print_r($list);
	//print_r($value[collegeid]);
	$insertlist = array_diff($all,$locallist);
	$changelist = array_diff($all,$insertlist,$leavelist);
	
	//print_r($changelist);
	foreach($msg as $item1){
	   $startyear = date('Y',strtotime($item1[11]));
	   //echo 222;
	   $cid = "'".$item1[0]."'";
	   $aca = "'".$item1[10]."'";
	   if(in_array($cid,$insertlist)){
	   	   $id = $item1[5];
			if(strlen($id)==18){
				$birthday = substr($id,6,8);
			}elseif(strlen($id) == 15){
				$birthday = '19'.substr($id,6,6);
			}
			$arr = array(
			"collegeid" => $item1[0],
			"realname" => $item1[1], 
			"identifier_not_use" => $item1[5],
			"sex" => $item1[3],
			"birthday" => $birthday,
			"ethnic" => $item1[4],
			"sourcearea" => $item1[12],
			"academy" => $item1[10],
			"startyear" => $startyear,
			"usertype"=>$item1[13],
			'defaultemail' => $item1[6],
			'shortemail' => $item1[6]
			);
		$rs = inserttable('baseprofile', $arr,1);
	    $w = $w + 1;
	   }
	    $updateid = array($cid,$aca);
	    if(in_array($cid,$changelist)){
			if(in_array($updateid,$coprlist)){
				continue;
			}else{
				$setsql = array(
				'academy' => $item[10]
				);
				$wherearr = array(
				'collegeid' => $item[0],
				);
				$rs = updatetable('baseprofile', $setsql, $wherearr);
				$p = $p + 1;
			}
		}
	}

    $endtime = time();//date('H:i:s');
	$time = $endtime - $starttime;
	$number = $q + $w +$p;
	$str ="empolyeeSync操作时间:".$data.","."操作耗时:".$time.","."获得数据条数:".$num.","."操作条数:".$number."\r\n";
	
	$k=fopen(S_ROOT."/data/log/empolyeesync_log.txt","a+");//此处用a+，读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之
	fwrite($k,$str);