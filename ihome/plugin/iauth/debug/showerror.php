<?php require_once("../IAuthForceLogin.php");header("Cache-Control:no-cache");
$R=intval($_SGLOBAL['member']['groupid']);
if (!(($R==1) ||($R==2)||($R==7))) die('权限不够');
 ?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>error</title></head><body>
<style>
td{
margin-right:10px;
margin-left:10px;
color:#666666;
border-bottom-width:1px;
border-top-width:1px;
border-left-width:1px;
border-right-width:1px;
border-color:#9eccf6;
border-style:solid;
white-space: nowrap;
}
table{
line-height:120%;
border-collapse:collapse;
/* width:1024 */
}
p{
margin-right:10px;
margin-left:10px;
line-height:120%}
.song{
border-color:white;
     }
</style>

<form action="" method="get">
<b>按条件过滤</b><input type="submit" value="请求" />
<hr />
<table border='0' style="color:white;border-color:white;">
    <tr><td align="right" class="song">IP : </td><td class="song"><input type="text" name="ip" ></td></tr>
    <tr><td align="right" class="song">APP ID : </td><td class="song"><input type="text" name="appid" /></td></tr>
</form>
</table>

<table border='1'>
    <tr>
    <td colspan='5' bgcolor='#f0f0ff'><p><b>iAuth错误信息</b></p></td>
    </tr>
    <tr>
    <th>time</th>
    <th>ip</th>
    <th>app_id</th>
    <th>message</th>
    <th>detail</th>
    <th>stack</th>
    </tr>

<?php
include_once('../IAuthConfig.php');
$con=mysql_connect(IAUTH_DB_HOST,IAUTH_DB_USER,IAUTH_DB_PASSWD);
if (mysql_errno()) die(' Error '.mysql_errno().': '.mysql_error());
mysql_select_db(IAUTH_DB_DB);

/* // echo " */
/*     <tr> */
/*     <td colspan='1'  class="song"><p><b>按条件过滤</b></p></td> */
/*     <td class='song'><input type="submit" value="请求" /></td> */
/*     </tr> */
/* "; */
       /* <th>stack</th> */
if (!empty($_GET['ip'])) $ip=$_GET['ip']; else $ip='';
if (!empty($_GET['appid'])) $appid=$_GET['appid'];else $appid='';

$res = getErrorLog($appid,$ip);
if ($res==FALSE) { echo mysql_error(); exit();}
while ($row = mysql_fetch_array($res)){
    echo "<tr onmouseover=\"this.style.backgroundColor='#f0f0f0'\" onmouseout=\"this.style.backgroundColor='#ffffff'\">";
    echo "<td><p>" . $row['error_time'] . "</p></td>";
    echo "<td><p>" . $row['error_ip'] . "</p></td>";
    echo "<td><p>" . $row['error_appid'] . "</p></td>";
    echo "<td><p>" . $row['error_message'] . "</p></td>";
    echo "<td><p>" . $row['error_detail'] . "</p></td>";
    echo "<td>" . base64_decode($row['error_stack']) . "</td>";
    echo "</tr>";
	}

function getErrorLog( $appid='', $ip='' ){
    if ($_SERVER['QUERY_STRING']=='all'){$where="WHERE 1=1 ";
    }else{
        $where="WHERE error_time >'".date('Y-m-d H:i:s',time()-3600)."' " ;
    }
    if ( (!empty($ip)) && (preg_match('/^(\d+)\.(\d+)\.(\d+)\.(\d+)$/',$ip,$match)!=0)){
	$where .= "AND error_ip='".$ip."' ";
	}
    if ( (!empty($appid)) && (preg_match('/^[0-9a-zA-Z]{16}$/',$appid,$match) != 0)){
	$where .="AND error_appid='".$appid."' ";
	}
    $sql="SELECT error_appid, error_ip, error_time, error_message, error_detail, error_stack FROM error_log $where ORDER BY error_time DESC LIMIT 10";
    return mysql_query($sql);

    }

?>
</table>
