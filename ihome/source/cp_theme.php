<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$op = empty($_GET['op'])?'':$_GET['op'];
$dir = empty($_GET['dir'])?'':preg_replace("/[^0-9a-z]/i", '', $_GET['dir']);
$allowcss = checkperm('allowcss');

if(submitcheck('csssubmit')) {
	
	checksecurity($_POST['css']);
	
	$css = $allowcss?getstr($_POST['css'], 5000, 1, 1):'';
	$nocss = empty($_POST['nocss'])?0:1;
	updatetable('spacefield', array('theme'=>'', 'css'=>$css, 'nocss'=>$nocss), array('uid'=>$_SGLOBAL['supe_uid']));
	
	showmessage('do_success', 'cp.php?ac=theme&op=diy&view=ok', 0);

} elseif (submitcheck('timeoffsetsubmit')) {
	
	updatetable('spacefield', array('timeoffset'=>$_POST['timeoffset']), array('uid'=>$_SGLOBAL['supe_uid']));
	showmessage('do_success', 'cp.php?ac=theme');
} elseif (submitcheck('diysubmit')) {
    $bg_enabled = empty($_POST['use_bg'])?0:1;
    $bg_style = $_POST['bg_style'];
    $bg = $_POST['bg'];
    $nocss = empty($_POST['nocss'])?0:1;
    $colors = $_POST['colors'];
    $alpha = $_POST['alpha'];
    $diyfields = array(
        'css' => '',
	    'theme' => 'diy',
        'nocss' => $nocss,
        'diy_bg_enabled' => $bg_enabled,
        'diy_bg' => $bg,
        'diy_bg_style' => $bg_style,
        'diy_colors' => $colors,
        'diy_alpha' => $alpha
    );
    updatetable('spacefield', $diyfields, array('uid' => $_SGLOBAL['supe_uid']));
    showmessage('do_success', 'cp.php?ac=theme&op=diy2',1);
} elseif (submitcheck('index_bg')) {
    $change=array('index_bg'=>$_POST[bg]);
    updatetable('spacefield',$change,array('uid'=>$_SGLOBAL['supe_uid']));
    showmessage('do_success','space.php',1);
}

//ȷ���ļ��Ƿ����
if($dir && $dir != 'default' && $dir != 'diy') {
	$cssfile = S_ROOT.'./theme/'.$dir.'/style.css';
	if(!file_exists($cssfile)) {
		showmessage('theme_does_not_exist');
	}
}

if ($op == 'use') {
	//����
	if($dir == 'default') {
		$setarr = array('theme'=>'', 'css'=>'');
	} else {
		$setarr = array('theme'=>$dir, 'css'=>'');
	}
	updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
    showmessage('do_success', 'space.php', 1);
	
} elseif ($op == 'diy') {
	//�Զ���
} elseif ($op == 'diy2') {
   $query = $_SGLOBAL['db']->query("SELECT diy_bg_enabled, diy_bg, diy_bg_style, nocss, diy_colors,diy_alpha,index_bg FROM ".tname('spacefield')." WHERE uid=".$_SGLOBAL['supe_uid']);
    $bg_enabled = 0;
    $bg = '';
    $bg_style = 2;
    $nocss = 0;
    $colors = 1;
    if ($value = $_SGLOBAL['db']->fetch_array($query)) {
        $bg_enabled = $value['diy_bg_enabled'];
        $bg = $value['diy_bg'];
        $bg_style = empty($value['diy_bg_style'])?2:$value['diy_bg_style'];
        $nocss = $value['nocss'];
        $colors = empty($value['diy_colors'])?1:$value['diy_colors'];  
        $alpha = empty($value['diy_alpha'])?1000:$value['diy_alpha'];

    }

} 
elseif ($op=='diy2_index') {
    $query=$_SGLOBAL['db']->query("SELECT index_bg from ".tname('spacefield')." WHERE uid=".$_SGLOBAL['supe_uid']); 
    if($value=$_SGLOBAL['db']->fetch_array($query))
    {
        $index_bg=empty($value['index_bg'])?'default':$value['index_bg'];
        $_SGLOBAL['index_bg']=$index_bg;
    }        
}
elseif ($op=='diy2_index_default') {
    $setarr=array('index_bg'=>'default');
    updatetable('spacefield',$setarr,array('uid'=>$_SGLOBAL['supe_uid']));
    showmessage('do_success','space.php',1);
}
else {
	
	//ģ���б�
	$themes = array(
		array('dir'=>'default', 'name'=>cplang('the_default_style'), 'pic'=>'image/theme_default.jpg')
	);
	$themes[] = array('dir'=>'diy', 'name'=>cplang('the_diy_style'), 'pic'=>'image/theme_diy.jpg');

	//��ȡ���ط��Ŀ¼
	$themedirs = sreaddir(S_ROOT.'./theme');
	foreach ($themedirs as $key => $dirname) {
		//��ʽ�ļ���ͼƬ�����
		$now_dir = S_ROOT.'./theme/'.$dirname;
		if(file_exists($now_dir.'/style.css') && file_exists($now_dir.'/preview.jpg')) {
			$themes[] = array(
				'dir' => $dirname,
				'name' => getcssname($dirname)
			);
		}
	}
	
	//ʱ��
	$toselect = array($space['timeoffset'] => ' selected');
}

$actives = array('theme'=>' class="active"');

include_once template("cp_theme");

//��ȡϵͳ�����
function getcssname($dirname) {
	$css = sreadfile(S_ROOT.'./theme/'.$dirname.'/style.css');
	if($css) {
		preg_match("/\[name\](.+?)\[\/name\]/i", $css, $mathes);
		if(!empty($mathes[1])) $name = shtmlspecialchars($mathes[1]);
	} else {
		$name = 'No name';
	}
	return $name;
}

function checksecurity($str) {
	
	//ִ��һϵ�еĹ�����֤�Ƿ�Ϸ���CSS
	$filter = array(
		'/\/\*[\n\r]*(.+?)[\n\r]*\*\//is',
		'/[^a-z0-9]+/i',
	);
	$str = preg_replace($filter, '', $str);
	if(preg_match("/(expression|import|script)/i", $str)) {
		showmessage('css_contains_elements_of_insecurity');
	}
	return true;
}
?>
