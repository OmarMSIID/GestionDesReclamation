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
                <td>image</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($claims as $claim): ?>
                <tr>
                    <td><?= $claim['nom_utilisateur'] ?></td>
                    <td><?= $claim['email'] ?></td>
                    <td><?= $claim['sujet'] ?></td>
                    <td><?= $claim['description'] ?></td>
                    <td><?= $claim['status']?></td>
                    <td> <img src="<?= base_url('photos/' . $claim['photo']) ?>" height="100px" width="100px" alt="Reclamation Photo"></td>
                    <td><a href="/admin/view/<?= $claim['id']?>">view</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>