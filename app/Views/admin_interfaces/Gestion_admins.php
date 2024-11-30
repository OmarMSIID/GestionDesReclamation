<?= $this->extend('admin_interfaces/dashboard.php') ?>

<?= $this->section('content') ?>
<h3 class="text-center mt-5">Gestion des Administrateurs</h3>
<div>
    <p class="text-dark fw-bold text-start mt-3" style="font-size: 20px;">
        Bonjour <?= session()->get("nom_utilisateur") ?>
    </p>
</div>
<div class="container mt-5">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col" class="text-center">Nom d'utilisateur</th>
                <th scope="col" class="text-center">E-mail</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
                <?php if ($admin->role === "admin") : ?>
                    <tr>
                        <td class="text-center"><?= esc($admin->nom_utilisateur) ?></td>
                        <td class="text-center"><?= esc($admin->email) ?></td>
                        <td class="text-center">
                            <button class="btn btn-info" data-toggle="modal" data-target="#editAdminModal<?= $admin->id ?>">Modifier</button>
                            <a href="<?= base_url('admin/supprimer_admin/' . $admin->id) ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet admin ?')">Supprimer</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="editAdminModal<?= $admin->id ?>" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editAdminModalLabel">Modifier l'admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/modifier_admin/' . $admin->id) ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nom_utilisateur">Nom d'utilisateur</label>
                                            <input type="text" class="form-control" name="nom_utilisateur" value="<?= esc($admin->nom_utilisateur) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= esc($admin->email) ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        <?= $pages->links('default', 'bootstrap_pagination') ?>
    </div>
</div>
<div>
    <p class="text-dark fw-bold text-start mt-3" style="font-size: 20px;">
        <a href="/Ajouter_admins">Ajouter un admin.</a>
    </p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).on('show.bs.modal', '.modal', function() {
        $('body').css('overflow', 'hidden');
    }).on('hidden.bs.modal', function() {
        $('body').css('overflow', 'auto');
    });
</script>
<?= $this->endSection() ?>