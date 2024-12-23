<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_user_id'])) {
    $editUserId = $_POST['edit_user_id'];
    $newUsername = $_POST['new_username'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username=?, password=? WHERE id=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $newUsername, $newPassword, $editUserId);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating user data: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
