<?php
    echo "<div class='add-folder-area'>";
    
    echo "<form action='./../backend/addFolder.php' method='post'>
                    <span>Folder's Name:</span>
                    <input type='text' name='folderName' class='folder-input' id='folder-input'>
                    <button type='submit' class='register-folder' id='register-folder'>Add Folder</button>
        </form>";
    
    echo "</div>";

    if (isset($_SESSION['foldersNames'])) {
        foreach ($_SESSION['foldersNames'] as $name => $data) {
            var_dump($_SESSION['foldersNames']);
            $folder = new Folder($name);

            $folder->addLink($data);

            echo $folder->getArrayLength();
            
            echo "<div class='folder-div'>";

            echo '<p>'. $folder->getName() . '</p>';
            
            if($folder->getArrayLength() > 0){
                echo "<img src='./../assets/images/fullFolder.png' alt='Full folder icon'>";
            }else {
                echo "<img src='./../assets/images/emptyFolder.png' alt='Empty folder icon'>";
            }

            echo "</div>";

        }
    } else {
        echo "<img src='./../assets/images/NoLinkFound.png' alt='No link found'>";
    }

    
    // if (isset($_SESSION['links'])) {
    //     $check = false;
    //     foreach ($_SESSION['links'] as $linkData) {
    //         if($linkData['heart'] === true){
    //             $check = true;
    //             $card = new Card($linkData);
    //             $card->renderCard();
    //         }
    //     }
    //     if(!$check){
    //         echo "<img src='./../assets/images/NoLinkFound.png' alt='No link found'>";
    //     }
    // } else {
    //     echo "<img src='./../assets/images/NoLink.png' alt='There is no link added'>";
    // } 
