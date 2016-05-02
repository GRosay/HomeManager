<?php

/**
 * ___NOM DU PROJET___
 * user.list.ajax.php
 *
 * --------------------
 * @author: rosay @ 14 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 **/
if ($_GET['a'] == 'refresh') {

chdir('../');
	require_once('inc/prepend.inc.php');
}

if (isset($_GET['delete'])) {
	$sSqlDelete = "DELETE FROM `".DB_USER."` WHERE `id` = '" . $_GET['delete'] . "'";
	$oMysql->query($sSqlDelete);
}
$rSqlRessource = null;

while ($oReturnUser = cUser::fGetUsers($rSqlRessource)) {
	$aUserDatas = $oReturnUser->fGetUserInfos();
	echo "<tr>
							<td>" . $aUserDatas['Name'] . "</td>
							<td>" . $aUserDatas['Firstname'] . "</td>
							<td>" . $aUserDatas['Login'] . "</td>
							<td>" . $aUserDatas['Lang'] . "</td>
							<td><a href='#' onClick=\"return fEditUser('" . $aUserDatas['id'] . "');\"><i class='fa fa-user-md'></i></a></td>
							<td><a href='#' onClick=\"return fDeleteUser('" . $aUserDatas['id'] . "', '" . $aUserDatas['Name'] . " " . $aUserDatas['Firstname'] . "');\"><i class='fa fa-user-times'></i></a></td>
						</tr>";
}