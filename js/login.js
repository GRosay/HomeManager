/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function fConnect() {
	$.post('ajax/login.ajax.php', $('#formLogin').serialize(), function (data) {
		if (data == "valid") {
			window.location = 'index.php';
		}
		else {
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Erreur de connexion',
				// (string | mandatory) the text inside the notification
				text: "Le compte pour " + $('#email').val() + " n\'existe pas ou le mot de passe est invalide !",
				// (string | optional) the image to display on the left
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		}
	});

	return false;
}

function fLoginForm(){
	$('#login-box').hide('slow', function() {
		$('#formBox').load('ajax/login.form.ajax.php');
		$('#login-box').show('slow');
	});

}
function fRegisterForm(){
	$('#login-box').hide('slow', function() {
		$('#formBox').load('ajax/register.form.ajax.php').show('slow');
		$('#login-box').show('slow');
	});
}