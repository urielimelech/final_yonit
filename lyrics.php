<?php
    include "includes/db.php"
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
                <h1 class="h1 needFont">Lyrics</h1>
                <?php
                    $path = $_SERVER['REQUEST_URI'];
                    $splittedstring = explode("=",$path);
                    $query = "SELECT * FROM tb_playList_218 WHERE id= {$splittedstring[1]}";
                    $result4 = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result4);
                    echo "<section>" . $row["lyrics"] . "</section>";
                ?>
                
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="includes/script.js"></script>
    </body>
</html>