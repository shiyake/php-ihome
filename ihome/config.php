<?php

function __env($key, $default="") {
	$value = $_ENV[$key];
    return (empty($value)) ? $default : $value;
}

$DEFAULT_HOST = "localhost";
$DEFAULT_USER = "root";
$DEFAULT_PWD = "root";

$host = __env("IHOME_DBHOST", $DEFAULT_HOST);
$user = __env("IHOME_DBUSER", $DEFAULT_USER);
$pwd = __env("IHOME_DBPWD", $DEFAULT_PWD);

$slave_host = __env("IHOME_SLAVE_HOST", $DEFAULT_HOST);
$slave_user = __env("IHOME_SLAVE_USER", $DEFAULT_USER);
$slave_pwd = __env("IHOME_SLAVE_PWD", $DEFAULT_PWD);

$mongo_host = __env("IHOME_MONGO_HOST", $DEFAULT_HOST);
$mongo_user = __env("IHOME_MONGO_USER", $DEFAULT_USER);
$mongo_pwd = __env("IHOME_MONGO_PWD", $DEFAULT_PWD);

$_SC = array();
$_SC['dbhost']  		= $host; //????????ַ
$_SC['dbuser']  		= $user; //?û?
$_SC['dbpw'] 	 		= $pwd; //????
$_SC['dbcharset'] 		= 'utf8'; //?ַ???
$_SC['pconnect'] 		= 0; //?Ƿ?????��??
$_SC['dbname']  		= 'ihome_tsyue'; //???ݿ?
$_SC['tablepre'] 		= 'ihome_'; //????ǰ׺
$_SC['charset'] 		= 'utf-8'; //ҳ???ַ???

$_SC['charset_wap']		= 'utf-8';

$_SC['gzipcompress'] 	= 0; //启用gzip

$_SC['cookiepre'] 		= 'ihome_'; //COOKIE前缀
$_SC['cookiedomain'] 	= ''; //COOKIE作用域
$_SC['cookiepath'] 		= '/'; //COOKIE作用路径

$_SC['attachdir']		= './attachment/';
$_SC['attachurl']		= 'attachment/';
$_SC['siteurl']			= '';
$_SC['tplrefresh']		= 1;

$_SC['founder'] 		= '3'; 
$_SC['allowedittpl']	= 0;
$_SC['search_host'] = 'http://solr.limijiaoyin.com';
define('UC_CONNECT', 'mysql'); 
define('UC_DBHOST', $host);
define('UC_DBUSER', $user); 
define('UC_DBPW', $pwd); 
define('UC_DBNAME', 'ihome');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`ihome`.ihomeuser_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '95Y7z9K754j2ned29ca0B9Bdj5D2V2Q2Ld2ar033fdZbD7nfBdJ1Mfj1UeybW4W7');
define('UC_API', 'http://icenter.limijiaoyin.com');
define('UC_CHARSET', 'utf-8');
define('UC_IP', 'localhost');
define('UC_APPID', '1');
define('UC_PPP', 20);

//slave db config
$_SC['dbrhost']  		= $slave_host; 
$_SC['dbruser']  		= $slave_user; 
$_SC['dbrpw'] 	 		= $slave_pwd; 
$_SC['dbrcharset'] 		= 'utf8'; 
$_SC['rpconnect'] 		= 0; 
$_SC['dbrname']  		= 'ihome'; 

