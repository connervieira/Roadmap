<?php
$services_database = json_decode(file_get_contents("./database.json"), true);
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>V0LT Services</title>
        <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    <body>
        <h1>V0LT Services</h1>
        <h2>Access all self-hosted V0LT services on this server.</h2>
        <hr>
        <main class="centered">
            <?php
            $directory_contents = scandir("../");
            $services_displayed = 0;

            if (in_array("dropauth", $directory_contents)){
                session_start(); // Start a PHP session.
                if ($_SESSION['authid'] == "dropauth") { // Check to see if the user is already signed in.
                    echo "<p style='margin-bottom:0px;'>You are currently signed in through DropAuth as <b>" . $_SESSION["username"] . "</b></p>";
                    echo "<a class='button' href='../dropauth/signout.php'>Logout</a>";
                } else {
                    echo "<p style='margin-bottom:0px;'>You are not currently signed in to DropAuth</p>";
                    echo "<a class='button' href='../dropauth/signin.php'>Login</a>";
                }
                echo "<br><br>";
            }


            echo "<div class=\"tilecontainer\">";
            echo "<div class=\"tilecontainer\">";
            foreach ($directory_contents as $file) {
                if (in_array($file, array_keys($services_database))) {
                    if ($services_displayed % 4 == 0 and $services_displayed !== 0) {
                        echo "</div>";
                        echo "</div>";
                        echo "<div class=\"tilecontainer\">";
                        echo "<div class=\"tilecontainer\">";
                    } else if ($services_displayed % 2 == 0 and $services_displayed !== 0) {
                        echo "</div>";
                        echo "<div class=\"tilecontainer\">";
                    }
                    echo "<a class=\"tile\" href='../" . $file . "'>";
                    echo "<h3>" . $services_database[$file]["name"] . "</h3>";
                    echo "<p>" . $services_database[$file]["description"] . "</p>";
                    echo "<img src='" . $services_database[$file]["image"] . "'></p>";
                    echo "</a>";
                    $services_displayed += 1;
                }
            }
            echo "</div>";
            echo "</div>";
            ?>
        </main>
    </body>
</html>
