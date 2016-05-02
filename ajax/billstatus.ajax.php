<?php
if ($_GET['a'] == 'refresh') {
	chdir("../");
	require_once("./inc/prepend.inc.php");
}

$sSelect = "SELECT count(`id`) as CountBillToPay FROM  `".DB_BILL."` WHERE `DatePayement` IS NULL";
$oMysql->query($sSelect);
$aBillToPay = $oMysql->fetch();

$sSelect = "SELECT count(`id`) as CountBill FROM  `".DB_BILL."` WHERE `DatePayement` IS NOT NULL";
$oMysql->query($sSelect);
$aBillPayed = $oMysql->fetch();

$sSelect = "SELECT count(`id`) as CountFournisseur FROM `".DB_FOURNISSEUR."`";
$oMysql->query($sSelect);
$aFournisseur = $oMysql->fetch();
?>
<div class = "col-lg-3 col-xs-6">
<!-- small box -->
	<div class="small-box bg-red">
		<div class="inner">
			<h3><?php echo $aBillToPay[0]['CountBillToPay'] ?></h3>
			<p>Factures à payer</p>
		</div>
		<div class="icon">
			<i class="ion ion-cash"></i>
		</div>
		<a href="#billToPay" class="small-box-footer">Accéder <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-yellow">
		<div class="inner">
			<h3>New</h3>
			<p>Entrer une nouvelle factures</p>
		</div>
		<div class="icon">
			<i class="ion ion-ios-cart"></i>
		</div>
		<a href="#newBill" class="small-box-footer">Accéder <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-green">
		<div class="inner">
			<h3><?php echo $aBillPayed[0]['CountBill'] ?></h3>
			<p>Factures payées</p>
		</div>
		<div class="icon">
			<i class="ion ion-card"></i>
		</div>
		<a href="#paidBill" class="small-box-footer">Accéder <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-aqua">
		<div class="inner">
			<h3><?php echo $aFournisseur[0]['CountFournisseur'] ?></h3>
			<p>Fournisseurs</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="#fournisseur" class="small-box-footer">Accéder <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div><!-- ./col -->