<?php

session_start();
error_reporting(0);
require_once('inc/settings.inc.php');
require_once('class/mysqli.class.php');
require_once('class/user.class.php');



$oMysql = new cMysqli($aMysqlConfig);
$oMysql->connect();


