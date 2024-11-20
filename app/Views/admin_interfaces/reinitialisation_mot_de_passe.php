<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Réinitialisation du mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <h1 class="text-center fs-4 fw-bold mb-4">Réinitialisation du mot de passe</h1>
                    <form method="post" action="<?= base_url('admin/envoyer-lien') ?>" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">L'e-mail est requis</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Envoyer le lien de réinitialisation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('JS/Connexion.js'); ?>"></script>
</body>

</html>