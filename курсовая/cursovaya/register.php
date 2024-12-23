<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($conn) {

        $username = $conn->real_escape_string(trim($_POST['username']));
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

        $checkUserSql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($checkUserSql);
        
        if ($result->num_rows > 0) {
            echo "Username already exists. Please choose another.";
        } else {

            $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.html");
                exit(); 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Connection is closed.";
    }
}

$conn->close();
?>
