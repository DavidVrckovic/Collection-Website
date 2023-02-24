<?php
include("mysql_connection.php");

// Check if there is an error with a MySQL connection
if (isset($_SESSION['error'])) {
    header("Location: ../register/?error=mysql_connection");
    exit();
}

// Check if the request method is of type POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if $_POST super global variable is not null
    // Fixes "Undefined array key" error
    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['repeated_password'])) {

        // Get provided data with $_POST
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeated_password = $_POST['repeated_password'];

        // Select provided data from the MySQL DB server
        $db_query_username = "SELECT * FROM accounts WHERE username LIKE '" . $username . "' LIMIT 1";
        $db_query_email = "SELECT * FROM accounts WHERE email LIKE '" . $email . "' LIMIT 1";
        $db_results_username = mysqli_query($db_connection, $db_query_username);
        $db_results_email = mysqli_query($db_connection, $db_query_email);

        // Check if there were any search results in the DB
        if (($db_results_username && mysqli_num_rows($db_results_username) > 0) || ($db_results_email && mysqli_num_rows($db_results_email) > 0)) {
            // If the entered username is in the DB
            // Redirect to the register page with an "already exists" error
            header("Location: ../register/?error=already_exists");
            exit();
        } else {
            // Register the user to the DB
            $db_register_query = "INSERT INTO accounts (username, email, password) VALUES ('$username', '$email', '$password')";
            $db_register = mysqli_query($db_connection, $db_register_query);

            // Check if the user has been registered in the DB
            if ($db_register == TRUE) {
                // Update the session
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['user_username'] = $username;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_password'] = $password;
                $_SESSION['user_reg_date'] = 'Danas';

                // Set a cookie
                setcookie("login", $_SESSION['user_username'], time() + 60 * 60 * 24 * 30, "/");
                setcookie("email", $_SESSION['user_email'], time() + 60 * 60 * 24 * 30, "/");
                setcookie("reg_date", 'Danas', time() + 60 * 60 * 24 * 30, "/");

                // Redirect to the index page
                header("Location: ../");
                exit();
            } else {
                // If the user has not been registered in the DB
                // Redirect to the register page with an error
                header("Location: ../register/?error=register");
                exit();
            }
        }

        // Close connection to the MySQL DB server
        mysqli_close($db_connection);
    } else {
        // Redirect to the register page with a "invalid credentials" error
        header("Location: ../register/?error=invalid_credentials");
        exit();
    }
} else {
    exit();
}
?>