
    <?php
    session_start();
    require_once('db.php');
    ?>
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
            color: #000000;
        }
    </style>
</head>

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
            <img src="m1v.jpg" width="800" height="700">
            <h3>m1v-you</h3>
            <p> m1v — проект певца, автора песен и продюсера made1vvvonder (F.K.A. Lonegore) (родился 5 сентября 2004 г.) из Германии. 28 апреля 2023 года made1vvvonder прекратил выпуск музыки под названием m1v.
                <br>Первоначально made1vvvonder начал создавать музыку под разными названиями, создавая инди- и рэп-музыку, вдохновленные Tyler, The Creator, но вскоре перешёл на имя MEANFACE EARL, где он продюсировал и писал эмо-рэп-песни. Эти песни начали выпускать в 2019 году, но с тех пор большинство из них было удалено из потоковых сервисов и нигде не архивировано. На некоторые из этих песен также были выпущены музыкальные клипы, но они тоже были удалены.
                </p>
                <audio  controls="controls">
                        <source src="m1v.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>

        <div class="music">
            <img src="smoke.png" width="800" height="700">
            <h3>Lumi Athena - SMOKE IT OFF! (feat. jnhygs)</h3>
            <p> Эта композиция была создана двумя артистами, которые покорили сердца многих слушателей!
                <br>Lumi Athena — музыкальный исполнитель, видеоредактор, инженер по микшированию и основатель жанра Krushclub. Его работа в основном состоит из того, что артисты записывают треки, а затем микшируют их вокал. Его брендинг уникален и очень последователен, с пиксельной атмосферой, светодиодными звездами или символикой полумесяца, что отсылает к его образу жизни под названием «Egoista».
                <br>jnhygs (произносится как Джин-Хиггс) — гиперпоп-исполнитель из Кирклэнда, штат Вашингтон. Она известна такими песнями, как «SMOKE IT OFF!», «xtayalive» и «JERK!» и ее сотрудничество с такими артистами, как Lumi Athena, Iluvern!, cade clair и 9lives.</p>
                <audio  controls="controls">
                        <source src="smoke.mp3" type="audio/mpeg">
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
                echo ' ' . $row['opisanie'] . '<br>';
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
                <h4>My contacts</h4>
                <p><a href="https://www.instagram.com/codeinodamn?igsh=MXg0Mmt4bDN0Y2R0dQ%3D%3D&utm_source=qr">codeinodamn</a></p>
            </div> 
            <div class="contact-block">
                <h4>My second sc</h4>
                <p><a href="https://on.soundcloud.com/UcKqFhUnwv8Nfdkp9">w34kn3ss</a></p>
            </div>

            <div class="contact-block">
                <h4>My sc</h4>
                <p><a href="https://on.soundcloud.com/PVZ5H2sKncWRAc8m6">sooosano</a></p>
            </div>

            <div class="contact-block">
                <h4>Твой профиль</h4>
                <a href="dashboard.php">Вернуться в редактор профиля</a>
            </div>
        </div>
    </div>
</body>
</html>
