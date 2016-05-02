<?php
/**
 * ___NOM DU PROJET___
 * user.form.ajax.php
 *
 * --------------------
 * @author: rosay @ 11 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 * */
chdir('../');
require_once('inc/prepend.inc.php');

if (isset($_GET['id'])) {
	$oUser = cUser::fGetUserById($_GET['id']);
	$aUserDatas = $oUser->fGetUserInfos();
}
?>
<form class="form-horizontal" id="formUser">

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="email">Adresse email</label>
		<div class="col-md-8">
			<input id="email" name="email" type="text" placeholder="Adresse email" class="form-control input-md" required="" value="<?php echo $aUserDatas['Login']; ?>">

		</div>
	</div>

	<!-- Password input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="password">Mot de passe</label>
		<div class="col-md-6">
			<input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control input-md" required="">

		</div>
		<div class="col-md-1">
			<button class="btn btn-warning" onClick="return fGeneratePwd();"><i class="fa fa-random"></i></button>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="name">Nom</label>
		<div class="col-md-8">
			<input id="name" name="name" type="text" placeholder="Nom" class="form-control input-md" required="" value="<?php echo $aUserDatas['Name']; ?>">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="firstname">Prénom</label>
		<div class="col-md-8">
			<input id="firstname" name="firstname" type="text" placeholder="Prénom" class="form-control input-md" required="" value="<?php echo $aUserDatas['Firstname']; ?>">

		</div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="theme">Thème</label>
		<div class="col-md-8">
			<select id="theme" name="theme" class="form-control">
				<option <?php echo ($aUserDatas['Theme'] == 'black' ? "selected" : null); ?> value="black">Noir</option>
				<option <?php echo ($aUserDatas['Theme'] == 'black-light' ? "selected" : null); ?> value="black-light">Noir et blanc</option>
				<option <?php echo ($aUserDatas['Theme'] == 'blue' ? "selected" : null); ?> value="blue">Bleu</option>
				<option <?php echo ($aUserDatas['Theme'] == 'blue-light' ? "selected" : null); ?> value="blue-light">Bleu et blanc</option>
				<option <?php echo ($aUserDatas['Theme'] == 'green' ? "selected" : null); ?> value="green">Vert</option>
				<option <?php echo ($aUserDatas['Theme'] == 'green-light' ? "selected" : null); ?> value="green-light">Vert et blanc</option>
				<option <?php echo ($aUserDatas['Theme'] == 'purple' ? "selected" : null); ?> value="purple">Violet</option>
				<option <?php echo ($aUserDatas['Theme'] == 'purple-light' ? "selected" : null); ?> value="purple-light">Violet et blanc</option>
				<option <?php echo ($aUserDatas['Theme'] == 'red' ? "selected" : null); ?> value="red">Rouge</option>
				<option <?php echo ($aUserDatas['Theme'] == 'red-light' ? "selected" : null); ?> value="red-light">Rouge et blanc</option>
				<option <?php echo ($aUserDatas['Theme'] == 'yellow' ? "selected" : null); ?> value="yellow">Jaune</option>
				<option <?php echo ($aUserDatas['Theme'] == 'yellow-light' ? "selected" : null); ?> value="yellow-light">Jaune et blanc</option>
			</select>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="descr">Description</label>
		<div class="col-md-8">
			<input id="descr" name="descr" type="text" placeholder="Description" class="form-control input-md" value="<?php echo $aUserDatas['Descr']; ?>">

		</div>
	</div>

	<!-- Multiple Checkboxes -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="rights">Droits</label>
		<div class="col-md-4">
			<div class="checkbox">
				<label for="rights-0">
					<input type="checkbox" name="rights[0]" id="rights-0" value="1"  <?php echo ($aUserDatas['Rights'][0] == '1' ? 'checked="checked"' : null); ?>>
					Actif
				</label>
			</div>
			<div class="checkbox">
				<label for="rights-1">
					<input type="checkbox" name="rights[1]" id="rights-1" value="1"  <?php echo ($aUserDatas['Rights'][1] == '1' ? 'checked="checked"' : null); ?>>
					Accès administratifs
				</label>
			</div>
			<div class="checkbox">
				<label for="rights-2">
					<input type="checkbox" name="rights[2]" id="rights-2" value="1"  <?php echo ($aUserDatas['Rights'][2] == '1' ? 'checked="checked"' : null); ?>>
					Administrateur
				</label>
			</div>
			<!--			<div class="checkbox">
							<label for="rights-1">
					<input type="checkbox" name="rights" id="rights-2" value="3">
					Option two
				</label>
						</div>-->
		</div>
	</div>

	<!-- Multiple Radios (inline) -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="lang">Langue</label>
		<div class="col-md-4">
			<label class="radio-inline" for="lang-0">
				<input type="radio" name="lang" id="lang-0" value="FR" <?php echo ($aUserDatas['Lang'] == 'FR' ? 'checked="checked"' : ($aUserDatas['Lang'] == null ? 'checked="checked"' : null)); ?>>
				FR
			</label>
			<label class="radio-inline" for="lang-1">
				<input type="radio" name="lang" id="lang-1" value="EN" <?php echo ($aUserDatas['Lang'] == 'EN' ? 'checked="checked"' : null); ?>>
				EN
			</label>
		</div>
	</div>
	<!-- Button (Double) -->
	<div class="form-group">
		<label class="col-md-2 control-label" for="btnadd"></label>
		<div class="col-md-10">
			<button id="btnadd" name="btnadd" class="btn btn-success" onClick="return <?php echo ($_GET['id'] != 0 ? "fUpdateUser('" . $_GET['id'] . "');" : "fAddUser();"); ?>"> <?php echo ($_GET['id'] != 0 ? "Editer" : "Ajout"); ?> utilisateur</button>
			<?php if ($_GET['id'] != 0) { ?><button id="btnadd" name="btnadd" class="btn btn-warning" onClick="return fNewUser();">Nouvel utilisateur...</button><?php } ?>
			<input type="reset" id="reset" name="reset" class="btn btn-danger" value="Annuler" />
		</div>
	</div>
</form>
