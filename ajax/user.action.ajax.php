<?php

/**
 * ___NOM DU PROJET___
 * user.action.ajax.php
 *
 * --------------------
 * @author: rosay @ 14 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 **/
chdir('../');
require_once('inc/prepend.inc.php');

if ($_GET['a'] == 'insert') {

	$sRights = "00000"; // default rights
	$sRights[0] = ($_POST['rights'][0] == 1 ? "1" : "0");
	$sRights[1] = ($_POST['rights'][1] == 1 ? "1" : "0");
	$sRights[2] = ($_POST['rights'][2] == 1 ? "1" : "0");


	$sSqlInsert = "INSERT INTO `".DB_USER."` SET `login` = '" . $_POST['email'] . "',
			`password` = '" . sha1($_POST['password']) . "',
			`name` = '" . $_POST['name'] . "',
			`firstname` = '" . $_POST['firstname'] . "',
			`theme` = '" . $_POST['theme'] . "',
			`descr` = '" . $_POST['descr'] . "',
			`rights` = '" . $sRights . "',
			`lang` = '" . $_POST['lang'] . "'";

	$oMysql->query($sSqlInsert) or die("MYSQL ERROR");

	die("success");
}

if ($_GET['a'] == 'update') {

	$sRights = "00000"; // default rights
	$sRights[0] = ($_POST['rights'][0] == 1 ? "1" : "0");
	$sRights[1] = ($_POST['rights'][1] == 1 ? "1" : "0");
	$sRights[2] = ($_POST['rights'][2] == 1 ? "1" : "0");

	$sNewPassword = ($_POST['password'] != '' ? "`password` = '" . sha1($_POST['password']) . "'," : null);
	$sSqlInsert = "UPDATE `".DB_USER."` SET `login` = '" . $_POST['email'] . "',
				$sNewPassword
			`name` = '" . $_POST['name'] . "',
			`firstname` = '" . $_POST['firstname'] . "',
			`theme` = '" . $_POST['theme'] . "',
			`descr` = '" . $_POST['descr'] . "',
			`rights` = '" . $sRights . "',
			`lang` = '" . $_POST['lang'] . "'
			WHERE `id` = '" . $_GET['id'] . "'	";

	$oMysql->query($sSqlInsert) or die("MYSQL ERROR");

	die("success");
}