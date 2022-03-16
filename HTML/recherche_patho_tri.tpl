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
                Rechercher une pathologie par tri
            </div>
            
            <form method="POST" action="../PHP/recherche_patho_tri.php">
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

 
        <form method="GET" action="../PHP/recherche_patho_tri.php">
            <div id="centre">
                <div id="meridiens">
                <h4>Liste des Méridiens</h4>
                {foreach $meridiens as $meridien}
                    <label class="container">{$meridien.nom}
                        <input type="checkbox" name="meridien[]" value="{$meridien.code}">
                        <span class="checkmark"></span>
                    </label>
                {/foreach}
            </div>
 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------- Liste des Symptômes ------------------------------------------------------------------------------->
            <div id="pathologies">
                <h4>Liste des Symptômes</h4>
                {foreach $symptomes as $symptome}
                    <label class="container">{$symptome.desc}
                        <input type="checkbox" name="symptome[]" value="{$symptome.ids}">
                        <span class="checkmark"></span>
                    </label>
                {/foreach}
            </div
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------- Pathologies trouvées ------------------------------------------------------------------------->
            <div id="caracteristiques">
                <h4>Pathologies correspondantes :</h4>
                <ul>
                    {foreach $liste_pathologies_rechercher as $pathologie_trouver}
                        <li>{$pathologie_trouver}</li>
                    {/foreach} 
                </ul>
            </div>
            <input type="submit" value="valider" style="height:80px" style="width:130px" background-color= #04AA6D>
        </form>
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