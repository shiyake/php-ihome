<?php
function oauth_app_info(){
    include_once(dirname(__FILE__) . '/config.php');
    $con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
    if (!$con) $con=mysql_error();
    mysql_select_db(OAUTH_DB_DB);
    $sql="SELECT app_key, call_back, app_login_url, app_logo, app_des, app_uid, app_name, app_ren, app_email FROM app_info ;";
    $tmp=mysql_query($sql);
    $ret=array();
    while ($row = mysql_fetch_array($tmp)){
	$ret[]=$row;
	}
    mysql_close($con);
    return $ret;
      }

function NewApp($app_name, $call_back, $app_url, $app_ren, $app_email, $app_des, $app_uid, $app_logo ){
    include_once(dirname(__FILE__) . '/config.php');

    $app_key = sha1(uniqid(rand() . dechex(time()), true) . $app_name . $call_back);
    $app_secret = md5(uniqid(rand() . dechex(time()), true) . $app_name . $call_back);

    $con=mysql_connect(OAUTH_DB_DOMAIN,OAUTH_DB_USER,OAUTH_DB_PASSWD);
    if (!$con) $con=mysql_error();
    mysql_select_db(OAUTH_DB_DB);
    $sql="INSERT INTO app_info
        (app_key  ,  app_secret  ,  call_back , app_name  ,  app_ren , app_email , app_login_url , app_des , app_uid , app_logo) VALUES
        ('$app_key','$app_secret','$call_back','$app_name','$app_ren','$app_email', '$app_url' , '$app_des',$app_uid ,'$app_logo')";
    $tmp=mysql_query($sql);

    if ($tmp==false) return false;
    return true;
    }
?>