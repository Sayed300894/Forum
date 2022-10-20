<?php 
require('actions/database.php');

if(isset($_POST['validate'])) {
   
    if(!empty($_POST['description']) && !empty($_POST['title']) && !empty($_POST['content'])){
        $question_title = htmlspecialchars($_POST['title']) ;
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('Y/m/d');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        $insertQuestionOnTable = $bdd->prepare('INSERT INTO questions(title, `description`, content, id_author, pseudo_author, `date_publication`)VALUES(?, ?, ?, ?, ?, ?)');
        $insertQuestionOnTable->execute(array(
            $question_title,
            $question_description,
            $question_content,
            $question_id_author,
            $question_pseudo_author,
            $question_date
            )
        );

        $successMsg = "Votre question a bien été publiée sur le liste ";


    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}

