<?php

    echo ("<div class='ops'>\n");
        $db = new SQLite3('inc/weekly.db');
        if ($db) {
            echo "DB connected successfully";
        } else {
            echo "Connection failed, contact admin";
        } 
        echo ("<br />\n");
        if (isset($_POST['login'])) {
            var_dump($_POST);
            $db->exec("CREATE TABLE IF NOT EXISTS User (idUser INT PRIMARY KEY, UserName TEXT, UserPW TEXT)");
            if (isset($_POST['login'])) {
                $sql = "SELECT * FROM User WHERE UserName = '" . $_POST['uname'] . "';";
                $ref = $db->query($sql);
                if ($row = $ref->fetchArray(SQLITE3_ASSOC)) {
                    // var_dump($row);
                    $_SESSION['user'] = $row['UserName'];
                    $_SESSION['uid'] = $row['idUser'];
                    echo ("<script>changeUserbar('login', '" . $row['UserName'] . "')</script>\n");
                }
                else {
                    $_SESSION['user'] = "new";
                }
            }

        }
        echo ("<br />\n");
        var_dump($_SESSION);
    echo ("\t</div>\n");

?>