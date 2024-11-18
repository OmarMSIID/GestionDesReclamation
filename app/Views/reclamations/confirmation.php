<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réclamation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .blur-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .modal-container {
            position: relative;
            z-index: 2;
        }

        .confirmation-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            margin: 50px auto;
            text-align: center;
        }

        .generated-id {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
            word-wrap: break-word;
        }

        .btn-download {
            display: inline-block;
            font-size: 1rem;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="blur-background"></div>

    <div class="modal-container d-flex align-items-center justify-content-center vh-100">
        <div class="confirmation-box">
            <h3 class="text-success mb-4">Réclamation soumise avec succès !</h3>
            <p>Vous pouvez suivre le statut de votre réclamation avec l'ID suivant :</p>
            <div class="generated-id"><?= $generated_id ?></div>
            <a href="<?= base_url('telecharger-reclamation/' . $generated_id) ?>" 
               class="btn btn-primary btn-download mt-3">
                <i class="fas fa-download"></i> Télécharger le PDF
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>