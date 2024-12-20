<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre_Reclamation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('JS/Soumettre_Forms/Soumettre_Reclamation.js'); ?>"></script>
    <style>
        body {
            background-color: #dfe9f6;
        }

        .form-container {
            width: 400px;
            margin: 42px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .btn-primary {
            background-color: #007bff;
            margin-left: 40px;
            width: 120px;
        }

        .btn-secondary {
            background-color: #6c757d;
            margin-right: 40px;
            width: 120px;
        }
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger position-absolute" style="top: 4%;left: 50%;transform: translate(-50%, -50%);">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="form-container">
        <div class="form-title">Soumettre une Réclamation</div>
        <form id="reclamationForm" action="/ajouteReclamation" method="post" enctype="multipart/form-data">
            <!-- Nom d'utilisateur -->
            <div class="mb-3">
                <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
            </div>

            <!-- E-mail -->
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
            </div>

            <!-- Sujet de réclamation -->
            <div class="mb-3">
                <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Sujet de réclamation" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Description" required></textarea>
            </div>

            <!-- Sélection d'une photo -->
            <div class="mb-3">
                <input type="file" class="form-control" id="photo" name="photo" placeholder="Sélectionnez une photo (facultatif)">
            </div>

            <!-- Boutons d'action -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </div>
</body>

</html>