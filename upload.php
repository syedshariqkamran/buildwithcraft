<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $imageName = $_FILES["fileToUpload"]["name"];

            $sql = "INSERT INTO images (name, image) VALUES ('$imageName', '$targetFile')";
            if ($conn->query($sql) === TRUE) {
                echo "Image uploaded and inserted into the database successfully.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

// Delete image
if (isset($_GET["delete"])) {
    $imageId = $_GET["delete"];
    $sqlDelete = "DELETE FROM images WHERE id = $imageId";
    if ($conn->query($sqlDelete) === TRUE) {
        echo "Image deleted successfully.<br>";
    } else {
        echo "Error deleting image: " . $conn->error . "<br>";
    }
}

// Fetch all images from the database
$sqlFetch = "SELECT id, name, image FROM images";
$result = $conn->query($sqlFetch);

echo '<form method="post" action="">
<input type="submit" name="displayAll" value="Display All Images">
</form>';

echo '<form method="post" action="adminhome.php">
<input type="submit" name="gotoAdminHome" value="Go to Admin Home">
</form>';



echo '<div class="image-gallery">';

if (isset($_POST["displayAll"]) || isset($_GET["delete"])) {
    if ($result->num_rows > 0) {
        echo '<div class="image-gallery">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="image-container">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '" class="gallery-image">';
            echo '<br>';
            echo '<button class="delete-btn"><a href="?delete=' . $row["id"] . '">Delete</a></button>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "No images found in the database.";
    }
}


$conn->close();
?>

<style>
/* Style for image gallery */
.image-gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    background-color: yellow; /* Background color for the image gallery */
    padding: 20px; /* Add padding for better spacing */
}

/* Style for each image container */
.image-container {
    position: relative;
    text-align: center;
    margin: 10px;
}

/* Style for the image */
.gallery-image {
    max-width: 100%;
    height: auto;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style for the delete button */
.delete-btn {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    margin-top: 5px;
    text-decoration: none;
}

.delete-btn a {
    color: white;
    text-decoration: none;
}

.delete-btn:hover {
    background-color: #d32f2f;
}
</style>