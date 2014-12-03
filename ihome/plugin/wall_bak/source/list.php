<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By xuxing
	Last Modfile By Ancon
	Last Time : 2012-8-24 10:59:16
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

if(empty($WallId)){
	$Query = $_SGLOBAL['db']->query("select * from ".tname(wall)." where pass > 0 order by starttime desc ");
	while ($Value = $_SGLOBAL['db']->fetch_array($Query)) {
		$Value['picture'] = pic_get($Value['picture'], 0, 0);
		$WallList[] = $Value;
	}
	include_once( template( 'plugin/wall/template/wall_list' ) );
}

else{
	showmessage('出错啦啦啦');
}

?>