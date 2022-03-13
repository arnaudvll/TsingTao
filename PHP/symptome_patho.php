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
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("meridiens",$data);

/* REQUETE PATHO */
$sql = "SELECT * FROM public.patho"  ;
    $sth = $dbh->prepare( $sql );
    $sth->execute();
$dataM = $sth->fetchAll(PDO::FETCH_ASSOC);
$smarty->assign("pathologies", $dataM);

/* REQUETE SYMPTOMES */
$sql = "SELECT * FROM public.symptome"  ;
$sth = $dbh->prepare( $sql );
 $sth->execute();
$dataM = $sth->fetchAll(PDO::FETCH_ASSOC);
$smarty->assign("symptomes", $dataM);



$smarty->display('../HTML/symptome_patho.tpl');
?>
