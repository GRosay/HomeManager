<?php


require_once('inc/prepend.inc.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0) {
	header('Location: login.php');
}

$sSelect = "SELECT count(`id`) as CountBillToPay FROM `".DB_BILL."` WHERE `DatePayement` IS NULL";
$oMysql->query($sSelect);
$aBillToPay = $oMysql->fetch();
$iNbFactures = $aBillToPay[0]['CountBillToPay'];

$sContent = '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>' . $sTitle . '</title>

		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		';
foreach ($aCSS as $key => $val) {
	$sContent .= "<link href='" . $val . "' rel='stylesheet' type='text/css' />";
}
$sContent .= '

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="skin-' . $sSiteColor . ' sidebar-mini '.($_SESSION['nav'] == 'close' ? "sidebar-collapse" : null).'">
		<div class="wrapper">

			<!-- Main Header -->
			  <header class="main-header">

				<!-- Logo -->
				<a href="index.php" class="logo">
				  <!-- mini logo for sidebar mini 50x50 pixels -->
				  <span class="logo-mini">' . $sSmallTitle . '</span>
				  <!-- logo for regular state and mobile devices -->
				  <span class="logo-lg">' . $sStyleTitle . '</span>
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
				  <!-- Sidebar toggle button-->
				  <a href="#" class="sidebar-toggle" id="toggleNav" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				  </a>
				  <!-- Navbar Right Menu -->
				  <div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					  <!-- Messages: style can be found in dropdown.less-->
					  <li class="dropdown messages-menu">
						<!-- Menu toggle button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="fa fa-money"></i>';
if ($iNbFactures < MIN_FACTURE) {
	$sContent .= '<span class="label label-success">' . $iNbFactures . '</span>';
} else if ($iNbFactures < STD_FACTURE) {
	$sContent .= '<span class="label label-warning">' . $iNbFactures . '</span>';
} else {
	$sContent .= '<span class="label label-danger">' . $iNbFactures . '</span>';
}

$sContent .= '
						</a>
						<ul class="dropdown-menu">
						  <li class="header">Il y a ' . $iNbFactures . ' factures en attente de payement</li>
						  
						  <li class="footer"><a href="index.php?p=bill#billToPay">Voir toutes les factures</a></li>
						</ul>
					  </li><!-- /.messages-menu -->

					  
					  <!-- Liste de courses Menu -->
					  <li class="dropdown tasks-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="fa fa-cart-arrow-down"></i>';
if ($iNbToBuy < MIN_TO_BUY) {
	$sContent .= '<span class="label label-success">' . $iNbToBuy . '</span>';
} else if ($iNbToBuy < STD_TO_BUY) {
	$sContent .= '<span class="label label-warning">' . $iNbToBuy . '</span>';
} else {
	$sContent .= '<span class="label label-danger">' . $iNbToBuy . '</span>';
}
$sContent .= '
</a>
						<ul class="dropdown-menu">
						  <li class="header">Il y a ' . $iNbToBuy . ' produit(s) à acheter</li>
						  <li>
							<!-- Inner menu: contains the tasks -->
							<ul class="menu">
							  <li><!-- Task item -->
								<a href="#">
								  <!-- Task title and progress text -->
								  <h3>
									Design some buttons
									<small class="pull-right">20%</small>
								  </h3>
								  <!-- The progress bar -->
								  <div class="progress xs">
									<!-- Change the css width attribute to simulate progress -->
									<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
									  <span class="sr-only">20% Complete</span>
									</div>
								  </div>
								</a>
							  </li><!-- end task item -->
							</ul>
						  </li>
						  <li class="footer">
							<a href="#">View all tasks</a>
						  </li>
						</ul>
					  </li>
					  <!-- User Account Menu -->
					  <li class="dropdown user user-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <!-- The user image in the navbar-->
						  <img src="' . $sUserImg . '" class="user-image" alt="User Image" />
						  <!-- hidden-xs hides the username on small devices so only the image appears. -->
						  <span class="hidden-xs">' . $sUserName . '</span>
						</a>
						<ul class="dropdown-menu">
						  <!-- The user image in the menu -->
						  <li class="user-header">
							<img src="' . $sUserImg . '" alt="User Image" />
							<p>
							  ' . $sUserName . '
							  <small>' . $sUserDesc . '</small>
							</p>
						  </li>
						  <!-- Menu Footer-->
						  <li class="user-footer">
							<div class="pull-left">
							  <a href="index.php?p=myprofil" class="btn btn-default btn-flat">Profil</a>
							</div>
							<div class="pull-right">
							  <a href="logout.php" class="btn btn-default btn-flat">Déconnexion</a>
							</div>
						  </li>
						</ul>
					  </li>
					  <!-- Control Sidebar Toggle Button -->
					  <!--<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					  </li>-->
					</ul>
				  </div>
				</nav>
			  </header>
			 ';

foreach ($aJS as $key => $val) {
	$sContent .= "<script src='$val'></script>";
}
echo $sContent;
