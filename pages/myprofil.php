<?php
/**
 * Created by PhpStorm.
 * User: rosay
 * Date: 29.10.15
 * Time: 10:16
 */

?>


<div class="row">

    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> Mes informations</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td colspan="3" style="text-align:center;">
                            <img style="max-width:30%;" src="<?php echo $sUserImg; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td><?php echo $_SESSION['user_name']; ?></th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td><?php echo $_SESSION['user_firstname']; ?></th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Mail</th>
                        <td><a href="mailto:<?php echo $sUserMail; ?>"><?php echo $sUserMail; ?></a></th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Thème</th>
                        <td><?php echo $sSiteColor;?></th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Langue</th>
                        <td><?php echo $sUserLang; ?></th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Mot de passe</th>
                        <td></th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-building-o"></i> Mes villes</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Ville 1</th>
                        <td>Yverdon-les-Bains</th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Ville 2</th>
                        <td>Carrouge</th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    <tr>
                        <th>Ville 3</th>
                        <td>Ecublens</th>
                        <td><i class="fa fa-pencil"></i></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

