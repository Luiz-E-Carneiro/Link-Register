<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css">
    <title>Link Register</title>
</head>

<body>

    <header>
        <div>Logo</div>
        <div class="search">
            <input type="text">
            <button><span class="material-symbols-outlined">search</span></button>
        </div>
        <div class="header-actions">

            <button>Home</button>
            <button>About</button>
            <button>Contact</button>
            <form action="./../backend/destroySession.php" method="get">
                <input type="submit" value="Destroy Session">
            </form>
        </div>

    </header>

    <main>

        <div class="sidebar">
            <ul>
                <li>
                    <div>
                        Profile_Photo
                        User_Name
                        Edit_Icon
                    </div>
                </li>
                <li>Hertead</li>
                <li>Pages</li>
                <li>Item</li>
                <li>Item</li>
            </ul>
        </div>

        <nav class="navigation">
            <?php
                session_start();
                require_once('./../backend/classes/Card.php');
                
                if(isset($_SESSION['links'])) {
                    foreach ($_SESSION['links'] as $linkData) {
                        $card = new Card($linkData);
                        $card->renderCard();
                    }
                } else {
                    echo "<img src='./../assets/images/noLink.png' alt='There is no link'>";
                }
            ?>

        </nav>

        <div class="add-link-area" id="link-area">
            <button class="before-add-link" id="before-add-link">
                <span>Register New Link</span>
                <span>(+)</span>
            </button>
            <div class="adding-link" id="adding-link">
                <button class="back" id="back">x</button>
                <form action="./../backend/saveLinks.php" method="post">
                    <input type="text" name="link" class="link-input" id="link-input">
                    <button type="submit" class="register-link" id="register-link">Register Link</button>
    
                </form>
            </div>
        </div>
    </main>
    <script src="interactions.js"></script>
</body>

</html>