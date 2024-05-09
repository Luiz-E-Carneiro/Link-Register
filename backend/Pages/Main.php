<?php
    if (isset($_SESSION['links']) AND count($_SESSION['links']) > 0) {
        foreach ($_SESSION['links'] as $linkData) {
            $card = new Card($linkData);
            $card->renderCard();
        }
    } else {
        echo "<img class='backgroundImage' src='./../assets/images/noLink.png' alt='There is no link'>";
    }   
