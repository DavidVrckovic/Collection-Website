<?php
include("../php/mysql_connection.php");

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
    <title> Kolekcija | Pregled </title>
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

                <img alt="Section background image" class="small" id="intro_section_img" src="../images/coins4.jpg" />

                <div class="inner has_text" id="intro_inner">

                    <h1 class="title">
                        Pregled tvoje kolekcije
                    </h1>

                </div>

            </section>

            <!-- Section -->
            <section class="custom has_empty_bg" id="main_section">

                <div class="title has_text" id="main_inner">

                    <h1 class="title">
                        Popis mojih kovanica
                    </h1>

                </div>

                <div class="coins">
                    <?php
                    if (isset($_SESSION['loggedin']) || isset($_COOKIE['login'])) {
                        echo '
                        <form action="../php/coin_adder.php" class="coin" method="POST" enctype="multipart/form-data">
                            <input class="input_field" id="input_img" name="coin_icon" type="file" accept="image/*" required>
                            <input class="input_field" id="input_coin_type" name="coin_type" placeholder="Coin type" type="text" required>
                            <input class="input_field" id="input_coin_value" name="coin_value" placeholder="Coin value" type="text" required>
                            <input class="input_field" id="input_coin_year" name="coin_year" placeholder="Coin year" type="text" required>
                            <button class="coin coin_control" id="add" type="submit">
                                +
                            </button>
                        </form>
                        ';

                        if (isset($_SESSION['loggedin'])) {
                            $login = $_SESSION['user_username'];
                        } else if (isset($_COOKIE['login'])) {
                            $login = $_COOKIE['login'];
                        }

                        // Select the data from the database
                        $db_query = "SELECT * FROM collections WHERE username LIKE '" . $login . "'";
                        $db_results = mysqli_query($db_connection, $db_query);

                        // Check if there were any search results in the DB
                        if ($db_results && mysqli_num_rows($db_results) > 0) {
                            while ($data = mysqli_fetch_assoc($db_results)) {
                                echo '
                                <form action="../php/coin_remover.php" class="coin" method="POST">
                                    <input class="inv" id="input_coin_type" name="coin_type" placeholder="Coin type" type="text" value="' . $data['coin_type'] . '" required>
                                    <input class="inv" id="input_coin_value" name="coin_value" placeholder="Coin value" type="text" value="' . $data['coin_value'] . '" required>
                                    <input class="inv" id="input_coin_year" name="coin_year" placeholder="Coin year" type="text" value="' . $data['coin_year'] . '" required>

                                    <span class="coin coin_icon">
                                        <img alt="Coin background image" class="coin_icon" src="data:image/jpg;charset=utf8;base64,' . base64_encode($data['coin_image']) . '" />
                                    </span>
                                    <span class="coin coin_type">
                                        ' . $data['coin_type'] . '
                                    </span>
                                    <span class="coin coin_value">
                                        ' . $data['coin_value'] . '
                                    </span>
                                    <span class="coin coin_year">
                                        ' . $data['coin_year'] . '
                                    </span>
                                    <button class="coin coin_control" id="remove" type="submit">
                                        -
                                    </button>
                                </form>
                                ';
                            }
                        } else {
                            echo '
                            <div class="text">
                                Nema spremljenih kovanica.
                            </div>
                            ';
                        }
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