<?php
session_start();
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', '', 'spt');
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$stud_name = $_POST['stud_name'] ?? '';
$stud_id = $_POST['stud_id'] ?? '';
$stud_year = $_POST['stud_year'] ?? '';
$stud_sem = $_POST['stud_sem'] ?? '';
$stud_dept = $_POST['stud_dept'] ?? '';
$stud_phno = $_POST['stud_phno'] ?? '';
$stud_email = $_POST['stud_email'] ?? '';
$stud_password = $_POST['stud_password'] ?? '';

$check = mysqli_prepare($con, 'SELECT stud_email FROM student_login WHERE stud_email = ? LIMIT 1');
mysqli_stmt_bind_param($check, 's', $stud_email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    header('location:stud_login.php');
    exit;
}

$hashedPassword = password_hash($stud_password, PASSWORD_DEFAULT);
$insert = mysqli_prepare($con, 'INSERT INTO student_login (stud_id, stud_name, stud_year, stud_sem, stud_dept, stud_phno, stud_email, stud_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
mysqli_stmt_bind_param($insert, 'isiisiss', $stud_id, $stud_name, $stud_year, $stud_sem, $stud_dept, $stud_phno, $stud_email, $hashedPassword);
mysqli_stmt_execute($insert);

header('location:stud_login.php');
exit;
?>