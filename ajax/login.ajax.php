<?php

/**
 * ___NOM DU PROJET___
 * login.ajax.php
 *
 * --------------------
 * @author: rosay @ 11 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 **/


chdir('../');
require_once('inc/prepend.inc.php');


$oUser = new cUser($_POST['email'], sha1($_POST['password']));


$sUserId = $oUser->fGetUserInfos("iId");


if ($sUserId != 0) {
	$aUserDatas = $oUser->fGetUserInfos();

	$_SESSION['user_id'] = $sUserId;
	$_SESSION['user_name'] = $aUserDatas['Name'];
	$_SESSION['user_firstname'] = $aUserDatas['Firstname'];
	$_SESSION['user_theme'] = $aUserDatas['Theme'];
	$_SESSION['user_decr'] = $aUserDatas['Descr'];
	$_SESSION['user_profilepic'] = $aUserDatas['ProfilePic'];
	$_SESSION['user_rights'] = $aUserDatas['Rights'];
	$_SESSION['user_lang'] = $aUserDatas['Lang'];
	$_SESSION['user_login'] = $aUserDatas['Login'];

	die("valid");
} else {
	die("error");
}
