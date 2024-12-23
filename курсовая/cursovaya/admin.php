<?php
session_start();
require_once('db.php');
require_once('add_music.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_music'])) {
    $name = $_POST['name'];
    $opisanie = $_POST['opisanie'];

    
    $uploadDir = 'uploads/'; 
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        
        $photoPath = $uploadFile;
    } else {
        
        $photoPath = ''; 
    }
    
    $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['music']['name']);
    
        if (move_uploaded_file($_FILES['music']['tmp_name'], $uploadFile)) {
            $musicPath = $uploadFile;
        } else {
            $musicPath = '';
        }

    

    
    addMusic($name, $opisanie, $photoPath, $musicPath);
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="musicstyles.css">
    <title>Карточка артиста</title>
    <link rel="icon" type="imeges/x icon" href="favicon/sc.ico">
</head>
<body>
    <div class="container">
        <h2>Карточка артиста</h2>

        <form action="admin.php" method="post" enctype="multipart/form-data">
            <label for="name">Напишите ваш никнейм и название вашего трека:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="opisanie">Рассказите что-то о себе и своем релизе:</label>
            <input type="text" id="opisanie" name="opisanie" required>
            <br>
            <label for="photo">Обложка(рекомендуемый размер 2000х2000):</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            <br>
            <label for="photo">Загрузите свой музыкальный фаил:</label>
            <input type="file" id="music" name="music" accept=".mp3" required>
            <br>
            <br>
            <button type="submit" name="add_music">Добавить релиз</button>
        </form>
        <br>
        <br>
        <a href="music.php">MusiCloud</a>
        <br>
        <br>
        <h2>Пример заполнения карточки артиста</h2>

        <img src="primer.jpeg" width="500" height="210">
    </div>
</body>
</html>
