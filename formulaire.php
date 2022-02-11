<!DOCTYPE html>


<html lang="fr">
    <head>
        <link type="text/css" rel="stylesheet" href="../CSS/formulaire.css">
        <meta charset="UTF-8">
        <title>Tsing Tao</title>
    </head>

    <body>


<!-----------------------------------------------------------------------ENTETE-------------------------------------------------------------------------------->
        <div id="entete" >
            <div id="div-titre">
                <h1 id="titre"> Tsing Tao </h1>
            </div>
            <div id="div-logo">
                <a href="formulaire.html">
                    <img id="logo" src="../Medias/zen-logo.jpg" alt="">
                </a>
            </div>
        </div>


                  
<!------------------------------------------------------------------- BARRE DE NAVIGATION ------------------------------------------------------------->
        <div class="topnav">
          <a class="active" href="formulaire.html">Formulaire</a>
          <a href="patho.html">Pathologies</a>
          <a href="contact.html">Contact</a>
        </div>                   
                  
        
  
 <!------------------------------------------------------------------- Liste des Meridiens ------------------------------------------------------------------------->
        <div id="meridiens">
            <h4>Liste des Méridiens</h4>
            <label class="container">Poumon
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            
            <label class="container">Gros intestin
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Estomac
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Rate-Pancréas
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Coeur
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Intestin Grêle
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Vessie
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Rein
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Péricarde
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Triple réchauffeur
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Vésicule biliaire
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Foie
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Du mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Ren mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Chong mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Dai mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Yin qiao mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Yang qiao mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Yin wei mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Yang wei mai
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 
        </div>
 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------- Types de pathologies ------------------------------------------------------------------------->
        <div id="pathologies">
            <h4>Liste des Pathologies</h4>
            <label class="container">Méridien
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            
            <label class="container">Organe - Viscère
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Luo
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Merveilleux vaisseaux
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Jing Jin
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 
        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------- Caractéristiques ------------------------------------------------------------------------->
        <div id="caracteristiques">
            <h4>Caractéristiques</h4>
            <label class="container">Plein
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            
            <label class="container">Chaud
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Vide
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Froid
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Interne
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 

            <label class="container">Externe
                <input type="checkbox">
                <span class="checkmark"></span>
            </label> 
        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div id="valider">
            <a href="valider">Valider</a>
        </div>
    </body>
</html>


<form method='POST' action='test.php'>
Merci de cocher vos pathologies:<br>
<input type="checkbox" name="pathologies[]" value="Meridien"> Meridien<br>
<input type="checkbox" name="pathologies[]" value="Viscere"> Viscere<br>
<input type="checkbox" name="pathologies[]" value="Luo"> Luo<br>
<input type="checkbox" name="pathologies[]" value="MerveileuxVaisseaux"> MerveileuxVaisseaux<br>
<input type="checkbox" name="pathologies[]" value="rouge"> JingJin<br>
<input type="submit" name="exple2" value="Résultats">
</form>

localhost / aqdb