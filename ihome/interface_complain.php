<?php

# iauth 封装
include_once('./plugin/iauthClient/iauth_verify_forward.php');
$userid = intval(iauth_verify());

include_once('./common.php');
include_once('./source/function_cp.php');
include_once('./config.php');
header("content-type:application/json; charset=UTF-8");
if(!empty($_GET['ac'])){
   $ac = $_GET['ac'];
   $option = array('list', 'detail', 'new', 'reply', 'vote' ); 
   if(in_array($ac, $option)){  # 诉求列表
       $params = GetParams($ac);
       if($ac == 'list')
         echo IHomeServiceGetComplainList($params);
       else if($ac == 'detail')
         echo IHomeServiceGetComplainDetailById($params); 
       else if($ac == 'new')
         echo IHomeServiceCreateComplain($params);
       else if($ac == 'reply')  
         echo IHomeServiceCreateComplainReply($params);
       else # $ac == 'vote'
         IHomeServiceVoteComplainOperation($params);  

   }
   else {
        $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter of ac is out of range.");
        echo json_encode($errorMsg);

   }    
}


function GetParams($ac){
  $params = array();
  if($ac == 'list'){
      if($_GET['keyword']) $params['keyword'] = $_GET['keyword'];
      if($_GET['uid']) $params['uid'] = intval($_GET['uid']);
      if($_GET['department_id']) $params['department_id'] = intval($_GET['department_id']);
      if($_GET['status']) $params['status'] = $_GET['status'];
      if($_GET['page_size']) $params['page_size'] = intval($_GET['page_size']);
      if($_GET['page_num']) $params['page_num'] = intval($_GET['page_num']);
      if($_GET['order']) $params['order'] = $_GET['order'];
      if($_GET['sort']) $params['sort'] = $_GET['sort'];
      if($_GET['device']) $params['device'] = $_GET['device'];
  }
  else if($ac == 'detail'){
  
      if($_GET['id']) $params['id'] = intval($_GET['id']);
  }
  else if ($ac == 'new'){  #

      if($_GET['uid']) $params['uid'] = intval($_GET['uid']);
      if($_POST['message']) $params['content'] = $_POST['message'];
  #   if($_POST['department_id_list']) $params['department_id_list'] = $_POST['department_id_list'];
      if($_GET['device']) $params['device'] = $_GET['device'];
      if($_POST['ip']) $params['ip'] = $_POST['ip'];
  }
  
  else if($ac == 'reply'){
      if($_GET['uid']) $params['uid'] = intval($_GET['uid']);
      if($_GET['complainId']) $params['complainId'] = intval($_GET['complainId']);
      if($_POST['message']) $params['message'] = $_POST['message'];
      if($_POST['ip']) $params['ip'] = $_POST['ip'];
  }
  else { # $ac == 'vote'
      if($_GET['uid']) $params['uid'] = intval($_GET['uid']);
      if($_GET['complainId']) $params['complainId'] = intval($_GET['complainId']);
      if($_GET['reply_id']) $params['reply_id'] = intval($_GET['reply_id']);
      if($_GET['vote']) $params['vote'] = $_GET['vote'];
  }
  return $params;
}

function IHomeServiceGetComplainList($params=NULL){
        global $_SGLOBAL;
        if($params){
              $selectsql ="select a.doid,uid,uname,atuid,atuname,addtime,message,status,times,b.fromdevice,b.ip,b.replynum ";
              $fromsql = ' from '.tname("complain").' as a ' ;
              $wheresql = " where status!=4 "; 
              $ordersql = " order by doid ";
              $limitsql = "";
              if($params['uid'] && intval($params['uid']) > 0){
                  
                  $wheresql .= " and uid = ".intval($params['uid']);  # 没有严格检查$params['uid']是纯数字字符串 '231dwed'能通过检查
              }
              else if($params['uid']){
                    
                    $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter uid  must be a positive integer");
                    return  json_encode($errorMsg);
              }
              if($params['department_id'] && intval($params['department_id']) > 0) $wheresql .= " and a.doid in (select doid from ".tname('complain')." where atuid = ".$params['department_id'].")";  
              else if($params['department_id']){
                  $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter department_id  must be a positive integer");
                  return json_encode($errorMsg);

              }
              if($params['status']){
                  $status = $params['status'];
                  if($status == 'init'){ # 没有任何回复
                     $wheresql .=" and a.doid  in (select doid from ".tname("complain")." where  status=0 and lastopid=0) ";
                  }
                  else if($status == 'reply') $wheresql .=  " and a.doid not in ( select doid  from ".tname('complain')." where status=0 ) and a.doid in (select doid from ".tname('complain')." where status=1)";
                  else if($status == 'reset') $wheresql .= " and a.doid in (select  doid from ".tname("complain")." where status=0 and lastopid!=0) and a.doid not in (select doid from ".tname("complain")." where status=0 and lastopid=0 ) ";
                  else if($status == 'close') $wheresql .= " and a.doid not in (select  doid from ".tname("complain")." where status=1 or status=0 ) ";
                  else{
                    $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter status is out of range.");
                    return json_encode($errorMsg);

                  }
              }
              if($params['device']){
                 $device = $params['device'];
                 if($device == 'web' || $device == 'mobile' || $device == 'wechat'){
                    $wheresql .= " and b.fromdevice= '".$device."'";
                 }
                 else {
                      $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter status is out of range.");
                      return json_encode($errorMsg);

                 } 
              }
              if($params['keyword']){
                 $wheresql .= " and message like '%".$params['keyword']."%' ";
              }

              if($params['sort']){
                  $sort = $params['sort'];
                  if($sort == 'time'){
                      $fromsql .= ' inner join ( select doid,replynum,fromdevice,ip from '.tname('doing').' ) as b on  a.doid = b.doid ';
                      $ordersql = " order by addtime,doid ";  
                  } 
                  else if($sort == 'replycount'){
                      $fromsql .= ' inner join ( select doid,replynum,fromdevice,ip  from '.tname('doing').' ) as b on  a.doid = b.doid ';
                      $ordersql = ' order by b.replynum,doid ';
                  }
                  else if($sort == 'hot'){//5天内的回复数量判断。
                      $fromsql .= ' inner join ( select doid,replynum,fromdevice,ip  from '.tname('doing').' where unix_timestamp(now())-dateline < 432000 ) as b on  a.doid = b.doid ';
                      $ordersql = ' order by b.replynum '; 
                  }
                  else {
                      $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter sort is out of range.");
                      return json_encode($errorMsg);
                  
                  }
                  if($params['order']){
                     $order =  $params['order'] ;
                     if($order == 'asc' || $order == 'desc'){
                        $ordersql .= $order;
                     }
                     else {
                         $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter order is out of range.");
                         return json_encode($errorMsg);
                     }
                  }
              }
             else $fromsql .= ' inner join ( select doid,replynum,fromdevice,ip  from '.tname('doing').' ) as b on  a.doid = b.doid ';
              # 添加limit
              if($params['page_num']){
                 if($params['page_size']){
                     $page_num = $params['page_num'];
                     $page_size = $params['page_size'];
                     if($page_num && intval($page_num) > 0) $page_num = intval($page_num);
                     else {
                        $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter page_num must be a positive integer.");
                        return json_encode($errorMsg);

                     }
                     if($page_size && intval($page_size) > 0 ) $page_size =intval($page_size);
                     else {
                        $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter page_size must be a positive integer.");
                        return json_encode($errorMsg);
                      
                     }
                     $limitsql .=' limit '.($page_num-1)*$page_size.','.$page_size.' ';
                        
                 }
                 else{
                     $errorMsg = array("errorNo"=>"4001", "content"=>"lack the neccessary parameter.There is a parameter page_num but no page_size");
                     return json_encode($errorMsg);
                 }
              }
              else {
                 if($params['page_size']){
                    $page_size = $params['page_size'];
                    if($page_size && intval($page_size) > 0 ) $page_size =intval($page_size);
                    else{
                       $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter page_size must be a positive integer.");
                       return json_encode($errorMsg);
                    }
                    $limitsql .=' limit '.$page_size.' ';
                 }
              }
              $querysql = $selectsql.$fromsql.$wheresql.$ordersql.$limitsql;
              $query = $_SGLOBAL['db']->query($querysql); 
              $lastdoid = -1;
              $results = array();
              while($row = $_SGLOBAL['db']->fetch_array($query)){
                  if($lastdoid == $row['doid']){
                      $results[count($results)-1]['department_list'][intval($row['atuid'])] = $row['atuname'];
                      continue;
                  }
                  else $lastdoid = $row['doid'];
                  $res = array();
                  $res['id'] = intval($row['doid']);
                  $res['uid'] = intval($row['uid']);
                  $res['uname'] = $row['uname'];
                  $res['content'] = $row['message'];
                  $res['level'] = intval($row['times']);
                  $res['ip'] = $row['ip'];
                  $res['reply_count'] = intval($row['replynum']);
                  $res['device'] = $row['fromdevice'];
                  $res['department_list'] = array(intval($row['atuid'])=>$row['atuname']);
                  if($params['status']) $res['status'] = $params['status'];
                  else{
                      $sql = "select doid from ".tname('complain')." where doid=".$res['id']."  and doid in (select doid from ".tname("complain")." where status=0 and lastopid=0)";
                      $subquery = $_SGLOBAL['db']->query($sql);
                      if($_SGLOBAL['db']->num_rows($subquery) > 0) $res['status'] = 'init';
                      else{
                          $sql = "select doid from ".tname('complain')." where doid=".$res['id']." and doid not in (select doid from ".tname('complain')." where status=0) and doid in (select doid from ".tname('complain')." where status=1)";
                          $subquery = $_SGLOBAL['db']->query($sql);
                          if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'reply';
                          else{
                              $sql = "select doid from ".tname('complain')." where doid=".$res['id']." and doid  not in ( select doid from ".tname('complain')." where status=1 or status=0 ) and doid=".$res['id'];
                              $subquery = $_SGLOBAL['db']->query($sql);
                              if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'close';
                              else{
                                  $sql = "select doid from ".tname('complain')." where doid =".$res['id']." and doid in (select doid from ".tname('complain')." where status=0 and lastopid!=0 ) and doid not in (select doid from ".tname('complain')." where status=0 and lastopid=0 )";
                                  $subquery = $_SGLOBAL['db']->query($sql);
                                  if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'reset';
                                  else $res['status'] = 'unknown';
                              }
                          }
                      }
                  }
                  $results[] = $res;
              }
              if($results) return  json_encode($results);
              else return json_encode(array());
        }
        else{
            $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct.the parameter is empty.");
            return json_encode($errorMsg);    
        }
}
function IHomeServiceGetComplainDetailById($params=NULL){
    if($params){
        global $_SGLOBAL;
        $doid = $params['id']; # 诉求id
        if($doid > 0){
            $querysql = "select a.doid,uid,uname,atuid,atuname,addtime,message,status,times,b.fromdevice,b.ip,b.replynum from ".tname("complain").' as a inner join (select doid,fromdevice,ip,replynum from '.tname('doing').' where doid='.$doid.' ) as b on a.doid=b.doid where  id>0 and uid>0  and status!=4';
            $query = $_SGLOBAL['db']->query($querysql);
            if($_SGLOBAL['db']->num_rows($query) > 0){
                $lastdoid = -1;
                $res = array();
                 $res['operation_list'] = array();
                 $res['reply_list'] = array();
                while( $row = $_SGLOBAL['db']->fetch_array($query)){
                    if($lastdoid == $row['doid']){
                         $res['department_list'][$row['atuid']] = $row['atuname'];
                         continue;
                      }
                    else $lastdoid = $row['doid'];
                    $op = array(
                        'id' => 0,
                        'uid' => intval($row['uid']),
                        'uname' => $row['uname'],
                        'timestamp' =>  intval($row['addtime']),
                        'opetation' => 'init'
                    );
                    $res['operation_list'][$op['id']] = $op;
                    $res['id'] = intval($row['doid']);
                    $res['uid'] = intval($row['uid']);
                    $res['uname'] = $row['uname'];
                    $res['content'] = $row['message'];
                    $res['level'] = intval($row['times']);
                    $res['ip'] = $row['ip'];
                    $res['reply_count'] = intval($row['replynum']);
                    $res['device'] = $row['fromdevice'];
                    $res['department_list'] = array($row['atuid']=>$row['atuname']);
                    $res['timestamp'] = intval($row['addtime']);
                    $sql = "select doid from ".tname('complain')." where status=0 and doid= ".$res['id']." and doid not in (select distinct doid from ".tname("complain_op")." where downnum>0) ";
                    $subquery = $_SGLOBAL['db']->query($sql);
                    if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'init';
                    else{
                        $sql = "select doid from ".tname('complain')." where status = 1 and doid=".$res['id'];
                        $subquery = $_SGLOBAL['db']->query($sql);
                        if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'reply';
                        else{
                            $sql = "select doid from ".tname('complain')." where status=2 and doid=".$res['id'];
                            $subquery = $_SGLOBAL['db']->query($sql);
                            if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'close';
                            else{
                                $sql = "select doid from ".tname('complain')." where status= 0 and doid=".$res['id']." and doid  in (select distinct doid from ".tname("complain_op")." where downnum>0)";
                                $subquery = $_SGLOBAL['db']->query($sql);
                                if($_SGLOBAL['db']->num_rows($subquery) > 0)  $res['status'] = 'reset';
                                else $res['status'] = 'unknown';
                                }
                            }
                      }
                     }
                    # reply list
                   $querysql="select * from ".tname('docomment').' where doid='.$doid;
                   $query = $_SGLOBAL['db']->query($querysql);
                   while($row = $_SGLOBAL['db']->fetch_array($query)){
                       $reply = array();
                       $reply['id'] = intval($row['id']);
                       $reply['uid'] = intval($row['uid']);
                       $reply['uname'] = $row['username'];
                       $reply['message'] = $row['message'];
                       $reply['timestamp'] = $row['dateline'];
                       $reply['ip'] = $row['ip'];
                       $reply['operation'] = intval($row['complainopid']);
                       if($reply['operation'] > 0 ){
                           $op =array();
                           $op['id'] = $reply['operation'];
                           $subsql = "select * from ".tname('complain_op').' where id='.$op['id'];
                           $subquery = $_SGLOBAL['db']->query($subsql);
                           if($subrow =  $_SGLOBAL['db']->fetch_array($subquery)){
                               $op['uid'] = intval($subrow['uid']);
                               $op['uname'] = $subrow['username'];
                               $op['timestamp'] = $subrow['dateline'];
                               $optype = intval($subrow['optype']); 
                               if($optype == 5) $op['operation'] = 'reset';
                               else if($optype ==6 ) $op['operation'] = 'close';
                               else if($optype == 2) $op['operation'] = 'reply'; 
                               else if($optype == 3) $op['operation'] = 'relay';
                               $res['operation_list'][$op['id']] = $op; # 添加op到operation_list中 
                           }

                       }
                       $res['reply_list'][$reply['id']] = $reply;
                       
                   }

                   # operation list
                   
                   return json_encode($res);
            }
            else{
                $errorMsg = array("errorNo"=>"404", "content"=>"the complain is not exist or is deleted.");
                return json_encode($errorMsg);
            }

        }  
        else{
          $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct. the id must be a positive interger.");
          return json_encode($errorMsg);
        }
    }
    else{
        $errorMsg = array("errorNo"=>"4001", "content"=>"lack the neccessary parameter complain id.the parameter is empty or the id is not a positive interger.");
        return json_encode($errorMsg);
    }
}
function IHomeServiceCreateComplain($params=NULL){
   global $_SGLOBAL;
   if($params['uid']){
       if($params['uid'] <= 0){
           $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct. the id must be a positive interger.");
           return json_encode($errorMsg);
       }
       else {
           $sql = "select name,username from ".tname('space')." where uid = ".$params['uid'];
           $query = $_SGLOBAL['db']->query($sql);
           if($row = $_SGLOBAL['db']->fetch_array($query)){
               if($row['name'])
                  $params['uname'] = $row['name']; 
               else $params['uname'] = $row['username'];
            }   
           else{
               $errorMsg = array("errorNo"=>"500","content"=>"the uid is not exist");
               return json_encode($errorMsg);
            }
       } 
   }
   else {
       $errorMsg = array("errorNo"=>"4001", "content"=>"lack the neccessary parameter uid.the uid is not exist or the uid is not a positive interger.");
       return json_encode($errorMsg);
   }
   // 忽略department_id_list
   if(!$params['content']){
       $errorMsg = array("errorNo"=>"4001", "content"=>"lack the neccessary parameter message.the message is not exist or the message is empty.");
       return json_encode($errorMsg);
   }
   if($params['device'] && !in_array($params['device'],array('web','wechat','mobile')) ){
       $errorMsg = array("errorNo"=>"4002", "content"=>"the format of parameter is not correct. the parameter device is out of range.");
       return json_encode($errorMsg);
   }
   $UserIds =array();
   $mood = 0;
   $params['status'] = 'init';
   $params['reply_count'] = 0;
   $params['timestamp'] = time();
   $params['department_list'] =array();
   $params['operation_list'] = array();
   $params['reply_list'] = array();
   preg_match("/\[em\:(\d+)\:\]/s", $params['content'], $ms);
   $mood = empty($ms[1])?0:intval($ms[1]);
   $message = rawurldecode(getstr($params['content'], 1000, 1, 1, 1, 2));
   preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);
   # 加上链接
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
           $params['department_list'][intval($UserId)] = $realname;
           $ValidValue = getAtName($TmpString, $TmpName, $realname);
           $ValidValue = trim($ValidValue);
           $at_friend= "space.php?uid=".$UserId;
           if($ValidValue != false){
               $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
               if (!in_array($UserId, $UserIds)) {
                   $UserIds[] = $UserId;
               }
           }
     }
   }
   $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
   $message = preg_replace("/\<br.*?\>/is", ' ', $message);
   $params['content'] = $message;
   $setarr = array(
       'uid' => $params['uid'],
       'username' => $params['uname'],
       'dateline' => $_SGLOBAL['timestamp'],
       'from' => $params['uid'],
       'message' => $message,
       'mood' => $mood,
       'ip' => getonlineip(),
       'fromdevice' => 'web'
       );
   if($params['device']) $setarr['fromdevice'] = $params['device'];
   if($params['ip']) $setarr['ip'] = $params['ip'];
   $newdoid = inserttable('doing', $setarr, 1);
   @include_once(S_ROOT.'./data/data_creditrule.php');
   $isComplain = TRUE;
   /*if($isComplain && ($_SGLOBAL['member']['credit'] < $_SGLOBAL['creditrule']['complain']['credit'])){ # 如果积分不够
       $isComplain = FALSE;
       $note = cplang('note_complain_credit_failed', array("space.php?do=doing&doid=$newdoid"));
       notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
       $complain_msg = 'note_complain_credit_failed';
   }*/ # 这部分可能会出错
   foreach($UserIds as $UserId){
       if($isComplain){
         $UserDept = isDepartment($UserId ,1);
         if($UserDept){
             $nowtime = time();
             $complain = array(
                 'doid' => $newdoid,
                 'uid' => $params['uid'], 
                 'uname' => $params['uname'],
                 'atdepartment' => $UserDept['department'],
                 'atdeptuid' => $UserId,
                 'from' => $params['uid'],
                 'atuid' => $UserId,
                 'atuname' => $UserDept['department'],
                 'isreply' => 0,
                 'addtime' => $nowtime,
                 'dateline' => $nowtime,
                 'expire' => 0,
                 'times' => 1,
                 'issendmsg' =>0,
                 'message' => $message,
                 'datatime' => date("Ymd",$nowtime)
               );
             inserttable('complain', $complain, 0);
             $note = cplang('note_complain_buchu', array("space.php?do=complain_item&doid=$newdoid",date('Y-m-d H:i' ,$nowtime+3600*24)));
             notification_complain_add($UserId, 'complain', $note);
             $complainOK = TRUE;
             }
           else{
               $note = cplang('note_doing_at', array("space.php?do=doing&doid=$newdoid"));
               notification_add($UserId, 'atyou', $note);
           }
        }
      }
       if($complainOK){
           $note = cplang('note_complain_user_success', array("space.php?do=complain_item&doid=$newdoid"));
           notification_complain_add($params['uid'], 'complain', $note);
           $complain_msg = 'note_complain_user_success';
           getreward('complain', 1, $params['uid']);
       }
       if(!$complainOK && $isComplain){
           if ($UserId == '0000') { //系统管理员 虽然并没有什么用 
               $note = cplang( "您好，您的诉求已发送成功。谢谢您对ihome社区的大力支持!", array("space.php?do=doing&doid=$newdoid"));
               notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
           } else {
               $note = cplang('note_complain_user_failed', array("space.php?do=doing&doid=$newdoid"));
               notification_complain_add($_SGLOBAL['supe_uid'], 'complain', $note);
               $complain_msg = 'note_complain_user_failed';
             } 
       }
       
       $feedarr = array(
               'appid' => UC_APPID,
               'icon' => 'doing',
               'uid' => $params['uid'],
               'username' => $params['uname'],
               'dateline' => $_SGLOBAL['timestamp'],
               'title_template' => cplang('feed_doing_title'),
               'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
               'body_template' => '',
               'body_data' => '',
               'id' => $newdoid,
               'idtype' => 'doid',
               'fromdevice' => 'web',
               'ip' => getonlineip(),
           );
       if($params['device']) $feedarr['fromdevice'] = $params['device'];
       if($params['ip']) $feedarr['ip'] = $params['ip'];
       $feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//Ï²ºÃhash
       $feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//ºÏ²¢hash
       $feedid = inserttable('feed', $feedarr, 1);
       updatestat('doing');
       $setarr = array('note'=>$message);
       $reward = getreward('doing', 0);
       updatetable('spacefield', $setarr, array('uid'=>$params['uid']));
       return json_encode($params);
   }
function IHomeServiceCreateComplainReply($params=NULL){
   global $_SGLOBAL;
   $cpid = 0; # complain 表中的 id
   $relay_times =0; 
   if($params['uid'] ){
       if($params['uid']<=0){
           $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter uid must be a positive integer.");
           return json_encode($errorMsg);
         }
       else{
           $query = $_SGLOBAL['db']->query("select name,username  from ".tname('space')." where uid = ".$params['uid'] );
           if($row = $_SGLOBAL['db']->fetch_array($query)){
               if($row['name'])
               $params['uname'] = $row['name']; 
               else $params['uname'] = $row['username'];
           }
           else{
               $errorMsg = array("errorNo"=>"500","content"=>"the uid is not exist");
               return json_encode($errorMsg);
           }
         }
   }
   else {
       $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter.the parameter uid is not exist or is not a positive integer.");
       return json_encode($errorMsg);
   }
   $complain=array();
   if($params['complainId'] ){
       if($params['complainId']<=0){
           $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter complainId must be a positive integer.");
           return json_encode($errorMsg);
       }   
       else{
       $query = $_SGLOBAL['db']->query("select * from ".tname('complain')." where doid = ".$params['complainId']);
           if($complain = $_SGLOBAL['db']->fetch_array($query)){
               if(isblacklist($complain['uid'])) {
                    $errorMsg = array("errorNo"=>"500","content"=>"the user of complain is in blacklist.");
                    return json_encode($errorMsg);
               }  

            }   
           else{
                $errorMsg = array("errorNo"=>"500","content"=>"the complain id is not exist");
                return json_encode($errorMsg);
            }
       }
   }
   else {
       $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter.the parameter complainId is not exist or is not a positive integer.");
       return json_encode($errorMsg);
    }  
   if(!$params['message']){
       $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter message.");
       return json_encode($errorMsg);
   }


   $params['timestamp'] = time();
   $doid = $params['complainId'];
   $message = getstr($params['message'], 480, 1, 1, 1); 
   preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$params['message'], $matches, PREG_SET_ORDER);
   preg_match_all("/回复[@](.*)[(]([\d]+)[)]\s*/U",$params['message'], $reply_matches, PREG_SET_ORDER);
   if($reply_matches) $exclude_relay = 1;  # 如果带有回复字眼，则默认不为relay 
   
   $newid = 0 ; 
   $addtype = 0;
   $query = $_SGLOBAL['db']->query("select * from ".tname('complain')." where doid=".$params['complainId'].' and atuid='.$params['uid']);
   if($row = $_SGLOBAL['db']->fetch_array($query)){ 
       $complain=$row;
       $addtype = 2;
       $cpid = $complain['id'];
       $relay_times = $complain['relay_times'];
   }
   $isrelay = 0;
   if($addtype && $matches && !$exclude_relay ) $isrelay = 1;
   if($isrelay && $relay_times>=3){
       $errorMsg = array("errorNo"=>"500","content"=>"relay times reach the ceiling'.");
       return json_encode($errorMsg);
   }
   $UserIds = array();
   $relay_depid = 0;
   foreach($matches as $value){
       $TmpString = $value[0]; 
       $TmpName = $value[1]; 
       $UserId = $value[2];
       $result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=".$UserId);
       if($rs = $_SGLOBAL['db']->fetch_array($result)){
           $realname = $rs['name'];
           if(empty($realname)){
               $realname = $rs['username'];
           }
           $ValidValue = getAtName($TmpString, $TmpName, $realname);
           $ValidValue = trim($ValidValue);
           $at_friend= "space.php?uid=".$UserId;
           if($ValidValue != false){
               $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
               if (!in_array($UserId, $UserIds)) {
                   $UserIds[] = $UserId;
               }
           }
       }
       if($isrelay){
           $q = $_SGLOBAL['db']->query("select * from ".tname('powerlevel')." where dept_uid = ".$UserId);
           if ($r = $_SGLOBAL['db']->fetch_array($q)) {
                  $relay_depid = $UserId;
            }
       }
   }


   $message = preg_replace("/\[am:(\d+):]/is", "<img src=\"image/face_new/face_1/\\1.gif\" class=\"face\">", $message);
   $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
   $message = preg_replace("/\[bm:(\d+):]/is", "<img src=\"image/face_new/face_2/\\1.gif\" class=\"face\">", $message);
   $message = preg_replace("/\<br.*?\>/is", ' ', $message);
   $params['message'] = $message;
   if(strlen($message) < 1) {
       $errorMsg = array("errorNo"=>"4002","content"=>"the parameter message is too short'.");
       return json_encode($errorMsg);
   }
   if(!$addtype){
       if ($UserIds) {
           $temp = implode(',', $UserIds);
           $_SGLOBAL['db']->query("UPDATE ".tname('complain')." SET locked=0 WHERE doid= ".$params['complainId']." AND uid=".$params['uid']." AND locked AND atuid in ($temp)");
          }   
       $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid=".$params['complainId']);
       $updo = $_SGLOBAL['db']->fetch_array($query);
       $updo['id'] = intval($updo['id']);
       $updo['grade'] = intval($updo['grade']);
       $setarr = array(
           'doid' => $updo['doid'],
           'upid' => $updo['id'],
           'uid' => $params['uid'],
           'username' => $params['uname'],
           'dateline' => $_SGLOBAL['timestamp'],
           'message' => $message,
           'ip' => getonlineip(),
           'grade' => $updo['grade']+1
       );  
       if($params['ip']) $setarr['ip'] = $params['ip'];
       else $params['ip'] = $setarr['ip'];
       if($updo['grade'] >= 3) {
                   $setarr['upid'] = $updo['upid'];
          }   
       $newid = inserttable('docomment', $setarr, 1); 
       $params['id'] = $newid;
       $params['operation'] = 0;
       $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");
           
       $note = cplang('note_complain_reply', array("space.php?do=complain_item&doid=$setarr[doid]"));
           notification_add($userId, 'complain', $note);
       if(empty($UserIds)){ // not @  
           $query = $_SGLOBAL['db']->query("SELECT * FROM ihome_complain where doid=".$updo[doid]);
           $value = $_SGLOBAL['db']->fetch_array($query);
           if($value['from'] == $params['uid']){ //发起方
               notification_add($value['atuid'], 'complain', $note);
           } else{
               notification_add($value['from'], 'complain', $note);
           }
       }
       unset($params['complainId']); 
       return json_encode($params);
   }
   $optype =2;
   if($isrelay ) { $optype = 3; $addtype = 0;}
   $oparr = array(
       'doid' => $params['complainId'],
       'message' => $params['message'],
       'uid' => $params['uid'],
       'username' => $params['uname'],
       'optype' => $optype,
       'dateline' => time(),
       'opvalue' => $relay_depid,
       'finish' => ($addtype == 2 ? 1 : 0)
   );
   $params['operation'] =  $opid = inserttable('complain_op', $oparr, true);
   $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid=".$params['complainId']);
   $updo = $_SGLOBAL['db']->fetch_array($query);
   $updo['id'] = intval($updo['id']);
   $updo['grade'] = intval($updo['grade']);
   $setarr = array(
       'doid' => $updo['doid'],
       'upid' => $updo['id'],
       'uid' => $params['uid'],
       'username' => $params['uname'],
       'dateline' => $_SGLOBAL['timestamp'],
       'message' => $message,
       'ip' => getonlineip(),
       'grade' => $updo['grade']+1,
       'complainBorn' => 1,
       'complainopid' => $opid
   );  
   if($params['ip']) $setarr['ip'] = $params['ip'];
   else $params['ip'] = $setarr['ip'];
   if($updo['grade'] >= 3) {
       $setarr['upid'] = $updo['upid'];
      }   
   $params['id'] = $newid = inserttable('docomment', $setarr, 1); 
   $_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='$updo[doid]'");

   if ($optype == 3) {
       $query = $_SGLOBAL['db']->query("select * from ".tname("space")." where uid = $relay_depid");
       $relay_dep = $_SGLOBAL['db']->fetch_array($query);
       if (empty($relay_dep)) {
           $errorMsg = array("errorNo"=>500,"content"=>"the at user is not exist ");
           return json_encode($errorMsg);
         }
       updatetable('complain', array("status"=>3, 'lastopid'=>$opid), array('id'=>$cpid)); #status = 3 relayed
       $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid= ".$params['complainId']." and atuid=$relay_depid and status != 3");
       $already = $_SGLOBAL['db']->fetch_array($query);
       if (!$already) {
           if ($complain['relayed_by']) {
               $relayed_by = $complain['relayed_by'].$params['uid'].',';
           } else {
               $relayed_by = ','.$params['uid'].',';
         }
       $newComplain = $complain;
       unset($newComplain['id']);
       $newComplain['atdeptuid'] = $relay_depid;
       $newComplain['atuid'] = $relay_depid;
       $newComplain['atuname'] = $relay_dep['name'];
       $newComplain['atdepartment'] = $relay_dep['name'];
       $newComplain['dateline'] = $_SGLOBAL['timestamp'];
       $newComplain['times'] = 1;
       $newComplain['issendmsg'] = 0;
       $newComplain['relay_times'] = $complain['relay_times']+1;
       $newComplain['relayed_by'] = $relayed_by;
       $newComplainId = inserttable('complain', $newComplain, 1);
       if ($complain['lastopid'] == 0) {
           $result = $_SGLOBAL['db']->query("select * from ".tname('complain_dep')." where uid = ".$params['uid']);
           $dep = $_SGLOBAL['db']->fetch_array($result);
           if (empty($dep)) {
               $arr = array();
               $arr['uid'] = $params['uid'];
               $arr['username'] = $params['uname'];
               $arr['upnum'] = 0;
               $arr['downnum'] = 0;
               $arr['allreplynum'] = 1;
               $arr['allreplysecs'] = $_SGLOBAL['timestamp'] - $complain['dateline'];
               $arr['score'] = 0;
               $arr['aversecs'] = 0;
               $arr['lastupdate'] = 0;
               inserttable('complain_dep', $arr);
           } else {
               $arr['allreplynum'] = $dep['allreplynum'] + 1;
               $arr['allreplysecs'] = $dep['allreplysecs'] + $_SGLOBAL['timestamp'] - $complain['dateline'];
               updatetable("complain_dep", $arr, array('uid'=>$params['uid']));
             }
              }
       $note = cplang('complain_relay', array($complain['atuname'], "space.php?do=complain_item&doid=$complain[doid]"));
       notification_complain_add($relay_depid, 'complain', $note);
       }
       inserttable('complain_resp',array('uid'=>$params['uid'],'doid'=>$doid,'opid'=>$opid,'replysecs'=>$_SGLOBAL['timestamp'] - $complain['dateline'], 'dateline'=>$_SGLOBAL['timestamp']));
   }
   else if($optype == 2){
       if ($addtype == 2) {
           updatetable('complain', array('status'=>1, 'lastopid'=>$opid, 'replytime'=>$_SGLOBAL['timestamp'], 'dateline'=>$_SGLOBAL['timestamp']), array('id'=>$cpid));
       } else {
           updatetable('complain', array('locked'=>1, 'replytime'=>$_SGLOBAL['timestamp'], 'dateline'=>$_SGLOBAL['timestamp']), array('id'=>$cpid));
        }
       if ($complain['lastopid'] == 0) {
           $result = $_SGLOBAL['db']->query("select * from ".tname('complain_dep')." where uid =".$params['uid']);
           $dep = $_SGLOBAL['db']->fetch_array($result);
           if (empty($dep)) {
               $arr = array();
               $arr['uid'] = $params['uid'];
               $arr['username'] = $params['uname'];
               $arr['upnum'] = 0;
               $arr['downnum'] = 0;
               $arr['allreplynum'] = 1;
               $arr['allreplysecs'] = $_SGLOBAL['timestamp'] - $complain['dateline'];
               $arr['score'] = 0;
               $arr['aversecs'] = 0;
               $arr['lastupdate'] = 0;
               inserttable('complain_dep', $arr);
           } else {
               $arr['allreplynum'] = $dep['allreplynum'] + 1;
               $arr['allreplysecs'] = $dep['allreplysecs'] + $_SGLOBAL['timestamp'] - $complain['dateline'];
               updatetable("complain_dep", $arr, array('uid'=>$params['uid']));
                  }
             }
       inserttable('complain_resp',array('uid'=>$params['uid'],'doid'=>$doid,'opid'=>$opid,'replysecs'=>$_SGLOBAL['timestamp'] - $complain['dateline'], 'dateline'=>$_SGLOBAL['timestamp']));
       $note = cplang('note_doingcomplain_reply', array("space.php?do=complain_item&doid=$complain[doid]"));
       notification_complain_add($complain['uid'], 'complain', $note, $params['uid'], $params['uname']);
   }
       unset($params['complainId']);
       return json_encode($params);
  }
function IHomeServiceVoteComplainOperation($params=NULL){
    global $_SGLOBAL;
    if($params['uid'] ){
        if($params['uid']<=0){
            $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter uid must be a positive integer.");
            return json_encode($errorMsg);
                 }   
        else{
            $query = $_SGLOBAL['db']->query("select username,name from ".tname('space')." where uid = ".$params['uid'] );
            if($row = $_SGLOBAL['db']->fetch_array($query)){
               if($row['name']) $params['uname'] = $row['name'];    
               else $params['uname'] = $row['username'];
                           }   
            else{
                $errorMsg = array("errorNo"=>"500","content"=>"the uid is not exist");
                return json_encode($errorMsg);
                       }   
                     }   
           }   
    else {
        $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter.the parameter uid is not exist or is not a positive integer.");
        return json_encode($errorMsg);
       }  
    if($params['complainId'] ){
        if($params['complainId']<=0){
            $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter complainId must be a positive integer.");
            return json_encode($errorMsg);
               }
        else{
            $query = $_SGLOBAL['db']->query("select uname from ".tname('complain')." where doid = ".$params['complainId']);
            if($row = $_SGLOBAL['db']->fetch_array($query)){
                if(isblacklist($row['uid'])) {
                    $errorMsg = array("errorNo"=>"500","content"=>"the user of complain is in blacklist.");
                    return json_encode($errorMsg);
                               }
                            }
            else{
                $errorMsg = array("errorNo"=>"500","content"=>"the complain id is not exist");
                return json_encode($errorMsg);
                        }
                   }
           }
    else {
        $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter.the parameter complainId is not exist or is not a positive integer.");
        return json_encode($errorMsg);
    }

    
    if($params['reply_id']){
        if($params['reply_id']<=0){
            $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter reply_id must be a positive integer.");     
            return json_encode($errorMsg);
        }
        else {
            $query =  $_SGLOBAL['db']->query("select * from ".tname('complain_op')." where id = ".$params['reply_id']);
            if(!$row = $_SGLOBAL['db']->fetch_array($query)){
                $errorMsg = array("errorNo"=>"4001","content"=>"the reply_id isn't exist.");
                return json_encode($errorMsg);
            }

        }
              }
    else {
        $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter.the parameter reply_id is not exist or is not a positive integer.");       
        return json_encode($errorMsg);
     }
    if(!$params['vote']){
        $errorMsg = array("errorNo"=>"4001","content"=>"lack the neccessary parameter.the parameter vote is not exist.");
        return json_encode($errorMsg);
    }
    else if($params['vote']!='up' & $params['vote']!='down' ){
        $errorMsg = array("errorNo"=>"4002","content"=>"the format of parameter is not correct.the parameter vote is our of range.");
        return json_encode($errorMsg);
    }
    # check over
    $query = $_SGLOBAL['db']->query("select * from ".tname('complain')." where doid=".$params['complainId']);
    $complain = $_SGLOBAL['db']->fetch_array($query); # checked
    if($params['vote'] == 'up'){
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = ".$params['reply_id']." and uid = ".$params['uid']);
        $updown = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($updown)) {
            if ($updown['uid'] == $complain['uid'] || $updown['updown'] == 2) {
                $errorMsg = array("errorNo"=>"403","content"=>"updown again");
                return json_encode($errorMsg);
             }
            $_SGLOBAL['db']->query("delete from ".tname("complain_op_updown")." where opid = ".$params['reply_id']." and uid = ".$params['uid']." and updown = 1");
            $_SGLOBAL['db']->query("update ".tname('complain_op')." set upnum=upnum-1 where id=".$params['reply_id']);
            $_SGLOBAL['db']->query("update ".tname('complain_dep')." set upnum=upnum-1,updownnum=updownnum-1,score=score-1 where uid in (select uid from ".tname("complain_op")." where id=".$params['reply_id'].")");

        } else {
            $downarr = array();
            $downarr['opid'] = $params['reply_id'];
            $downarr['uid'] = $params['uid'];
            $downarr['updown'] = 1;
            $downarr['username'] = $params['uname'];
            $downarr['dateline'] = $_SGLOBAL['timestamp'];
            $_SGLOBAL['db']->query("update ".tname('complain_dep')." set upnum=upnum+1,updownnum=updownnum+1,score=score+1 where uid in (select uid from ".tname("complain_op")." where id=    ".$params['reply_id'].")");
            inserttable("complain_op_updown", $downarr);
            $_SGLOBAL['db']->query("update ".tname('complain_op')." set upnum=upnum+1 where id=".$params['reply_id']);
            
            $q = $_SGLOBAL['db']->query("select * from ".tname('complain')." where uid=".$params['uid']." and doid=".$params['complainId']." and lastopid=".$params['reply_id']." and status=1");
            if ($r = $_SGLOBAL['db']->fetch_array($q)) {
                updatetable('complain', array('status' => 2), array('id'=>$r['id']));
                $oparr = array();
                $oparr['doid'] = $params['complainId'];
                $oparr['message'] = ''; 
                $oparr['uid'] = $params['uid'];
                $oparr['username'] = $params['uname'];
                $oparr['optype'] = 6;
                $oparr['dateline'] = $_SGLOBAL['timestamp'];
                $oparr['opvalue'] = 1;
                inserttable("complain_op", $oparr);
            }           
        }      
    }
    else if($params['vote'] == 'down' ){
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = ".$params['reply_id']." and uid = ".$params['uid']);
        $updown = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($updown)) {
            if ($updown['uid'] == $complain['uid'] || $updown['updown'] == 1) {
                 $errorMsg = array("errorNo"=>"403","content"=>"updown again");
                 return json_encode($errorMsg);
             }
             $_SGLOBAL['db']->query("delete from ".tname("complain_op_updown")." where opid = ".$params['reply_id']." and uid = ".$params['uid']." and updown = 2");
             $_SGLOBAL['db']->query("update ".tname('complain_op')." set downnum=downnum-1 where id=".$params['reply_id']);
             $_SGLOBAL['db']->query("update ".tname('complain_dep')." set downnum=downnum-1,updownnum=updownnum-1,score=score+1 where uid in (select uid from ".tname("complain_op")." where id=".$params['reply_id'].")");
         }
        else{
            $downarr = array();
            $downarr['opid'] = $params['reply_id'];
            $downarr['uid'] = $params['uid'];
            $downarr['updown'] = 2;
            $downarr['username'] = $params['uname'];
            $downarr['dateline'] = $_SGLOBAL['timestamp'];
            inserttable("complain_op_updown", $downarr);
            $_SGLOBAL['db']->query("update ".tname('complain_dep')." set downnum=downnum+1,updownnum=updownnum+1,score=score-1 where uid in (select uid from ".tname("complain_op")." where  id=".$params['reply_id'].")");
            $_SGLOBAL['db']->query("update ".tname('complain_op')." set downnum=downnum+1 where id=".$params['reply_id']);
            $sql = "select * from ".tname('complain')." where uid=".$params['uid']." and doid=".$params['complainId']." and lastopid=".$params['reply_id']." and status=1";
            $q = $_SGLOBAL['db']->query("select * from ".tname('complain')." where uid=".$params['uid']." and doid=".$params['complainId']." and lastopid=".$params['reply_id']." and status=1");
            if ($r = $_SGLOBAL['db']->fetch_array($q)) {
                 updatetable('complain', array('status' => 0,'lastopid'=>0, 'dateline'=>$_SGLOBAL['timestamp'], 'times'=>1, 'issendmsg'=>0), array('id'=>$r['id']));
                 $note = cplang("complain_down", array("space.php?do=complain_item&doid=$complain[doid]"));
                 notification_complain_add($complain["atuid"], "complain", $note);
                 $oparr = array();
                 $oparr['doid'] = $params['complainId'];
                 $oparr['message'] = '';
                 $oparr['uid'] = $params['uid'];
                 $oparr['username'] = $params['uname'];
                 $oparr['optype'] = 5;
                 $oparr['dateline'] = $_SGLOBAL['timestamp'];
                 $oparr['opvalue'] = 1;
                 inserttable("complain_op", $oparr);
           }  

}
}
}

?>
