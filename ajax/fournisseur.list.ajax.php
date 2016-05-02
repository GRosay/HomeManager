<?php
if ($_GET['a'] == 'refresh') {
	chdir("../");
	require_once("./inc/prepend.inc.php");
} else if ($_GET['a'] == 'delete') {
	chdir("../");
	require_once("./inc/prepend.inc.php");

	$sDelete = "DELETE FROM `".DB_FOURNISSEUR."` WHERE `id` = '" . $_GET['id'] . "'";
	$oMysql->query($sDelete);
}
$sSelect = "SELECT `id`, `Nom`, `Telephone`, `Mail`  FROM `".DB_FOURNISSEUR."`";
$oMysql->query($sSelect);
$aSql = $oMysql->fetch();

foreach ($aSql as $key => $val) {

	$sSelect = "SELECT count(`id`) as NbFacture FROM `".DB_BILL."` WHERE `idx_Fournisseur` = '" . $val['id'] . "'";
	$oMysql->query($sSelect);
	$aBill = $oMysql->fetch();
	echo "<tr>
								<td>" . $val['Nom'] . "</td>
								<td>" . $val['Telephone'] . "</td>
								<td>" . $val['Mail'] . "</td>
								<td>" . $aBill[0]['NbFacture'] . "</td>
								<td><a href=\"#fournisseur\" onClick = \"fViewFournisseur(" . $val['id'] . ");\"><i class=\"fa fa-eye\"></i></a></td><td><a href=\"#fournisseur\" onClick = \"fDeleteFournisseur(" . $val['id'] . ", '" . $val['Nom'] . "');\"><i class=\"fa fa-trash\"></i></a></td>
								</tr>";
}
?>