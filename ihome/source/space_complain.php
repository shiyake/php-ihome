<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

//分页
$perpage=20;
$perpage=mob_perpage($perpage);

$page=empty($_GET['page'])?0:intval($_GET['page']);
if ($page < 1) $page=1;
$start = ($page-1)*$perpage;

ckstart($start, $perpage);

$cids = array();
$clist = array();

if (empty($_GET['view'])) {
    if ($_SGLOBAL['isdept'] == 0) {
        $_GET['view'] = 'me';//我的诉求
    } else {
        $_GET['view'] = 'atme';//我管理的诉求
    }
}
if ($_GET['view'] == 'rank') {
    $starttime = ($starttime = strtotime($_POST['starttime']))? $starttime: mktime(0,0,0,date("m"),1,date("Y"));
    $endtime = ($endtime = strtotime($_POST['endtime']))? $endtime: mktime(0,0,0);
    $endtime += 18*3600;
    $deps = array();
    $submenus = array();
    $wheresql = " where dateline>=$starttime and dateline<$endtime ";

    if ($_GET['type'] == 'aversecs') {
        $order = " order by iru desc, realaversecs ";
        $submenus['aversecs']=' class = "active"';
    } elseif ($_GET['type'] == 'updownnum') {
        $order = " order by realupdownnum desc ";
        $submenus['updownnum']=' class = "active"';
    } elseif ($_GET['type'] == 'complainnum') {
        $order = " order by realcomplainnum desc ";
        $submenus['complainnum']=' class = "active"';
    } else {
        $order = " order by realscore desc ";
        $submenus['score']=' class = "active"';
    }
    $order .= ", realscore desc ";

    $myfeedfriend = array();
    $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." WHERE uid=$_SGLOBAL[supe_uid] limit 1"); 
    $value = $_SGLOBAL['db']->fetch_array($query);
    if(!empty($value['feedfriend'])){
        $myfeedfriend= explode(",", $value['feedfriend']);
        $myfeedfriend = array_flip(array_flip($myfeedfriend));
    }

    $count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select count(*) from ".tname('complain_dep')), 0);
    $depduty = array();
    $query = $_SGLOBAL['db']->query("select uid, depduty from ".tname("complain_dep"));
    while ($result = $_SGLOBAL['db']->fetch_array($query)) {
        $depduty[$result['uid']] = $result['depduty'];
    }

    $ranked_deps = array(0);
    $deps_rank_count = 0;
    $query = $_SGLOBAL['db']->query("select uid, username, sum(upnum) realupnum, sum(downnum) realdownnum, (sum(upnum)-sum(downnum)) realscore, sum(updownnum) realupdownnum, sum(complainnum) realcomplainnum, sum(replynum) realreplynum, sum(replysecs) realreplysecs, (sum(replynum)/sum(replynum)) iru, (sum(replysecs)/sum(replynum)) realaversecs from ".tname("complain_dep_rank") . $wheresql . " group by uid " . $order);
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $value['rank'] = ++$deps_rank_count;
        $value['infeed'] = 0;
        if(in_array($value['uid'], $myfeedfriend)) {
            $value['infeed'] = 1;
        }
        $ranked_deps[] = $value['uid'];
        $value['depduty'] = $depduty[$value['uid']];
        $deps[] = $value;
        realname_set($value['uid'], $value['username']);
    }
    if ($deps_rank_count < $count) {
        $query = $_SGLOBAL['db']->query("select uid, username, depduty, 0 realscore, 0 realupdownnum, 0 realcomplainnum from ".tname("complain_dep")." where uid not in (".implode(',',$ranked_deps).")");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $value['rank'] = ++$deps_rank_count;
            $value['infeed'] = 0;
            if(in_array($value['uid'], $myfeedfriend)) {
                $value['infeed'] = 1;
            }
            $deps[] = $value;
            realname_set($value['uid'], $value['username']);
        }
    }
    $actives = array('rank'=>' class="active"');
} elseif ($_GET['view'] == 'cloud') {
    $starttime = ($starttime = strtotime($_POST['starttime']))? $starttime: mktime(0,0,0,date("m"),1,date("Y"));
    $endtime = ($endtime = strtotime($_POST['endtime']))? $endtime: mktime(0,0,0);
    $atuid = empty($_POST['atuid'])?0:$_POST['atuid'];

    $startDay = date('Ymd', $starttime);
    $endDay = date('Ymd', $endtime);
    $wheresql = " where atuid=$atuid and datatime >= '$startDay' and datatime <= '$endDay' ";

    $deps = array();
    $query = $_SGLOBAL['db']->query("select uid, username from ".tname("complain_dep"));
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $deps[] = $value['uid'];
        realname_set($value['uid'], $value['username']);
    }

    $actives = array('cloud'=>' class="active"');
    $query = $_SGLOBAL['db']->query("select tag_word as text, sum(tag_count) as weight from ".tname("complain_tagcloud"). $wheresql." group by atuid, tag_word");
    $tags = array();
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $tags[] = $value;
    }
} else {
    $wheresql = "status!= 4";
    if ($_GET['view'] == 'all') {
        $starttime = ($starttime = strtotime($_POST['starttime']))? $starttime: mktime(0,0,0,date("m"),1,date("Y"));
        $endtime = ($endtime = strtotime($_POST['endtime']))? $endtime: mktime(0,0,0);
        $atuid = isset($_POST['atuid'])?$_POST['atuid']:0;
        $atuid = intval($atuid);

        $startDay = date('Ymd', $starttime);
        $endDay = date('Ymd', $endtime);

        $endtime += 24*3600-1;
        $deps = array();
        $query = $_SGLOBAL['db']->query("select uid, username from ".tname("complain_dep"));
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $deps[] = $value['uid'];
            realname_set($value['uid'], $value['username']);
        }
        $wheresql .= " and addtime>=$starttime and addtime<=$endtime";
        if ($atuid) {
            $wheresql .= " and atuid=$atuid";
        }

        $query = $_SGLOBAL['db']->query("select tag_word as text, sum(tag_count) as weight from ".tname("complain_tagcloud"). " where atuid=$atuid and datatime >= '$startDay' and datatime <= '$endDay' group by atuid, tag_word");
        $tags = array();
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $tags[] = $value;
        }

        $dep_selected = array();
        $dep_selected[$atuid] = ' selected';
    }

    if (empty($_GET['type'])) {
        if ($_SGLOBAL['isdept'] == 0) {
            $_GET['type'] = 'all';
        } else {
            $_GET['type'] = 'running';
        }
    }
    if($_GET['view'] == 'me') {
        $wheresql .= " and uid='$space[uid]'";
        $theurl = "space.php?do=$do&view=me&type=$_GET[type]";
        $actives = array('me'=>' class="active"');
    } elseif ($_GET['view'] == 'atme') {
        $wheresql .= " and atuid='$_SGLOBAL[supe_uid]'";
        $theurl = "space.php?do=$do&view=atme&type=$_GET[type]";
        $actives = array('atme'=>' class="active"');
    } else {
        $theurl = "space.php?do=$do&view=all&type=$_GET[type]";
        $actives = array('all'=>' class="active"');
    }
    $submenus = array();
    if ($_GET['type'] == 'running') {
        $wheresql .= " and status = 0 ";
        $submenus['running']=' class = "active"';
    } elseif ($_GET['type'] == 'done') {
        if ($_GET['view'] == 'atme') {
            $wheresql .= " and doid not in (select distinct doid from ".tname('complain')." where atuid='$_SGLOBAL[supe_uid]' and status in (0,2))";
        } else {
            $wheresql .= " and doid not in (select distinct doid from ".tname('complain')." where status=0 union select distinct doid from ".tname('complain')." where doid not in (select distinct doid from ".tname('complain')." where status in (0,1)))";
        }
        $submenus['done']=' class = "active"';
    } elseif ($_GET['type'] == 'closed') {
        if ($_GET['view'] == 'atme') {
            $wheresql .= " and doid not in (select distinct doid from ".tname('complain')." where atuid='$_SGLOBAL[supe_uid]' and status in (0,1))";
        } else {
            $wheresql .= " and doid not in (select distinct doid from ".tname('complain')." where status in (0,1))";
        }
        $submenus['closed']=' class = "active"';
    } else {
        $submenus['all']=' class = "active"';
    }
    $count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select count(distinct doid) from ".tname('complain')." where $wheresql"), 0);
    if ($count) {
        $query = $_SGLOBAL['db']->query("select distinct doid from ".tname('complain')."
                    where $wheresql
                    order by doid desc
                    limit $start,$perpage");
        $doids = array();
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $doids[] = $value['doid'];
        }
        $memdoid = 0;
        if ($doids) {
            $query = $_SGLOBAL['db']->query("select * from ".tname('complain')."
                    where doid in (".implode(',',$doids).")
                    order by doid desc, id desc");
            while ($value = $_SGLOBAL['db']->fetch_array($query)) {
                realname_set($value['uid'], $value['uname']);
                realname_set($value['atuid'], $value['atuname']);
                if ($memdoid == $value['doid']) {
                    if (!in_array($value['atuid'], $clist[count($clist)-1]['atuid'])) {
                        $temp = $clist[count($clist)-1]['clear'];
                        $clist[count($clist)-1]['clear'] = intval($value['status'])==0?0:$temp;
                        $clist[count($clist)-1]['atuid'][] = $value['atuid'];
                        $clist[count($clist)-1]['atuname'][] = $value['atuname'];
                        $clist[count($clist)-1]['times'][] = $value['times'];
                        $clist[count($clist)-1]['status'][] = $value['status'];
                    }
                } else {
                    $memdoid = $value['doid'];
                    $value['clear'] = intval($value['status'])>=1&&intval($value['status'])<=3?1:0;
                    $value['atuid'] = array($value['atuid']);
                    $value['atuname'] = array($value['atuname']);
                    $value['times'] = array($value['times']);
                    $value['status'] = array($value['status']);
                    $clist[] = $value;
                }
            }
        }
    }

    //分页
    $ajaxdiv = 'tab_content_'.$_GET['do'];
    $multi = multi($count, $perpage, $page, $theurl, $ajaxdiv);
}
//实名
realname_get();

$_TPL['css'] = 'complain';

include_once template("space_complain");


?>
