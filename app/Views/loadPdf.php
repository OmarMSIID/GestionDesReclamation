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

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #888;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Reclamation</h1>
    
    <hr>

    <div class="section">
        <span class="data-label">Nom d'utilisateur:</span>
        <span class="data"><?= $claim->getNomUtilisateur() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Email:</span>
        <span class="data"><?= $claim->getEmail() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Sujet:</span>
        <span class="data"><?= $claim->getSujet() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Status:</span>
        <span class="data"><?= $claim->getStatus() ?></span>
    </div>

    <div class="section">
        <span class="data-label">Description:</span>
        <span class="data"><?= $claim->getDescription() ?></span>
    </div>

    <div class="footer">
        <p>Date: <?= date('Y-m-d H:i:s') ?></p>
    </div>
</body>
</html>