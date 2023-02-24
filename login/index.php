<?php
// Start the session
session_start();

// If the user is logged in, redirect to the index page
if (isset($_SESSION['loggedin'])) {
    header("Location: ../");
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
    <title> Kolekcija | Prijava </title>
    <link href="<?php echo ($favicon_image); ?>" rel="icon" type="image/png" />

    <!-- External sources -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- General CSS files -->
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ($index_css); ?>" rel="stylesheet" type="text/css" />

    <!-- Specific CSS files -->
    <link href="<?php echo ($authentication_css); ?>" rel="stylesheet" type="text/css" />
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
            <section class="small has_bg_img" id="auth_section">

                <img alt="Section background image" class="small" id="auth_section_img" src="../images/coins6.jpg" />

                <div class="inner has_text" id="auth_inner">

                    <h1 class="title">
                        Autentifikacija
                    </h1>

                </div>

            </section>

            <!-- Login Section -->
            <section class="form" id="login_section">

                <form action="../php/authentication.php" class="authenticate" id="login_form" method="POST">

                    <h1 class="title">
                        Prijava
                    </h1>

                    <p class="description">
                        Molim vas ispunite podatke dolje kako biste se prijavili na svoj račun.
                    </p>

                    <hr>

                    <label class="input_title" for="input_username">
                        Korisničko ime
                    </label>
                    <input class="input_field" id="input_username" name="username" placeholder="Enter a username" type="text" required>

                    <label class="input_title" for="input_password">
                        Lozinka
                    </label>
                    <input class="input_field" id="input_password" name="password" placeholder="Enter a password" type="password" required>

                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "invalid_credentials") {
                            echo '<p class="invalid_credentials" style="color: red;"> The provided credentials are incorrect. </p>';
                        }
                        if ($_GET['error'] == "wrong_password") {
                            echo '<p class="wrong_password" style="color: red;"> The provided password is incorrect. </p>';
                        }
                        if ($_GET['error'] == "unknown_username") {
                            echo '<p class="unknown_username" style="color: red;"> The provided username is incorrect. </p>';
                        }
                        if (isset($_SESSION['error'])) {
                            if ($_GET['error'] == "mysql_connection") {
                                echo '<p class="mysql_connection" style="color: red;">' . $_SESSION['error'] . '</p>';
                            }
                        }
                    }
                    ?>

                    <button class="authenticate" id="login" type="submit">
                        Prijavi se
                    </button>

                    <br>

                    <a class="authenticate_other" href="../register">
                        Ipak se registriraj
                    </a>
                    <a href="#login"></a>

                </form>

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