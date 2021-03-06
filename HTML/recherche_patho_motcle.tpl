<!DOCTYPE html>


<html lang="fr">
    <head>
        <link type="text/css" rel="stylesheet" href="../CSS/css_global.css">
        <meta charset="UTF-8">
        <title>Tsing Tao</title>
    </head>

    <body>


<!-----------------------------------------------------------------------ENTETE-------------------------------------------------------------------------------->
            <div class="entete" >
            <div id="div-titre">
                <h1 id="titre"> Tsing Tao </h1>
            </div>
            <div id="div-logo">
                <a href="../PHP/symptome_patho.php">
                    <img id="logo" src="../Medias/zen-logo.jpg" alt="">
                </a>
            </div>
            <div id="div-phrase">
                <h1 id="phrase">“La peur des piqûres, ça ne peut pas se guérir par l'acupuncture.” Pierre Legaré </h1>
            </div>
            <div id="div-connexion">
                <form method="POST" action="../PHP/recherche_patho_tri.php">
                    <label id = "user" for="utilisateur" style="{$display_connexion}">Nom d'utilisateur:</label><br>
                    <input type="text" id="utilisateur" name="utilisateur" style="{$display_connexion}" {$required}><br><br>

                    <label id = "user" for="mdp" style="{$display_connexion}">Mot de passe:</label><br>
                    <input type="password" id="password" name="password" style="{$display_connexion}" {$required}><br><br>

                    <input  type="submit" name="connexion" value="Connexion" style="{$display_connexion}">  
                    <input  type="submit" name="creation_compte" value="Création de compte" style="{$display_connexion}">
                    <input  id ="deco" type="submit" name="deconnexion" value="Déconnexion" style="{$display_deconnexion}">
                                
                    <p id='msgerreur'>{$msgerreur}</p>
                </form>
            </div>
            </div>
                          
<!------------------------------------------------------------------- BARRE DE NAVIGATION ------------------------------------------------------------->
        <div class="topnav">
            <a class="active" href="../PHP/symptome_patho.php">Liste des symptômes et des pathologies</a>
            <a class="active" href="../PHP/recherche_patho_tri.php">Rechercher une pathologie par tri</a>
            <a class="active" style="{$display_recherche}" href="../PHP/recherche_patho_motcle.php">Rechercher une pathologie par mot clé</a>
        </div>                      
                  

<!------------------------------------------------------------------- RECHERCHE PAR MOT CLE ------------------------------------------------------------->

        <div id="div-motclef">

            <form method = "POST" action="../PHP/recherche_patho_motcle.php">
                <label id="phrase2" for="recherche" >Mots clés: </label><br>
                <input type="text" name="recherche" required><br><br>
                <input id="valider2" type="submit" name="valider" value="Valider">  
            </form>
            <div >
                <h4 id="phrase2">Pathologies correspondantes :</h4>
            </div>
            <div id="phrase2">{$resultat}</div>
        </div>
    </body>
</html>