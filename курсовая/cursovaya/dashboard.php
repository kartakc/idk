<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql_role = "SELECT role FROM users WHERE id=$user_id";
$result_role = $conn->query($sql_role);

if ($result_role->num_rows > 0) {
    $user_role = $result_role->fetch_assoc()['role'];

    if ($user_role === 'admin') {
        $sql_users = "SELECT id, username FROM users";
        $result_users = $conn->query($sql_users);

        if ($result_users->num_rows > 0) {
            echo "<div class='admin-panel'>";
            echo "<h3>Пользователи:</h3>";
            echo "<ul>";
            while ($row = $result_users->fetch_assoc()) {
                echo "<li>ID: " . $row['id'] . ", Никнейм: " . $row['username'] . " 
                      <button onclick='editUser(" . $row['id'] . ")'>Изменить</button>
                      <button onclick='confirmDelete(" . $row['id'] . ")'>Удалить</button></li>";
            }
            echo "</ul>";
            echo "<button onclick='showAddUserForm()'>Добавить пользователя</button>";
            echo "</div>";
        } else {
            echo "Нет зарегистрированных пользователей.";
        }
    }

    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo "<h2> </h2>";
    } else {
        echo "User not found";
    }
} else {
    echo "Error fetching user role.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imeges/x icon" href="favicon/sc.ico">
    <link rel="stylesheet" href="styles.css">
    <title>Твой профиль</title>
    <link rel="icon" type="imeges/x icon" href="favicon/sc.ico">
</head>
<body>
    <div class="container">
        <h2>Добро пожаловать, <?php echo $user['username']; ?>!</h2>
        <p>Твой ID: <?php echo $user['id']; ?></p>

        <button type="submit"><a class="visit-music" href="music.php" style="font-size: 16px;">MusiCloud</a></button>

        <h3>Изменить данные</h3>
        <form action="edit_user.php" method="post">
            <input type="hidden" name="edit_user_id" id="edit_user_id" value="">
            <label for="new_username">Твой новый никнейм:</label>
            <input type="text" id="new_username" name="new_username" value="<?php echo $user['username']; ?>" required>

            <label for="new_password">Новый пароль:</label>
            <input type="password" id="new_password" name="new_password" required>

            <button type="submit">Сохранить изменения</button>
        </form>
        <br>
        <a href="logout.php">Выйти</a>
    </div>

    <script>
        function editUser(userId) {
            document.getElementById("edit_user_id").value = userId;
            document.getElementById("new_username").value = prompt("Enter new username:", "");
            document.getElementById("new_password").value = prompt("Enter new password:", "");

            document.forms[0].submit();
        }

        function confirmDelete(userId) {
            var confirmDelete = confirm("Are you sure you want to delete this user?");
            if (confirmDelete) {
                var deleteForm = document.createElement("form");
                deleteForm.method = "post";
                deleteForm.action = "delete_user.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "user_id";
                input.value = userId;

                deleteForm.appendChild(input);
                document.body.appendChild(deleteForm);
                deleteForm.submit();
            }
        }

        function showAddUserForm() {
            var username = prompt("Enter new username:", "");
            var password = prompt("Enter new password:", "");

            var addUserForm = document.createElement("form");
            addUserForm.method = "post";
            addUserForm.action = "add_user.php";

            var usernameInput = document.createElement("input");
            usernameInput.type = "text";
            usernameInput.name = "username";
            usernameInput.value = username;

            var passwordInput = document.createElement("input");
            passwordInput.type = "password";
            passwordInput.name = "new_password";
            passwordInput.value = password;

            var addButton = document.createElement("button");
            addButton.type = "submit";
            addButton.textContent = "Add User";

            addUserForm.appendChild(usernameInput);
            addUserForm.appendChild(passwordInput);
            addUserForm.appendChild(addButton);

            document.body.appendChild(addUserForm);
            addUserForm.submit();
        }
    </script>
</body>
</html>
