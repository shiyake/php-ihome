<?php require_once("../IAuthForceLogin.php");header("Cache-Control:no-cache");
//$R=intval($_SGLOBAL['member']['groupid']);
//if (!(($R==1) ||($R==2)||($R==7))) die('权限不够');
if ($uid==5633) $DEBUGER=1;
else $DEBUGER=0;
?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>iAuth应用错误日志</title></head><body>
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

<table border='1'>
    <tr>
    <td colspan='6' bgcolor='#f0f0ff'><p><b>iAuth错误信息</b></p></td>
    </tr>
    <tr>
    <th>ID</th>
    <th>time</th>
    <th>ip</th>
    <th>app_id</th>
    <th>message</th>
    <th>detail</th>
<?php if($DEBUGER==1) echo "<th>stack</th>"; ?>
    </tr>

<?php
include_once('../IAuthConfig.php');
$con=mysql_connect(IAUTH_DB_HOST,IAUTH_DB_USER,IAUTH_DB_PASSWD);
if (mysql_errno()) die(' Error '.mysql_errno().': '.mysql_error());
mysql_select_db(IAUTH_DB_DB);
$sql="SELECT error_id, error_appid, error_ip, error_time, error_message, error_detail, error_stack FROM error_log ORDER BY error_id DESC LIMIT 32";
$res=mysql_query($sql);
if ($res==FALSE) { echo mysql_error(); exit();}
while ($row = mysql_fetch_array($res)){
    echo "<tr onmouseover=\"this.style.backgroundColor='#f0f0f0'\" onmouseout=\"this.style.backgroundColor='#ffffff'\">";
    echo "<td><p>" . $row['error_id'] . "</p></td>";
    echo "<td><p>" . $row['error_time'] . "</p></td>";
    echo "<td><p>" . $row['error_ip'] . "</p></td>";
    echo "<td><p>" . $row['error_appid'] . "</p></td>";
    echo "<td><p>" . $row['error_message'] . "</p></td>";
    echo "<td><p>" . $row['error_detail'] . "</p></td>";
    if ($DEBUGER==1) echo "<td>" . base64_decode($row['error_stack']) . "</td>";
    echo "</tr>";
    }

?>
</table>
</body>
</html>
