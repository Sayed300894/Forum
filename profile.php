<?php 
session_start();
require('actions/users/showUserProfile.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">
    <?php
        if(isset($errorMsg)){ echo $errorMsg; };
        if(isset($getQuestion)){ ?>
        <div class="card">
            <div class="card-body">
                <h4>@<?= $user_pseudo; ?></h4>
                <hr>
                <p><?= $user_lastname.'  '.$user_firstname;?></p>
            </div>
        </div>
        <br>
        <?php 
        while($question = $getQuestion->fetch()){ ?>
            <div class="card">
                <div class="card-header">
                    <?= $question['title']; ?>
                </div>
                <div class="card-body">
                    <?= $question['description']; ?>
                </div>
                <div class="card-footer">
                   Par <?= $question['pseudo_author']; ?> le <?= $question['date_publication']; ?>
                </div>
            </div>
        <br>
    <?php }
    }
        ?>
    </div>
</body>
</html>