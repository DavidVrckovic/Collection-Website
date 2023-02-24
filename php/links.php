<?php
if ($directory_level == 0) {
    $directory_prefix = "";
} else if ($directory_level == 1) {
    $directory_prefix = "../";
} else if ($directory_level == 2) {
    $directory_prefix = "../../";
} else if ($directory_level == 3) {
    $directory_prefix = "../../../";
} else if ($directory_level == 4) {
    $directory_prefix = "../../../../";
}


// Head Metadata
$favicon_image = $directory_prefix . "images/icons/collection_icon.png";

$authentication_css = $directory_prefix . "styles/authentication.css";
$back_to_top_css = $directory_prefix . "styles/back_to_top.css";
$footer_css = $directory_prefix . "styles/footer.css";
$index_css = $directory_prefix . "styles/index.css";
$navigation_css = $directory_prefix . "styles/navigation.css";
$theme_css = $directory_prefix . "styles/theme.css";


// Header & Navigation
$header_image = $directory_prefix . "images/icons/collection_icon.png";

$nav_collection = $directory_prefix . "collection";
$nav_faq = $directory_prefix . "faq";
$nav_home = $directory_prefix . "";
$nav_my = $directory_prefix . "my";
$nav_search = $directory_prefix . "search";



$nav_collection_icon = $directory_prefix . "images/navigation/collection_icon_black.png";
$nav_faq_icon = $directory_prefix . "images/navigation/faq_icon_black.png";
$nav_home_icon = $directory_prefix . "images/navigation/home_icon_black.png";
$nav_search_icon = $directory_prefix . "images/navigation/search_icon_black.png";

$nav_options_icon = $directory_prefix . "images/navigation/options_icon_black.png";

$nav_collection_icon_darkmode = $directory_prefix . "images/navigation/collection_icon_white.png";
$nav_faq_icon_darkmode = $directory_prefix . "images/navigation/faq_icon_white.png";
$nav_home_icon_darkmode = $directory_prefix . "images/navigation/home_icon_white.png";
$nav_search_icon_darkmode = $directory_prefix . "images/navigation/search_icon_white.png";

$nav_options_icon_darkmode = $directory_prefix . "images/navigation/options_icon_white.png";

$nav_collection_icon_hover = $directory_prefix . "images/navigation/collection_icon_gold.png";
$nav_faq_icon_hover = $directory_prefix . "images/navigation/faq_icon_gold.png";
$nav_home_icon_hover = $directory_prefix . "images/navigation/home_icon_gold.png";
$nav_search_icon_hover = $directory_prefix . "images/navigation/search_icon_gold.png";

$nav_options_icon_hover = $directory_prefix . "images/navigation/options_icon_gold.png";



if (!isset($_SESSION['loggedin']) && !isset($_COOKIE['login'])) {
    $nav_auth = $directory_prefix . "login";
    $nav_register = $directory_prefix . "register";
} else {
    $nav_auth = $directory_prefix . "logout";
    $nav_account = $directory_prefix . "account";
}



$nav_script = $directory_prefix . "scripts/navigation.js";

echo "
<script>
    var nav_collection_icon = '$nav_collection_icon';
    var nav_faq_icon = '$nav_faq_icon';
    var nav_home_icon = '$nav_home_icon';
    var nav_search_icon = '$nav_search_icon';

    var nav_options_icon = '$nav_options_icon';

    var nav_collection_icon_darkmode = '$nav_collection_icon_darkmode';
    var nav_faq_icon_darkmode = '$nav_faq_icon_darkmode';
    var nav_home_icon_darkmode = '$nav_home_icon_darkmode';
    var nav_search_icon_darkmode = '$nav_search_icon_darkmode';

    var nav_options_icon_darkmode = '$nav_options_icon_darkmode';
</script>
";



// Back to top
$back_to_top_image = $directory_prefix . "images/back_to_top/back_to_top.png";
$back_to_top_script = $directory_prefix . "scripts/back_to_top.js";