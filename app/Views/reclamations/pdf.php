<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réclamation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 24px;
            color: #198754;
        }

        .content p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Votre Réclamation</h1>
        </div>
        <div class="content">
            <p><strong>Email :</strong> <?= $reclamation->email ?></p>
            <p><strong>Sujet :</strong> <?= $reclamation->sujet ?></p>
            <p><strong>ID de Réclamation :</strong> <?= $reclamation->generated_id ?></p>
        </div>
        <div class="footer">
            Vous pouvez suivre l'état de votre réclamation avec cet ID. Merci pour votre confiance.
        </div>
    </div>
</body>
</html>