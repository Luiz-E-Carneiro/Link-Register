<?php
final class Card
{
    private $linkData;

    public function __construct($linkData) {
        $this->linkData = $linkData;
    }

    public function renderCard() {
        $card = '<div class="card">';
        if(isset($this->linkData['favicon'])) {
            $card .= '<img src=' . $this->linkData['favicon'] . " alt='Icon'>";
        }
        if(isset($this->linkData['providerName'])) {
            $card .= '<a href='. $this->linkData['providerUrl'] .'> ' . $this->linkData['providerName'] . '</a>';
        }
        if(isset($this->linkData['language'])) {
            $card .= '<span>'. $this->linkData['language'] . '</span>';
        }
        
        echo "<hr>";
        
        if(isset($this->linkData['title'])) {
            $card .= '<p>Title: ' . $this->linkData['title'] . '</p>';
        }
        if(isset($this->linkData['image'])) {
            $card .= '<img src=' . $this->linkData['image'] . " alt='Page image'>";
        }
        if(isset($this->linkData['title'])) {
            $card .= '<p>Title: ' . $this->linkData['title'] . '</p>';
        }
        if(isset($this->linkData['description'])) {
            $card .= '<p>Description: ' . $this->linkData['description'] . '</p>';
        }
        if(isset($this->linkData['authorName'])) {
            $card .= '<a href='. $this->linkData['authorUrl'] .'>Author: ' . $this->linkData['authorName'] . '</a>';
        }
        
        echo "<hr>";
        
        if(isset($this->linkData['url'])) {
            $card .= '<a href='. $this->linkData['url'] .'>Visitar Site</a>';
        }

        $card .= '
        <form method="post" action="./../backend/heart.php">
            <input type="hidden" name="linkId" value="'. $this->linkData['id'] . '">
            <button type="submit"> 
            <img src= '. 
            ($this->linkData['heart'] === false ? "./../assets/icons/emptyHeart.png" : "./../assets/icons/redHeart.png")
            . ' alt="Heart icon">
            </button>
        </form>
        <form method="post" action="./../backend/delete.php">
            <input type="hidden" name="linkId" value="'. $this->linkData['id'] . '">
            <button type="submit">
            <img src= "./../assets/icons/trash.png" alt="Heart icon">
            </button>
        </form>
        ';

        $card .= '</div>';

        echo $card;
    }
}