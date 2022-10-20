<?php
require('actions/database.php');

$getMyQuestions = $bdd->prepare('SELECT id, title, `description` FROM questions WHERE id_author = ? order by id desc');
$getMyQuestions->execute(array($_SESSION['id']));