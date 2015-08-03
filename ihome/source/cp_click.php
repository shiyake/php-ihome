<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$clickid = empty($_GET['clickid'])?0:intval($_GET['clickid']);
$idtype = empty($_GET['idtype'])?'':trim($_GET['idtype']);
$id = empty($_GET['id'])?0:intval($_GET['id']);

//点击器
include_once(S_ROOT.'./data/data_click.php');
if ($_GET['op'] == 'del')	{
	$uid = $_SGLOBAL['supe_uid'];
	$id = $_GET['id'];
	$idtype = $_GET['idtype'];
	$clickid = $_GET['clickid'];
	$query = $_SGLOBAL['db'] -> query("SELECT * FROM ".tname("clickuser")." WHERE uid=$uid and clickid=$clickid and idtype='$idtype' and id=$id");
	
	if($_SGLOBAL['db']->fetch_array($query))	{
		$_SGLOBAL['db'] -> query("DELETE FROM ".tname("clickuser")." WHERE uid=$uid and clickid=$clickid and idtype='$idtype' and id=$id");
		if(!strcmp($idtype,"blogid"))	{
            $_SGLOBAL['db'] -> query("UPDATE ".tname("blog")." SET click_$clickid = click_$clickid - 1 WHERE blogid=$id ");
            if($clickid == 4){
                $_SGLOBAL['db'] -> query("UPDATE ".tname("feed")." SET upvotes = upvotes - 1 WHERE idtype='$idtype' AND id=$id ");
                $query=$_SGLOBAL['db']->query("SELECT * from ".tname('feed')."  WHERE id='$id' AND idtype='blogid'");
                $value_del=$_SGLOBAL['db']->fetch_array($query);
                $upvoters=$value_del['upvoters'];
                $pattern = '/'.$uid.',/i';
                $upvoters = preg_replace($pattern, '', $upvoters, 1);
                $_SGLOBAL['db'] -> query("UPDATE ".tname('feed')." SET upvoters='".$upvoters."' WHERE id='$id' AND idtype='blogid'");
            }
		}
		else if(!strcmp($idtype,"picid"))	{
			$_SGLOBAL['db'] -> query("UPDATE ".tname("pic")." SET click_$clickid = click_$clickid - 1 WHERE picid=$id ");	
		}
		else if(!strcmp($idtype,"tid"))	{
			$_SGLOBAL['db'] -> query("UPDATE ".tname("thread")." SET click_$clickid = click_$clickid - 1 WHERE tid=$id ");	
		}
		else if(!strcmp($idtype,"arrangementid")){
			$_SGLOBAL['db'] -> query("UPDATE ".tname("arrangement")." SET click_$clickid = click_$clickid - 1 WHERE arrangementid=$id ");	
		}
	}
	return ;
}
$clicks = empty($_SGLOBAL['click'][$idtype])?array():$_SGLOBAL['click'][$idtype];
$click = $clicks[$clickid];

if(empty($click)) {
	showmessage('click_error');
}

//信息
switch ($idtype) {
	case 'picid':
		$sql = "SELECT p.*, s.username, a.friend, pf.hotuser FROM ".tname('pic')." p
			LEFT JOIN ".tname('picfield')." pf ON pf.picid=p.picid
			LEFT JOIN ".tname('album')." a ON a.albumid=p.albumid
			LEFT JOIN ".tname('space')." s ON s.uid=p.uid
			WHERE p.picid='$id'";
		$tablename = tname('pic');
		break;
	case 'tid':
		$sql = "SELECT t.*, p.hotuser FROM ".tname('thread')." t
			LEFT JOIN ".tname('post')." p ON p.tid='$id' AND p.isthread='1'
			WHERE t.tid='$id'";
		$tablename = tname('thread');
        break;
    case 'arrangementid':
        $sql = "SELECT * from ".tname('arrangement')." where arrangementid='$id'";
        $tablename = tname('arrangement');
        break;
	default:
		$idtype = 'blogid';
		$sql = "SELECT b.*, bf.hotuser FROM ".tname('blog')." b
			LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
			WHERE b.blogid='$id'";
		$tablename = tname('blog');
		break;
}
$query = $_SGLOBAL['db']->query($sql);
if(!$item = $_SGLOBAL['db']->fetch_array($query)) {
	showmessage('click_item_error');
}

$hash = md5($item['uid']."\t".$item['dateline']);

if($_GET['op'] == 'add') {
	
	if(!checkperm('allowclick') || $_GET['hash'] != $hash) {
		showmessage('no_privilege');
	}
	
	if($item['uid'] == $_SGLOBAL['supe_uid']) {
		showmessage('click_no_self',$_SGLOBAL['refer']);
	}
	
	//黑名单
	if(isblacklist($item['uid'])) {
		showmessage('is_blacklist');
	}
	
	//检查是否点击过了
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('clickuser')." WHERE uid='$space[uid]' AND id='$id' AND idtype='$idtype'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('click_have',$_SGLOBAL['refer']);
	}
	
	//参与
	$setarr = array(
		'uid' => $space['uid'],
		'username' => $_SGLOBAL['supe_username'],
		'id' => $id,
		'idtype' => $idtype,
		'clickid' => $clickid,
		'dateline' => $_SGLOBAL['timestamp']
	);
	inserttable('clickuser', $setarr);
	
	//靠靠+1
    $_SGLOBAL['db']->query("UPDATE $tablename SET click_{$clickid}=click_{$clickid}+1 WHERE $idtype='$id'");
    if($clickid == 4){
        $_SGLOBAL['db']->query("UPDATE ".tname('feed')." feed, $tablename blog 
                                SET feed.upvotes= blog.click_{$clickid}
                                WHERE feed.id='$id' AND feed.idtype='blogid' AND blog.$idtype='$id' AND feed.upvotes < blog.click_{$clickid}");
        $query=$_SGLOBAL['db']->query("SELECT * from ".tname('feed')."  WHERE id='$id' AND idtype='blogid'");
        $value_add = $_SGLOBAL['db']->fetch_array($query);
        $upvoters=$value_add['upvoters'];
        if(!$upvoters)
            $upvoters = ','.intval($_SGLOBAL['supe_uid']).',';
        else
            $upvoters .= intval($_SGLOBAL['supe_uid']).',';
        $_SGLOBAL['db'] -> query("UPDATE  ".tname('feed')." SET upvoters='".$upvoters."' WHERE id='$id' AND idtype='blogid'");
    }
     
    //更新热度
	hot_update($idtype, $id, $item['hotuser']);
	
	//实名
	realname_set($item['uid'], $item['username']);
	realname_get();
		
	//动态
	$fs = array();
	switch ($idtype) {
		case 'blogid':
			$fs['title_template'] = cplang('feed_click_blog');
			$fs['title_data'] = array(
				'touser' => "<a href=\"space.php?uid=$item[uid]\">{$_SN[$item['uid']]}</a>",
				'subject' => "<a href=\"space.php?uid=$item[uid]&do=blog&id=$item[blogid]\">$item[subject]</a>",
				'click' => $click['name']
			);
			$note_type = 'clickblog';
			$q_note = cplang('note_click_blog', array("space.php?uid=$item[uid]&do=blog&id=$item[blogid]", $item['subject']));
			break;
		case 'tid':
			$fs['title_template'] = cplang('feed_click_thread');
			$fs['title_data'] = array(
				'touser' => "<a href=\"space.php?uid=$item[uid]\">{$_SN[$item['uid']]}</a>",
				'subject' => "<a href=\"space.php?uid=$item[uid]&do=thread&id=$item[tid]\">$item[subject]</a>",
				'click' => $click['name']
			);
			$note_type = 'clickthread';
			$q_note = cplang('note_click_thread', array("space.php?uid=$item[uid]&do=thread&id=$item[tid]", $item['subject']));
			break;
		case 'picid':

			$fs['title_template'] = cplang('feed_click_pic');
			$fs['title_data'] = array(
				'touser' => "<a href=\"space.php?uid=$item[uid]\">{$_SN[$item['uid']]}</a>",
				'click' => $click['name']
			);
			$fs['images'] = array(pic_get($item['filepath'], $item['thumb'], $item['remote']));
			$fs['image_links'] = array("space.php?uid=$item[uid]&do=album&picid=$item[picid]");
			$fs['body_general'] = $item['title'];
			$note_type = 'clickpic';
			$q_note = cplang('note_click_pic', array("space.php?uid=$item[uid]&do=album&picid=$item[picid]"));
			break;
	}
	
	//事件发布
	if(empty($item['friend']) && ckprivacy('click', 1)) {
		
		feed_add('click', $fs['title_template'], $fs['title_data'], '', array(), $fs['body_general'],$fs['images'], $fs['image_links']);
	}
	
	//奖励访客
	getreward('click', 1, 0, $idtype.$id);
	
	//统计
	updatestat('click');
	
	//通知
	notification_add($item['uid'], $note_type, $q_note);
	
	showmessage('click_success', $_SGLOBAL['refer']);
	
} elseif ($_GET['op'] == 'show') {
	
	foreach ($clicks as $key => $value) {
		$value['clicknum'] = $item["click_$key"];
		$value['classid'] = mt_rand(1, 4);
		if($value['clicknum'] > $maxclicknum) $maxclicknum = $value['clicknum'];
		$clicks[$key] = $value;
	}
	
	$start = intval($_GET['start']);
	if($start < 0) $start = 0;
	$perpage = 18;
	
	$count = 0;
	$clickuserlist = array();
	
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('clickuser')."
		WHERE id='$id' AND idtype='$idtype'
		ORDER BY dateline DESC
		LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);//实名
		$value['clickname'] = $clicks[$value['clickid']]['name'];
		$clickuserlist[] = $value;
		$count++;
	}
	
	realname_get();
	
	$click_multi = smulti($start, $perpage, $count, "cp.php?ac=click&op=show&clickid=$clickid&idtype=$idtype&id=$id", 'click_div');
} 

include_once(template('cp_click'));

?>
