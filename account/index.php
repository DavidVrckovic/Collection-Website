<?php
// Start the session
session_start();

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) && !isset($_COOKIE['login'])) {
    header("Location: ../login");
    exit();
}

// Links
$directory_level = 1;
include("../php/links.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="author" content="David">
    <meta name="description" content="A website to track your collection of coins and banknotes.">
    <meta name="keywords" content="Collection, Collect, Coin, Coins, Note, Notes, Banknote, Banknotes, Money">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title and Favicon -->
    <title> Kolekcija | Račun </title>
    <link href="<?php echo ($favicon_image); ?>" rel="icon" type="image/png" />

    <!-- External sources -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- General CSS files -->
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ($index_css); ?>" rel="stylesheet" type="text/css" />

    <!-- Specific CSS files -->
    <link href="<?php echo ($back_to_top_css); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo ($footer_css); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo ($navigation_css); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo ($theme_css); ?>" rel="stylesheet" type="text/css" />
</head>



<body>
    <!-- Header & Navigation -->
    <?php
    include($directory_prefix . "parts/navigation.php");
    ?>



    <!-- CONTENT -->
    <div class="content">

        <!-- MAIN -->
        <main>

            <!-- Section -->
            <section class="small has_bg_img" id="intro_section">

                <img alt="Section background image" class="small" id="intro_section_img" src="../images/coins5.jpg" />

                <div class="inner has_text" id="intro_inner">

                    <h1 class="title">
                        Tvoj račun
                    </h1>

                </div>

            </section>

            <!-- Section -->
            <section class="custom has_empty_bg" id="main_section">

                <div class="title has_text" id="main_inner">

                    <h1 class="title">
                        Podaci
                    </h1>

                    <div class="line"> </div>

                    <?php
                    if (isset($_SESSION['loggedin'])) {
                        echo '
                        <div class="text">
                            Korisničko ime: ' . $_SESSION['user_username'] . '
                            <br>
                            Email: ' . $_SESSION['user_email'] . '
                            <br>
                            Datum registracije: ' . $_SESSION['user_reg_date'] . '
                            <br>
                        </div>
                        ';
                    } else if (isset($_COOKIE['login'])) {
                        echo '
                        <div class="text">
                            Korisničko ime: ' . $_COOKIE['login'] . '
                            <br>
                            Email: ' . $_COOKIE['email'] . '
                            <br>
                            Datum registracije: ' . $_COOKIE['reg_date'] . '
                            <br>
                        </div>
                        ';
                    }
                    ?>

                </div>

            </section>

        </main>

    </div>



    <!-- Footer -->
    <?php
    include($directory_prefix . "parts/footer.php");
    ?>

    <!-- Other -->
    <?php
    include($directory_prefix . "parts/back_to_top.php");
    ?>
</body>

</html>