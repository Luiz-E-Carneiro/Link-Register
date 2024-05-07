<?php
    if (isset($_SESSION['links'])) {
        $check = false;
        foreach ($_SESSION['links'] as $linkData) {
            if($linkData['heart'] === true){
                $check = true;
                $card = new Card($linkData);
                $card->renderCard();
            }
        }
        if(!$check){
            echo "<img src='./../assets/images/NoLinkFound.png' alt='No link found'>";
        }
    } else {
        echo "<img src='./../assets/images/NoLink.png' alt='There is no link added'>";
    }
