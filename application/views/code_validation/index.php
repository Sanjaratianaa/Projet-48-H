<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Listes des code à valider</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Utilisateur</th>
                            <th>Montant</th>
                            <th>Date demande</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($code_demandes as $code_demande) {?>
                            <tr>
                                <td><?=$code_demande->id_demande?></td>
                                <td><?=$code_demande->mail;?></td>
                                <td><?=$code_demande->montant;?></td>
                                <td><?=$code_demande->date?></td>
                                <td>
                                    <a href="<?=base_url('code/Code/validation/'.$code_demande->id)?>" class="btn btn-success">Valider</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>