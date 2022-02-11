<?php
require 'tpl/libs/Smarty.class.php';

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
        $codes[':code'.$i] = $_GET['meridien'][$i];
    }
    $sql = $sql . implode(', ', array_keys($codes));
    $sql = $sql . ')';
}
$sth = $dbh->prepare( $sql );
var_dump($sql);
$sth->execute($codes);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("pathologies",$data);

$sql = "SELECT * FROM public.symptome"  ;
$sth = $dbh->prepare( $sql );
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("caracteristiques",$data);

$smarty->display('HTML/formulaire2.tpl');

if ($_GET["P"]) {
    echo "slt";
}


?>

