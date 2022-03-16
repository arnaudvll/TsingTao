<?php
require '../libs/Smarty.class.php';

$smarty = new Smarty();
try {
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=acudb', 'pgtidal', 'tidal');
    } 
catch (PDOException $e) {
    echo $e->getCode() . ' ' . $e->getMessage();
    }

require './connexion.php'; #on importe après pour avoir smarty et la requete a la PDO dans connexion.php sans avoir a l'importer

/* REQUETE PATHO */
$sql = "SELECT * FROM public.patho"  ;
    $sth = $dbh->prepare( $sql );
    $sth->execute();
$data_patho = $sth->fetchAll(PDO::FETCH_ASSOC);

/* REQUETE SYMPTOMES PATHO*/
$sql = "SELECT * FROM public.symptpatho"  ;
$sth = $dbh->prepare( $sql );
 $sth->execute();
$data_sympt_patho = $sth->fetchAll(PDO::FETCH_ASSOC);

/* REQUETE KEYWORDS */
sql = "SELECT * FROM public.keywords"  ;
$sth = $dbh->prepare( $sql );
 $sth->execute();
$data_keywords = $sth->fetchAll(PDO::FETCH_ASSOC);

/* REQUETE KEYSYMPT */
sql = "SELECT * FROM public.keysympt"  ;
$sth = $dbh->prepare( $sql );
 $sth->execute();
$data_keysympt = $sth->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["valider"])){
    $recherche=$_POST["recherche"];
}

foreach ($data_keywords as $keywords)    /* On parcours toutes les pathologies */
{   
    if ($keywords["name"]== $recherche){

        foreach ($data_keysympt as $keysympt)   /* On parcours tous les meridiens coché*/
    {       
            if ($keysympt["idk]"]== $keywords["idk"]){
                foreach ($data_sympt_patho as $sympt_patho){
                    if ($sympt_patho["ids"]==$keysympt["ids"]){
                        foreach ($data_patho as $patho){
                            if ($sympt_patho["idp"]==$patho["idp"]){
                                $resultat = $patho["desc"];
                            }
                        }
                    }
                }
            }
        }
    }
}


$smarty->display('../HTML/recherche.tpl');
?>