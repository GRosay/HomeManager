<?php

# Fichier appelé en AJAX => on change le répertoir courant pour pouvoir appeler le header
chdir('../');
require_once('inc/prepend.inc.php');

# On upload le fichier
$bUpload = fUploadImage($_GET['qqfile']);

function fUploadImage($sFileName) {

	/* Clean the filename
	 * Find here: https://github.com/Widen/fine-uploader/issues/342
	 */
	$sFileName = strtr($sFileName, array(
		' ' => '_',
		'(' => '-',
		')' => '-',
		'\'' => '-',
		'’' => '-'
	));
	$sFileName = preg_replace('#[^a-zA-Z0-9\-\._]#', '', utf8_decode($sFileName));
	/* fin nettoyage nom de fichier */

	if (empty($sFileName)) {
		die('Aucun fichier a uploader!'); // Show an error if no filename
	}
	$sFileExt = strtolower(strrchr($sFileName, '.'));
	$sDate = date('d.m.Y_His_') . $sFileName;
	$sStockName = $sDate;

	$input = fopen("php://input", "r");
	$temp = tmpfile();
	$realSize = stream_copy_to_stream($input, $temp);
	fclose($input);

	if ($realSize != fGetSize()) {
		return false;
	}
	$sFileSrc = "files/" . $sStockName;
	$target = fopen($sFileSrc, "w");
	fseek($temp, 0, SEEK_SET);
	stream_copy_to_stream($temp, $target);
	fclose($target);

	return fAddToDB($sStockName);
}

function fAddToDB($sFileUrl) {
	//Variable globale de l'objet Mysql
	global $oMysql;

	$sUid = $_SESSION['bill_uid'];
	$sReq = "
			INSERT INTO
				`".DB_FILE."`
			SET
				`url` 			= '$sFileUrl',
				`date`		 = '" . time() . "',
				`uid`		= '" . $sUid . "'
		";

	if (!$oMysql->query($sReq)) {
		return false;
	} else {
		$_SESSION['bill_uid_used'] = $sUid;
		return true;
	}
}

function fGetSize() {
	if (isset($_SERVER["CONTENT_LENGTH"])) {
		return (int) $_SERVER["CONTENT_LENGTH"];
	} else {
		die();
	}
}

# On verifie que ce soit bon
# Si oui, success
if ($bUpload) {
	$a = array('success' => true);
}
# Si non, error
else {
	$a = array('success' => false, 'error' => 'Une erreure est survenue', 'preventRetry' => true);
}

#Retour en string json encoded pour recup en jquery json.
echo json_encode($a);
?>