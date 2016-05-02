<?php

require_once('inc/prepend.inc.php');

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) {
	header('Location: index.php');
}

$sContent = '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>' . $sTitle . '</title>

		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		';
foreach ($aCSS as $key => $val) {
	$sContent .= "<link href='" . $val . "' rel='stylesheet' type='text/css' />
		";
}
$sContent .= '

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>



			 ';

foreach ($aJS as $key => $val) {
	$sContent .= "<script src='$val'></script>";
}
echo $sContent;
