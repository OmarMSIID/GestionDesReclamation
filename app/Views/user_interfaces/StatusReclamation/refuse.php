<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8d7da;
        }

        .center-message {
            margin-top: 20%;
        }

        .reason {
            border: 1px solid #f5c2c7;
            background-color: #f8d7da;
            padding: 10px;
            margin: 5px 0;
        }
    </style>
    <title>Réclamation Refusée</title>
</head>

<body>
    <div class="container text-center center-message">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="text-danger fw-bold">Réclamation Refusée</h1>
                <p class="mt-3">
                    Nous sommes désolés de vous informer que votre réclamation a été refusée pour l'une des raisons suivantes :
                </p>
                <div class="reason">
                    <strong>1.</strong> La réclamation est hors de nos champs de compétence.
                </div>
                <div class="reason">
                    <strong>2.</strong> Les informations fournies sont incomplètes.
                </div>
                <div class="reason">
                    <strong>3.</strong> La réclamation comprend des informations incorrectes ou inappropriées.
                </div>
                <p class="text-muted mt-3">
                    Merci de votre compréhension.
                </p>
            </div>
        </div>
    </div>
</body>

</html>