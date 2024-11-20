<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Définir un nouveau mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger position-absolute" style="top: 4%;left: 50%;transform: translate(-50%, -50%);">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <h1 class="text-center fs-4 fw-bold mb-4">Définir un nouveau mot de passe</h1>
                    <form method="post" action="<?= base_url('admin/mettre-a-jour-mot-de-passe') ?>" class="needs-validation" novalidate>
                        <input type="hidden" name="identifiant" value="<?= $identifiant ?>">

                        <div class="mb-3">
                            <label class="form-label" for="password">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password" name="mot_de_passe" required>
                            <div class="invalid-feedback">Le mot de passe est requis</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
