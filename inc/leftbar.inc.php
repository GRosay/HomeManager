<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">



		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<?php
			foreach ($aCategory as $key => $val) {
				if ($val != "Général") {
					echo '<li class="header">' . $val . '</li>';
				}
				foreach ($aPages as $subkey => $subval) {
					if ($subval['menucat'] == $key && $subval['show'] == true) {
						echo '<li ' . ($subkey == $_GET['p'] ? 'class="active"' : null) . '><a href="index.php?p=' . $subkey . '"><i class="fa fa-' . $subval['icone'] . '"></i> <span>' . $subval['Title'] . '</span></a></li>';
					}
				}
			}
?>
		</ul><!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>