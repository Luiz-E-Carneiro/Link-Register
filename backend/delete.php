<?php

session_start();

if(!isset($_GET['link'])){
    header('Location: ./../frontend/index.php?error=4');
} else {
    $link = $_GET['link'];

    for ($i=0; $i < count($_SESSION['links']); $i++) { 
        if($_SESSION['links'][$i]['link'] === $link){
            array_splice($_SESSION['links'], $i, 1);
        }
    }

    if (isset($_GET['folder'])) {
        $folderName = $_GET['folder'];
        
        if (isset($_SESSION['folders'][$folderName])) {
            foreach ($_SESSION['folders'][$folderName] as $key => $value) {
                if (isset($value['link']) && $value['link'] === $link) {
                    unset($_SESSION['folders'][$folderName][$key]);
                    $_SESSION['folders'][$folderName] = array_values($_SESSION['folders'][$folderName]);
                    break;
                }
            }
            if (empty($_SESSION['folders'][$folderName])) {
                $_SESSION['foldersNames'][$folderName] = false;
            }
        }
    }

    header("Location: ./../frontend/index.php");
}