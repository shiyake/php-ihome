<?php

/*
**先取同班同学的uid
**再取同学院同学的uid
**再取老乡
**再取二度好友
**
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$space['friends'] = explode(',', $space['friend']);//把好友做成一个数组
array_push($space['friends'] , $space[uid]);//把自己压进数组

	//同班同学推荐--baseprofile,但是要把baseprofile弄好点.必须写个函数
	//把class,uid 设为索引
	//为什么limit为1呢,因为这个循环取,有点慢
	$query = $_SGLOBAL['db']->query("SELECT class FROM ".tname('baseprofile')." WHERE uid=".$space['uid']." AND class iS NOT NULL LIMIT 1 ");
	if($class = $_SGLOBAL['db']->result($query))
		{	
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('baseprofile')." WHERE	class='$class' AND isactive = 1 LIMIT 50 ");
			while($classmate = $_SGLOBAL['db']->fetch_array($query))
				{
					if (!in_array($classmate[uid], $space['friends']))
						{
							realname_set($classmate[uid]);
							$fdr[$classmate['uid']] = $classmate;
						}
				}
		}

//	if (empty($fdr))
//		{
			//依据spaceinfo来的~
			$query = $_SGLOBAL['db']->query("SELECT class FROM ".tname('spaceinfo')." WHERE uid=".$space['uid']." AND class iS NOT NULL LIMIT 1 ");
			if ($class = $_SGLOBAL['db']->result($query))
				{
					$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spaceinfo')." WHERE class='$class' LIMIT 50 ");
					while($clmsf = $_SGLOBAL['db']->fetch_array($query))
						{
							if (!in_array($clmsf[uid], $space[friends]))
								{
									realname_set($clmsf['uid']);
									$fdr[$clmsf['uid']] = $clmsf;
								}
						}
				}
//		}
	//应该要除去同班同学
//	if(empty($fdr)) {
	$query = $_SGLOBAL['db']->query("SELECT academy FROM ".tname('baseprofile')." WHERE uid=".$space['uid']." AND academy IS NOT NULL LIMIT 1 ");
	if($academy = $_SGLOBAL['db']->result($query))
		{
			$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('baseprofile')." WHERE	academy='$academy' AND isactive = 1 LIMIT 10 ");
			while($academymate = $_SGLOBAL['db']->fetch_array($query))
				{
					if (!in_array($academymate[uid], $space[friends]))
						{
							realname_set($academymate['uid']);
							$fdr[$academymate['uid']] = $academymate;
						}
				}
		}
//	if (empty($fdr))
//		{
			//依据spaceinfo来的~
			$query = $_SGLOBAL['db']->query("SELECT subtitle FROM ".tname('spaceinfo')." WHERE uid=".$space['uid']." AND subtitle iS NOT NULL LIMIT 1 ");
			if ($subtitle = $_SGLOBAL['db']->result($query))
				{
					$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('spaceinfo')." WHERE	subtitle='$subtitle' LIMIT 10 ");
					while($acdsf = $_SGLOBAL['db']->fetch_array($query))
						{
							if (!in_array($acdsf[uid], $space[friends]))
							{
								realname_set($acdsf['uid']);
								$fdr[$acdsf['uid']] = $acdsf;
							}
						}
				}
//		}
//	}
	
	$reclist = $fdr;
	if(is_array($reclist))shuffle($reclist);

?>