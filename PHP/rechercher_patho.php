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

/* ----------------------------------------------------REQUETE-------------------------------------------------------------------*/
/* REQUETE MERIDIEN */
$sql = "SELECT * FROM public.meridien"  ;
$sth = $dbh->prepare( $sql );
$sth->execute();
$data_meridien = $sth->fetchAll(PDO::FETCH_ASSOC);

/* REQUETE PATHO */
$sql = "SELECT * FROM public.patho"  ;
    $sth = $dbh->prepare( $sql );
    $sth->execute();
$data_patho = $sth->fetchAll(PDO::FETCH_ASSOC);

/* REQUETE SYMPTOMES */
$sql = "SELECT * FROM public.symptome"  ;
$sth = $dbh->prepare( $sql );
 $sth->execute();
$data_sympt = $sth->fetchAll(PDO::FETCH_ASSOC);

/* REQUETE SYMPTOMES PATHO*/
$sql = "SELECT * FROM public.symptpatho"  ;
$sth = $dbh->prepare( $sql );
 $sth->execute();
$data_sympt_patho = $sth->fetchAll(PDO::FETCH_ASSOC);


$smarty->assign("meridiens",$data_meridien);
$smarty->assign("symptomes", $data_sympt);


/* --------------------------------------------------------------TRI POUR AFFICHAGE PATHO ----------------------------------------*/

/* Recupération des CODES des meridiens coches */
$liste_meridiens_cocher = array();

if (!empty($_GET['meridien'])){
    foreach ($_GET['meridien'] as $meridien_cocher)
        {
            $liste_meridiens_cocher[] = $meridien_cocher;
        }
}

/* Recupération des IDS symptomes coches */
$liste_symptomes_cocher = array();

if (!empty($_GET['symptome'])){
    foreach ($_GET['symptome'] as $symptome_cocher)
        {
            $liste_symptomes_cocher[] = $symptome_cocher;
        }
}

/* Recupération des pathologies correspondantes */

$patho_meridien = array();
$patho_sympt = array();
$liste_pathologies_rechercher = array();

foreach ($data_patho as $pathologie)    /* On parcours toutes les pathologies */
{   
    foreach ($liste_meridiens_cocher as $meridien_cocher)   /* On parcours tous les meridiens coché*/
    {   
        if ($meridien_cocher == $pathologie["mer"]) /* On regarde si la patho et le meridien coché on le meme code/mer */
        {
            $patho_meridien[] = $pathologie["desc"];
        }
    }

    foreach ($liste_symptomes_cocher as $symptome_cocher) /* On parcours tous les symptomes coché */
    { 
        foreach ($data_sympt_patho as $symptome_patho)
        {
            if ($pathologie["idp"] == $symptome_patho["idp"] and $symptome_cocher == $symptome_patho["ids"]) /* On regarde les pathologies correspondant aux symptomes cochés */
            {
                    $patho_sympt[] = $pathologie["desc"];
            }
        }
    }
}

/* On réalise l'affichage en fonction de ce qui a été coché */
if (empty($liste_symptomes_cocher)) {
    $liste_pathologies_rechercher = $patho_meridien;
}
elseif (empty($liste_meridiens_cocher)) {
    $liste_pathologies_rechercher = $patho_sympt;
}
else {
    foreach ($patho_meridien as $pm) {
        foreach ($patho_sympt as $ps) {
            if ($pm == $ps) {
                $liste_pathologies_rechercher[] = $pm;
            }
        }
    }
}

$smarty->assign("liste_pathologies_rechercher", $liste_pathologies_rechercher);

/* --------------------------------------------------------------------------FINAL ------------------------------------------------*/
$smarty->display('../HTML/rechercher_patho.tpl');
?>

