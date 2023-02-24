<?php
include("mysql_connection.php");

// Check if there is an error with a MySQL connection
if (isset($_SESSION['error'])) {
    header("Location: ../my/?error=mysql_connection");
    exit();
}

// Check if the request method is of type POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if $_POST super global variable is not null
    // Fixes "Undefined array key" error
    if (isset($_FILES["coin_icon"]["name"], $_POST['coin_type'], $_POST['coin_value'], $_POST['coin_year'])) {

        // Get provided data with $_POST
        $coin_icon = $_FILES["coin_icon"]["tmp_name"];
        $imgContent = addslashes(file_get_contents($coin_icon)); 
        $coin_type = $_POST['coin_type'];
        $coin_value = $_POST['coin_value'];
        $coin_year = $_POST['coin_year'];

        // Register the data to the DB
        $db_register_query = "INSERT INTO collections (username, coin_type, coin_value, coin_year, coin_image) VALUES ('{$_SESSION['user_username']}', '$coin_type', '$coin_value', '$coin_year', '$imgContent')";
        $db_register = mysqli_query($db_connection, $db_register_query);

        // Check if the data has been added to the DB
        if ($db_register == TRUE) {
            // Redirect to the index page
            header("Location: ../my");
            exit();
        } else {
            // If the data has not been registered in the DB
            // Redirect to the collection page with an error
            header("Location: ../my/?error=register");
            exit();
        }

        // Close connection to the MySQL DB server
        mysqli_close($db_connection);
    } else {
        // Redirect to the collection page with a "invalid" error
        header("Location: ../my/?error=invalid");
        exit();
    }
} else {
    exit();
}
