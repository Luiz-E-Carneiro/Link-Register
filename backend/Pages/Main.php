<?php
    if (isset($_SESSION['links'])) {
        foreach ($_SESSION['links'] as $linkData) {
            $card = new Card($linkData);
            $card->renderCard();
        }
    } else {
        echo "<img src='./../assets/images/noLink.png' alt='There is no link'>";
    }   
