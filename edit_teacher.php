<?php
// Establish MySQL connection
$con = mysqli_connect("localhost", "root", "", "spt");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];

    // Update query
    $update_query = "UPDATE teacher_login SET t_name='$name', sub_id='$subject_code', sub_name='$subject_name', t_phno='$phno', t_email='$email' WHERE id='$id'";

    // Execute the update query
    if (mysqli_query($con, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Fetch teacher details based on ID
$id = $_GET['id'];
$select_query = "SELECT * FROM teacher_login WHERE id='$id'";
$result = mysqli_query($con, $select_query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="layout.css">
</head>
<body>
<div class="banner_image">
<div class="container" style="background-color: white; padding:1cm; border-radius: 5px;">
    <h2>Edit Teacher Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['t_name']; ?>"><br>
        <label for="subject_code">Subject Code:</label><br>
        <input type="text" id="subject_code" name="subject_code" value="<?php echo $row['sub_id']; ?>"><br>
        <label for="subject_name">Subject Name:</label><br>
        <input type="text" id="subject_name" name="subject_name" value="<?php echo $row['sub_name']; ?>"><br>
        <label for="phno">Phone Number:</label><br>
        <input type="text" id="phno" name="phno" value="<?php echo $row['t_phno']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['t_email']; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
</div>
</body>
</html>

<?php
// Close MySQL connection
mysqli_close($con);
?>
