<div class="row">
    <div class="col-md-4">
        <div class="box" id="newBill">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-cart-plus"></i> Articles à acheter</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body" id="formContainerBill">
                
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box" id="fournisseurs">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-industry"></i> Fournisseurs</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-6" id="formContainerFournisseur">
                    <?php
                    require_once("./ajax/fournisseur.form.ajax.php");
                    ?>
                </div>
                <div class="col-md-6">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>
                                Fournisseur
                            </th>
                            <th>
                                Téléphone
                            </th>
                            <th>
                                Mail
                            </th>
                            <th>
                                Nb facture
                            </th>
                            <th colspan='2'>
                            </th>
                        </tr>
                        </thead>
                        <tbody id='fournisseurList'>
                        <?php
                        require_once('./ajax/fournisseur.list.ajax.php');
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>