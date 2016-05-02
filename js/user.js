/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function fEditUser(id) {
	$('#formContainerUser').load('ajax/user.form.ajax.php?id=' + id);
}

function fDeleteUser(id, nom) {
	if (confirm("Voulez-vous vraiment supprimer l'utilisateur " + nom + " ?")) {

		$('#userList').load('ajax/user.list.ajax.php?a=refresh&delete=' + id);
	}
}

function fNewUser() {
	$('#formContainerUser').load('ajax/user.form.ajax.php');
}

function fAddUser() {
	if ($('#email').val() == "" || $('#password').val() == "" || $('#name').val() == "" || $('#firstname').val() == "") {
		alertMsg = "";
		if ($('#email').val() == "") {
			alertMsg += "Une adresse email doit être renseignée - elle servira au login.<br/>";
			$('#email').focus();
		}
		if ($('#password').val() == "") {
			alertMsg += "Un mot de passe doit être renseigné.<br />";
			$('#password').focus();
		}
		if ($('#name').val() == "") {
			alertMsg += "Un nom doit être renseigné.<br />";
			$('#name').focus();
		}
		if ($('#firstname').val() == "") {
			alertMsg += "Un prénom doit être renseigné.<br />";
			$('#firstname').focus();
		}
		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Il manque des informations !',
			// (string | mandatory) the text inside the notification
			text: alertMsg,
			// (string | optional) the image to display on the left
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: ''
		});
		return false;
	}
	$.post('ajax/user.action.ajax.php?a=insert', $('#formUser').serialize(), function (data) {
		if (data == 'success') {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Ajout de l\'utilisateur avec succès !',
				// (string | mandatory) the text inside the notification
				text: "L'utilisateur " + $('#name').val() + " " + $('#firstname').val() + " a été ajouté avec succès !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
			$('#formContainerUser').load('ajax/user.form.ajax.php');
		}
		else {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Erreur !!',
				// (string | mandatory) the text inside the notification
				text: "L'utilisateur " + $('#name').val() + " " + $('#firstname').val() + "  n\'a pas été ajouté !<br/>",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
	});
	$('#userList').load('ajax/user.list.ajax.php?a=refresh');
	return false;
}

function fUpdateUser(id) {
	if ($('#email').val() == "" || $('#name').val() == "" || $('#firstname').val() == "") {
		alertMsg = "";
		if ($('#email').val() == "") {
			alertMsg += "Une adresse email doit être renseignée - elle servira au login.<br/>";
			$('#email').focus();
		}
		if ($('#name').val() == "") {
			alertMsg += "Un nom doit être renseigné.<br />";
			$('#name').focus();
		}
		if ($('#firstname').val() == "") {
			alertMsg += "Un prénom doit être renseigné.<br />";
			$('#firstname').focus();
		}
		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Il manque des informations !',
			// (string | mandatory) the text inside the notification
			text: alertMsg,
			// (string | optional) the image to display on the left
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: ''
		});
		return false;
	}
	$.post('ajax/user.action.ajax.php?a=update&id=' + id, $('#formUser').serialize(), function (data) {
		if (data == 'success') {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Mise à jour de l\'utilisateur avec succès !',
				// (string | mandatory) the text inside the notification
				text: "L'utilisateur " + $('#name').val() + " " + $('#firstname').val() + " a été ajouté avec succès !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
			$('#formContainerUser').load('ajax/user.form.ajax.php');
		}
		else {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Erreur !!',
				// (string | mandatory) the text inside the notification
				text: "L'utilisateur " + $('#name').val() + " " + $('#firstname').val() + "  n\'a pas été mis à jour !<br/>",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
	});
	$('#userList').load('ajax/user.list.ajax.php?a=refresh');
	return false;
}

function fGeneratePwd() {
	var length = 8,
			charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
			retVal = "";
	for (var i = 0, n = charset.length; i < length; ++i) {
		retVal += charset.charAt(Math.floor(Math.random() * n));
	}
	$('#password').val(retVal)
	return false;

}