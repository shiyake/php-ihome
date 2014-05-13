<?php
include_once('../IAuthForceLogin.php');
include_once('../IAuthConfig.php');

echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>iAuth应用授权及数据访问日志</title></head><body>
<style>
td{

padding:2px;
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
line-height:100%;
border-collapse:collapse;
/* width:1024 */
}
p{
padding:2px;
line-height:100%}
.song{
border-color:white;
     }
</style>";
//$R=intval($_SGLOBAL['member']['groupid']);
//if (!(($R==1) ||($R==2)||($R==7))) die('权限不够');

if (empty($_GET['appid'])) die('缺少appid');
$key=$_GET['appid'];
if (! preg_match("/^[a-zA-Z0-9]{16}$/",$key)) die('非法的appid');

$con=mysql_connect(IAUTH_DB_HOST,IAUTH_DB_USER,IAUTH_DB_PASSWD);
if (mysql_errno()) die(' Error '.mysql_errno().': '.mysql_error());
mysql_select_db(IAUTH_DB_DB);

function ManageMask($str){
    global $uid;
    $len=strlen($str);
    if ((5633==$uid) || ($len<4)){ return $str; }
    return substr($str,0,intval($len/2)).'*******';
    }

if ($uid==5633){
    echo '
    <table border="1">
      <tr>
        <th>app_key</th>
        <th>app_secret</th>
        <th>app_name</th>
        <th>call_back</th>
       <th>app_login_url</th>
       <th>app_uid</th>
       <th>app_ren</th>
       <th>app_email</th>
       <th>app_logo</th>
       <th>app_des</th>
      </tr>';
    $sql="SELECT * FROM app_info WHERE app_id='$key' ";
    $res=mysql_query($sql);
    echo mysql_error();
    while ($row = mysql_fetch_array($res))
        {
        echo "<tr onmouseover=\"this.style.backgroundColor='#f0f0f0'\" onmouseout=\"this.style.backgroundColor='#ffffff'\">";
        echo "<td>" . $row['app_id'] . "</td>";
        echo "<td>" . $row['app_key'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['app_type'] . "</td>";
        echo "<td>" . $row['app_secret'] . "</td>";
        echo "<td>" . $row['app_name'] . "</td>";
        echo "<td>" . $row['call_back'] . "</td>";
        echo "<td>" . $row['login_url'] . "</td>";
        echo "</tr>";
        }
    }
$res=mysql_fetch_array(mysql_query("SELECT count(user_id) FROM auth_token WHERE app_id='$key'"));
$w = $res[0];
?>
<script>
    state=0;
    function toggole(){
        if (state==0){
            document.getElementById('user').style.display='block';
            state=1;
        }else{
            document.getElementById('user').style.display='none';
            state=0;
        }
    }
</script>
<?php
echo "
    <table onclick=\"toggole();\" border='1'>
        <tr><td colspan='6' bgcolor='#f0f0ff'><p><b>已授权的用户信息</b></p></td></tr>
    </table>
    <table id='user' border='1' style='display:none'>
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
   while ($row = mysql_fetch_array($res)){
   echo "<tr onmouseover=\"this.style.backgroundColor='#f0f0f0'\" onmouseout=\"this.style.backgroundColor='#ffffff'\">";
   echo "<td>" . $row['user_id'] . "</td>";
   echo "<td>" . $row['faile_t'] . "</td>";
   echo "<td>" . $row['create_t'] . "</td>";
   echo "<td>" . $row['rights'] . "</td>";
   echo "<td>" . $row['access_token'] . "</td>";
   echo "<td>" . ManageMask($row['access_secret']) . "</td>";
   echo "<td>" . '<a href="auth.php?appid='.$key.'&uid='.$row['user_id'].'&op=rm">移除授权</a>'. "</td>";
   echo "</tr>";
}

$res=mysql_fetch_array(mysql_query("SELECT count(target_id) FROM request_nonce WHERE client_id='$key'"));
$w = $res[0];
echo "</table>
  <table border='1'>
      <tr><td colspan='9' bgcolor='#f0f0ff'><p><b>iAuth授权日志和数据访问日志</b></p></td></tr>
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
$sql="SELECT * FROM request_nonce WHERE client_id='$key' ORDER BY id DESC LIMIT 20";

/*
if ((!empty($_GET['all']))&&($_GET['all']=='all')&&($uid=5633)){
    $sql="SELECT * FROM request_nonce WHERE client_id='$key' ORDER BY id DESC";
    }
*/
if ((!empty($_GET['all']))&&($_GET['all']=='t')&&($uid=5633)){
    $sql="SELECT * FROM request_nonce WHERE client_id='$key' AND create_t>'".date('Y-m-d H:i:s',time()-7200)."' ORDER BY id DESC";
    }
$res=mysql_query($sql);
echo mysql_error();
while ($row = mysql_fetch_array($res)) {
    echo "<tr onmouseover=\"this.style.backgroundColor='#f0f0f0'\" onmouseout=\"this.style.backgroundColor='#ffffff'\">";
    echo "<td><p>" . $row['target_id'] . "</p></td>";
    echo "<td><p>" . $row['ip'] . "</p></td>";
    echo "<td><p>" . $row['content'] . "</p></td>";
    echo "<td><p>" . $row['rtype'] . "</p></td>";
    echo "<td><p>" . $row['status'] . "</p></td>";
    echo "<td><p>" . ManageMask($row['nonce'])."</p></td>";
    echo "<td><p>" . ManageMask($row['state'])."</p></td>";
    echo "<td><p>" . $row['create_t'] . "</p></td>";
    echo "<td><p>" . $row['faile_t'] . "</p></td>";
    echo "</tr>";
    }

mysql_close($con);
?>
</table></body></html>