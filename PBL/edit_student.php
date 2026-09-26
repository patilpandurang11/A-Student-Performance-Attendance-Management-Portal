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
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $dept = $_POST['dept'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];

    // Update query
    $update_query = "UPDATE student_login SET stud_name='$name', stud_year='$year', stud_sem='$sem', stud_dept='$dept', stud_phno='$phno', stud_email='$email' WHERE stud_id='$id'";

    // Execute the update query
    if (mysqli_query($con, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Fetch student details based on ID
$id = $_GET['id'];
$select_query = "SELECT * FROM student_login WHERE stud_id='$id'";
$result = mysqli_query($con, $select_query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="layout.css">
</head>
<body>
<div class="banner_image">
<div class="container" style="background-color: white; padding:2cm; border-radius: 5px;">
    <h2>Edit Student Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['stud_id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['stud_name']; ?>"><br>
        <label for="year">Year:</label><br>
        <input type="text" id="year" name="year" value="<?php echo $row['stud_year']; ?>"><br>
        <label for="sem">Semester:</label><br>
        <input type="text" id="sem" name="sem" value="<?php echo $row['stud_sem']; ?>"><br>
        <label for="dept">Department:</label><br>
        <input type="text" id="dept" name="dept" value="<?php echo $row['stud_dept']; ?>"><br>
        <label for="phno">Phone Number:</label><br>
        <input type="text" id="phno" name="phno" value="<?php echo $row['stud_phno']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['stud_email']; ?>"><br><br>
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
