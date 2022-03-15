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

/* REQUETE PATHO */
$sql = "SELECT * FROM public.patho"  ;
$sth = $dbh->prepare( $sql );
$sth->execute();
$dataP = $sth->fetchAll(PDO::FETCH_ASSOC);
$smarty->assign("pathologies", $dataP);

/* REQUETE SYMPTOMES */
$sql = "SELECT * FROM public.symptome"  ;
$sth = $dbh->prepare( $sql );
$sth->execute();
$dataS = $sth->fetchAll(PDO::FETCH_ASSOC);
$smarty->assign("symptomes", $dataS);


$smarty->display('../HTML/symptome_patho.tpl');
?>
