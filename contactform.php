<?php
// Include your database connection file (connection.php)
include "connection.php"; // Replace "path/to/your/connection.php" with the actual path to your connection.php file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['comments'];

    // Prepare and execute SQL query using prepared statement to insert data into the database
    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);

    if (mysqli_stmt_execute($stmt)) {
        // Success message
        echo '<p>Your message has been sent successfully. We will get back to you shortly.</p>';
    } else {
        // Error message and error details
        echo '<p>Sorry, there was an error sending your message. Please try again later.</p>';
        echo 'Error details: ' . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>
