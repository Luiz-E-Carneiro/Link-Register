<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/page.css">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="./CSS/linkArea.css">
    <link rel="stylesheet" href="./CSS/card.css">
    <link rel="stylesheet" href="./CSS/folder.css">
    <title>Link Register</title>
    <link rel="icon" href="./../assets/icons/iconBrowser.png">
</head>

<body>

    <header>
        <div class="logo-area">
        <img src="./../assets/images/Logo.png" alt="Logo">
        </div>
        <div class="header-action">
            <form action="./../backend/destroySession.php" method="get">
                <input type="submit" value="Destroy Session">
            </form>
        </div>

    </header>

    <main>

        <div class="sidebar">
            <ul>
                <li>
                    <form action="./../backend/changeNav.php" method="post">
                        <input type="hidden" name="nav" value="main">
                        <button type="submit">
                            <img src="./../assets/icons/home.png" alt="Home icon">
                            <span>Main</span>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="./../backend/changeNav.php" method="post">
                        <input type="hidden" name="nav" value="hearts">
                        <button type="submit">
                            <img src="./../assets/icons/heart.png" alt="Heart icon">
                            <span>Hearted</span>
                        </button>
                    </form>
                </li>
                <li>
                    <form action="./../backend/changeNav.php" method="post">
                        <input type="hidden" name="nav" value="folders">
                        <button type="submit">
                            <img src="./../assets/icons/folders.png" alt="Folder icon">
                            <span>Folders</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="navigation">
            <?php
            session_start();
            require_once ('./../backend/classes/Card.php');
            require_once ('./../backend/classes/Folder.php');

            if (isset($_GET['nav'])) {
                switch ($_GET['nav']) {
                    case 'main':
                        require_once ('./../backend/pages/Main.php');
                        break;
                    case 'hearts':
                        require_once ('./../backend/pages/HeartedLinks.php');
                        break;
                    case 'folders':
                        require_once ('./../backend/pages/Folders.php');
                        break;
                    default:
                        require_once ('./../backend/pages/Main.php');
                        break;
                }

            } elseif (!isset($_GET['nav'])) {
                require_once ('./../backend/pages/Main.php');
            }

            ?>

        </div>

        <div class="add-link-area" id="link-area">
            <button class="before-add-link" id="before-add-link">
                <span class="textLink">Register New Link</span>
                <span class="circleLink"><img src="./../assets/icons/add.png" alt="Add Icon"></span>
            </button>
            <div class="adding-link" id="adding-link">
                <button class="back" id="back">x</button>
                <form action="./../backend/saveLinks.php" method="post">
                    <div>
                        <p>Link:</p>
                        <input type="text" name="link" class="link-input" id="link-input" placeholder="Add your link here...">
                    </div>
                    <?php
                    if(isset($_SESSION['foldersNames'])){
                        echo '<select name="selectFolder">';
                        echo '<option value="none" selected>none</option>';
                        foreach ($_SESSION['foldersNames'] as $name => $data) {
                            echo "<option value='$name'>$name</option>";
                        }
                        echo'</select>';

                    } else {
                        echo "<p>You have to add a folder first in order to register a link!</p>";
                    }
  
                        ?>
                    <button type="submit" class="register-link" id="register-link">Register Link</button>
                </form>
            </div>
        </div>
    </main>
    <script src="interactions.js"></script>
</body>

</html>