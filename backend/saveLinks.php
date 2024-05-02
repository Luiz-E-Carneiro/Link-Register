<?php
use Embed\Embed;
$embed = new Embed();

if(!isset($_POST['link'])){
    header('Location:./../frontend/index.php');
} else {
    // $link = $_POST['link'];
    $info = $embed->get('https://www.youtube.com/watch?v=4YCLRpKY1cs');

    print_r( $info->title);
}