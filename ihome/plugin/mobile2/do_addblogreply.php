<?php
/*
     addblogreply.php评论一篇日志
     Add by am@ihome.2012-10-17  10:34

*/
    //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
	//@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');
	
	$Message =empty($_POST['message'])?'':getstr($_POST['message']);
	$BlogId =empty($_POST['blogid'])?0:intval($_POST['blogid']);
	$Message .= ' ';
	
	/*$userid = 18;
	$username = 'seen';
	$Message = '88888';
	$BlogId = 89;
	$_SGLOBAL['supe_uid'] = $userid;
	$_SGLOBAL['supe_username'] = $username;*/
	
	getmember();
	$wheresql = "b.blogid=$BlogId";
	$query = $_SGLOBAL['db']->query("SELECT bf.target_ids, b.uid,b.friend,b.noreply,b.subject FROM ".tname('blog')." b left join ".tname('blogfield')." bf  on b.blogid=bf.blogid where  ".$wheresql);
	$blog = $_SGLOBAL['db']->fetch_array($query);
	if((!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids']))||$blog['noreply']==1) {
		$arrs = array('flag'=>'no_privilege');
	}else{
		
		//处理评论的@功能 Add by xuxing 2012-12-6 start
		//提取AT用户
		preg_match_all("/[@](.*)[(]([\d]+)[)]\s/U",$Message, $matches, PREG_SET_ORDER);

		foreach($matches as $value){

			$TmpString = $value[0]; 
			$TmpName = $value[1]; 
			$UserId = $value[2];

			$result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");

			if($rs = $_SGLOBAL['db']->fetch_array($result)){
				$realname = $rs['name'];
				if(empty($realname)){
					$realname = $rs['username'];
				}

				//调用检查函数将@后的内容进行验证，为UID对应的姓名相同则返回@与姓名，不相同则继续判断下一个@，没有找到匹配的最终将返回false
				$ValidValue = getAtName($TmpString, $TmpName, $realname);
				$ValidValue = trim($ValidValue);
				$at_friend= "space.php?uid=".$UserId;

				if($ValidValue != false){
					$Message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $Message);
					$UserIds[] = $UserId;

				}
			}
		}	
		//Add by xuxing 2012-10-1 end
		
		$arr = array(
			'id' => intval($BlogId),
			'uid' => intval($userid), 
			'idtype' => 'blogid',
			'message' => getstr($Message, 5000, 1, 1, 1),
			'authorid' => intval($userid), 
			'author' => getstr($username, 15, 1, 1, 1),
			'ip' => '',
			'dateline' => $_SGLOBAL['timestamp'],
			'magicflicker' => 0
		);
	
		$commentid = inserttable('comment', $arr,1);
	
		if($commentid){
			$arrs = array('flag'=>'success');
			//更新统计数据
			$_SGLOBAL['db']->query("UPDATE ".tname('blog')."
				SET replynum=replynum+1
				WHERE blogid='$BlogId'");
			//统计
			updatestat('blogcomment');
			
			$n_url = "space.php?uid=$blog[uid]&do=blog&id=$BlogId&cid=$commentid";

			if($blog['uid'] != $userid) {
				$note_type = 'blogcomment';
				$note = cplang('note_blog_comment', array($n_url, $blog['subject']));
				notification_add($blog['uid'], $note_type, $note);
			}
			
			if($UserIds){
				$note = cplang('note_comment_at', array($n_url));
				foreach($UserIds as $uid){
					notification_add($uid, 'atyou', $note);
				}
			}
		}else{
			$arrs = array('flag'=>'fail');
		}
	}
	   	$result = json_encode($arrs);
	   	$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();	
?>