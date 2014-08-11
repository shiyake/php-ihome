<?php if(!defined('iBUAA')) exit('Access Denied');
//error_reporting(E_ALL);
if($ac != 'detail') {
    showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}
$authorize = $_GET['authorize'] ? intval($_GET['authorize']) : 0;
$resetauthorize = $_GET['resetauthorize'] ? intval($_GET['resetauthorize']) : 0;
$gotoapp = $_GET['gotoapp'] ? $_GET['gotoapp'] : 0;
$appsid = $_GET['appsid'] ? trim($_GET['appsid']) : 0;
$uid = $_SGLOBAL['supe_uid'];
$nowtime = time();
$isConfirm = $_GET['isConfirm'] ? trim($_GET['isConfirm']) : 0;
$state = $_GET['state'] ? trim($_GET['state']) : 0;



//app的基本信息
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." WHERE id='$appsid' OR iauth_id='$appsid'");
if($value = $_SGLOBAL['db']->fetch_array($query)) {
    $value['logo'] = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
    realname_set($value['applyuid'], $value['uname']);
    $app = $value;
    $appsid = $app['id'];
}else{
    showmessage('对不起，不存在该应用~!','plugin.php?pluginid=apps');
    exit();
}

if($isConfirm){
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('api')." WHERE iauthAPIid IN (".$app['useapi'].")");
    if (empty($query)){die('Here is a bug wait you to discover:)');}
    while($value = $_SGLOBAL['db']->fetch_array($query)) {
        $apis[] = $value;
    }
    include_once template("/plugin/apps/confirm");
    exit;
}




//解除授权
if($resetauthorize){
    //删除授权记录
    $_SGLOBAL['db']->query("DELETE FROM ".tname('apps_users')." WHERE appsid=$appsid AND uid=$uid");
    //使用应用人数减一
    $app['usernumber'] = $app_arr['usernumber'] = $app['usernumber'] - 1;
    updatetable('apps' , $app_arr ,array('id'=>$appsid));

    if($app['category'] == 3){
//ini_set('display_errors',1);
    //第三方应用
        if(!@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){//echo 'notinclude'; exit();
            header("Location:plugin.php?pluginid=apps&ac=detail&appsid=$appsid");exit();
        }
        if(($app['iauth_type'] == 'WSC') || ($app['iauth_type'] == 'UAC')){
        //Web Site Client 登录
            try{
                IAUTH_remove_auth($uid ,$app['iauth_id']);
            }catch(IAuthException $e){
                //echo $e->getMessage();
            }
        }
    }
    echo "plugin.php?pluginid=apps&ac=detail&appsid=$appsid";
    exit();
    
}


//是否已经授权该应用
$isAuthorized = FALSE;
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_users')." WHERE uid=$uid AND appsid=$appsid");
if($value = $_SGLOBAL['db']->fetch_array($query)) {
    $isAuthorized = TRUE;
}

//使用app
if($gotoapp && $isAuthorized){
    if(!@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
        header("Location:plugin.php?pluginid=apps&ac=detail&appsid=$appsid");exit();
    }
    //更新个人使用次数
    $_SGLOBAL['db']->query("UPDATE ".tname('apps_users')." USE INDEX(uid) SET clicktime=clicktime+1 WHERE uid=$uid AND appsid=$appsid");
    //更新app被使用的次数
    $_SGLOBAL['db']->query("UPDATE ".tname('apps')." USE INDEX(id) SET clicktime=clicktime+1 WHERE id=$appsid");
    
    if($app['category'] == 1){
    //校内应用
        echo $app['url'];
        exit();
    }elseif($app['category'] == 3){
    //第三方应用
        if($app['iauth_type'] == 'WSC'){
        //Web Site Client 登录
            $iauth_url = $app['url'];
            echo $iauth_url;
            exit();
        }elseif($app['iauth_type'] == 'UAC'){
            $rightStr = implode(':' ,$_POST['api']);
            $state = $_POST['state'];
            $iauth_code = '';
            try{
                $iauth_code = IAUTH_auth( $app['iauth_id'], $uid, $rightStr, $state);
            }catch(IAuthException $e){
                //echo $e->getMessage();
            }
            echo $iauth_code;
            exit();
        }
    }else{
        echo $app['url'];
        exit();
    }
    
}

//授权使用
if($authorize && !$isAuthorized){
    if(!@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
        header("Location:plugin.php?pluginid=apps&ac=detail&appsid=$appsid");exit();
    }
    //添加授权记录
    $apps_users_arr = array(
        'uid' => $uid,
        'appsid' => $appsid,
        'clicktime' => 1
    );
    inserttable('apps_users',$apps_users_arr,0);
    //更新应用使用人数
    $app_arr['usernumber'] = $app['usernumber'] + 1;
    $app_arr['clicktime'] = $app['clicktime'] + 1;
    updatetable('apps' , $app_arr ,array('id'=>$appsid));
    
    //默认评分
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_detail')." WHERE uid=$uid AND appsid=$appsid");
    if(!$_SGLOBAL['db']->fetch_array($query)) {
        $detailarr = array(
            'appsid' => $appsid,
            'uid' => $uid,
            'anonymous' => 1,
            'score' => 5,
            'score_easy' => 5,
            'score_service' => 5,
            'score_speed' => 5,
            'content' => '',
            'ip' => getonlineip(),
            'time' => $nowtime,
            'vision' => 1,
            'issystem' => 1,
        );
        gradeForApp($detailarr ,$app ,$appsid ,0);
    }
    
    if(@include_once(S_ROOT.'./source/function_feed.php'))
        feed_publish($appsid, 'appsid');
    
    if($app['category'] == 1){
    //校内应用
        echo $app['url'];
        exit();
    }elseif($app['category'] == 3){
    //第三方应用
        if($app['iauth_type'] == 'WSC'){
        //Web Site Client 授权
            $rightStr = implode(':' ,$_POST['api']);
            $state = $_POST['state'];
            $iauth_url = 'plugin.php?pluginid=apps';
            try{
                $iauth_url = IAUTH_auth( $app['iauth_id'], $uid, $rightStr, $state);
            }catch(IAuthException $e){
                //echo $e->getMessage();
            }
            echo $iauth_url;
            exit();
        }elseif($app['iauth_type'] == 'UAC'){
        //UAC 授权
            $rightStr = implode(':' ,$_POST['api']);
            $state = $_POST['state'];
            $iauth_code = '';
            try{
                $iauth_code = IAUTH_auth( $app['iauth_id'], $uid, $rightStr, $state);
            }catch(IAuthException $e){
                //echo $e->getMessage();
            }
            echo $iauth_code;
            exit();
        }
    }else{
        echo $app['url'];
        exit();
    }
}

//提交评分
if(submitcheck('comment_submit')) {
    //接收信息
    $content = $_POST['content'];
    $score = intval($_POST['score']);
    $score_easy = intval($_POST['score_easy']);
    $score_service = intval($_POST['score_service']);
    $score_speed = intval($_POST['score_speed']);
    if ($score && $score_easy && $score_service && $score_speed) {
        $vision = '1';
        $anonymous = isset($_POST['anonymous']) ? intval($_POST['anonymous']) : 0;

        //插入数据库
        $detailarr = array(
            'appsid' => $appsid,
            'uid' => $uid,
            'anonymous' => $anonymous,
            'score' => $score,
            'score_easy' => $score_easy,
            'score_service' => $score_service,
            'score_speed' => $score_speed,
            'content' => $content,
            'ip' => getonlineip(),
            'time' => $nowtime,
            'vision' => $vision,
            'issystem' => 0,
        );
        //用户打分
        $app_score = gradeForApp($detailarr ,$app ,$appsid ,1);
        $app['score'] = $app_score['score'];
        $app['score_easy'] = $app_score['score_easy'];
        $app['score_service'] = $app_score['score_service'];
        $app['score_speed'] = $app_score['score_speed'];
    } else {
        showmessage("请先进行评分再提交");
    }
    
}


//更新app被浏览的次数
$_SGLOBAL['db']->query("UPDATE ".tname('apps')." USE INDEX(id) SET views=views+1 WHERE id=$appsid");


//判断用户是否已经评分
$isGrade = FALSE;
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_detail')." WHERE uid=$uid AND appsid=$appsid AND issystem=0");
if($value = $_SGLOBAL['db']->fetch_array($query)) {
    $isGrade = TRUE;
}

//获取评论
$comments = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps_detail')." WHERE appsid=$appsid AND issystem=0  ORDER BY time DESC LIMIT 10");
while($value = $_SGLOBAL['db']->fetch_array($query)) {
    $value['time'] = date("Y-m-d H:i",$value['time']);
    realname_set($value['uid'], $value['uname']);
    $comments[] = $value;
}
realname_get();


include_once template("/plugin/apps/detail");





/*=============================================================================================================================*/

function gradeForApp($newScore ,$app ,$appsid ,$isUpdate = 1){
    GLOBAL $_SGLOBAL;
    //更新总平均分以及评分人数
    $all_score = $app['score'] * $app['comment'];
    $all_score_easy = $app['score_easy'] * $app['comment'];
    $all_score_service = $app['score_service'] * $app['comment'];
    $all_score_speed = $app['score_speed'] * $app['comment'];
    if($isUpdate){
        $app['comment']++;
        $app['comment'] = $app['comment'] ? $app['comment'] : 1;
        $all_comment = $app['comment'];
        $app['score'] = ($all_score + $newScore['score']) / $all_comment;
        $app['score_easy'] = ($all_score_easy + $newScore['score_easy']) / $all_comment;
        $app['score_service'] = ($all_score_service + $newScore['score_service']) / $all_comment;
        $app['score_speed'] = ($all_score_speed + $newScore['score_speed']) / $all_comment;
        //更新评分记录
        updatetable('apps_detail' , $newScore ,array('appsid'=>$appsid,'uid'=>$_SGLOBAL['supe_uid']));
        $_SGLOBAL['db']->query("UPDATE ".tname('apps')." USE INDEX(id) SET comment=comment+1 WHERE id=$appsid");

    }else{
        $app['modders']++;
        $app['modders'] = $app['modders'] ? $app['modders'] : 1;
        if ($app['modders'] == 1) {
            $app['score'] = 5;
            $app['score_easy'] = 5;
            $app['score_service'] = 5;
            $app['score_speed'] = 5;
        }
        //增加评分记录
        inserttable('apps_detail',$newScore,0);
    }
    //取一位小数
    $score = round($app['score'],1);
    $score_easy = round($app['score_easy'],1);
    $score_service = round($app['score_service'],1);
    $score_speed = round($app['score_speed'],1);
    $app['score'] = $score > 5 ? 5 : $score;
    $app['score_easy'] = $score_easy > 5 ? 5 : $score_easy;
    $app['score_service'] = $score_service > 5 ? 5 : $score_service;
    $app['score_speed'] = $score_speed > 5 ? 5 : $score_speed;
    //更新应用平均分
    $app_arr = array(
        'modders' => $app['modders'],
        'score' => $app['score'],
        'score_easy' => $app['score_easy'],
        'score_service' => $app['score_service'],
        'score_speed' => $app['score_speed']
    );

    if ($app['comment']%50 == 49) {
        $_SGLOBAL['db']->query("update ".tname('apps').", (select appsid, round(avg(score),1) as s, round(avg(score_easy),1) as se, round(avg(score_service),1) as sv, round(avg(score_speed),1) as sp from ihome_apps_detail where issystem = 0 group by appsid) av set score=av.s, score_easy=av.se, score_service=av.sv, score_speed=av.sp where id = av.appsid and id=".$appsid);
    } else {
        updatetable('apps' , $app_arr ,array('id'=>$appsid));
    }    
    return $app_arr;
}

?>
