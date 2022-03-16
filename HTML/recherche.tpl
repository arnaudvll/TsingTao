<!DOCTYPE html>


<html lang="fr">
    <head>
        <link type="text/css" rel="stylesheet" href="../CSS/formulaire.css">
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
                Rechercher une pathologie
            </div>
            
            <form method="POST" action="../PHP/rechercher_patho.php">
                <label for="utilisateur" style="{$display_connexion}">Nom d'utilisateur:</label><br>
                <input type="text" id="utilisateur" name="utilisateur" style="{$display_connexion}" {$required}><br><br>
        
                <label for="mdp" style="{$display_connexion}">Mot de passe:</label><br>
                <input type="password" id="password" name="password" style="{$display_connexion}" {$required}><br><br>

                <input  type="submit" name="connexion" value="Connexion" style="{$display_connexion}">  
                <input  type="submit" name="creation_compte" value="Création de compte" style="{$display_connexion}">
                <input  type="submit" name="deconnexion" value="Déconnexion" style="{$display_deconnexion}">
                             
                <p id='msgerreur'>{$msgerreur}</p>
            </form>

        </div>
                          
<!------------------------------------------------------------------- BARRE DE NAVIGATION ------------------------------------------------------------->
        <div class="topnav">
            <a class="active" href="../PHP/symptome_patho.php">Liste des symptômes et des pathologies</a>
            <a class="active" href="../PHP/rechercher_patho.php">Rechercher une pathologie</a>
            <a class="active" style="{$display_recherche}" href="../PHP/recherche.php">Rechercher une pathologie</a>

        </div>                   
                  
        <form method = "POST" action="../PHP/recherche.php">
            <label for="recherche" >Mots-clefs:</label><br>
            <input type="text" name="recherche" required><br><br>
            <input  type="submit" name="valider" value="Valider">  
        </form>

        <div>{$resultat}</div>
        
  
    
         
    </body>
</html>