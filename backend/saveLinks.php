<?php
session_start();
require_once("vendor/autoload.php");
use Embed\Embed;
$embed = new Embed();

$propertiesToCheck = ['title', 'description', 'url', 'image', 'code', 'providerName', 'providerUrl', 'icon', 'favicon', 'authorName', 'authorUrl', 'language'];

if(!isset($_POST['link'])){
    header('Location:./../frontend/index.php');
} else {
    $link = $_POST['link'];
    $info = $embed->get($link);
    
    $linkData = [];

    foreach($propertiesToCheck as $property) {
        if(isset($info->$property)) {
            if($property === 'code' && isset($info->$property->html)) {
                $linkData['html_code'] = $info->$property->html;
            } else {
                $linkData[$property] = $info->$property;
            }
        }
    }

    if(isset($_SESSION['link'])) {
        $_SESSION['link'][] = $linkData;;
    } else {
        $_SESSION['link'] = $linkData;;
    }
    
    // header('Location:./../frontend/index.php');
}
?>
