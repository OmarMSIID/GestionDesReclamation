<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation info</title>
</head>
<body>
    <table>
        <tr>
            <td>nom utilisateur:</td>
            <td><?= $claim->getNomUtilisateur() ?></td>
        </tr>
        <tr>
            <td>email:</td>
            <td><?= $claim->getEmail() ?></td>
        </tr>
        <tr>
            <td>sujet:</td>
            <td><?= $claim->getSujet() ?></td>
        </tr>
        <tr>
            <td>description :</td>
            <td><?= $claim->getDescription() ?></td>
        </tr>
        <tr>
            <td>status :</td>
            <td><?= $claim->getStatus()?></td>
        </tr>
        <tr>
            <td>date:</td>
            <td><?= $claim->date?></td>
        </tr>
        <tr>
            <td>image:</td>
            <td><img src="<?= base_url('photos/' . $claim-> getPhoto()) ?>" height="100px" width="100px" alt="Reclamation Photo"></td>
        </tr>
        <tr>
            <td><a href="/admin/accepter/<?=$claim->id ?>">accepte</a></td>
            <td><a href="/admin/delete/<?=$claim->id?>">supprimer</a></td>
        </tr>
    </table>
</body>
</html>