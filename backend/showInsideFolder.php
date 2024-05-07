<?php
$folderName = $_POST['folderName'];

header("Location: ./../frontend/index.php?nav=folders&folder=$folderName");