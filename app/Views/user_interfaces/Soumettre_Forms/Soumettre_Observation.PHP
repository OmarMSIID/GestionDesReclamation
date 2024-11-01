<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre_Observation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= base_url('JS/Soumettre_Forms/Soumettre_Reclamation.js'); ?>"></script>
    <style>
        body {
            background-color: #dfe9f6;
        }
        .form-container {
            width: 400px;
            margin: 90px auto;
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

<div class="form-container">
        <div class="form-title">Soumettre une Observation</div>
        <form action="<?= base_url('ajouteObservation') ?>" method="post">
            <!-- Nom d'utilisateur -->
            <div class="mb-3">
                <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
            </div>
            
            <!-- E-mail -->
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
            </div>
            
            <!-- Sujet -->
            <div class="mb-3">
                <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Sujet" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Description" required></textarea>
            </div>
            
            <!-- Boutons d'action -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </div>
    <!-- si l'ajout d'une observation faites sans problemes -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #d0f0c0;">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Merci pour votre Observation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Votre observation a été soumise avec succès. Nous apprécions votre contribution !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Fermer</button>
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