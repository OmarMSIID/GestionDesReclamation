<?= $this->extend('admin_interfaces/dashboard.php') ?>

<?= $this->section('content') ?>
<h3 class="text-center mt-5">Gestion des Reclamation.</h3>
<div class="message">
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger text-center" role="alert" style="margin-top: 20px;">
            <?= session()->get('error') ?>
        </div>
    <?php endif; ?>
</div>
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
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Sujet</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($claims as $claim): ?>
                <tr>
                    <td class="text-center"><?= $claim->getNomUtilisateur() ?></td>
                    <td class="text-center"><?= $claim->getEmail() ?></td>
                    <td class="text-center"><?= $claim->getSujet() ?></td>
                    <td class="text-center"><?= $claim->getStatus() ?></td>
                    <td class="text-center">
                        <a href="/admin/view/<?= $claim->id ?>" class="btn btn-info btn-sm">
                            VOIR
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!--pagination-->
    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('default', 'bootstrap_pagination') ?>
    </div>
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