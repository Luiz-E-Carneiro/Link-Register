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

function newLinkCheck($link) {
    if(isset($_SESSION['links'])){
        foreach ($_SESSION['links'] as $linkData) {
            if($linkData['link'] === $link){
                header('Location: ./../frontend/index.php?error=2');
                die();
            }
        }
    }
}

if(!isset($_POST['link'])){
    header('Location: ./../frontend/index.php?error=1');
} else {
    $link = $_POST['link'];
    
    newLinkCheck($link);
    
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
    
    if(isset($_POST['selectFolder']) AND $_POST['selectFolder'] != 'none'){
        $name = $_POST['selectFolder'];
        $_SESSION['foldersNames'][$name] = true;
        $linkDataCopy = $linkData;
        unset($linkDataCopy['heart']);
        $_SESSION['folders'][$name][] = $linkDataCopy;
    }else {
        header('Location: ./../frontend/index.php?');
        die();
    }

    header('Location: ./../frontend/index.php');
}