<?php
// Include your database connection file (connection.php)
include("connection.php"); // Replace "path/to/your/connection.php" with the actual path to your connection.php file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['comments'];

    // Check if the required fields are not empty
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo '<p>All fields are required. Please fill in all the details and try again.</p>';
    } else {
        // Prepare and execute SQL query using prepared statement to insert data into the database
        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);

        if (mysqli_stmt_execute($stmt)) {
            // Close the prepared statement
            mysqli_stmt_close($stmt);

            // Redirect to the "thank.php" page
            header("Location: thank.php");
            exit();
        } else {
            // Error message and error details
            echo '<p>Sorry, there was an error sending your message. Please try again later.</p>';
            echo 'Error details: ' . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
}
?>
