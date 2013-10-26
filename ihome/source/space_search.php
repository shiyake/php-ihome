<?php
if (empty($_GET['type'])) {
    $search_type = 'blog';
} else {
    $search_type = $_GET['type'];
}
if (isset($_GET['query'])) {
    $query = trim($_GET['query']);
} else {
    $query = '';
}
$search_url = 'http://jianfei.bestgames7.com/solr/select/?q=' . urlencode("search_text:".$query." AND type:" . $search_type) . "&wt=json";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $search_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($curl);
curl_close($curl);
$data = json_decode($data, true);
$items = $data['response']['docs'];
$all_item_count = $data['response']['numFound'];
$start = $data['response']['start'];
if ($search_type == 'blog') {
    $summarylen = 300;
    foreach ($items as $key => $value) {
        $itemids[] = $value['blogid'];
    }
    $idstr = join(',', $itemids);
    $query = $_SGLOBAL['db']->query("SELECT bf.message, bf.target_ids, bf.magiccolor, b.* FROM ".tname('blog')." b
        LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
        WHERE b.blogid in ($idstr)");
    $list = array();
    $pricount++;
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
            realname_set($value['uid'], $value['username']);
            if($value['friend'] == 4) {
                $value['message'] = $value['pic'] = '';
            } else {
                $value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
            }
            if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
            $list[] = $value;
        } else {
            $pricount++;
        }
    }

	$_TPL['css'] = 'blog';
    include_once template("space_search_blog");
} else if ($search_type == 'user') {
    foreach ($items as $key => $value) {
        $itemids[] = $value['uid'];
    }
    $list = array();
    if (count($itemids) > 0) {
        $idstr = join(',', $itemids);
        $sql = "select field.*, space.*
            from ".tname('space')." space
            left join ". tname('spacefield'). " field on field.uid = space.uid
            where space.uid in ($idstr)";

        $query = $_SGLOBAL['db']->query("$sql");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $list[$value['uid']] = $value;
        }

        foreach($list as $key => $value) {
            $value['isfriend'] = ($value['uid']==$space['uid'] || ($space['friends'] && in_array($value['uid'], $space['friends'])))?1:0;
            realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
            $fuids[] = $value['uid'];
            $list[$key] = $value;
        }
    }

    include_once template("space_search_user");
} else if ($search_type == 'event') {
    foreach ($items as $key => $value) {
        $itemids[] = $value['eventid'];
    }
    $idstr = join(',', $itemids);
    if(!@include_once(S_ROOT.'./data/data_eventclass.php')) {
        include_once(S_ROOT.'./source/function_cache.php');
        eventclass_cache();
    }
    $eventlist = array();
    if (count($itemids) > 0) {
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("event")." e left join ".tname("userevent") . " ue on e.eventid=ue.eventid WHERE e.eventid in ($idstr)");
        while($event = $_SGLOBAL['db']->fetch_array($query)){
            if($event['poster']){
                $event['pic'] = pic_get($event['poster'], $event['thumb'], $event['remote']);
            } else {
                $event['pic'] = $_SGLOBAL['eventclass'][$event['classid']]['poster'];
            }
            realname_set($event['uid'], $event['username']);
            if($view=="friend"){
                realname_set($event['fuid'], $event['fusername']);
                $fevents[$event['eventid']][] = array("fuid"=>$event['fuid'], "fusername"=>$event['fusername'], "status"=>$event['status']);
            }
            $eventlist[$event['eventid']] = $event;
        }
    }
	$_TPL['css'] = 'event';
    include_once template("space_search_event");
} else if ($search_type == 'album') {
    foreach ($items as $key => $value) {
        $itemids[] = $value['albumid'];
    }
    $list = array();
    if (count($itemids) > 0) {
        $idstr = join(',', $itemids);
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." where albumid in ($idstr)");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            realname_set($value['uid'], $value['username']);
            if($value['friend'] != 4 && ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
                $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
            } else {
                $value['pic'] = 'image/nopublish.jpg';
            }
            $list[] = $value;
        }
    }
	$_TPL['css'] = 'album';
    include_once template("space_search_album");
} else if ($search_type == 'poll') {
    foreach ($items as $key => $value) {
        $itemids[] = $value['pid'];
    }
    $idstr = join(',', $itemids);
    $list = array();
    if (count($itemids) > 0) {
        $query = $_SGLOBAL['db']->query("SELECT p.*,pf.* FROM ".tname('poll')." p 
                    LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid
                    where p.pid in ($idstr)");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            if($value['credit'] && $value['percredit'] && $value['credit'] < $value['percredit']) {
                $value['percredit'] = $value['credit'];
            }
            realname_set($value['uid'], $value['username']);
            $value['option'] = unserialize($value['option']);
            $list[] = $value;
        }
    }

	$_TPL['css'] = 'poll';
    include_once template("space_search_poll");
} else if ($search_type == 'mtag') {
    foreach ($items as $key => $value) {
        $itemids[] = $value['tagid'];
    }
    $list = array();
    if (count($itemids) > 0) {
        $idstr = join(',', $itemids);
        $query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." WHERE tagid in ($idstr)");
        while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $value['title'] = $_SGLOBAL['profield'][$value['fieldid']]['title'];
            if(empty($value['pic'])) $value['pic'] = 'image/nologo.jpg';
            $tagids[] = $value['tagid'];
            $tagnames[$value['tagid']] = $value['tagname'];
            $list[] = $value;
        }
    }
	$_TPL['css'] = 'thread';
    include_once template("space_search_mtag");
}
?>
