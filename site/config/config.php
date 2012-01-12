<?php
/*
 * SQL
 */
/*
 * sqlite
 * mysql
 */
//
@define('ROOT','../../');

require_once ROOT.'site/config/ConfigInstance.php';

$ci = ConfigInstance::getInstance();

/**
 * ROOT
 */
//Install folder in www root example: '/mvc-spooky/'. with beginning and traling backslashes
$ci->config['site']['root'] = '/mvc-spooky/';
//Install URL root example: '/http://localhost/mvc-spooky/'. with traling backslashes
$ci->config['site']['url'] = 'http://localhost/mvc-spooky/';
/**
 * DATABASE
 * 
 */
//ENUM{sqlite,mysql};
$ci->config['db']['type'] = 'sqlite';
$ci->config['db']['host'] = '127.0.0.1';
$ci->config['db']['port'] = '3306';
$ci->config['db']['database'] = 'mvc';
$ci->config['db']['usr'] = 'root';
$ci->config['db']['password'] = '';
/*
 * THEME
 */
$ci->config['theme']['theme'] = 'default';
?>