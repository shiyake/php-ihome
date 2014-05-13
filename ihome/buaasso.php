<?php
/*
	ihome to BT link
*/
include_once('./common.php');

define('aeskeyA','1E968607E47C5BB91E20CE9A5C4CCD81');
define('aeskeyB','B775CA575DAC88D10284EB1DD2A9BA67');
define('aeskeyC','8D22740BD808C227D2BC47E7118A7E20');
define('BTURL','buaabt.cn/');
define('CHKBTURL','ipv4.buaabt.cn/');
/*
	ihome访问BT链接流程
*/
dbconnect();


//如果m=sso & to=buaabt则为用户自ihome访问BT
$m = $_GET['m'];

if($m == 'sso') {
	$to = $_GET['to'];
	if($to == 'buaabt') {
	//绑定发起和正常跳转部分应为已登录用户
		if(!defined('IN_UCHOME')) {
			exit('Access Denied');
		}//确定来自ihome
		if(!$_SGLOBAL['supe_uid']) {
			exit;
		}//确定登录
		$cur_uid = $_SGLOBAL['supe_uid'];//获得用户ID
		$cur_name = $_SGLOBAL['supe_username'];

		//自数据库中查找uid=cur_uid，其sso_name和sso_status,有项目且sso_status=1，标明为正常已绑定跳转
		$query = $_SGLOBAL['db']->query("SELECT sso_name, sso_status, tokentime FROM ".tname('bind')." WHERE uid='$cur_uid'");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			
			$my_ssostatus = $value['sso_status'];
		}else {
			$my_ssostatus = -2;//不存在该表项
		}
	//以下是正常跳转流程
		if($my_ssostatus > 0) {		
			//生成key：20位用户名，通过AES128密钥A加密得到64位16进制大写字母表
			//$my_ssoname = $_SGLOBAL['supe_username'];

			$my_ssoname = $cur_name;
			/*if($value['tokentime'] != '0000-00-00 00:00:00'){
				$my_ssoname = $cur_uid;
			}*/
			/*if(preg_match('|(.*)_iHome$|',$my_ssoname)){
				$my_ssoname = substr($my_ssoname,0,-6);
			}*/
			$sso_name="<@".sprintf("%-20s",$my_ssoname)."@>";	
			$sso_uid = "<@".getRandomChar(10).sprintf("%010u",$cur_uid)."@>";

			$key=M_encode($sso_name,aeskeyA);//用户名加密
			$key1=M_encode($sso_uid,aeskeyC);//UID加密
			//重写URL，向BT请求Token
			$g_t_url = "http://".CHKBTURL."buaasso.aspx?m=gettoken&key=".$key."&key1=".$key1;
			$rc_i = 0;
			$rc_s = 0;
			while($rc_i < 5) {
				if(($fp=fopen($g_t_url,"r"))) {	//无法连接打开文件,重连最多5次
					$rc_s = 1;
					break;
				}
				$rc_i = $rc_i + 1;
			}
			if($rc_s == 0) {
				echo "rs=0";
				exit;
			}
			$c_token = fread($fp,1000);	//读取
			fclose($fp);
			if(strlen($c_token)!=128) {	//长度不符合约定,得到的加密token不合法
				echo $c_token;
				exit;
			}
			//已收到加密token，通过AES128密钥B解密
			$token = M_decode($c_token,aeskeyB);
			//指引跳转
			$g_url = "http://".BTURL."buaasso.aspx?m=login&token=".$token;
			header("Location: ".$g_url ,  false);
		}else

	//以上是正常自ihome跳转流程
	//未找到项目或sso_status=-1表明未绑定或绑定失败
		if($my_ssostatus ==-2  || $my_ssostatus ==-1) {	
			
			//echo"绑定发起"."<br>";
			
			//以下是绑定发起流程
			//生成token1
			$name_time = sprintf("%015d%05d",$cur_uid,rand());
			
			//echo $name_time;
			$token1=M_encode($name_time,"homehomehomehomehomehomehomehome");
			//echo $token1;
			//无此项时插入表项uid=uid token1=token1 sso_status=-1
			
			if($my_ssostatus ==-2){
				 $tokentime = date('Y-m-d H:i:s');
				 $setarr1 = array( 'uid' => $cur_uid,'sso_name'=>NULL,'sso_status'=>-1,'token'=>NULL,'tokentime'=>$tokentime,'tokenstatus'=>-1,'token1'=>NULL);
                
				 $tagspaceid=inserttable('bind',$setarr1,1); 
			}
			
			//"UPDATE bind SET token1 = $token1 WHERE uid=$cur_uid";
			$setarr=array('token1'=> $token1);
            updatetable('bind',$setarr,array('uid'=>$cur_uid));
			$my_ssoname = $cur_uid;
			//生成key：20位用户名，通过AES128密钥A加密得到64位16进制大写字母表
			$l=strlen($my_ssoname);
			if($l<20){
				for($i=0;$i<20-$l;$i++){
					$my_ssoname = ' '.$my_ssoname;
				}
			}else{
				$my_ssoname=substr($my_ssoname,0,20);
			}
			$sso_name = "<@".$my_ssoname."@>";
			$key=M_encode($sso_name,aeskeyA);
			$ctoken=M_encode($token1,aeskeyB);
			
			$g_t_url = "http://".CHKBTURL."buaasso.aspx?m=create&key=".$key."&token=".$ctoken;
			$rc_i = 0;
			$rc_s = 0;
			while($rc_i < 5) {
				if(($fp=fopen($g_t_url,"r"))) {
					$rc_s = 1;
					break;
				}
				$rc_i = $rc_i + 1;
			}
			
			if($rc_s == 0) {
				echo "连接失败";
				exit;
			}
			$c_token = fread($fp,1000);	
			fclose($fp);
			if(strlen($c_token)!=128) {
				echo $c_token."<br>";
				echo "与BT服务器通信出错"."<br>";
				exit;
			}
			$token = M_decode($c_token,aeskeyB);
			$g_url = "http://".BTURL."buaasso.aspx?m=create&token=".$token;
			header("Location: ".$g_url , false);
		}
	}
}else if($m == 'createok'){
	
	$c_key = $_GET['key'];
	$token1 = $_GET['token'];
	$ssoname = M_decode($c_key,aeskeyA);
	$name=substr($ssoname,2,20);
	
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('bind')." WHERE token1='$token1'");
	
	if(!$value = $_SGLOBAL['db']->fetch_array($query)) {
		echo("FAILURE:Token error!");
		exit;
	}else {
		$setarr2=array('sso_name'=>$name,'sso_status'=> 1);
        updatetable('bind',$setarr2,array('token1'=>$token1));		
		echo("OK");
		exit();
	}
} 


?>
