<?php
// Include the database connection file
require_once "connection.php";

// Define the provided username and password from the login form
$providedUsername = "admin";
$providedPassword = "123"; // Enter the provided password here

// SQL query to fetch the hashed password for the provided username from the 'users' table
$checkQuery = "SELECT * FROM users WHERE username = '$providedUsername'";
$result = mysqli_query($conn, $checkQuery);

// Check if the user exists in the database
if (mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
    $hashedPassword = $userData['password'];

    // Verify the provided password against the hashed password
    if (password_verify($providedPassword, $hashedPassword)) {
        echo "Welcome, $providedUsername! Login successful.";

        // Fetch data from 'contacts' table for the logged-in user
        $contactsQuery = "SELECT * FROM contacts WHERE username = '$providedUsername'";
        $contactsResult = mysqli_query($conn, $contactsQuery);

        // Check if there are any rows returned
        if (mysqli_num_rows($contactsResult) > 0) {
            // Loop through the rows and display the data
            while ($row = mysqli_fetch_assoc($contactsResult)) {
                echo "<br>";
                echo "Name: " . $row['name'] . "<br>";
                echo "Email: " . $row['email'] . "<br>";
                echo "Phone: " . $row['phone'] . "<br>";
                echo "Message: " . $row['message'] . "<br>";
            }
        } else {
            echo "No data found in the 'contacts' table for user: $providedUsername";
        }
    } else {
        echo "Invalid Password. Please try again.";
    }
} else {
    echo "Invalid Username. Please try again.";
}


// Close the database connection
mysqli_close($conn);
?>
