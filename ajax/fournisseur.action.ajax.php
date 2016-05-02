<?php
chdir("../");
require_once("./inc/prepend.inc.php");

$sSql = ($_GET['a'] == 'update' ? "UPDATE " : "INSERT INTO " ) . "`".DB_FOURNISSEUR."` SET `Nom` = '" . $oMysql->str_escape($_POST['fournisseurname']) . "', `Echeances` = '" . $oMysql->str_escape($_POST['echeance']) . "',
		`Telephone` = '" . $oMysql->str_escape($_POST['telephone']) . "', `Mail` = '" . $oMysql->str_escape($_POST['mail']) . "', `Adresse` = '" . $oMysql->str_escape($_POST['adresse']) . "',
		`Versement` = '" . $oMysql->str_escape($_POST['versement']) . "', `EnFaveur` = '" . $oMysql->str_escape($_POST['faveur']) . "', `Compte` = '" . $oMysql->str_escape($_POST['compte']) . "',
		`Devise` = '" . $oMysql->str_escape($_POST['devise']) . "'" . ($_GET['a'] == 'update' ? " WHERE `id` = '" . $_GET['id'] . "' " : null );

$oMysql->query($sSql) or die('error: '.$sSql);

die('success');
?>