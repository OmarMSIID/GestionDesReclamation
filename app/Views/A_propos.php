<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos</title>
    <link rel="stylesheet" href="<?= base_url('CSS/A_propos.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #dfe9f5;
    }

    h1, h2 {
        color: #343a40;
    }

    p.lead {
        font-size: 1.2rem;
        color: #6c757d;
    }

    footer {
        background-color: #f8f9fa;
    }

    .navbar-light .navbar-brand {
        color: #007bff;
        font-weight: bold;
    }

    .navbar-light .navbar-nav .nav-link {
        color: #007bff;
    }

    .navbar-light .navbar-nav .nav-link.active {
        color: #0056b3;
        font-weight: bold;
    }

    .container img {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }
    .container img:hover {
        transform: scale(1.05);
    }

    ul {
        list-style: none;
        padding-left: 0;
    }

    ul li {
        padding: 10px 0;
        font-size: 1.1rem;
    }

    footer p {
        color: #6c757d;
    }
</style>
<body>
<header>
    <div class="menu">
        <ul>
            <li class="menu-toggle">
                <button id="menuToggle">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="http://localhost:8080">Acceuil</a></li>
            <li class="menu-item hidden"><a href="http://localhost:8080/A_propos.php">A propos</a>
            </li>
            <li class="menu-item hidden"><a href="http://localhost:8080/Statistiques">Statistiques</a></li>
        </ul>
    </div>
</header>

    <!-- Main content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mb-4">À propos de l'application de gestion des réclamations</h1>
                <p class="lead">Notre système permet aux citoyens des communes marocaines de soumettre facilement leurs réclamations, observations, et suggestions, afin d'améliorer la qualité des services publics.</p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6">
                <h2>Pourquoi cette application ?</h2>
                <p>Les citoyens méritent un service public de qualité. Cette plateforme a été développée pour offrir aux communes marocaines un moyen simple et efficace de collecter et de traiter les réclamations des citoyens. Les communes peuvent suivre l’évolution des problèmes signalés et garantir une réponse rapide et adaptée.</p>
            </div>
            <div class="col-md-6">
                <img src="photos/Customer_Complaints.webp" alt="Gestion des réclamations" class="img-fluid rounded">
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6 order-md-2">
                <h2>Fonctionnalités principales</h2>
                <ul>
                    <li>Soumission rapide de réclamations, observations, et suggestions.</li>
                    <li>Suivi en temps réel des réclamations via un tableau de bord.</li>
                    <li>Accès sécurisé pour les administrateurs communaux pour gérer les réclamations.</li>
                </ul>
            </div>
            <div class="col-md-6 order-md-1">
                <img src="photos/Fonctionnalites.jpeg" alt="Fonctionnalités" class="img-fluid rounded">
            </div>
        </div>

        <div class="row my-5 text-center">
            <div class="col-md-12">
                <h2>Notre mission</h2>
                <p class="lead">Faciliter la communication entre les citoyens et les administrations locales pour améliorer les services publics.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-3">
        <div class="container text-center">
            <p>&copy; 2024 Gestion des Réclamations. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>