<?php
/**
 * ___NOM DU PROJET___
 * user.admin.php
 *
 * --------------------
 * @author: rosay @ 11 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 * */
?>

<div class="row">
	<div class="col-md-7">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-users"></i> Liste des utilisateurs</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body table-responsive"><table class="table">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Mail</th>
							<th>Langue</th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<tbody id="userList">
						<?php
					require_once('ajax/user.list.ajax.php')
						?></tbody>
				</table></div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user-plus"></i> Ajouter un utilisateur</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body" id="formContainerUser">


					<script>
					$('#formContainerUser').load('ajax/user.form.ajax.php');
					</script>
				</div>
		</div>
	</div>
</div>


<script src="./js/user.js" type="text/javascript"></script>