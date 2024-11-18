<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('CSS/Acceuil.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://kit.fontawesome.com/140f9ee5af.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="menu">
        <ul>
            <li class="menu-toggle">
                <button id="menuToggle">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="/">Acceuil</a></li>
            <li class="menu-item hidden"><a href="/A_propos">A propos</a>
            </li>
            <li class="menu-item hidden"><a href="/Statistiques" >Statistiques</a></li>
        </ul>
    </div>
    <div class="heroe">
        <h1>Votre satisfaction est notre priorité.</h1>
            <h2>Soumettez vos 
                <span class="dynamic-text" style="color: #008080;border-bottom: #008080 2px solid;">
                    réclamations
                </span>
                et suivez leur traitement ici.
            </h2>
        </h1>
    </div>
</header>
<section class="cards-container">
        <div class="card">
            <h3 style="top:0">Réclamation</h3>
            <p>
                Déposez ici votre réclamation pour tout problème avec un service public.
            </p>
            <div class="card-buttons">
                <a href="/Soumettre_Reclamation"><button type="submit" id="Soumettre1"><i class="fa-regular fa-paper-plane" style="color: white;"></i>   Soumettre</button></a>
                <button type="submit" id="Suivre"><i class="fa-regular fa-hand-point-up"></i>   Suivre</button>
            </div>
        </div>
        <div class="card">
            <h3>Observation</h3>
            <p>
                Si vous avez des remarques ou suggestions sur nos services, soumettez vos observations ici.
            </p>
            <div class="card-buttons">
                <a href="/Soumettre_Observation"><button type="submit" id="Soumettre2"><i class="fa-regular fa-paper-plane" style="color: white;" ></i>     Soumettre</button></a>
            </div>
        </div>
        <div class="card">
            <h3>Suggestion</h3>
            <p>
                Vous avez des idées pour améliorer nos services ? Soumettez vos suggestions ici.
            </p>
            <div class="card-buttons">
                <a href="/Soumettre_Suggestion"><button type="submit" id="Soumettre3"><i class="fa-regular fa-paper-plane" style="color: white;"></i>     Soumettre</button></a>
            </div>
        </div>
    </section>

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }

    const mots = ["réclamations", "observations", "suggestions"];

    let index = 0; // Initialiser l'index pour savoir quel mot afficher

    const texteDynamique = document.querySelector('.dynamic-text'); // Trouver l'élément HTML où le texte va changer

    function changerMot() {
       
        texteDynamique.textContent = mots[index]; // Changer le texte de l'élément par le mot correspondant à l'index actuel

        index = index + 1; // Incrémenter l'index pour afficher le mot suivant

        // Si l'index atteint la fin du tableau, le remettre à 0 pour recommencer
        if (index === mots.length) {
            index = 0;
        }
    }
    setInterval(changerMot, 1300); // Appeler la fonction changerMot toutes les 4 secondes (1300 millisecondes)
</script>
</body>
</html>
