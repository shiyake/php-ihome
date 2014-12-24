<?php
	/**
		judge_ip用来判断用户的ip地址是否为校内ip,如果是，则返回true,否则返回false
	*/
	include_once('../common.php');
	function judge_ip($client_ip)
	{
		global $_SGLOBAL;
		/*
		$host="211.71.14.65";
		$db="ihome";
		$user="root";
		$password="devihome";
		
		$conn=mysql_pconnect($host,$user,$password) or die("not connected:".mysql_error());
		
		mysql_select_db($db,$conn) or die("can't use $db".mysql_error());*/
		$query="select * from ihome_intranetip";
		//$result=mysql_query($query) or die("invlade query".mysql_error());
		$result=$_SGLOBAL['db']->query($query);
		
		$client_ip_arr=explode(".",$client_ip);
		//将用户字符串型ip地址转换成整型值
		$client_ip_int=(intval(trim($client_ip_arr[0]))<<24)|(intval(trim($client_ip_arr[1]))<<16)|(intval(trim($client_ip_arr[2]))<<8)|(intval(trim($client_ip_arr[3])));
		//echo $client_ip_int."<br>";
		
		while($rows=mysql_fetch_array($result))
		{
			$bit_arr=explode(".",$rows['ip']);
			$bit_mask=$bit_mask=explode(".",$rows['mask']);
			
			$ip=(intval(trim($bit_arr[0]))<<24)|(intval(trim($bit_arr[1]))<<16)|(intval(trim($bit_arr[2]))<<8)|(intval(trim($bit_arr[3])));
			$mask=(intval(trim($bit_mask[0]))<<24)|(intval(trim($bit_mask[1]))<<16)|(intval(trim($bit_mask[2]))<<8)|(intval(trim($bit_mask[3])));
			
			//将用户ip地址和子网掩码按位与后得到结果与子网网段比较。
			if($ip==($mask&$client_ip_int))
				return true;
		}
		
		return false;
	}
	/*
	$ip="192.168.0.1";
	if(judge_ip($ip))
		echo "true";
	else echo "false";*/
	
?>