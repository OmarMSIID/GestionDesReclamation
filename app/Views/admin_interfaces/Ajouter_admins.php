<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion_admins</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>

<body style="background-color:#dfe9f6;">
    <header>
        <div class="menu">
            <ul>
                <li class="menu-toggle">
                    <button id="menuToggle">&#9776;</button>
                </li>
                <li class="menu-item hidden"><a href="/admin/List_Reclamation">dashboard</a></li>
                <li class="menu-item hidden"><a href="/admin/logout">logout</a></li>
            </ul>
        </div>
    </header>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger position-absolute" style="top: 4%;left: 50%;transform: translate(-50%, -50%);">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Ajouter Admin</h3>
            <form action="<?= base_url('ajouteAdmin') ?>" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="nom_utilisateur">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                </div>
                <div class="form-group">
                    <button id="ajouter" name="ajouter" type="submit" class="btn btn-primary btn-block">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- si l'ajout faites sans problemes -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Admin ajouté avec succès !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        <?php if (isset($showSuccessModal) && $showSuccessModal): ?>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        <?php endif; ?>
    </script>
</body>

</html>