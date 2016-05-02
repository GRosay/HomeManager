<script src="./js/bill.func.js"></script>

<div class="row" id="statusRow">
	<?php
		require_once('ajax/billstatus.ajax.php');
	?>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box" id="billToPay">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-money"></i> Prochaines factures</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>
								Fournisseur
							</th>
							<th>
								N° Facture
							</th>
							<th>
								Solde
							</th>
							<th>
								Date d'échéance
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody id='BillList'>
						<?php
						require_once('./ajax/bill.list.ajax.php');
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box" id="newBill">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-cart-plus"></i> Ajout de facture</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body" id="formContainerBill">
				<?php
				require_once("./ajax/bill.form.ajax.php");
				?>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="box" id="fournisseurs">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-industry"></i> Fournisseurs</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-6" id="formContainerFournisseur">
					<?php
					require_once("./ajax/fournisseur.form.ajax.php");
?>
				</div>
				<div class="col-md-6">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>
									Fournisseur
								</th>
								<th>
									Téléphone
								</th>
								<th>
									Mail
								</th>
								<th>
									Nb facture
								</th>
								<th colspan='2'>
								</th>
							</tr>
						</thead>
						<tbody id='fournisseurList'>
							<?php
							require_once('./ajax/fournisseur.list.ajax.php');
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box" id="paidBill">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-cc-mastercard"></i> Factures payées</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>
								Fournisseur
							</th>
							<th>
								N° Facture
							</th>
							<th>
								Solde
							</th>
							<th>
								Date d'échéance
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody id='BillListPayed'>

					<script>
						$('#BillListPayed').load('ajax/bill.list.ajax.php?a=refresh&payed=true');
					</script>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>