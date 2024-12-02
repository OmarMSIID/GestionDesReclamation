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

        .message {
            margin-top: 100px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 5px;
            max-height: 300px;
            object-fit: contain;
        }

        .image-container {
            text-align: center;
            margin-top: 50px;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 10px 0;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            font-size: 0.9em;
            color: #888;
            border-top: 1px solid #ddd;
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
            <p><strong>Description :</strong> <?= $reclamation->description ?></p>
            <p><strong>ID de Réclamation :</strong> <?= $reclamation->generated_id ?></p>
        </div>
        <div class="image-container">
            <img src="<?= 'data:image/' . pathinfo($reclamation->getPhoto(), PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents('photos/' . $reclamation->getPhoto())) ?>" alt="Reclamation Photo">
        </div>
        <div class="message">
            Vous pouvez suivre l'état de votre réclamation avec cet ID. Merci pour votre confiance.
        </div>
        <footer>
            <p>Date: <?= $reclamation->getdate() ?></p>
        </footer>
    </div>
</body>
</html>