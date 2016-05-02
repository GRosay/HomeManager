<?php

##### CONSTANTES

const MIN_TO_BUY = 5;
const STD_TO_BUY = 10;
const MIN_FACTURE = 1;
const STD_FACTURE = 3;

const DB_BILL = 'hm_Bill';
const DB_FILE = 'hm_File';
const DB_FOURNISSEUR = 'hm_Fournisseur';
const DB_USER = 'hm_User';

#####

$sTitle = "HomeManager";
$sStyleTitle = "<b>Home</b>Manager";
$sSmallTitle = "<b>H</b>M";


$aMysqlConfig = array('host' => 'localhost', 'user' => 'root', 'password' => 'root', 'database' => 'homemanager');

### À RECUPERER DEPUIS LA DB PAR LA SUITE
$sSiteColor = $_SESSION['user_theme'];
$iNbToBuy = 8;
$sUserName = $_SESSION['user_firstname'] . " " . $_SESSION['user_name'];
$sUserDesc = $_SESSION['user_descr'];
$sUserMail = $_SESSION['user_login'];
$sUserImg = $_SESSION['user_profilepic'];
$sUserImg = $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $sUserMail ) ) ) . "&s=90&d=mm";
$sWeatherCity = "Vucherens";
###



$aCSS = array();
$aCSS[] = "libs/bootstrap/css/bootstrap.min.css";
$aCSS[] = "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css";
$aCSS[] = "https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css";
$aCSS[] = "dist/css/AdminLTE.min.css";
$aCSS[] = "dist/css/skins/skin-" . $sSiteColor . ".min.css";
//$aCSS[] = "plugins/datatables/jquery.dataTables.min.css";
$aCSS[] = "css/general.css";
$aCSS[] = "libs/gritter/css/jquery.gritter.css";
$aCSS[] = "libs/fineupload/fineuploader.css";
$aCSS[] = 'libs/pikaday/pikaday.css';

$aJS = array();
$aJS[] = "plugins/jQuery/jQuery-2.1.4.min.js";
$aJS[] = "libs/bootstrap/js/bootstrap.min.js";
$aJS[] = "libs/bootflat/js/icheck.min.js";
$aJS[] = "libs/bootflat/js/jquery.fs.selecter.min.js";
$aJS[] = "libs/bootflat/js/jquery.fs.stepper.min.js";
$aJS[] = "libs/gritter/js/jquery.gritter.min.js";
$aJS[] = "dist/js/app.min.js";
//$aJS[] = "plugins/datatables/jquery.dataTables.min.js";
//$aJS[] = "plugins/datatables/dataTables.bootstrap.min.js";
$aJS[] = "js/general.js";
$aJS[] = "libs/fineupload/jquery.fineuploader-3.1.1.min.js";
$aJS[] = 'libs/pikaday/moment.js';
$aJS[] = 'libs/pikaday/pikaday.js';
$aJS[] = 'libs/pikaday/pikaday.jquery.js';


#### Pages Array
# ToDo: Add your pages to this array as described below
# This table contain a list of all your page - Format "key" => array("link" => "link_to_your_page.php", "Title" => "Title of your page", "menu" => true (or false))
# The "key" is the word that will be used in the visible link (by example: index.php?p=pageexample)
# The "menu" is set to true if you want this page to appear in the main menu
$aCategory = array(
	"Général",
	"Administratif",
	"Informations",
	"Administration",
	"Paramètres"
);

$aPages = array(
	"index" => array(
		"link" => "pages/index.php",
		"Title" => "Dashboard",
		"icone" => "tachometer",
		"Desc" => "Résumé du " . date('d.m.Y', time()) . " à " . date('H:i:s', time()),
		"menucat" => 0,
		"show" => true
	),
	"bill" => array(
		"link" => "pages/factures.php",
		"Title" => "Gestion des factures",
		"icone" => "money",
		"Desc" => "Status des factures du " . date('d.m.Y', time()) . " à " . date('H:i:s', time()),
		"menucat" => 1,
		"show" => true
	),
	"billview" => array(
		"link" => "pages/facture.view.php",
		"Title" => "Facture " . (isset($_GET['facno']) ? $_GET['facno'] : null),
		"icone" => "money",
		"Desc" => "",
		"menucat" => 1,
		"show" => false
	),
	"courses" => array(
		"link" => "pages/course.php",
		"Title" => "Liste des courses",
		"icone" => "cart-arrow-down",
		"Desc" => "",
		"menucat" => 1,
		"show" => true
	),
	"about" => array(
		"link" => "pages/about.php",
		"Title" => "À propos",
		"icone" => "info-circle",
		"Desc" => "Mis à jour le jeudi 6 août 2015",
		"menucat" => 2,
		"show" => true
	),
	"users" => array(
		"link" => "pages/user.admin.php",
		"Title" => "Gestion utilisateur",
		"icone" => "users",
		"Desc" => "",
		"menucat" => 3,
		"show" => true
	),
	"myprofil" => array(
		"link" => "pages/myprofil.php",
		"Title" => "Mon profil",
		"icone" => "user",
		"Desc" => "Gérer mon profil",
		"menucat" => 4,
		"show" => true
	),
);
####

/**
 * Converti un object (json_decode par exemple) en array
 * @param object $oObjToArray
 * @return array
 */
function objectToArray($oObjToArray) {

// Si c'est un objet
	if(is_object($oObjToArray)) {

// Récupère les valeurs dans l'objet
		$oObjToArray = get_object_vars($oObjToArray);
	}

// Si c'est un array
	if(is_array($oObjToArray)) {

// Retourne un nouvel array
		return array_map(__FUNCTION__, $oObjToArray);
	}
	else {
// Retourne l'array
		return $oObjToArray;
	}

}