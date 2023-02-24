<?php
include("mysql_connection.php");

// Check if there is an error with a MySQL connection
if (isset($_SESSION['error'])) {
    header("Location: ../login/?error=mysql_connection");
    exit();
}

// Check if the request method is of type POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if $_POST super global variable is not null
    // Fixes "Undefined array key" error
    if (isset($_POST['username'], $_POST['password']) && !isset($_POST['repeated_password'])) {

        // Get provided data with $_POST
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Select provided data from the MySQL DB server
        $db_query = "SELECT * FROM accounts WHERE username LIKE '" . $username . "' LIMIT 1";
        $db_results = mysqli_query($db_connection, $db_query);

        // Check if there were any search results in the DB
        if ($db_results && mysqli_num_rows($db_results) > 0) {
            // Save user's data from the DB
            $user_data = mysqli_fetch_assoc($db_results);

            // Check if the provided password matches the one in the DB
            if ($password === $user_data['password']) {
                // Update the session
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_username'] = $user_data['username'];
                $_SESSION['user_email'] = $user_data['email'];
                $_SESSION['user_password'] = $user_data['password'];
                $_SESSION['user_reg_date'] = $user_data['reg_date'];

                // Set a cookie
                setcookie("login", $_SESSION['user_username'], time() + 60 * 60 * 24 * 30, "/");
                setcookie("email", $_SESSION['user_email'], time() + 60 * 60 * 24 * 30, "/");
                setcookie("reg_date", $_SESSION['user_reg_date'], time() + 60 * 60 * 24 * 30, "/");

                // Redirect to the index page
                header("Location: ../");
                exit();
            } else {
                // If the entered password does not match the DB
                // Redirect to the login page with a "wrong password" error
                header("Location: ../login/?error=wrong_password");
                exit();
            }
        } else {
            // If the entered username is not in the DB
            // Redirect to the login page with a "unknown username" error
            header("Location: ../login/?error=unknown_username");
            exit();
        }

        // Close connection to the MySQL DB server
        mysqli_close($db_connection);
    } else {
        // Redirect to the login page with a "invalid credentials" error
        header("Location: ../login/?error=invalid_credentials");
        exit();
    }
} else {
    exit();
}
?>