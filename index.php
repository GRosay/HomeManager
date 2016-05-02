<?php

if (!isset($_GET['p'])) {
	$_GET['p'] = "index";
}
require_once('inc/header.inc.php');
require_once('inc/leftbar.inc.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
	<?php echo $aPages[$_GET['p']]['Title']; ?>
            <small><?php echo $aPages[$_GET['p']]['Desc']; ?></small>
		</h1>
		<ol class="breadcrumb">
            <li><a href="index.php?p=index"><i class="fa fa-home"></i> Home</a></li>
			<?php
			if ($aPages[$_GET['p']]['menucat'] != 0) {
				echo '<li>' . $aCategory[$aPages[$_GET['p']]['menucat']] . '</li>';
			}
			?>
            <li class="active"><?php echo $aPages[$_GET['p']]['Title']; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php
		require_once($aPages[$_GET['p']]['link']);
	?>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
	//require_once('inc/rightbar.inc.php');
require_once('inc/footer.inc.php');
?>