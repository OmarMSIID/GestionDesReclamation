<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Reclamation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://kit.fontawesome.com/140f9ee5af.js" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        header {
            background-color: #dfe9f5;
            padding: .4rem 0 0;
        }

        .menu {
            padding: .4rem 2rem;
        }

        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }

        header li {
            display: inline-block;
        }

        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }

        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem 17.5px;
            text-align: center;
        }

        header li.menu-item a:hover {
            color: #007bff;
            /* Change to a blue color on hover */
            transform: scale(1.05);
            /* Slightly enlarge the text */
        }

        header li.menu-item a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #007bff;
            /* Underline color on hover */
            left: 0;
            bottom: 0;
            transition: width 0.3s ease;
        }

        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }

        header .menu-toggle button {
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }

        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            color: #007bff;
            transform: scale(1.05);
            /* Slightly enlarge the text */
        }

        body {
            background-color: #dfe9f6;
        }

        .table-container {
            flex: 1;
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .table-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-view {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #f8f9fa;
            padding: 1rem;
        }

        footer p {
            color: #6c757d;
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <div class="menu">
            <ul>
                <li class="menu-toggle">
                    <button id="menuToggle">&#9776;</button>
                </li>
                <li class="menu-item hidden"><a href="/">dashboard</a></li>
                <li class="menu-item hidden"><a href="/statistique">statistique</a>
                </li>
                <li class="menu-item hidden"><a href="/admin/logout" target="_blank">logout</a></li>
            </ul>
        </div>
    </header>

    <div class="table-container">
        <div class="table-title">Liste des Réclamations</div>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($claims as $claim): ?>
                    <tr>
                        <td><?= $claim->getNomUtilisateur() ?></td>
                        <td><?= $claim->getEmail() ?></td>
                        <td><?= $claim->getSujet() ?></td>
                        <td><?= $claim->getStatus() ?></td>
                        <td><a href="/admin/view/<?= $claim->id ?>" class="btn-view">View</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <footer class="bg-light py-3">
        <div class="container text-center">
            <p>&copy; 2024 Gestion des Réclamations. Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>