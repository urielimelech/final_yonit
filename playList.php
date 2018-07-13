<?php
    include "includes/db.php";
    $query = "SELECT * FROM tb_playList_218";
    $result = mysqli_query($connection, $query);
    $result1 = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <meta charset ="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <button class="hButton" id="menuButt"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button>
                <button class="hButton" id="nightModeButt"><i class="fa fa-moon-o fa-2x" aria-hidden="true"></i></button>
                <img src="images/Raheli.png">
                <label class="needFont user">Raheli</label>
                <a href="index.html" id="logo"></a>
            </header>
            <section id="menuSection">
                <h1>Menu</h1>
                <nav>
                    <ul>
                        <li><a class="list-group-item needFont" href="#"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a></li>
                        <li><a class="list-group-item needFont" href="#"><i class="fa fa-heart" aria-hidden="true"></i>
                                &nbsp; Favorites</a></li>
                        <li><a class="list-group-item needFont" href="#"><i class="fa fa-car" aria-hidden="true"></i>
                                &nbsp; Cars</a></li>
                        <li><a class="list-group-item needFont" href="#"><i class="fa fa-users" aria-hidden="true"></i>
                                &nbsp; Group admins</a></li>
                        <li><a class="list-group-item needFont" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>
                                &nbsp; Tell a friend</a></li>
                    </ul>
                </nav>
            </section>
            <main>
                <h1>Raheli's mazda</h1>
                <nav>
                    <ul class="needFont">
                        <li class="systemNav"><a href="#" id="selected">Music</a></li>
                        <li class="systemNav"><a href="#">Pango</a></li>
                        <li class="systemNav"><a href="#">Driver's seat</a></li>
                        <li class="systemNav"><a href="#">Waze</a></li>
                        <li class="systemNav"><a href="#">A/C</a></li>
                    </ul>
                </nav>
                <div id="dynamic_data">
                    <?php
                        echo '<section class="songBox"></section>';
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<section class="songBox"><img class="songImg" src=' . $row["img"] . '><p class="songName needFont"> ' . $row["songName"] . ' ---- ' . $row["time"] . ' ---- ' . $row["user"] . '</p><p class="writerName needFont">' . $row["singer"] . '<a class="showDetails" href="lyrics.php?songId=' . $row["id"] . '">Lyrics</a></p><button><i class="fa fa-trash" id=' . $row["id"] . ' aria-hidden="true"></i></button></section>';
                        }
                        mysqli_free_result($result);
                        echo  "<audio controls>";
                        while($row = mysqli_fetch_assoc($result1)) {
                            echo '<source src= ' . $row["mp3"] . ' type= "audio/mpeg">';
                        }
                        echo "</audio>";
                        mysqli_free_result($result1);
                        mysqli_close($connection);
                     ?>
                </div>
                <button class="needFont" id="takeOverBtn">Take Over</button>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="includes/script.js"></script>
    </body>
</html>
