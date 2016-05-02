<?php

chdir("../");
require_once("./inc/prepend.inc.php");

$aEchance = explode('.', $_POST['echeance']);
$sEchance = mktime(0, 0, 0, $aEchance[1], $aEchance[0], $aEchance[2]);


$sSql = "INSERT INTO `".DB_BILL."` SET `idx_Fournisseur` = '" . $oMysql->str_escape($_POST['billfournisseur']) . "',
		`NoFacture` = '" . $oMysql->str_escape($_POST['nofact']) . "', `Reference` = '" . $oMysql->str_escape($_POST['ref']) . "', `Echeance` = '" . $oMysql->str_escape($sEchance) . "',
		`Versement` = '" . $oMysql->str_escape($_POST['billversement']) . "', `EnFaveur` = '" . $oMysql->str_escape($_POST['billfaveur']) . "', `Compte` = '" . $oMysql->str_escape($_POST['billcompte']) . "',
		`RefPayement` = '" . $oMysql->str_escape($_POST['refpayement']) . "', `Total` = '" . $oMysql->str_escape($_POST['montant']) . "', `DateAjout` = '" . time() . "'" . (isset($_SESSION['bill_uid']) ? ", `uid` = '" . $_SESSION['bill_uid'] . "'" : null);
$_SESSION['bill_uid_used'] = null;
$oMysql->query($sSql) or die('error');

die('success');
?>