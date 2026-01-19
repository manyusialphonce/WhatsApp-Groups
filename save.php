<?php
$servername = "localhost";
$username = "YOUR_DB_USERNAME";
$password = "YOUR_DB_PASSWORD";
$dbname = "WhatsAppGroupsDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_name = $_POST['group_name'];
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO groups (group_name, user_name, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $group_name, $user_name, $phone);
    $stmt->execute();
    $stmt->close();

    echo "Group saved successfully! <a href='index.html'>Go Back</a>";
}

$conn->close();
?>