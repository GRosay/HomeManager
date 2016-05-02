<?php

if (isset($_GET['a'])) {
	chdir("../");
	require_once("./inc/prepend.inc.php");
}
if ($_SESSION['bill_uid_used'] != $_SESSION['bill_uid'])
	$_SESSION['bill_uid'] = uniqid();

if (isset($_GET['id'])) {

	$sSelect = "SELECT `id`, `Nom`, `Telephone`, `Mail`, `Adresse`, `Devise`, `Versement`, `EnFaveur`, `Compte`, `Echeances` FROM `".DB_FOURNISSEUR."` WHERE `id` = '" . $_GET['id'] . "'";

	$rSql = $oMysql->query($sSelect);

	$aFournisseur = $oMysql->fetch();
}

$sSelect = "SELECT `id`, `Nom` FROM `".DB_FOURNISSEUR."`";

$rSql = $oMysql->query($sSelect);

$aResult = $oMysql->fetch();
?>

<form class="form-horizontal" method="POST" id="formBill">
	<!-- Select Basic -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="billfournisseur">Fournisseur</label>
		<div class="col-md-8">
			<select id="billfournisseur" name="billfournisseur" class="form-control">
				<option value='null'>Veuillez choisir...</option>
				<?php
				foreach ($aResult as $key => $val) {
					echo "<option value='" . $val['id'] . "' " . ($_GET['id'] == $val['id'] ? "selected" : null) . ">" . $val['Nom'] . "</option>";
}
				?>
			</select>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="nofact">N° Facture</label>
		<div class="col-md-8">
			<input id="nofact" name="nofact" type="text" placeholder="N° facture" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="ref">Référence</label>
		<div class="col-md-8">
			<input id="ref" name="ref" type="text" placeholder="Référence" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="montant">Montant</label>
		<div class="col-md-8">
			<input id="montant" name="montant" type="text" placeholder="Montant" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="billdevise">Devise</label>
		<div class="col-md-8">
			<input id="billdevise" name="billdevise" type="text" placeholder="Devise" class="form-control input-md" required="" value="<?php echo $aFournisseur[0]['Devise'] ?>" readonly>

		</div>
	</div>


	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="billdate">Date de la facture</label>
		<div class="col-md-8">
			<input id="billdate" name="billdate" type="text" placeholder="Date de la facture" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="echeance">Échéance</label>
		<div class="col-md-8">
			<input id="echeance" name="echeance" type="text" placeholder="Échéance" class="form-control input-md" required="">
			<input id="echeance_fournisseur" type="hidden" value="<?php echo $aFournisseur[0]['Echeances']; ?>">
		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="billversement">Versement pour</label>
		<div class="col-md-8">
			<textarea class="form-control" rows="2" id="billversement" name="billversement"><?php echo $aFournisseur[0]['Versement'] ?></textarea>
		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="billfaveur">En faveur de</label>
		<div class="col-md-8">
			<textarea class="form-control" rows="2" id="billfaveur" name="billfaveur"><?php echo $aFournisseur[0]['EnFaveur'] ?></textarea>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="billcompte">Compte</label>
		<div class="col-md-8">
			<input id="billcompte" name="billcompte" type="text" placeholder="Compte" class="form-control input-md" required="" value="<?php echo $aFournisseur[0]['Compte'] ?>">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="refpayement">Référence payement</label>
		<div class="col-md-8">
			<input id="refpayement" name="refpayement" type="text" placeholder="Référence payement" class="form-control input-md" required="">

		</div>
	</div>

	<!-- File Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="pdffile">Fichiers</label>
		<div id='album_choose_file' class='btn btn-primary btn-sm' class='col-md-8'>
			<span class='glyphicon glyphicon-download-alt'></span>
			Cliquez ici ou glissez vos fichier sur le bouton
		</div>
		<div id='jquery-wrapped-fine-uploader' class='col-md-offset-4 col-md-8'></div>
	</div>

	<!-- Button (Double) -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="btnadd"></label>
		<div class="col-md-8">
			<button id="btnadd" name="btnadd" class="btn btn-success" onClick="return fNewBill();">Ajout de la facture</button>
			<input type="reset" id="reset" name="reset" class="btn btn-danger" value="Annuler" />
		</div>
	</div>
</form>

<script>
	$(document).ready(function () {

		fPikaday($('#echeance'));
		fPikaday($('#billdate'));
	// File Upload
	$('#jquery-wrapped-fine-uploader').fineUploader({
		request: {
			endpoint: 'ajax/fileupload.ajax.php'
		},
		button: $('#album_choose_file'),
		text: {
			uploadButton: 'Ajouter un fichier',
			dragZone: 'Vous pouvez glisser-deposer vos fichiers ici'
		},
		messages: {
			typeError: "{file} n'est pas un fichier valide. Extensions valides: {extensions}.",
			sizeError: "{file} est trop volimineux, taille max: {sizeLimit}.",
			emptyError: "Ce fichier est vide!",
			noFilesError: "Aucun fichier selectionne!",
			onLeave: "Le fichier est en cours d'envoi! Ne quittez pas la page!"
		},
		debug: true
	})
			.on('submit', function (event, id, filename) {
				// on prend l'id de l'article et on passe en param a l'uploader :)
				$(this).fineUploader();
			})
			.on('complete', function (event, id, filename, responseJSON) {
				refreshFiles();
			}); // fin de upload fichier article;

});

	$(document).on('change', '#billdate' ,function(){
		aBilldate = $('#billdate').val().split('.');
		billdate = Math.round(new Date(aBilldate[2]+'/'+aBilldate[1]+'/'+aBilldate[0]+" 04:00:00").getTime()/1000);
		//alert(billdate);
		billdate = billdate + (60*60*24*$('#echeance_fournisseur').val());

		// Create a new JavaScript Date object based on the timestamp
		// multiplied by 1000 so that the argument is in milliseconds, not seconds.
		var date = new Date(billdate*1000);

		//alert(billdate);
		// Hours part from the timestamp
		var day = date.getDate();
		// Minutes part from the timestamp
		var month = date.getMonth()+1;
		// Seconds part from the timestamp
		var year = date.getFullYear();
		if(month < 10)
			month = '0'+month;

		if(day < 10)
			day = '0'+day;
		// Will display time in 10:30:23 format
		var formattedTime = day + '.' + month + '.' + year;

		$('#echeance').val(formattedTime);
	});
</script>