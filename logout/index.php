<?php
// End the session
session_start();
session_destroy();

// Check if the cookie is set and destroy it if true
if (isset($_COOKIE['login'])) {
    unset($_COOKIE['login']);
    setcookie("login", "", time()-3600, "/");
    setcookie("email", "", time()-3600, "/");
    setcookie("reg_date", "", time()-3600, "/");
}

// Redirect to the index page
header("Location: ../");
?>