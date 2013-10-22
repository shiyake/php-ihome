<?php

if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//Ȩ��
if(!checkperm('managecache')) {
	cpmessage('no_authority_management_operation');
}

$turl = 'admincp.php?ac=cache';

//���»���
if(submitcheck('cachesubmit')) {
	include_once(S_ROOT.'./source/function_cp.php');
	include_once(S_ROOT.'./source/function_cache.php');
	
	//ϵͳ����
	if(empty($_POST['cachetype']) || in_array('database', $_POST['cachetype'])) {
		config_cache();
		usergroup_cache();
		profilefield_cache();
		profield_cache();
		censor_cache();
		block_cache();
		eventclass_cache();
		magic_cache();
		click_cache();
		task_cache();
		ad_cache();
		creditrule_cache();
		userapp_cache();
		app_cache();
		network_cache();
	}
	
	//ģ����뻺��
	if(empty($_POST['cachetype']) || in_array('tpl', $_POST['cachetype'])) {
		tpl_cache();
	}
	
	//ģ�黺��
	if(empty($_POST['cachetype']) || in_array('block', $_POST['cachetype'])) {
		block_data_cache();
	}
	
	//��㿴������
	if(empty($_POST['cachetype']) || in_array('network', $_POST['cachetype'])) {
		
		$fiels = sreaddir(S_ROOT.'./data', array('txt'));
		foreach ($fiels as $value) {
			@unlink(S_ROOT.'./data/'.$value);
		}
	}

	cpmessage('do_success', $turl);

}

?>