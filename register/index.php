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
    <title> Kolekcija | Registracija </title>
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

                <img alt="Section background image" class="small" id="auth_section_img" src="../images/coins7.jpg" />

                <div class="inner has_text" id="auth_inner">

                    <h1 class="title">
                        Autentifikacija
                    </h1>

                </div>
                
            </section>

            <!-- Register Section -->
            <section class="form" id="register_section">

                <form action="../php/register.php" class="authenticate" id="register_form" method="POST">

                    <h1 class="title">
                        Registracija
                    </h1>

                    <p class="description">
                        Molim vas ispunite podatke dolje kako biste registrirali svoj račun.
                    </p>

                    <hr>

                    <label class="input_title" for="input_username">
                        Korisničko ime
                    </label>
                    <input class="input_field" id="input_username" name="username" placeholder="Enter a username" type="text" required>

                    <label class="input_title" for="input_email">
                        E-adresa
                    </label>
                    <input class="input_field" id="input_email" name="email" placeholder="Enter an email" type="email" required>

                    <label class="input_title" for="input_password">
                        Lozinka
                    </label>
                    <input class="input_field" id="input_password" name="password" placeholder="Enter a password" type="password" required>

                    <label class="input_title" for="input_repeat_password">
                        Ponoviti lozinku
                    </label>
                    <input class="input_field" id="input_repeat_password" name="repeated_password" placeholder="Repeat a password" type="password" required>

                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "invalid_credentials") {
                            echo '<p class="invalid_credentials" style="color: red;"> The provided credentials are incorrect. </p>';
                        }
                        if ($_GET['error'] == "already_exists") {
                            echo '<p class="already_exists" style="color: red;"> The provided username or email is already registered. </p>';
                        }
                        if ($_GET['error'] == "unknown_username") {
                            echo '<p class="register" style="color: red;"> There was an error with your registration. Please try again. </p>';
                        }
                        if (isset($_SESSION['error'])) {
                            if ($_GET['error'] == "mysql_connection") {
                                echo '<p class="mysql_connection" style="color: red;">' . $_SESSION['error'] . '</p>';
                            }
                        }
                    }
                    ?>

                    <button class="authenticate" id="register" type="submit">
                        Registriraj se
                    </button>

                    <br>

                    <a class="authenticate_other" href="../login">
                        Ipak se prijavi
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