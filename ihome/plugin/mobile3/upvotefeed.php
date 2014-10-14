<?php 
/*
说明： 输入为feedid，uid
输出为点赞数（点完）或-1
当是自己的状态或者已经点过，则返回-1
*/
	include_once('do_mobileverify.php');
	
    $feedid = empty($_POST['feedid'])?0:intval($_POST['feedid']);
	if ($feedid) {
		$me = $userid;
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." WHERE feedid=".$feedid.' limit 1');
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$upvotes = intval($value['upvotes']);
			$upvoters = $value['upvoters'];
			if ($value['icon']=='doing' && isComplainOrNot($value['id'],$_SGLOBAL['db'])) {
				echo '-1';
				exit();
			}
			$needle = ','.$me.',';
			if (!$upvoters && $me != $uid) {
				$upvoters = $needle;
				$_SGLOBAL['db']->query("UPDATE ".tname('feed')." SET upvotes=upvotes+1, upvoters='".$upvoters."' WHERE feedid=".$feedid);
				echo '1';
				exit();
			}
			if ($me == $uid || strrpos($upvoters,$needle) !== false) {
				echo '-1';
				exit();
			}
			$upvoters .= $me.',';
			$_SGLOBAL['db']->query("UPDATE ".tname('feed')." SET upvotes=upvotes+1, upvoters='".$upvoters."' WHERE feedid=".$feedid);
			$upvotes += 1;
			echo $upvotes;
			exit();
		}
	} else {
		echo '-1';
		exit();
	}
?>