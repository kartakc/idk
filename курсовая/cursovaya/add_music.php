<?php

function addMusic($name,$opisanie, $photoPath, $musicPath ) {
    global $conn;


    $name = mysqli_real_escape_string($conn, $name);



    $sql = "INSERT INTO music (name, opisanie, photo_path, music_path) 
            VALUES ('$name','$opisanie','$photoPath','$musicPath')";


    if ($conn->query($sql) === TRUE) {

        $conn->close();

        if (file_exists("music.php")) {
            header("Location: music.php");
            exit();
        } else {
            echo "Error: music.php not found!";
        }
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
