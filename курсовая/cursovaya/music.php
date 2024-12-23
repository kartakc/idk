<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imeges/x icon" href="favicon/sc.ico">
    <style>
        body {
            text-align: center;
        }

        a {
            font-size: 24px;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
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
            echo '<a href="admin.php"><br>Перейти в карточку артиста</a>';
        }
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="musicstyles.css">
    <title>MusiCloud</title>
    <link rel="icon" type="imeges/x icon" href="favicon/sc.ico">
</head>
<body>
    <div class="musiccontainer">
        <h2>MusiCloud</h2>
    </div>

    <div class="musiccontainer">
        <h3>Главные хиты</h3>
    </div>

    <div class="musiccontainer">
        <div class="music">
            <img src="Snake Eyes.jpg" width="800" height="700">
            <h3>Snake Eyes</h3>
            <p> Snake Eyes — песня Feint с вокалом CoMa. Она была выпущена 12 октября 2012 года и включена в качестве тринадцатого трека в Monstercat 010 — Conquest, третьего трека в Monstercat — Best of Drum & Bass / Drumstep Vol. 2 и девятого трека в Monstercat — Best of 2012.                </p>
                <audio  controls="controls">
                        <source src="Snake Eyes.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>

        <div class="music">
            <img src="Talkless - Why.jpg" width="800" height="700">
            <h3>Talkless - Why (feat. jnhygs)</h3>
            <p> Talkless — это проект Банчи Теаракит (Nimp) и Втаньи Чантиван (Fon). Нимп — гитарист группы Goose, и это его сайд-проект. Они с Фоном потратили более 2 лет на создание этого мини-альбома «Dot Dot Dot». Они выпустили свой альбом на 7-м фестивале Fat на музыкальном лейбле SO::ON Dry Flower. </p>
                <audio  controls="controls">
                        <source src="Talkless - Why.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>
        <div class="music">
            <img src="robopup.jpg" width="800" height="700">
            <h3>Robopup-program me</h3>
            <p> Robopup-певица, исполняющая гиперпоп/сценкор, которая покорила сердца многих пользователей своим прекрсным голосом, выпускает треки как на английском, так и на русском языках. Набрала большую популярность из-за релиза "yandere gf" с "Mezha". Позиционирует себя как AI, и желанная девушка для эмо-парней.</p>
            <audio  controls="controls">
                        <source src="robopup.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>

        <div class="music">
            <img src="odetari.png" width="800" height="700">
            <h3>Odetari-GOOD LOYAL THOTS</h3>
            <p> Таха Отман Ахмад, профессионально известный как Odetari, — американский певец палестинского происхождения, рэпер, автор песен и продюсер. Он начал продюсировать и выпускать музыку в 13 лет. Его музыка стала популярной в TikTok в 2023 году, а его песни «Good Loyal Thots», «Narcissistic Personality Disorder», «Look Don't Touch», «I Love You Hoe» и «GMFU». Все они попали в топ-10 чарта Billboard Hot Dance/Electronic Songs.</p>
            <audio  controls="controls">
                        <source src="Odetari.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>



        <div class="container">
        <h3 align="center" style="color:#000000">Новый хит!!</h3>
        </div>




         <?php
        $sql_music = "SELECT * FROM music";
        $result_music = $conn->query($sql_music);
        if ($result_music->num_rows > 0) {
            while ($row = $result_music->fetch_assoc()) {
                echo '<div class="music">';
                echo '<img src="' . $row['photo_path'] . '" alt="' . $row['name'] . '" width="800" height="700">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '' . $row['opisanie'] . '<br>' ;
                echo '<audio  controls="controls"> <source src="' . $row['music_path'] .'" type=audio/mpeg> </audio>';
                echo '</div>';
            }
        } else {
            echo '<div class="container"> <p align="center" style="color:#000000">Нет новых хитов(добавь свою неповторимую композицую, но это может сделать только подтврежденный дистрибьютор, то есть admin)</p> </div>';
        }
        $conn->close();
        ?>
    </div>
    <div class="container">
        <div class="contacts">
        <div class="contact-block">
            <div class="contact-block">
                <h4>Твой профиль</h4>
                <a href="dashboard.php">Вернуться в редактор профиля</a>
            </div>
        </div>
    </div>    
</body>
</html>
