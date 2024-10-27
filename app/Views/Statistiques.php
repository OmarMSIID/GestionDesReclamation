<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Réclamations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> <!-- FontAwesome CDN -->
    <style>
        body {
            background-color: #dfe9f6;
        }
        .stats-container {
            width: 100%;
            max-width: 900px;
            margin: 50px auto;
            text-align: center;
        }
        .stats-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 50px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 30px;
        }
        .stats-number {
            font-size: 36px;
            font-weight: bold;
        }
        .card-recu {
            background-color: #007bff;
            color: white;
        }
        .card-en-cours {
            background-color: #ffc107;
            color: white;
        }
        .card-traitee {
            background-color: #28a745;
            color: white;
        }
        .card-rejetee {
            background-color: #dc3545;
            color: white;
        }
        .card-title i {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div class="stats-container">
        <div class="stats-title">Statistiques des Réclamations</div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card card-recu">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-envelope"></i> 
                            Nombre total de réclamations reçues
                        </h5>
                        <p class="stats-number" id="totalReclamations">0</p>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card card-en-cours">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-spinner"></i> 
                            Réclamations en cours de traitement
                        </h5>
                        <p class="stats-number" id="reclamationsEnCours">0</p>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card card-traitee">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-check-circle"></i> 
                            Réclamations traitées
                        </h5>
                        <p class="stats-number" id="reclamationsTraitees">0</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-rejetee">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-times-circle"></i> 
                            Réclamations rejetées
                        </h5>
                        <p class="stats-number" id="reclamationsRejetees">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simulation des données
        document.getElementById("totalReclamations").textContent = 120;
        document.getElementById("reclamationsEnCours").textContent = 35;
        document.getElementById("reclamationsTraitees").textContent = 70;
        document.getElementById("reclamationsRejetees").textContent = 10;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>