<?php
session_start();
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', '', 'spt');
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$stud_email = $_POST['stud_email'] ?? '';
$stud_password = $_POST['stud_password'] ?? '';

$stmt = mysqli_prepare($con, 'SELECT stud_password FROM student_login WHERE stud_email = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 's', $stud_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $storedPassword = $row['stud_password'];
    if (password_verify($stud_password, $storedPassword) || hash_equals($storedPassword, $stud_password)) {
        $_SESSION['stud_email'] = $stud_email;
        header('location:stud_portal.php');
        exit;
    }
}

header('location:stud_login.php');
exit;
?>