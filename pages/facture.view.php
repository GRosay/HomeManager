<?php
if ($_GET['a'] == 'markread') {
	$sUpdate = "UPDATE `".DB_BILL."` SET `DatePayement` = '" . time() . "' WHERE `id` = '" . $_GET['facid'] . "'";
	$oMysql->query($sUpdate);
}

$sSelect = "SELECT a.`Total`, a.`uid`, a.`Reference`, a.`Versement`, a.`EnFaveur`, a.`Compte`, a.`RefPayement`, a.`DateAjout`, a.`DatePayement`, a.`Echeance`, a.`NoFacture`, b.`Nom`, b.`Adresse`, b.`Devise` FROM `".DB_BILL."` as a LEFT JOIN `".DB_FOURNISSEUR."` as b ON a.`idx_Fournisseur` = b.`id` WHERE a.`id` = '" . $_GET['facid'] . "'";
$oMysql->query($sSelect);
$aSql = $oMysql->fetch();

$bShowMarkAsPayed = true;
if ($aSql[0]['DatePayement'] != NULL) {
	echo '<div class="pad margin no-print">
	<div class="callout callout-success" style="margin-bottom: 0!important;">
		<h4><i class="fa fa-info"></i> Facture payée</h4>
		Cette facture a été marquée comme payée le ' . date('d.m.Y', $aSql[0]['DatePayement']) . '.
	</div>
</div>';
	$bShowMarkAsPayed = false;
} else if ($aSql[0]['Echeance'] < time()) {
	echo '<div class="pad margin no-print">
	<div class="callout callout-danger" style="margin-bottom: 0!important;">
		<h4><i class="fa fa-info"></i> Attention !!</h4>
		L\'échéance de cette facture est à aujourd\'hui ou est déjà passée !!
	</div>
</div>';
} else if ($aSql[0]['Echeance'] < (time() + (2 * 86400))) {

	echo '<div class="pad margin no-print">
	<div class="callout callout-warning" style="margin-bottom: 0!important;">
		<h4><i class="fa fa-info"></i> Attention</h4>
		L\'échéance de cette facture est fixée à dans deux jours
	</div>
	</div> ';
}
?>

<section class = "invoice">
	<!--title row -->
	<div class = "row">
		<div class = "col-xs-12">
			<h2 class = "page-header">
				<i class = "fa fa-industry"></i> <?php echo $aSql[0]['Nom']; ?>
				<small class = "pull-right">Date: <?php echo date('d.m.Y', $aSql[0]['DateAjout']); ?></small>
			</h2>
		</div><!--/.col -->
	</div>
	<!--info row -->
	<div class = "row invoice-info">
		<div class = "col-sm-4 invoice-col">
			<address>
				<strong><?php echo $aSql[0]['Nom']; ?></strong><br>
				<?php echo nl2br($aSql[0]['Adresse']); ?>
			</address>
		</div><!--/.col -->
		<div class = "col-sm-4 invoice-col">

			<address>
				<strong>Gaspard Rosay</strong><br/>
				Route des Brigands 15<br/>
				1084 Carrouge<br/>
				079 138 46 72<br/>
				gaspard@rosay.ch
			</address>
		</div><!--/.col -->
		<div class = "col-sm-4 invoice-col">
			<b>Facture N° <?php echo $aSql[0]['NoFacture']; ?></b><br>
			<b>Référence:</b> <?php echo $aSql[0]['Reference']; ?><br/>
			<b>Échéance:</b> <?php echo date('d.m.Y', $aSql[0]['Echeance']); ?><br>
			<br>
		</div><!--/.col -->
	</div><!--/.row -->


	<div class = "row">
		<!--accepted payments column -->
		<div class="col-xs-6">
			<p class="lead">Infos de payement</p>
			<div class="col-xs-6">
				<b>Versement pour:</b><br/><?php echo nl2br($aSql[0]['Versement']); ?><br/>
				<b>En faveur de:</b><br/><?php echo nl2br($aSql[0]['EnFaveur']); ?>
			</div>
			<div class="col-xs-6">
				<b>Compte:</b><br/><?php echo $aSql[0]['Compte']; ?><br/>
				<b>Référence:</b><br/><?php echo $aSql[0]['RefPayement']; ?>
			</div>
		</div>
		<div class = "col-xs-6">
			<p class = "lead">À payer d'ici le <?php echo date('d.m.Y', $aSql[0]['Echeance']); ?></p>
			<div class = "table-responsive">
				<table class = "table">
					<tbody>
						<tr>
							<th>Total TTC:</th>
							<td class='table-right'><h3><?php echo $aSql[0]['Total'] . " " . $aSql[0]['Devise']; ?></h3></td>
						</tr>
					</tbody></table>
			</div>
		</div><!--/.col -->
	</div><!--/.row -->
	<hr>
	<!--this row will not appear when printing -->
	<div class = "row no-print">
		<div class = "col-xs-12">
			<div class='table-responsive col-md-6'>

				<table class='table'>
					<thead>
						<tr>
							<th>
								Fichier
							</th>
							<th>
								Date
							</th>
							<th>

							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sSqlSelect = "SELECT `url`, `date` FROM `".DB_FILE."` WHERE `uid` = '" . $aSql[0]['uid'] . "'";
						$oMysql->query($sSqlSelect);
						$aFiles = $oMysql->fetch();

						foreach ($aFiles as $key => $val) {
							echo "<tr><td>" . $val['url'] . "</td><td>" . date('d.m.Y', $val['date']) . "</td><td><a target='_blank' href='files/" . $val['url'] . "'><i class=\"fa fa-eye\"></i></a></td>";
						}
						?>
					</tbody>
				</table>

			</div>


			<?php
			if ($bShowMarkAsPayed) {
				echo '<a onClick="return confirm(\'La facture est bien payée ?\');" href="index.php?p=billview&facno=' . $_GET['facno'] . '&facid=' . $_GET['facid'] . '&a=markread" class = "btn btn-success pull-right" style = "margin-right: 5px;"><i class = "fa fa-check"></i> Marquer payée!</a>';
}
			?>
		</div>
	</div>
</section>