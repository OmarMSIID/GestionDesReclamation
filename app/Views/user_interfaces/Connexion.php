<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Se connecter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body {
            background-color: #dfe9f5;
        }

        #h1_form {
            margin-bottom: 58px;
        }

        #div2 {
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        #div2:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger position-absolute" style="top: 4%;left: 50%;transform: translate(-50%, -50%);">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <div class="d-flex justify-content-center align-items-center container h-100 vh-100">
        <div id="div2" class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h1 id="h1_form" class="text-center fs-3 card-title fw-bold">Se connecter</h1>
                    <form method="post" action="Admin/Connexion" class="needs-validation" novalidate="" autocomplete="on">
                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="email">E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="" required>
                            <div class="invalid-feedback">
                                E-mail n'est pas valide
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="password">Mot de passe</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">
                                Le mot de passe est requis
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ms-auto">
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('JS/Connexion.js'); ?>"></script>
</body>

</html>