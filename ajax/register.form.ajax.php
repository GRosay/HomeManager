<?php
/**
 * Created by PhpStorm.
 * User: rosay
 * Date: 14.08.15
 * Time: 18:23
 */

?>

<p class="login-box-msg">Veuillez vous inscrire</p>

<form class="form-horizontal" id="formUser">

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="email">Adresse email</label>
        <div class="col-md-8">
            <input id="email" name="email" type="text" placeholder="Adresse email" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="password">Mot de passe</label>
        <div class="col-md-8">
            <input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Nom</label>
        <div class="col-md-8">
            <input id="name" name="name" type="text" placeholder="Nom" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="firstname">Prénom</label>
        <div class="col-md-8">
            <input id="firstname" name="firstname" type="text" placeholder="Prénom" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="theme">Thème</label>
        <div class="col-md-8">
            <select id="theme" name="theme" class="form-control">
                <option value="black">Noir</option>
                <option value="black-light">Noir et blanc</option>
                <option value="blue">Bleu</option>
                <option value="blue-light">Bleu et blanc</option>
                <option value="green">Vert</option>
                <option value="green-light">Vert et blanc</option>
                <option value="purple">Violet</option>
                <option value="purple-light">Violet et blanc</option>
                <option value="red">Rouge</option>
                <option value="red-light">Rouge et blanc</option>
                <option value="yellow">Jaune</option>
                <option value="yellow-light">Jaune et blanc</option>
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="descr">Description</label>
        <div class="col-md-8">
            <input id="descr" name="descr" type="text" placeholder="Description" class="form-control input-md">

        </div>
    </div>

    <!-- Multiple Radios (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="lang">Langue</label>
        <div class="col-md-4">
            <label class="radio-inline" for="lang-0">
                <input type="radio" name="lang" id="lang-0" value="FR" checked="checked">
                FR
            </label>
            <label class="radio-inline" for="lang-1">
                <input type="radio" name="lang" id="lang-1" value="EN">
                EN
            </label>
        </div>
    </div>
    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="btnadd"></label>
        <div class="col-md-10">
            <button id="btnadd" name="btnadd" class="btn btn-success" onClick="return fAddUser();"> Créer le compte</button>
            <a href="#" onClick="fLoginForm();" id="reset" name="reset" class="btn btn-danger">Annuler</a>
        </div>
    </div>
</form>

</div>

