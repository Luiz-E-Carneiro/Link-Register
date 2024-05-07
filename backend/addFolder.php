<?php
require_once('./Classes/Folder.php');
session_start();

if (!isset($_POST['folderName'])) {
    header('Location: ./../frontend/index.php?nav=folders&error=5');
} else {
    $name = $_POST['folderName'];
    
    if(!isset($_SESSION['foldersNames'])){
        $_SESSION['foldersNames'][$name] = array();
    }else {
        if(key_exists($name,$_SESSION['foldersNames'] )){
            header('Location: ./../frontend/index.php?nav=folders&error=6');
            die();
        }else {
            $_SESSION['foldersNames'][$name] = [];
        }
    }
    header('Location: ./../frontend/index.php?nav=folders');
}