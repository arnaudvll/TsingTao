<?php
require 'libs/Smarty.class.php';

$smarty = new Smarty();


try {
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=acudb', 'pgtidal', 'tidal');
    } 
catch (PDOException $e) {
    echo $e->getCode() . ' ' . $e->getMessage();
    }

$sql = "SELECT * FROM public.meridien"  ;
$sth = $dbh->prepare( $sql );
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("meridiens",$data);

$sql = "SELECT * FROM public.patho"  ;

if (!empty($_GET['meridien'])) {
    $sql = $sql . ' WHERE mer IN(';
    $codes = [];
    for ($i=0; $i < count($_GET['meridien']); $i++) { 
        $codes[$i] = "'".$_GET['meridien'][$i]."'";
    }
    $sql = $sql . implode(', ', $codes);
    $sql = $sql . ')';
}

$sth = $dbh->prepare( $sql );
$sth->execute();
$dataM = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("pathologies", $dataM);


$sql = "SELECT * FROM public.symptpatho"  ;

if (!empty($_GET['pathologie'])) {
    $sql = $sql . ' WHERE idp IN(';
    $codes = [];
    for ($i=0; $i < count($_GET['pathologie']); $i++) { 
        $codes[$i] = "'".$_GET['pathologie'][$i]."'";
    }
    $sql = $sql . implode(', ', array_keys($codes));
    $sql = $sql . ')';
}

$sth = $dbh->prepare( $sql );
$sth->execute($codes);
$dataS = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("caracteristiques",$dataS);

$smarty->display('HTML/formulaire2.tpl');

?>

