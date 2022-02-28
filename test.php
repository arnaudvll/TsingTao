<?php
require 'libs/Smarty.class.php';

$smarty = new Smarty();

try {
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=acudb', 'pgtidal', 'tidal');
    } 
catch (PDOException $e) {
    echo $e->getCode() . ' ' . $e->getMessage();
    }


/* REQUETE USER */
if (!empty($_POST['utilisateur']) and !empty($_POST['password'])) {
    if ($_POST['connexion']) {
        $sql = "SELECT * FROM public.users";
        $sql = $sql . ' WHERE username IN(';
        $codes = [];
        $codes[':code'] = $_POST['utilisateur'];
        $sql = $sql . implode(', ', array_keys($codes));
        $sql = $sql . ')';
        $sth = $dbh->prepare( $sql );
        $sth->execute($codes);
        $datauser = $sth->fetchAll(PDO::FETCH_ASSOC);
        var_dump($datauser);
        if (!empty($datauser)) {
            if ($datauser['0']["password"] == $_POST['password']) {
                echo "slt";
            }
        }
    }

    $sql = "SELECT * FROM public.users";
    $sth = $dbh->prepare( $sql );
    $sth->execute();
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    var_dump($data); // on teste dans la liste des users dans base de donnee si ya le truc rentré en POST

    if ($_POST['creation_compte']) {
        $sql = "INSERT INTO public.users VALUES (";
        $codes = [];
        $codes[':code1'] = $_POST['utilisateur']; $codes[':code2'] = $_POST['password'];
        $sql = $sql . implode(', ', array_keys($codes));
        $sql = $sql . ')';
        $sth = $dbh->prepare( $sql );
        $sth->execute($codes);
        $verif_creation = $sth->fetchAll(PDO::FETCH_ASSOC);
        var_dump($verif_creation);
        
    }
}

$sql = "SELECT * FROM public.meridien"  ;
$sth = $dbh->prepare( $sql );
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("meridiens",$data);


/* REQUETE PATHO */
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
$sth->execute($codes);
$dataM = $sth->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign("pathologies", $dataM);


/*$sql = "SELECT * FROM public.symptpatho"  ;

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

$smarty->assign("caracteristiques",$dataS);*/

$smarty->display('HTML/formulaire2.tpl');

?>

