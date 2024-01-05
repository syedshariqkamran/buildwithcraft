<!DOCTYPE html>
<html>
<head>
    <title>Contacts List</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: lightblue; /* Light blue color */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .delete-form {
            display: inline-block;
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
<!-- ... Previous HTML and PHP code ... -->

<body>
<!-- ... Previous HTML and PHP code ... -->

<body>
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    // Include the database connection file
    require_once "connection.php";

    // Function to validate input data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if the form is submitted and a delete request is sent
    if (isset($_POST['delete_id'])) {
        $delete_id = validate($_POST['delete_id']);

        // SQL query to delete the record from the "contacts" table
        $delete_query = "DELETE FROM contacts WHERE id='$delete_id'";
        mysqli_query($conn, $delete_query);
    }

    // Check if the user clicked on the logout button
    if (isset($_POST['logout'])) {
        // Clear all session variables and destroy the session
        session_unset();
        session_destroy();

        header("Location:index.html");

        exit();

    }

    // SQL query to fetch all data from the "contacts" table
    $query = "SELECT * FROM contacts";
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Display the welcome message and the logout button side by side
        echo "<div style='text-align: center; margin-bottom: 20px;'>";
        echo "<h1 style='display: inline-block;'>WELCOME SAJID NADEEM</h1>";
        echo "<form method='post' style='display: inline-block;'>
                <button type='submit' name='logout' class='delete-button'>Logout</button>
              </form>";
        echo "</div>";

        // Start HTML table to display the fetched data
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Phone</th>";
        echo "<th>Message</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        // Loop through the rows and display data in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td class='delete-form'>
                    <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>
                        <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                        <button class='delete-button' type='submit'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        // Close the HTML table
        echo "</table>";
    } else {
        echo "No data found in the 'contacts' table.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    header("Location: ../indexf.php");
    exit();
}
?>
</body>
</html>









