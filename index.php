<?php
// Start the session
session_start();

// Links
$directory_level = 0;
include("php/links.php");
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
    <title> Kolekcija </title>
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
            <section class="normal has_bg_img" id="welcome_section">

                <img alt="Section background image" class="normal" id="welcome_section_img" src="images/coins.jpg" />

                <div class="inner has_text" id="welcome_inner">

                    <h1 class="title">
                        Dobrodošao u Kolekciju!
                    </h1>

                    <div class="line"> </div>

                    <div class="text">
                        Lako prati i prikaži kovanice i novčanice koje sakupljaš!
                        <br>
                        Neka tvoja kolekcija sjaji!
                    </div>

                </div>

            </section>

            <!-- Section -->
            <section class="normal has_empty_bg" id="x_section">

                <div class="inner has_text" id="x_inner">

                    <h1 class="title">
                        Što su drugi sakupili?
                    </h1>

                    <div class="line"> </div>

                    <div class="text">
                        Pregledavaj sve kovanice objavljene na stranici.
                        <br>
                        Na samo tvoje, već i od drugih!
                    </div>

                </div>

            </section>

            <!-- Section -->
            <section class="normal has_bg_img" id="x_section">

                <img alt="Section background image" class="normal" id="x_section_img" src="images/coins2.jpg" />

                <div class="inner has_text" id="x_inner">

                    <h1 class="title">
                        Tvoja kolekcija je sigurna
                    </h1>

                    <div class="line"> </div>

                    <div class="text">
                        Uređivanje tvoje kolekcije je u tvojim rukama.
                        <br>
                        Prijavi se i počni!
                    </div>

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