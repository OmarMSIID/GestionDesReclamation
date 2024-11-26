<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .sidebar {
            background-color: #fff;
            height: 100vh;
            position: fixed;
            width: 17%;
            padding: 0;
            border-right: 1px solid #dee2e6;
        }

        .sidebar h4 {
            padding-top: 20px;
            padding-bottom: 30px;
            font-weight: bold;
        }

        .nav-link {
            color: #495057;
            font-size: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .nav-link.active {
            background-color: #e2e6ea;
            color: #007bff;
            font-weight: bold;
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 18px;
        }

        .nav-link:hover {
            color: #007bff;
            text-decoration: none;
        }

        .text-danger {
            color: #dc3545 !important;
            font-weight: bold;
        }

        .logout {
            position: absolute;
            bottom: 0;
            color: whitesmoke;
            background-color: rgb(194, 58, 58);
            width: 100%;
            padding: 2px 20px;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .logout:hover {
            background-color: rgb(194, 58, 58);
        }

        .logout_a:hover {
            color: whitesmoke;
        }

        .logout_a {
            color: whitesmoke;
        }
    </style>

</head>

<body style="background-color: #dfe9f5;">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="alert alert-success mb-0">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row">
            <nav class="  d-md-block sidebar">
                <div class="text-center">
                    <h4>Tableau de Bord</h4>
                    <ul class="nav flex-column mt-5 text-center">
                        <li class="nav-item text-center">
                            <a class="nav-link text-center ml-2" href="<?= base_url('admin/List_Reclamation') ?>">
                                <i class="fas fa-exclamation-circle fa-fw"></i> Réclamations
                            </a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link text-center ml-2" href="<?= base_url('Liste_Observations') ?>">
                                <i class="fas fa-eye fa-fw"></i> Observations
                            </a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link text-center ml-2" href="<?= base_url('Liste_Suggestions') ?>">
                                <i class="fas fa-lightbulb fa-fw"></i> Suggestions
                            </a>
                        </li>
                        <?php if (session()->get('super_admin')): ?>
                            <li class="nav-item text-center">
                                <a class="nav-link text-center ml-2" href="<?= base_url('Liste_Admins') ?>">
                                    <i class="fas fa-users fa-fw"></i> admin
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item logout text-center">
                            <a class="nav-link btn-btn danger logout_a text-center" href="/admin/logout">
                                <i class="fas fa-sign-out-alt fa-fw"></i> Déconnecter
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="content">
                    <?= $this->renderSection('content') ?>

                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
            setTimeout(() => {
                $('#successModal').modal('hide');
            }, 1500);
        });
    </script>
</body>

</html>