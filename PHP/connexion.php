<?php
$smarty->assign("display_connexion", "display:true");
$smarty->assign('display_deconnexion', 'display:none');
$smarty->assign("msgerreur", "");
$smarty->assign("required", "required");
$smarty->assign("display_recherche", "display:none");
session_start();

/* REQUETE USER */
if (isset($_POST['connexion'])) {
    $sql = "SELECT * FROM public.users";
    $sql = $sql . ' WHERE username IN(';
    $codes = [];
    $codes[':code'] = $_POST['utilisateur'];
    $sql = $sql . implode(', ', array_keys($codes));
    $sql = $sql . ')';
    $sth = $dbh->prepare( $sql );
    $sth->execute($codes);
    $datauser = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($datauser)) { //si le compte existe bien dans la bdd
        if ($datauser['0']["password"] == $_POST['password']) {
            $smarty->assign("msgerreur", "");
            $_SESSION["connect"] = 1;
        }

        else {
            $smarty->assign("msgerreur", "Mot de passe incorrect");
        }
    }

    else {
        $smarty->assign("msgerreur", "Identifiant incorrect");
    }
}

elseif (isset($_POST['creation_compte'])) {
    $sql = "SELECT * FROM public.users WHERE username IN(";
    $codes = [];
    $codes[':code'] = $_POST['utilisateur'];
    $sql = $sql . implode(', ', array_keys($codes));
    $sql = $sql . ')';
    $sth = $dbh->prepare( $sql );
    $sth->execute($codes);
    $datauser = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (empty($datauser)) { //si le compte n'existe pas déjà dans la bdd
        $sql = "INSERT INTO public.users VALUES (";
        $codes = [];
        $codes[':code1'] = $_POST['utilisateur']; $codes[':code2'] = $_POST['password'];
        $sql = $sql . implode(', ', array_keys($codes));
        $sql = $sql . ')';
        $sth = $dbh->prepare( $sql );
        $sth->execute($codes);
        $verif_creation = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    else {
        $smarty->assign("msgerreur", "Compte déjà existant");
    }
}

if (isset($_POST['deconnexion'])) {
    $smarty->assign("display_connexion", "display:true");
    $smarty->assign('display_deconnexion', 'display:none');
    $_SESSION["connect"] = 0;
}

if (isset($_SESSION["connect"])) {
    if ($_SESSION["connect"] == 1) {
        $smarty->assign("required", "");
        $smarty->assign('display_deconnexion', 'display:true');
        $smarty->assign("display_connexion", "display:none");
        $smarty->assign("display_recherche", "display:true");
    }
}
    
?>