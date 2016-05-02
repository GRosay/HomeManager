/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function fViewFournisseur(id) {
	$('#formContainerFournisseur').load('./ajax/fournisseur.form.ajax.php?a=view&id=' + id);
}

function fUpdateFournisseur(id) {
	$.post('ajax/fournisseur.action.ajax.php?a=update&id=' + id, $('#formFournisseur').serialize(), function (data) {
		if (data == 'success') {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Modification du fournisseur avec succès !',
				// (string | mandatory) the text inside the notification
				text: "Le fournisseur " + $('#fournisseurname').val() + " a été modifié avec succès !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
		else {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Erreur !!',
				// (string | mandatory) the text inside the notification
				text: "Le fournisseur " + $('#fournisseurname').val() + " n\'a pas été modifié !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
	});
	$('#fournisseurList').load('ajax/fournisseur.list.ajax.php?a=refresh');
	$('#formContainerBill').load('ajax/bill.form.ajax.php?a=refresh');
	$('#statusRow').load('ajax/billstatus.ajax.php?a=refresh');
	return false;
}

function fNewFournisseur() {
	$('#formContainerFournisseur').load('./ajax/fournisseur.form.ajax.php?a=refresh');
	return false;
}

function fAddFournisseur() {
	if ($('#fournisseurname').val() == "" || $('#adresse').val() == "" || $('#compte').val() == "") {
		alertMsg = "";
		if ($('#fournisseurname').val() == "") {
			alertMsg += "Le nom du fournisseur doit être renseigné.<br/>";
			$('#fournisseurname').focus();
		}
		if ($('#adresse').val() == "") {
			alertMsg += "L\'adresse doit être renseignée.<br />";
			$('#adresse').focus();
		}
		if ($('#compte').val() == "") {
			alertMsg += "Le numéro de compte doit être renseigné.";
			$('#compte').focus();
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
	$.post('ajax/fournisseur.action.ajax.php?a=insert', $('#formFournisseur').serialize(), function (data) {
		if (data == 'success') {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Ajout du fournisseur avec succès !',
				// (string | mandatory) the text inside the notification
				text: "Le fournisseur " + $('#fournisseurname').val() + " a été ajouté avec succès !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
		else {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Erreur !!',
				// (string | mandatory) the text inside the notification
				text: "Le fournisseur " + $('#fournisseurname').val() + " n\'a pas été ajouté !<br/>",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
	});
	$('#fournisseurList').load('ajax/fournisseur.list.ajax.php?a=refresh');
	$('#formContainerBill').load('ajax/bill.form.ajax.php?a=refresh');
	$('#formContainerFournisseur').load('./ajax/fournisseur.form.ajax.php?a=refresh');
	$('#statusRow').load('ajax/billstatus.ajax.php?a=refresh');
	return false;
}

$(document).on('change', '#billfournisseur', function () {
	$('#formContainerBill').load('ajax/bill.form.ajax.php?a=getinfo&id=' + $('#billfournisseur').val());
});

function fDeleteFournisseur(id, name) {
	if (confirm("Voulez-vous vraiment supprimer le fournisseur " + name + "?")) {
		$('#fournisseurList').load('ajax/fournisseur.list.ajax.php?a=delete&id=' + id);
		$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Fournisseur supprimé',
			// (string | mandatory) the text inside the notification
			text: "Le fournisseur " + name + " a bien été supprimé !<br/>",
			// (string | optional) the image to display on the left
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: ''
		});
	}
}

function fNewBill() {
	if ($('#billfournisseur').val() == "null" || $('#nofact').val() == ""
			|| $('#montant').val() == "" || $('#echeance').val() == ""
			|| ($('#billcompte').val() == "" && $('#billversement').html() == "" && $('#billfaveur').html() == "")
			|| $('#refpayement').val() == "") {
		alertMsg = "";
		if ($('#billfournisseur').val() == "null") {
			alertMsg += "Le nom du fournisseur doit être renseigné.<br/>";
			$('#billfournisseur').focus();
		}
		if ($('#nofact').val() == "") {
			alertMsg += "Le numéro de facture doit être renseignée.<br />";
			$('#nofact').focus();
		}
		if ($('#montant').val() == "") {
			alertMsg += "Le montant doit être renseigné.<br />";
			$('#montant').focus();
		}
		if ($('#echeance').val() == "") {
			alertMsg += "L\'échéance doit être renseignée.<br />";
			$('#echeance').focus();
		}
		if (($('#billcompte').val() == "" && $('#billversement').html() == "" && $('#billfaveur').html() == "")) {
			alertMsg += "Au moins un champs parmis Versement Pour, En faveur de et Compte doit être renseigné.<br />";
			$('#billcompte').focus();
		}
		if ($('#refpayement').val() == "") {
			alertMsg += "La référence de payement doit être renseignée.<br />";
			$('#refpayement').focus();
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
	$.post('ajax/bill.action.ajax.php?a=insert', $('#formBill').serialize(), function (data) {
		if (data == 'success') {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Ajout de la facture avec succès !',
				// (string | mandatory) the text inside the notification
				text: "La facture a été ajoutée avec succès !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
		else {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Erreur !!',
				// (string | mandatory) the text inside the notification
				text: "La facture n\'a pas été ajoutée !<br/>",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
	});
	$('#fournisseurList').load('ajax/fournisseur.list.ajax.php?a=refresh');
	$('#BillList').load('ajax/bill.list.ajax.php?a=refresh');
	$('#formContainerBill').load('ajax/bill.form.ajax.php?a=refresh');
	$('#statusRow').load('ajax/billstatus.ajax.php?a=refresh');
	return false;
}