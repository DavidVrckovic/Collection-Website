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
    if (isset($_POST['coin_type'], $_POST['coin_value'], $_POST['coin_year'])) {

        // Get provided data with $_POST
        $coin_type = $_POST['coin_type'];
        $coin_value = $_POST['coin_value'];
        $coin_year = $_POST['coin_year'];

        // Register the data to the DB
        $db_query = "DELETE FROM collections WHERE coin_type LIKE '" . $coin_type . "' AND coin_value LIKE '" . $coin_value . "' AND coin_year LIKE '" . $coin_year . "' LIMIT 1";
        $db_results = mysqli_query($db_connection, $db_query);

        // Check if the data has been added to the DB
        if ($db_results == TRUE) {
            // Redirect to the index page
            header("Location: ../my");
            exit();
        } else {
            // If the data has not been registered in the DB
            // Redirect to the collection page with an error
            header("Location: ../my/?error=delete");
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
