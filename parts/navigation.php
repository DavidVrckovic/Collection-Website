<header>
    <nav class="left">
        <a href="<?php echo ($nav_home); ?>">
            <img alt="Header icon" class="nav_img logo" src="<?php echo ($header_image); ?>" />
        </a>
    </nav>



    <nav class="center">

        <div class="nav">
            <a href="<?php echo ($nav_home); ?>">
                <img alt="Home icon" class="nav_img" id="nav_home" src="<?php echo ($nav_home_icon); ?>" />
                <img alt="Home icon" class="nav_img nav_hover" src="<?php echo ($nav_home_icon_hover); ?>" title="Početna" />
            </a>
        </div>

        <div class="nav">
            <a href="<?php echo ($nav_collection); ?>">
                <img alt="Collection icon" class="nav_img" id="nav_collection" src="<?php echo ($nav_collection_icon); ?>" />
                <img alt="Collection icon" class="nav_img nav_hover" src="<?php echo ($nav_collection_icon_hover); ?>" title="Kolekcija" />
            </a>
        </div>

        <div class="nav">
            <a href="<?php echo ($nav_search); ?>">
                <img alt="Search icon" class="nav_img" id="nav_search" src="<?php echo ($nav_search_icon); ?>" />
                <img alt="Search icon" class="nav_img nav_hover" src="<?php echo ($nav_search_icon_hover); ?>" title="Pretraži" />
            </a>
        </div>

        <div class="nav">
            <a href="<?php echo ($nav_faq); ?>">
                <img alt="FAQ icon" class="nav_img" id="nav_faq" src="<?php echo ($nav_faq_icon); ?>" />
                <img alt="FAQ icon" class="nav_img nav_hover" src="<?php echo ($nav_faq_icon_hover); ?>" title="FAQ" />
            </a>
        </div>

    </nav>



    <nav class="options">
        <a>
            <img alt="Options icon" class="nav_img" id="nav_options" src="<?php echo ($nav_options_icon); ?>" />
            <img alt="Options icon" class="nav_img nav_hover" id="optionshover" src="<?php echo ($nav_options_icon_hover); ?>" />
        </a>

        <div class="options dropdown">

            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '
                <a href="' . $nav_account . '">'
                . 'Račun: ' . $_SESSION['user_username']
                . '</a>
                <a href="' . $nav_my . '">'
                . 'Moja kolekcija'
                . '</a>
                ';
            } else if (isset($_COOKIE['login'])) {
                echo '
                <a href="' . $nav_account . '">'
                . 'Račun: ' . $_COOKIE['login']
                . '</a>
                <a href="' . $nav_my . '">'
                . 'Moja kolekcija'
                . '</a>
                ';
            }
            ?>

            <a href="<?php echo $nav_auth; ?>">
                <?php
                if (isset($_SESSION['loggedin']) || isset($_COOKIE['login'])) {
                    echo "Odjavi se";
                } else {
                    echo "Prijavi se";
                }
                ?>
            </a>

            <?php
            if (!isset($_SESSION['loggedin']) && !isset($_COOKIE['login'])) {
                echo '
                <a href="' . $nav_register . '">'
                . 'Registriraj se'
                . '</a>'
                ;
            }
            ?>

            <a href="" id="lightdark_mode">
                Svijetlo / Tamno
            </a>

            <a href="<?php echo ($nav_collection); ?>" class="nav">
                Kolekcija
            </a>

            <a href="<?php echo ($nav_search); ?>" class="nav">
                Pretraživanje
            </a>

            <a href="<?php echo ($nav_faq); ?>" class="nav">
                FAQ
            </a>

        </div>
    </nav>

    <script src="<?php echo ($nav_script); ?>"></script>
</header>