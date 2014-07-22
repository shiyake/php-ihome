
<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(!checkperm('manageloginbg')) {
    cpmessage('no_authority_management_operation');
}
$_SGLOBAL['login_bg']='image/bg_for_graduate.jpg';

try {
    $query_bg = $_SGLOBAL['db']->query("SELECT * FROM ".tname('loginbg')." where id=1");
    while($value_bg = $_SGLOBAL['db']->fetch_array($query_bg)){
        $loginbg = $value_bg;
        $login_bg=empty($value_bg['bg_pic'])?'default':$value_bg['bg_pic'];
        $_SGLOBAL['login_bg']=$login_bg;
    }
} catch(Exception $e){
}

if (submitcheck('login_bg_btn')){
    $bg_pic =  $_POST['login_bg_pic'];
    $box_bg_col =  $_POST['box_bg_col'];
    $box_border_col =  $_POST['box_border_col'];
    $btn_bg_col =  $_POST['btn_bg_col'];
    $btn_border_col =  $_POST['btn_border_col'];
    $btn_font_col =  $_POST['btn_font_col'];
    $active_font_col =  $_POST['active_font_col'];
    $back_font_col =  $_POST['back_font_col'];
    $back_link_col =  $_POST['back_link_col'];
    $arr = array(
        "bg_pic" => $bg_pic,
        "box_bg_col" => $box_bg_col,
        "box_border_col" => $box_border_col,
        "btn_bg_col" => $btn_bg_col,
        "btn_border_col" => $btn_border_col,
        "btn_font_col" => $btn_font_col,
        "active_font_col" => $active_font_col,
        "back_font_col" => $back_font_col,
        "back_link_col" => $back_link_col
    );
    updatetable('loginbg', $arr, array('id'=>1));
    showmessage("do_success", "admincp.php?ac=loginbg", 2);
}

?>


