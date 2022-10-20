<?php 
         require('actions/users/securityAction.php');
        require('actions/question/myQuestionsAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">
    <?php
        while($question = $getMyQuestions->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                <a href="article.php?id=<?=$question['id']?>"><?= $question['title']; ?></a>  
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $question['description']; ?></p>
                    <a href="article.php?id=<?=$question['id']?>" class="btn btn-primary">Accéder à la question</a>
                    <a href="edit-question.php?id=<?=$question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="actions/question/deleteQ.php?id=<?=$question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                </div>
            </div>
            <br>
            <?php
        } ?>
    </div>

</body>
</html>