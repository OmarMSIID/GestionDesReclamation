<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion_admins</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#dfe9f6;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Ajouter Admin</h3>
            <form action="<?= base_url('ajouteAdmin') ?>" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="nom_utilisateur">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label> 
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                </div>
                <div class="form-group">
                    <button id="ajouter" name="ajouter" type="submit" class="btn btn-primary btn-block">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- si l'ajout faites sans problemes -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Admin ajouté avec succès !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    <?php if (isset($showSuccessModal) && $showSuccessModal): ?>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    <?php endif; ?>
    </script>
</body>
</html>