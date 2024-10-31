<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list reclamation</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <td>nom d'utilisateur</td>
                <td>email</td>
                <td>sujet</td>
                <td>description</td>
                <td>status</td>
                <td>image</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($claims as $claim): ?>
                <tr>
                    <td><?= $claim->getNomUtilisateur() ?></td>
                    <td><?= $claim->getEmail() ?></td>
                    <td><?= $claim->getSujet() ?></td>
                    <td><?= $claim->getDescription() ?></td>
                    <td><?= $claim->getStatus()?></td>
                    <td> <img src="<?= base_url('photos/' . $claim-> getPhoto()) ?>" height="100px" width="100px" alt="Reclamation Photo"></td>
                    <td><a href="/admin/view/<?= $claim->id?>">view</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>