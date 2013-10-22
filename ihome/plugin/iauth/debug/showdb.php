<?php
include_once('../IAuthForceLogin.php');
echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>iDB_local</title></head><body>";
$R=intval($_SGLOBAL['member']['groupid']);
if (!(($R==1) ||($R==2)||($R==7))) die('权限不够');
include_once('../IAuthConfig.php');
if (empty($_GET['appid'])) die('缺少appid');
$key=$_GET['appid'];
if (! preg_match("/^[a-zA-Z0-9]{16}$/",$key)) die('非法的app_key');
$con=mysql_connect(IAUTH_DB_HOST,IAUTH_DB_USER,IAUTH_DB_PASSWD);
if (mysql_errno()) die(' Error '.mysql_errno().': '.mysql_error());
mysql_select_db(IAUTH_DB_DB);

/* echo ' */
/*     <table border='1'> */
/*       <tr> */
/*         <th>app_key</th> */
/* 	<th>app_secret</th> */
/*         <th>app_name</th> */
/*         <th>call_back</th> */
/*        <th>app_login_url</th> */
/*        <th>app_uid</th> */
/*        <th>app_ren</th> */
/*        <th>app_email</th> */
/*        <th>app_logo</th> */
/*        <th>app_des</th> */
/*       </tr>'; */
/*     $sql="SELECT * FROM app_info WHERE app_id='$key' "; */
/* $res=mysql_query($sql); */
/* echo mysql_error(); */
/* while ($row = mysql_fetch_array($res)) */
/*     { */
/*     echo "<tr>"; */
/*     echo "<td>" . $row['app_id'] . "</td>"; */
/*     echo "<td>" . $row['app_key'] . "</td>"; */
/*     echo "<td>" . $row['status'] . "</td>"; */
/*     echo "<td>" . $row['app_type'] . "</td>"; */
/*     echo "<td>" . $row['app_secret'] . "</td>"; */
/*     echo "<td>" . $row['app_name'] . "</td>"; */
/*     echo "<td>" . $row['call_back'] . "</td>"; */
/*     echo "<td>" . $row['login_url'] . "</td>"; */
/*     echo "</tr>"; */
/* 	} */
$res=mysql_fetch_array(mysql_query("SELECT count(user_id) FROM auth_token WHERE app_id='$key'"));
$w = $res[0];
echo "
    <table border='1'>
      <tr>
        <th>user_id</th>
        <th>faile_t</th>
        <th>create_t</th>
	<th>rights</th>
        <th>access_token($w)</th>
        <th>access_secret</th>
      </tr>
";
   $res=mysql_query("SELECT * FROM auth_token WHERE app_id='$key' ORDER BY create_t");
echo mysql_error();
   while ($row = mysql_fetch_array($res))
   {
   echo "<tr>";
   echo "<td>" . $row['user_id'] . "</td>";
   echo "<td>" . $row['faile_t'] . "</td>";
   echo "<td>" . $row['create_t'] . "</td>";
   echo "<td>" . $row['rights'] . "</td>";
   echo "<td>" . $row['access_token'] . "</td>";
   echo "<td>" . $row['access_secret'] . "</td>";
   echo "<td>" . '<a href="auth.php?appid='.$key.'&uid='.$row['user_id'].'&op=rm">移除授权</a>'. "</td>";
   echo "</tr>";
   }

$res=mysql_fetch_array(mysql_query("SELECT count(target_id) FROM request_nonce WHERE client_id='$key'"));
$w = $res[0];
echo "
  <table border='1'>
      <tr>
	<th>tid</th>
	<th>ip</th>
	<th>content</th>
	<th>rtype</th>
	<th>status</th>
        <th>nonce($w)</th>
        <th>state</th>
        <th>____create_time____</th>
        <th>_____faile_time_____</th>
      </tr>";

$sql="SELECT * FROM request_nonce WHERE client_id='$key' ORDER BY create_t DESC";
$res=mysql_query($sql);
echo mysql_error();
while ($row = mysql_fetch_array($res)) {
    echo "<tr>";
    /* echo "<td>" . $row['client_id'] . "</td>"; */
    echo "<td>" . $row['target_id'] . "</td>";
    echo "<td>" . $row['ip'] . "</td>";
    echo "<td>" . $row['content'] . "</td>";
    echo "<td>" . $row['rtype'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $row['nonce'] . "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['create_t'] . "</td>";
    echo "<td>" . $row['faile_t'] . "</td>";
    echo "</tr>";
    }
mysql_close($con);
/* $errors=fopen("/var/log/httpd/error_log","r"); */
/* if ($errors==false) die('get file failed'); */
/* fseek($errors,-400,SEEK_END); */
/* while(!feof($errors)){ */
/*     $line=fgets($errors); */
/*     echo '<p>' . $line . '</p>'; */
/*     } */
/* fclose($errors); */
?>
</body></html>
