<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            color: #333;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .data-label {
            font-weight: bold;
            color: #0056b3;
        }

        .data {
            color: #333;
        }

        .section {
            margin-bottom: 10px;
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

        hr {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 10px 0;
        }

        .image-container {
            text-align: center;
            margin-top: 50px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 5px;
            max-height: 300px; /* Ensures the image doesn’t get too large */
            object-fit: contain;
        }
    </style>
</head>

<body>
    <h1>Reclamation</h1>

    <hr>

    <div class="section">
        <span class="data-label">Nom d'utilisateur:</span>
        <span class="data"><?= $reclamation->getNomUtilisateur() ?></span>
    </div>
    <div class="section">
        <span class="data-label">ID de Réclamation :</span>
        <span class="data"><?= $reclamation->generated_id ?></span>
    </div>
     
    <div class="section">
        <span class="data-label">Email:</span>
        <span class="data"><?= $reclamation->getEmail() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Sujet:</span>
        <span class="data"><?= $reclamation->getSujet() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Status:</span>
        <span class="data"><?= $reclamation->getStatus() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Description:</span>
        <span class="data"><?= $reclamation->getDescription() ?></span>
    </div>

    <div class="image-container">
        <img src="<?= 'data:image/' . pathinfo($reclamation->getPhoto(), PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents('photos/' . $reclamation->getPhoto())) ?>" alt="Reclamation Photo">
    </div>

    <footer>
        <p>Date: <?= $reclamation->getdate() ?></p>
    </footer>
</body>

</html>