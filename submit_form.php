<?php
// Check if form data is set and not empty
if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spt";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Sanitize data to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert data into database
    $sql = "INSERT INTO contact_us (email,subject, message) VALUES ('$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
		echo "<script>alert('submitted successfully')</script>";
        header("Location: home.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Form data is not complete.";
}
?>
