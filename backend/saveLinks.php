<?php
session_start();

require_once("vendor/autoload.php");
use Embed\Embed;
$embed = new Embed();

$propertiesToCheck = [
    'title', 'description', 'code',
    'providerName',  'authorName',
    'language', 'url', 'image',
    'providerUrl', 'favicon',
    'authorUrl'
    ];

if(!isset($_POST['link'])){
    header('Location: ./../frontend/index.php?erro=1');
} else {
    $link = $_POST['link'];
    
    if(newLinkCheck($link)){
        header('Location: ./../frontend/index.php?erro=2');
        die();
    }
    
    $info = $embed->get($link);
    
    $linkData = array(
        'link' => $link,
        'heart' => false
    );

    foreach($propertiesToCheck as $property) {
        $value = (string) $info->$property;
        if(isset($value)) {
            if($property === 'code' && isset($info->$property->html)) {
                $linkData['html_code'] = $info->$property->html;
            } else {
                if(is_string($value) || is_array($value)) {
                    $linkData[$property] = $value;
                }
            }
        }
    }
    
    if(isset($_SESSION['links'])) {
        $_SESSION['links'][] = $linkData;
    } else {
        $_SESSION['links'] = array($linkData);
    }
    
    header('Location: ./../frontend/index.php');
}

function newLinkCheck($link) {
    foreach ($_SESSION['links'] as $linkData) {
        foreach ($linkData as $property => $value) {
            if($property === 'link') {
                if($value === $link){
                    return false;
                }
            }
        }
    }
}