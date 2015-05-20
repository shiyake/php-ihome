<?php
if (!defined('iBUAA')) {
    exit('Access Denied');
}

if (!$member['is_admin'] && !$member['is_developer']) {
    showmessage('to_apply_developer', 'developer.php?do=apply');
}

$op = empty($_GET['op']) ? 'addservice' : $_GET['op'];
$_tab = empty($_GET['_tab']) ? 'addweblinkservice' : $_GET['_tab'];

$perpage = 10;
$perpage = mob_perpage($perpage);

$count = 0;
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);

$iauth_type = $_GET['iauth_type'];
if ($iauth_type !== '') {
    $iauth_type = empty($_GET['iauth_type']) ? '-1' : $_GET['iauth_type'];
};

$applypass = $_GET['applypass'];
if ($applypass !== '0') {
    $applypass = empty($_GET['applypass']) ? '-1' : $_GET['applypass'];
};
$sort = empty($_GET['sort']) ? 'applytime' : $_GET['sort'];

function get_apis()
{
    global $_SGLOBAL;
    $apis = array();
    $query = $_SGLOBAL['db']->query("SELECT id,name FROM " . tname('api'));
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $apis[] = $value;
    }
    return $apis;
}
$apis = get_apis();

$apps = array();
$conds = array();
if (!$member['is_admin']) {
    $conds[] = "applyuid=$uid";
}
if ($iauth_type != -1) {
    $conds[] = "iauth_type='$iauth_type'";
}
if ($applypass != -1) {
    $conds[] = "applypass=$applypass";
}

$sql = "SELECT * FROM " . tname('apps');
if ($conds) {
    $sql .= " WHERE " . implode(" AND ", $conds);
}
if ($sort) {
    if ($sort == 'applytime') {
        $sql .= " ORDER BY applytime DESC";
    }
}
$sql .= " LIMIT $start,$perpage";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $value['logo'] = $value['logo'] ? $_SC['attachurl'] . $value['logo'] : 'plugin/apps/images/app.gif';
    $apps[] = $value;
}

$sql = "SELECT COUNT(*) FROM " . tname('apps');
if ($conds) {
    $sql .= " WHERE " . implode(" AND ", $conds);
}
$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

$types = array(
    1 => "教学类",
    2 => "科研类",
    3 => "财务类",
    4 => "人力资源类",
    5 => "资产类",
    6 => "生活服务类",
    7 => "其他",
);

$status = array(
    0 => "待审核",
    //1 => "审核通过",
    2 => "审核未通过",
    3 => "已上架",
    4 => "已下架",
);

$iauth_types = array(
    '' => "网页链接服务",
    'WSC' => "网页iAuth服务",
    'UAC' => "移动服务",
    'RP' => "资源",
);

function get_service($serid) {
    global $_SGLOBAL;
    $query = $_SGLOBAL['db']->query("SELECT * FROM " . tname('apps') . " WHERE id=$serid");
    $service = $_SGLOBAL['db']->fetch_array($query);
    return $service;
}

if (submitcheck('servicesubmit')) {
    $id = $_POST['id'] ? $_POST['id'] : '0';
    $category = $_POST['category'];
    $logo = '';
    $app_pkg = '';
    $name = trim($_POST['name']);
    $iauth_name = trim($_POST['iauth_name']);
    $url = trim($_POST['url']);
    $type = intval($_POST['type']);
    $desc = $_POST['desc'] ? $_POST['desc'] : '';
    $desc_en = $_POST['desc_en'] ? $_POST['desc_en'] : '';
    $log = '[' . date('Y-m-d H:i') . ']' . $_POST['log'] . '||' . $_POST['logs'];
    $desc = stripslashes($desc);
    $desc_en = stripslashes($desc_en);
    $offline = intval($_POST['offline']);
    $app_url = $_POST['app_url'] ? $_POST['app_url'] : '';
    $back_url = $_POST['back_url'] ? $_POST['back_url'] : '';
    //使用对象
    $undergraduate = isset($_POST['undergraduate']) ? intval($_POST['undergraduate']) : 0;
    $postgraduate = isset($_POST['postgraduate']) ? intval($_POST['postgraduate']) : 0;
    $teacher = isset($_POST['teacher']) ? intval($_POST['teacher']) : 0;
    $alumnus = isset($_POST['alumnus']) ? intval($_POST['alumnus']) : 0;
    //二进制形式
    $usertype = $undergraduate . $postgraduate . $teacher . $alumnus;
    //转换为十进制形式
    $usertype = bindec($usertype);

    //以下信息是自动完成
    $applypass = 0;
    $applyuid = $_SGLOBAL['supe_uid'];
    $applytime = time();
    $applyip = getonlineip();
    $email = $_SGLOBAL['member']['email'];

    $name = getstr($name, 30, 1, 1, 1);

    //接收图片流:在这之前要验明$name的正身
    if ($_FILES['logo']['tmp_name']) {
        $pic = pic_save($_FILES['logo'], -1, $name);
        if (is_array($pic) && $pic['filepath']) {
            $logo = $pic['filepath'];
        }
    }


    if ($_FILES['app_pkg']['tmp_name']) {
        $app_pkg = uploadFile($_FILES['app_pkg']);
        if ($app_pkg && is_array($app_pkg)) {
            $app_pkg = $app_pkg['filepath'];
        }
    }

    if ($category == 3) {
        $useapi = implode(",", $_POST['api']);
        // TODO: why cut?
        $useapi = substr($useapi, 4);
        $iauth_type = $_POST['iauthtype'];
    } else {
        $useapi = '';
        $iauth_type = '';
    }

    //插入数据库
    $applyarr = array(
        'name' => $name,
        'iauth_name' => $iauth_name,
        'desc' => $desc,
        'desc_en' => $desc_en,
        'log' => $log,
        'offline' => $offline,
        'url' => $url,
        'app_url' => $app_url,
        'back_url' => $back_url,
        'category' => $category,
        'iauth_type' => $iauth_type,
        'usertype' => $usertype,
        'status' => 'disable',
        'ishidden' => 1,
        'type' => $type,
        'useapi' => $useapi,
        'applypass' => $applypass,
        'applyuid' => $applyuid,
        'applytime' => $applytime,
        'applyip' => $applyip
    );

    if ($logo) $applyarr['logo'] = $logo;
    if ($app_pkg) $applyarr['app_pkg'] = $app_pkg;

    if ($id) {
        unset($applyarr['applytime']);
        updatetable('apps', $applyarr, array('id' => $id));
    } else {
        $id = inserttable('apps', $applyarr, 1);
    }

    // TODO: repeat insert api when edit the RP service?
//    $isOK = FALSE;
//    if ($id) {
//        $isOK = TRUE;
//        if ($iauth_type == 'RP') {
//            $app_id = $id;
//            $api_name = trim($_POST['api_name']);
//            $api_url = trim($_POST['api_url']);
//            $fullname = trim($_POST['fullname']);
//            $intro = $_POST['intro'];
//            $explain = $_POST['explain'];
//
//            $api_arr = array(
//                'appid' => $app_id,
//                'name' => $api_name,
//                'fullname' => $fullname,
//                'url' => $api_url,
//                'intro' => $intro,
//                'explain' => $explain,
//                'status' => 'disable'
//            );
//            $api_id = inserttable('api', $api_arr, 1);
//
//            if (!$api_id) {
//                $_SGLOBAL['db']->query("DELETE FROM " . tname('apps') . " WHERE id=$id");
//                $isOK = FALSE;
//            }
//        }
//    }
    if ($id)
        include_once template("dev_service_add_success");
    else
        include_once template("dev_service_add_failure");
    return;
} elseif ($op == 'addservice') {
    include_once template("dev_service_add");
    return;
} elseif ($op == 'addweblinkservice') {
    include_once template("dev_service_add_weblink");
    return;
} elseif ($op == 'addiauthservice') {
    include_once template("dev_service_add_iauth");
    return;
} elseif ($op == 'addmobileservice') {
    include_once template("dev_service_add_mobile");
    return;
} elseif ($op == 'addresource') {
    include_once template("dev_service_add_resource");
    return;
} elseif ($op == 'servicelist') {
    $theurl = "developer.php?do=service&op=servicelist&sort=$sort&iauth_type=$iauth_type&applypass=$applypass";
    $multi = multi($count, $perpage, $page, $theurl);
    include_once template("dev_service_list");
    return;
} elseif ($op == 'servicestat') {
    $theurl = "developer.php?do=service&op=servicestat";
    $multi = multi($count, $perpage, $page, $theurl);
    include_once template("dev_service_stat");
    return;
} elseif ($op == 'verifyname') {
    $serid = empty($_GET['serid']) ? '' : $_GET['serid'];
    $name = empty($_GET['name']) ? '' : $_GET['name'];

    $sql = "SELECT 1 FROM " . tname('apps') . " WHERE name='$name'";
    if ($serid) {
        $sql .= " AND id!=" . $serid;
    }
    $q = $_SGLOBAL['db']->query($sql);
    $str = $_SGLOBAL['db']->num_rows($q) ? 'false' : 'true';
    echo $str;
    return;
} elseif ($op == 'iauth_name') {
    $serid = empty($_GET['serid']) ? '' : $_GET['serid'];
    $iauth_name = empty($_GET['iauth_name']) ? '' : $_GET['iauth_name'];

    $sql = "SELECT 1 FROM " . tname('apps') . " WHERE iauth_name='$iauth_name'";
    if ($serid) {
        $sql .= " AND id!=" . $serid;
    }
    $q = $_SGLOBAL['db']->query($sql);
    $str = $_SGLOBAL['db']->num_rows($q) ? 'false' : 'true';
    echo $str;
    return;
} elseif ($op == 'deleteservice') {
    $serid = intval($_POST['serid']);

    $_SGLOBAL['db']->query("DELETE FROM " . tname('apps') . " WHERE id=$serid");
    echo 200;
    return;
} elseif ($op == 'upservice') {
    $serid = intval($_POST['serid']);

    $setarr = array(
        'applypass' => 3,
    );
    updatetable('apps', $setarr, array('id' => $serid));
    echo 200;
    return;
} elseif ($op == 'downservice') {
    $serid = intval($_POST['serid']);

    $setarr = array(
        'applypass' => 4,
    );
    updatetable('apps', $setarr, array('id' => $serid));
    echo 200;
    return;
} elseif ($op == 'editservice') {
    $serid = intval($_GET['serid']);

    $service = get_service($serid);
    if ($service['iauth_type'] == "") {
        include_once template("dev_service_edit_weblink");
    } elseif ($service['iauth_type'] == "WSC") {
        include_once template("dev_service_edit_iauth");
    } elseif ($service['iauth_type'] == "UAC") {
        include_once template("dev_service_edit_mobile");
    } elseif ($service['iauth_type'] == "RP") {
        include_once template("dev_service_edit_resource");
    }
    return;
}
