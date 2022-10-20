<?php

require('actions/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfUser = $_GET['id'];

    $checkIfUexicte = $bdd->prepare('SELECT pseudo, lastname, firstname FROM users WHERE id = ?');
    $checkIfUexicte->execute(array($idOfUser));

    if($checkIfUexicte->rowCount() > 0) {

        $usersInfos = $checkIfUexicte->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['lastname'];
        $user_firstname = $usersInfos['firstname'];

        $getQuestion = $bdd->prepare('SELECT * FROM questions WHERE id_author = ?');
        $getQuestion->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun utilisateur trouvée";
    }
}else{
    $errorMsg = "Aucun utilisateur trouvée";
}