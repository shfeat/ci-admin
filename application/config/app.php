<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['debug'] = true;
$config['menu'] = array(
	array('name'=>'Dashboard', 'uri'=>'admin/dashboard'),
	array('name'=>'视频', 'uri'=>'', 'nodes'=>array(
		array('name'=>'列表', 'uri'=>'video/list'),
		array('name'=>'统计', 'uri'=>'video/statistics'),
	)),
	array('name'=>'系统', 'uri'=>'', 'nodes'=>array(
		array('name'=>'管理员', 'uri'=>'admin/list')
	))
);