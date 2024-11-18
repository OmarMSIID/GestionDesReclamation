<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #dfe9f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #dfe9f5;
            padding: .4rem 0 0;
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

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .detail {
            display: flex;
            flex-direction: row;
            margin-bottom: 15px;
        }

        .label {
            flex: 1;
            font-weight: bold;
            color: #0056b3;
        }

        .value {
            flex: 2;
            color: #333;
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        img {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            height: auto;
        }

        .actions {
            text-align: center;
            margin-top: 30px;
        }

        a.btn {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            color: white;
            margin-right: 10px;
            font-size: 16px;
        }

        a.btn-accept {
            background-color: #007bff;
        }

        a.btn-accept:hover {
            background-color: #0056b3;
        }

        a.btn-delete {
            background-color: #dc3545;
        }

        a.btn-delete:hover {
            background-color: #a71d2a;
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
                <li class="menu-item hidden"><a href="/admin/dashboard">dashboard</a></li>
                <li class="menu-item hidden"><a href="/Statistiques">statistique</a>
                </li>
                <li class="menu-item hidden"><a href="/admin/logout" >logout</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="title">Reclamation Details</div>
        <div class="detail">
            <div class="label">Nom Utilisateur:</div>
            <div class="value"><?= $claim->getNomUtilisateur() ?></div>
        </div>
        <div class="detail">
            <div class="label">Email:</div>
            <div class="value"><?= $claim->getEmail() ?></div>
        </div>
        <div class="detail">
            <div class="label">Sujet:</div>
            <div class="value"><?= $claim->getSujet() ?></div>
        </div>
        <div class="detail">
            <div class="label">Description:</div>
            <div class="value"><?= $claim->getDescription() ?></div>
        </div>
        <div class="detail">
            <div class="label">Status:</div>
            <div class="value"><?= $claim->getStatus() ?></div>
        </div>
        <div class="detail">
            <div class="label">Date:</div>
            <div class="value"><?= $claim->getDate() ?></div>
        </div>
        <div class="image-container">
            <img src="<?= base_url('photos/' . $claim->getPhoto()) ?>" alt="Reclamation Photo">
        </div>
        <div class="actions">
            <a href="/admin/accepter/<?= $claim->id ?>" class="btn btn-accept">Accepter</a>
            <a href="/admin/delete/<?= $claim->id ?>" class="btn btn-delete">Supprimer</a>
        </div>
    </div>
</body>

</html>