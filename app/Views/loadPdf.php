<html>
    <head>
        <style>
            h1{
                text-align: center;
                font:bold;
            }
            
        

        </style>
    </head>
    <body>
        <h1>Reclamation : </h1><br>
        <br>
        <p>nom d'utilisateur : <span class="data"><?= $claim['nom_utilisateur']?></span> </p><br>
        <p>email : <span class="data"><?= $claim['email']?></span></p><br>
        <p>sujet : <span class="data"><?= $claim['sujet']?></span></p><br>
        <p>description : <span class="data" ><?= $claim['description']?></span> </p><br>
        <p>date : <?= date('Y-m-d H:i:s')?></p>
    </body>

</html>