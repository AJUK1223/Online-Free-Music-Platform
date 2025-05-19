<?php
$server_name = "localhost";
$user_name = "root";
$user_pass = "";
$database_name = "music_user";

try {
    // Create a connection using MySQLi
    $conn = new mysqli($server_name, $user_name, $user_pass, $database_name);

    // Check for connection errors
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Optional: Display success message for debugging
    echo "Connected successfully to the database: $database_name";
} catch (Exception $e) {
    // Handle connection errors gracefully
    die($e->getMessage());
}

// Note: Do not close the connection here if you include this file in other scripts.
?>
