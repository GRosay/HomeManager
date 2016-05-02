<?php

/**
 * ___NOM DU PROJET___
 * login.php
 *
 * --------------------
 * @author: rosay @ 10 août 2015
 * Last Mod: ___ModInit___ @ ___ModDate___
 * --------------------
 *
 * @desc: ___DESCRIPTION___
 *
 **/
require_once('inc/header.light.inc.php');

?>
<body class="login-page" style="background-image: url('img/login_background.jpg'); background-repeat:no-repeat;">
	<div class="login-box" id="login-box">
      <div class="login-logo">
		  <a href="../../index2.html"><b>Home</b>Manager</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body" id="formBox">

          <?php

          require_once('ajax/login.form.ajax.php');

          ?>

		  <!--
							  <a href="#">Mot de passe oublié</a><br>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="./js/login.js" type="text/javascript"></script>

</body>