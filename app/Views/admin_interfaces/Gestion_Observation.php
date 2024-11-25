<?= $this->extend('admin_interfaces/dashboard.php') ?>

<?= $this->section('content') ?>
    <h3 class="text-center mt-5">Gestion des Observations</h3>

    <div class="container mt-5">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nom d'utilisateur</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">Sujet</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($observations as $observation): ?>
                    <tr>
                        <td class="text-center"><?= esc($observation->nom_utilisateur) ?></td>
                        <td class="text-center"><?= esc($observation->date) ?></td>
                        <td class="text-center"><?= esc($observation->sujet) ?></td>
                        <td class="text-center">
                            <button class="btn btn-info" data-toggle="modal" data-target="#viewObservationModal<?= $observation->id ?>">Voir</button>
                            <a href="<?= base_url('admin/supprimer_observation/'.$observation->id) ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette observation ?')">Supprimer</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="viewObservationModal<?= $observation->id ?>" tabindex="-1" role="dialog" aria-labelledby="viewObservationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewObservationModalLabel">Détails de l'Observation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nom d'utilisateur:</strong> <?= esc($observation->nom_utilisateur) ?></p>
                                    <p><strong>Email:</strong> <?= esc($observation->email) ?></p>
                                    <p><strong>Date:</strong> <?= esc($observation->date) ?></p>
                                    <p><strong>Sujet:</strong> <?= esc($observation->sujet) ?></p>
                                    <p><strong>Description:</strong> <?= esc($observation->description) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--pagination-->
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links('default', 'bootstrap_pagination') ?>
        </div>

</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).on('show.bs.modal', '.modal', function () {
            $('body').css('overflow', 'hidden');
        }).on('hidden.bs.modal', function () {
            $('body').css('overflow', 'auto');
        });
    </script>
<?= $this->endSection() ?>
