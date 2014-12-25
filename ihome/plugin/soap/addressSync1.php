<?php
/*
   融合通讯平台通讯录同步addressSync.php;
*/
/*
	include_once ("config.php");
    include_once('../../common.php'); 
	include_once(S_ROOT.'./source/function_common.php');
    include_once(S_ROOT.'./uc_client/client.php');	
*/

	$server='211.71.14.147';   
	$username='sa';   
	$password='Buaa-unionsms';   
	$database='EnterpriseSMS';   
	echo 111;
	$conn=mssql_connect($server,$username,$password)   
			 or die("Couldn't connect to SQL Server on $server");   
	$db=mssql_select_db($database) or die("Couldn't open database $database");
	print_r($conn);
	print_r($db);

  /*
	$sql = "selece ";
	if (mysql_query($sql))
	  {
	  echo "Database my_db created";
	  }
	else
	  {
	  echo "Error creating database: " . mysql_error();
	  }
*/?>