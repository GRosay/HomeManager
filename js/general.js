/**
 * @name: fPikaday
 * @param: oElementToAdd OBJECT : élément(s) où ajouter le datepicker
 * @param sTimeFormat STRING : Format de la date (default : DD.MM.YYYY)
 *
 * @return: -
 * ---------
 * @author: DIM @ 22.04.2014
 *
 * ---------
 * @desc: Ajoute le datepicker pikaday sur l'élément choisi
 *
 **/
function fPikaday(oElementToAdd, sTimeFormat) {
	moment.lang('fr'); // Définit en français les formats de date

	if (!sTimeFormat) {
		sTimeFormat = 'DD.MM.YYYY';
	}

	oElementToAdd.pikaday({
		// surcharge les langues
		i18n: {
			previousMonth: 'Mois précédant',
			nextMonth: 'Mois suivant',
			months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
			weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
			weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam']
		},
		format: sTimeFormat
	});
}

function fReadMore(){
	$('.li-hidden').fadeIn();
	$('#btnReadMore').fadeOut();
}

$(document).ready(function(){
	$(document).on('click', '#toggleNav', function(){
		$.get("ajax/toggle.nav.ajax.php", function(data){
		});
	});
});