<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_user_id'])) {
    $editUserId = $_POST['edit_user_id'];
    $newUsername = $_POST['new_username'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username='$newUsername', password='$newPassword' WHERE id=$editUserId";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating user data: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
