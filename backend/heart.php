<?php

session_start();

if(!isset($_POST['linkId'])){
    header('Location: ./../frontend/index.php?erro=3');
} else {
    $id = $_POST['linkId'];
    $_SESSION['links'][$id]['heart'] = true;
    header('Location: ./../frontend/index.php');
}