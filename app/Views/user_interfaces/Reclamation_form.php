<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remplire un reclamation</title>
</head>

<body>
    <?php if(session()->has('succ')):
            echo '<p> '.session()->getFlashdata('succ').'</p>';
        ?>
    <?php endif;?>
    <?php if(session()->has('inValid')):
            echo '<p> '.session()->get('inValid').'</p>';
        ?>
    <?php endif;?>
    <?php if(session()->has('failed')):
            echo '<p> '.session()->get('failed').'</p>';
        ?>
    <?php endif;?>
    <?php if(session()->has('email')):
            echo '<p> '.session()->get('email').'</p>';
        ?>
    <?php endif;?>
    <table>
        <form action="/ajouteReclamation" method="post" enctype="multipart/form-data">
            <tr>
                <td><label>nom et prenom :</label></td>
                <td><input type="text" name="username" require></td>
            </tr>
            <tr>
                <td><label>email:</label></td>
                <td><input type='text' name='email' require></td>
            </tr>
            <tr>
                <td><label>sujet de reclamation:</label></td>
                <td><input type='text' name='sujet' require></td>
            </tr>
            <tr>
                <td><label>description ::</label></td>
                <td><textarea name="description" placeholder="description" require></textarea></td>
            </tr>
            <tr>
                <td><label>photo :</label></td>
                <td><input type="file" name="photo" require></td>
            </tr>
            <tr>
                <td> <button type="submit">envoyer</button>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>