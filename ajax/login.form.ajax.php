<?php
/**
 * Created by PhpStorm.
 * User: rosay
 * Date: 14.08.15
 * Time: 18:22
 */

?>

<p class="login-box-msg">Veuillez vous connecter</p>
<form id="formLogin" action="ajax/login.ajax.php" method="post">
    <div class="form-group has-feedback">
        <input name="email" id="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">

            <!--<a href="#" onClick="fRegisterForm();" class="text-center">Besoin d'un compte ?</a>-->
        </div><!-- /.col -->
        <div class="col-xs-4">
            <button onClick="return fConnect();" type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
        </div><!-- /.col -->
    </div>
</form>
