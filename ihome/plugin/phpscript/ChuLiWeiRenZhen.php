<?php

//该文件放在plugin/phpscript下运行
//先在65上测试吧,或者本地

include_once('../../common.php');


// if($_SGLOBAL['supe_uid'] !=144)
// 	{
// 		exit('fail');
// 	}

$query = $_SGLOBAL['db']->query("SELECT uid,username FROM ".tname('space')." WHERE namestatus=0 limit 2000");	
while($value = $_SGLOBAL['db']->fetch_array($query)){

	$uuid=$value['uid'];
	$uusername=$value['username'];
	echo "$uuid"."<br />"."$uusername"."<br/>";
	//exit('aa');
	//由于查询出来的uid在spacefield并没有,无法反查.目前只能通过username来反查,其他待定.
	$bp = $_SGLOBAL['db']->query("SELECT realname FROM ".tname('baseprofile')." WHERE collegeid = '".$uusername."'  LIMIT 1 ");
	//exit('s');
	//print_r($bp);
	$realname = $_SGLOBAL['db']->result($bp);
	//exit('a');
	if($realname) {

		//更新space数据表，namestatus =1;
		$space = array('namestatus' => 1, 'name' => $realname);
		updatetable('space', $space, array('uid' => $uuid));

		//更新baseprofile，isactive = 1，并且写入uid！依据什么写入呢？
		$bp = array('uid' => $value[uid], 'isactive' => 1);
		updatetable('baseprofile', $bp, array('collegeid'=> $uusername));

		//显示OK
		print("$value[uid]".'is Ok!');
		print("<br/>");

		}
	else {
		echo "$uuid is fail";
		echo "<br />";
	}
}

echo "that is all";

?>
