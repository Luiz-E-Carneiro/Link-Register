<?php

if(!isset($_POST['nav'])) {
    header('Location: ./../frontend/index.php?error=5');
} else {
    // Navs: main, hearts, folders, langs
    $nav = $_POST['nav'];
    header("Location: ./../frontend/index.php?nav=$nav");
}