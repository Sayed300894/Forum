<?php
require('actions/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

        $idOfQuestion = $_GET['id'];

        $checkIfQuestionExicte = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
        $checkIfQuestionExicte->execute(array($idOfQuestion));

        if($checkIfQuestionExicte->rowCount() > 0){
            $questionInfos = $checkIfQuestionExicte->fetch();
            if($questionInfos['id_author'] == $_SESSION['id'] ){

                $question_title = $questionInfos['title'];
                $question_description = $questionInfos['description'];
                $question_content = $questionInfos['content'];

                $question_description = str_replace("<br />", "", $question_description);
                $question_content = str_replace("<br />", "", $question_content);
            }else{
                $errorMsg = "Vous n'êtes pas l'autheur";
            }

        }else{
            $errorMsg = "Aucune question n'a pas trouvéé";
        }
}else{
    $errorMsg = "Aucune question n'a pas trouvéé";
}