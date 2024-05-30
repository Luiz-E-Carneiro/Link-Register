<?php
echo "<div class='add-folder-area'>";

echo "<form action='./../backend/addFolder.php' method='post'>
                    <span>Name a Folder:</span>
                    <input type='text' name='folderName' class='folder-input' id='folder-input' placeholder='Type the name...'>
                    <button type='submit' class='register-folder' id='register-folder'>Add Folder</button>
        </form>";

echo "</div>";

if (isset($_GET['folder'])) {
    $folderName = $_GET['folder'];
    $check = false;
    if(isset($_SESSION['folders'])){
        foreach ($_SESSION['folders'] as $name => $links) {
            if($folderName === $name AND count($links) > 0){
                $check = true;
                $card = new Card($links);
                $card->renderCard();
            } 
        }
    }else {
        echo "<img class='backgroundImage' src='./../assets/images/FolderIsEmpty.png' alt='Empty folder icon'>";
    }
    if(!$check AND isset($_SESSION['folders'])) echo "<img class='backgroundImage' src='./../assets/images/FolderIsEmpty.png' alt='Empty folder icon'>";
} else {
    if (isset($_SESSION['foldersNames'])) {
        foreach ($_SESSION['foldersNames'] as $name => $data) {
            $folder = new Folder($name);

            echo "<form class='folder-div' action='./../backend/showInsideFolder.php' method='post'>";
            echo "<input type='hidden' name='folderName' value='$name'>".
            '<button type="submit" class="btn-folder">';
            echo '<p>' . $folder->getName() . '</p>';
            if ($_SESSION['foldersNames'][$name] === false) {
                echo "<img src='./../assets/images/emptyFolder.png' alt='Empty folder icon'>";
            } else {
                echo "<img src='./../assets/images/fullFolder.png' alt='Full folder icon'>";
            }
            echo '</button>';
            echo "</form>";
        }
    } else {
        echo "<img class='backgroundImage' src='./../assets/images/NoFolder.png' alt='No link found'>";
    }
}