<?php
$aResult = array();
if (isset($_GET['a'])) {

	chdir("../");
	require_once("./inc/prepend.inc.php");
}
if (isset($_GET['id'])) {
	$sSelect = "SELECT `id`, `Nom`, `Telephone`, `Mail`, `Adresse`, `Devise`, `Versement`, `EnFaveur`, `Compte`, `Echeances` FROM `".DB_FOURNISSEUR."` WHERE `id` = '" . $_GET['id'] . "'";

	$rSql = $oMysql->query($sSelect);

	$aResult = $oMysql->fetch();
}
?>

<form class="form-horizontal" method="POST" id="formFournisseur">
	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="fournisseurname">Nom</label>
		<div class="col-md-8">
			<input id="fournisseurname" name="fournisseurname" value="<?php echo $aResult[0]['Nom']; ?>" type="text" placeholder="Nom" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="telephone">Téléphone</label>
		<div class="col-md-8">
			<input id="telephone" name="telephone" value="<?php echo $aResult[0]['Telephone']; ?>" type="text" placeholder="Téléphone" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="mail">Mail</label>
		<div class="col-md-8">
			<input id="mail" name="mail" value="<?php echo $aResult[0]['Mail']; ?>" type="text" placeholder="Mail" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="adresse">Adresse</label>
		<div class="col-md-8">
			<textarea class="form-control" rows="4" id="adresse" name="adresse"><?php echo $aResult[0]['Adresse']; ?></textarea>
		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="versement">Versement pour</label>
		<div class="col-md-8">
			<textarea class="form-control" rows="4" id="versement" name="versement"><?php echo $aResult[0]['Versement']; ?></textarea>
		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="faveur">En faveur de</label>
		<div class="col-md-8">
			<textarea class="form-control" rows="4" id="faveur" name="faveur"><?php echo $aResult[0]['EnFaveur']; ?></textarea>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="compte">Compte</label>
		<div class="col-md-8">
			<input id="compte" name="compte" value="<?php echo $aResult[0]['Compte']; ?>" type="text" placeholder="Compte" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="devise">Devise</label>
		<div class="col-md-8">
			<select id="devise" name="devise" class="form-control">
				<option value="CHF" <?php echo ($aResult[0]['Devise'] == "CHF" ? "selected" : null); ?>>CHF</option>
				<option value="€" <?php echo ($aResult[0]['Devise'] == "€" ? "selected" : null); ?>>€</option>
				<option value="$" <?php echo ($aResult[0]['Devise'] == "$" ? "selected" : null); ?>>$</option>
			</select>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="echeance">Echéances</label>
		<div class="col-md-8">
			<select id="echeance" name="echeance" class="form-control">
				<option value="10" <?php echo ($aResult[0]['Echeances'] == "10" ? "selected" : null); ?>>10 jours</option>
				<option value="15" <?php echo ($aResult[0]['Echeances'] == "15" ? "selected" : null); ?>>15 jours</option>
				<option value="20" <?php echo ($aResult[0]['Echeances'] == "20" ? "selected" : null); ?>>20 jours</option>
				<option value="25" <?php echo ($aResult[0]['Echeances'] == "25" ? "selected" : null); ?>>25 jours</option>
				<option value="30" <?php echo ($aResult[0]['Echeances'] == "30" ? "selected" : null); ?>>30 jours</option>
				<option value="60" <?php echo ($aResult[0]['Echeances'] == "60" ? "selected" : null); ?>>60 jours</option>
			</select>
		</div>
	</div>

	<!-- Button (Double) -->
	<div class="form-group">
		<label class="col-md-2 control-label" for="btnadd"></label>
		<div class="col-md-10">
			<button id="btnadd" name="btnadd" class="btn btn-success" onClick="return <?php echo ($aResult[0]['id'] != "" ? "fUpdateFournisseur('" . $aResult[0]['id'] . "');" : "fAddFournisseur();"); ?>"> <?php echo ($aResult[0]['id'] != "" ? "Editer" : "Ajout"); ?> fournisseur</button>
			<?php if ($aResult[0]['id'] != "") { ?><button id="btnadd" name="btnadd" class="btn btn-warning" onClick="return fNewFournisseur();">Nouveau fournisseur...</button><?php } ?>
			<input type="reset" id="reset" name="reset" class="btn btn-danger" value="Annuler" />
		</div>
	</div>

</form>