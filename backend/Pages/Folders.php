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
        $folder = new Folder($name);

        echo "<form class='folder-div' action='showLinks.php' method='post'>";
        echo '<input type="hidden" name="nav" value="hearts">
        <button type="submit" class="btn-folder">';
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
    echo "<img src='./../assets/images/NoLinkFound.png' alt='No link found'>";
}