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
                Liste des symptômes et des pathologies
            </div>
            
            <form method="POST" action="../PHP/symptome_patho.php">
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
            <a class="active" href="../PHP/recherche_patho_tri.php">Rechercher une pathologie par tri</a>
            <a class="active" style="{$display_recherche}" href="../PHP/recherche_patho_motcle.php">Rechercher une pathologie par mot clé</a>
        </div>                      
                  
        
  
 <!------------------------------------------------------------------- Liste des Meridiens ------------------------------------------------------------------------->

            <div id="centre">
                <div id="meridiens">
                    <h4>Liste des principales pathologies</h4>
                    <ul>
                        {foreach $pathologies as $pathologie}
                            <li>{$pathologie.desc}</li>
                        {/foreach}
                    </ul>
                </div>
 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------- Types de pathologies ------------------------------------------------------------------------->
                <div id="pathologies">
                    <h4>Liste des principaux symptômes</h4>
                    <ul>
                        {foreach $symptomes as $symptome}
                            <li>{$symptome.desc}</li>
                        {/foreach}
                    </ul>
                </div>
            </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <figure>       
            <audio
                hidden
                autoplay
                controls
                src="../Medias/Abundance.mp3">
            </audio>
        </figure>
    </body>
</html>