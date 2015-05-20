<?php
if (!defined('iBUAA')) {
    exit('Access Denied');
}

if (!$member['is_admin']) {
    showmessage('require_amdin_privileges', 'developer.php');
}

$op = empty($_GET['op']) ? 'adslist' : $_GET['op'];

$perpage = 10;
$perpage = mob_perpage($perpage);

$count = 0;
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);

function get_ad($adid) {
    global $_SGLOBAL;
    $query = $_SGLOBAL['db']->query("SELECT * FROM " . tname('ad4dev') . " WHERE id=$adid");
    $ad = $_SGLOBAL['db']->fetch_array($query);
    return $ad;
}

if (submitcheck('adsubmit')) {
    $id = $_POST['id'] ? $_POST['id'] : '0';
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);
    $image = '';

    $title = getstr($title, 30, 1, 1, 1);
    if ($_FILES['image']['tmp_name']) {
        $pic = pic_save($_FILES['image'], -1, $title);
        if (is_array($pic) && $pic['filepath']) {
            $image = $pic['filepath'];
        }
    }

    $adarr = array(
        'title' => $title,
        'url' => $url,
        'display' => 1,
        'modified_on' => date('Y-m-d H:i'),
    );
    if ($image) $adarr['image'] = $image;

    if ($id) {
        updatetable('ad4dev', $adarr, array('id' => $id));
    } else {
        $adarr['created_on'] = date('Y-m-d H:i');
        $id = inserttable('ad4dev', $adarr, 1);
        updatetable('ad4dev', array('seq' => $id), array('id' => $id));
    }

    showmessage('success_to_set_ad', 'developer.php?do=manage&op=adslist');
} elseif ($op == 'adslist') {
    $ads = array();
    $sql = "SELECT * FROM " . tname('ad4dev') . " ORDER BY seq DESC LIMIT $start,$perpage";
    $query = $_SGLOBAL['db']->query($sql);
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $value['image'] = $value['image'] ? $_SC['attachurl'] . $value['image'] : 'plugin/apps/images/app.gif';
        $ads[] = $value;
    }

    $sql = "SELECT COUNT(*) FROM " . tname('ad4dev');
    $count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

    $theurl = "developer.php?do=manage&op=adslist";
    $multi = multi($count, $perpage, $page, $theurl);

    include_once template("dev_manage_adslist");
    return;
} elseif ($op == 'addad') {
    include_once template("dev_manage_add_ad");
    return;
} elseif ($op == 'loglist') {
    include_once template("dev_manage_loglist");
    return;
}  elseif ($op == 'editad') {
    $adid = intval($_GET['adid']);

    $ad = get_ad($adid);
    include_once template("dev_manage_edit_ad");
    return;
} elseif ($op == 'deletead') {
    $adid = intval($_POST['adid']);

    $_SGLOBAL['db']->query("DELETE FROM " . tname('ad4dev') . " WHERE id=$adid");
    echo 200;
    return;
} elseif ($op == 'upad') {
    $adid = intval($_POST['adid']);

    $ad = get_ad($adid);
    $query = $_SGLOBAL['db']->query("SELECT id,seq FROM " . tname('ad4dev') . " WHERE seq>" . $ad['seq'] . " ORDER BY seq ASC LIMIT 1");
    $ad1 = $_SGLOBAL['db']->fetch_array($query);

    if ($ad1) {
        updatetable('ad4dev', array('seq' => $ad1['seq']), array('id' => $ad['id']));
        updatetable('ad4dev', array('seq' => $ad['seq']), array('id' => $ad1['id']));
        echo 200;
    }
    return;
} elseif ($op == 'downad') {
    $adid = intval($_POST['adid']);

    $ad = get_ad($adid);
    $query = $_SGLOBAL['db']->query("SELECT id,seq FROM " . tname('ad4dev') . " WHERE seq<" . $ad['seq'] . " ORDER BY seq DESC LIMIT 1");
    $ad1 = $_SGLOBAL['db']->fetch_array($query);

    if ($ad1) {
        updatetable('ad4dev', array('seq' => $ad1['seq']), array('id' => $ad['id']));
        updatetable('ad4dev', array('seq' => $ad['seq']), array('id' => $ad1['id']));
        echo 200;
    }
    return;
} elseif ($op == 'checkpass') {
    $serid = intval($_POST['serid']);

    $setarr = array(
        'applypass' => 3,
    );
    updatetable('apps', $setarr, array('id' => $serid));
    echo 200;
    return;
} elseif ($op == 'checkreject') {
    $serid = intval($_POST['serid']);

    $setarr = array(
        'applypass' => 2,
    );
    updatetable('apps', $setarr, array('id' => $serid));
    echo 200;
    return;
}
