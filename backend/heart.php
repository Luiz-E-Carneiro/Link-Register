<?php

session_start();

if(!isset($_POST['link'])){
    header('Location: ./../frontend/index.php?error=3');
} else {
    $link = $_POST['link'];
    for ($i=0; $i < count($_SESSION['links']); $i++) { 
        if($_SESSION['links'][$i]['link'] === $link){
            $_SESSION['links'][$i]['heart'] === true ? $_SESSION['links'][$i]['heart'] = false : $_SESSION['links'][$i]['heart'] = true;
        }
    }
    header('Location: ./../frontend/index.php');
}