<?php
$servername = "localhost";
$username = "YOUR_DB_USERNAME";
$password = "YOUR_DB_PASSWORD";
$dbname = "WhatsAppGroupsDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// Admin login
$admin_user = "admin";
$admin_pass = "1234"; // change this
session_start();

if(isset($_POST['username'], $_POST['password'])){
    if($_POST['username']==$admin_user && $_POST['password']==$admin_pass){
        $_SESSION['admin'] = true;
    } else { echo "Wrong credentials!"; }
}
if(!isset($_SESSION['admin'])){
?>
<form method="POST">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
<?php exit; }

// Show all groups
$result = $conn->query("SELECT * FROM groups ORDER BY created_at DESC");
echo "<h2>All WhatsApp Groups</h2><a href='admin.php?logout=true'>Logout</a>";
echo "<table><tr><th>Group Name</th><th>User</th><th>Phone</th><th>WhatsApp Link</th><th>Time</th></tr>";
while($row = $result->fetch_assoc()){
    $wa_link = $row['phone'] ? "<a href='https://wa.me/{$row['phone']}' target='_blank'>Chat</a>" : "";
    echo "<tr><td>{$row['group_name']}</td><td>{$row['user_name']}</td><td>{$row['phone']}</td><td>$wa_link</td><td>{$row['created_at']}</td></tr>";
}
echo "</table>";
$conn->close();
?>