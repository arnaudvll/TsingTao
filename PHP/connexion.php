<?php
$smarty->assign("display_connexion", "display:true");
$smarty->assign('display_deconnexion', 'display:none');
$smarty->assign("msgerreur", "");

/* REQUETE USER */
if (!empty($_POST['utilisateur']) and !empty($_POST['password'])) {
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
        if (!empty($datauser)) {
            if ($datauser['0']["password"] == $_POST['password']) {
                $smarty->assign("msgerreur", "");
                $smarty->assign('display_deconnexion', 'display:true');
                $smarty->assign("display_connexion", "display:none");
            }
            else {
                $smarty->assign("msgerreur", "Mot de passe incorrect");
            }
        }
        else {
            $smarty->assign("msgerreur", "Identifiant incorrect");
        }
    }

    if (isset($_POST['creation_compte'])) {
        $sql = "SELECT * FROM public.users WHERE username IN(";
        $codes = [];
        $codes[':code'] = $_POST['utilisateur'];
        $sql = $sql . implode(', ', array_keys($codes));
        $sql = $sql . ')';
        $sth = $dbh->prepare( $sql );
        $sth->execute($codes);
        $datauser = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (empty($datauser)) {
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
}

?>