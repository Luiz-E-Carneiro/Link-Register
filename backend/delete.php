<?php

session_start();

if(!isset($_POST['link'])){
    header('Location: ./../frontend/index.php?error=4');
} else {
    $link = $_POST['link'];

    for ($i=0; $i < count($_SESSION['links']); $i++) { 
        if($_SESSION['links'][$i]['link'] === $link){
            array_splice($_SESSION['links'], $i, 1);
        }
    }
    header("Location: ./../frontend/index.php");
}