<?php

session_start();

if(!isset($_POST['linkId'])){
    header('Location: ./../frontend/index.php?erro=4');
} else {
    $id = $_POST['linkId'];
    array_splice($_SESSION['links'], $id, 1);
    header('Location: ./../frontend/index.php');
}