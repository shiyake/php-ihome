<?php
if(!defined('iBUAA')) exit('Access Denied');
$_SGLOBAL['network']=Array
	(
	'blog' => Array
		(
		'blogid' => '',
		'uid' => '',
		'hot1' => 3,
		'hot2' => '',
		'viewnum1' => '',
		'viewnum2' => '',
		'replynum1' => '',
		'replynum2' => '',
		'dateline' => '',
		'order' => 'dateline',
		'sc' => 'desc',
		'cache' => 900
		),
	'pic' => Array
		(
		'picid' => '',
		'uid' => '',
		'hot1' => 3,
		'hot2' => '',
		'dateline' => '',
		'order' => 'dateline',
		'sc' => 'desc',
		'cache' => 900
		),
	'thread' => Array
		(
		'tid' => '',
		'uid' => '',
		'hot1' => 3,
		'hot2' => '',
		'viewnum1' => '',
		'viewnum2' => '',
		'replynum1' => '',
		'replynum2' => '',
		'dateline' => '',
		'lastpost' => '',
		'order' => 'dateline',
		'sc' => 'desc',
		'cache' => 300
		),
	'event' => Array
		(
		'eventid' => '',
		'uid' => '',
		'hot1' => '',
		'hot2' => '',
		'membernum1' => '',
		'membernum2' => '',
		'follownum1' => '',
		'follownum2' => '',
		'dateline' => '',
		'order' => 'dateline',
		'sc' => 'desc',
		'cache' => 300
		),
	'poll' => Array
		(
		'pid' => '',
		'uid' => '',
		'hot1' => '',
		'hot2' => '',
		'voternum1' => '',
		'voternum2' => '',
		'replynum1' => '',
		'replynum2' => '',
		'dateline' => '',
		'order' => 'dateline',
		'sc' => 'desc',
		'cache' => 300
		)
	)
?>