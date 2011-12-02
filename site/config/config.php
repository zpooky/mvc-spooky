<?php
/*
 * SQL
 */
/*
 * sqlite
 * mysql
 */

@define('ROOT','../../');

require_once ROOT.'site/config/ConfigInstance.php';

$ci = ConfigInstance::getInstance();

$ci->config['db']['type'] = 'sqlite';

$ci->config['db']['host'] = '127.0.0.1';
$ci->config['db']['port'] = '3306';
$ci->config['db']['database'] = '';
$ci->config['db']['usr'] = '';
$ci->config['db']['password'] = '';
$ci->config['db']['database'] = '';
$ci->config['db']['prefix'] = '';
/*
 * THEME
 */
$ci->config['theme']['theme'] = 'default';
?>