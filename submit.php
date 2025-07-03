<?php
$host = "localhost";
$username = "root";  // সাধারণত লোকালহোস্টে root
$password = "";      // যদি পাসওয়ার্ড সেট না করে থাকো, তাহলে ফাঁকা রাখো
$dbname = "phpmyadmin";  // তুমি যে ডাটাবেজে টেবিল বানিয়েছো

// ডাটাবেজ কানেকশন
$conn = new mysqli($host, $username, $password, $dbname);

// কানেকশন চেক
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ফর্ম ডাটা নেয়া
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$nid = $_POST['nid'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$education = $_POST['education'];
$blood = $_POST['blood'];

// SQL: ডাটাবেজে ইনসার্ট করা
$sql = "INSERT INTO cdva_application 
(full_name, date_of_birth, birth_reg_number, phone_number, email, address, education_qualification, blood_group)
VALUES 
('$fullname', '$dob', '$nid', '$phone', '$email', '$address', '$education', '$blood')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>ধন্যবাদ, আপনার আবেদন গ্রহণ করা হয়েছে।</h1>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
