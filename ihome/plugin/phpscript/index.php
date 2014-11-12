<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By 
	Last Modfile By 
	Last Time : 
*/

include_once('common.php');
header("Content-Type: text/html; charset=utf-8");

$pid = $_GET['pid'];
$pattern = $_GET['pattern'];
$x = $_GET['x'];
if (!$pid) {
	showmessage('error!');
}
$polluser = $_SGLOBAL['db']->query("SELECT * FROM ".tname('polluser')." WHERE pid = $pid ");
while($poll = $_SGLOBAL['db']->fetch_array($polluser)){
	$opt = $poll['option'];
	$uid = $poll['uid'];
//	echo "$opt";
//	echo "<br />";
	if (preg_match_all("/$pattern/", $opt, $match)) { 
		foreach($match as $co) {
			$c = count($co);
		}
		if ($c <$x) {
//			echo "$uid";
//			echo "$_SN[$uid]";
//			$realname = $_SGLOBAL['db']->result("SELECT name FROM ".tname('space')." WHERE uid = $uid ");
			$user = $_SGLOBAL['db']->query("select name from ".tname(space)." WHERE uid = $uid LIMIT 1 ");
			$realname = $_SGLOBAL['db']->result($user);
			echo ("$realname");
			echo "<br />";
//			print_r($match);
//			echo "匹配 $c 次";
//			echo "<br />";
		}
	}
}

echo ('OK!');

?>