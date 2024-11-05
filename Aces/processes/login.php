<?php
session_start();
include('../db/db_connection.php');

if (isset($_POST['btnsubmit'])) {
    // Sanitize input
    $_username = htmlspecialchars(trim($_POST["username"]));
    $_password = htmlspecialchars(trim($_POST["password"]));

    // SQL query to select the user by username (only check username)
    $sql = "SELECT counselor_id, password, userlevel FROM tbl_counselor WHERE username = ?";
    $params = array($_username , $_password);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // Log the SQL error for debugging
        error_log(message: "SQL Error: " . print_r(sqlsrv_errors(), true));
        echo "There was an issue with the login process. Please try again later.";
    } else {
        if (sqlsrv_fetch($stmt)) {
            // Fetch relevant fields
            $counselor_id = sqlsrv_get_field($stmt,  0);  // Assuming column 0 is the counselor ID
            $storedPassword = sqlsrv_get_field($stmt, 1);  // Assuming column 1 is the hashed password
            $userlevel = sqlsrv_get_field($stmt, 2);  // Assuming column 2 is the user level

            // Verify the password (hashed)
            if (password_verify($_password, $storedPassword)) {
                // Store counselor ID in session
                $_SESSION['counselor_id'] = $counselor_id;

                // Redirect based on user role
                if ($userlevel === "Administrator") {
                    header("Location: ./pages/admindashboard.php");
                    exit;
                } else {
                    // Redirect non-admin users to their own dashboard
                    header("Location: ./pages/userdashboard.php");
                    exit;
                }
            } else {
                // Incorrect password
                echo "Invalid password. Please try again.";
            }
        } else {
            // No user found with that username
            echo "No user found with this username.";
        }

        // Free the statement resource after checking if it was successfully created
        sqlsrv_free_stmt($stmt);
    }

    // Close the connection
    sqlsrv_close($conn);
}
?>
