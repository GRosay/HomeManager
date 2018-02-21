<?php

if ($_GET['a'] == 'refresh') {
    chdir("../");
    require_once("./inc/prepend.inc.php");
}

$sSelect = "SELECT a.`id` as FACID, a.`Total`, a.`Echeance`, a.`NoFacture`, b.`Nom`, b.`Devise` FROM  `".DB_BILL."` as a LEFT JOIN `".DB_FOURNISSEUR."` as b ON a.`idx_Fournisseur` = b.`id` WHERE a.`DatePayement` IS " . (isset($_GET['payed']) ? "NOT " : null) . " NULL" . (isset($_GET['limit']) ? " LIMIT 5" : null);
$oMysql->query($sSelect);
$aSql = $oMysql->fetch();
foreach ($aSql as $key => $val) {

    echo "<tr>
								<td>" . $val['Nom'] . "</td>
								<td>" . $val['NoFacture'] . "</td>
								<td>" . $val['Total'] . " " . $val['Devise'] . "</td>
								<td>" . date('d.m.Y', $val['Echeance']) . "</td>
								<td><a href=\"index.php?p=billview&facno=" . $val['NoFacture'] . "&facid=" . $val['FACID'] . "\"><i class=\"fa fa-eye\"></i></a></td>
								</tr>";
}
?>