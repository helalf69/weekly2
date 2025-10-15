<?php

    echo ("<div class='ops'>\n");
        $db = new SQLite3('inc/weekly.db');
        if ($db) {
            echo "DB connected successfully";
        } else {
            echo "Connection failed, contact admin";
        } 
        echo ("<br />\n");
        //$sql = "DROP TABLE User;";
        //$ref = $db->query($sql);

        if (isset($_POST['login'])) {
            $login = true;
            var_dump($_POST);
            $db->exec("CREATE TABLE IF NOT EXISTS User (idUser INTEGER PRIMARY KEY AUTOINCREMENT, UserName TEXT, UserPW TEXT)");
            if (isset($_POST['login'])) {
                $sql = "SELECT * FROM User WHERE UserName = '" . $_POST['uname'] . "';";
                $ref = $db->query($sql);
                if ($row = $ref->fetchArray(SQLITE3_ASSOC)) {
                    echo ("Logging in " . $login . "<br />\n");
                    var_dump($row);
                    if ($_POST['upasswd'] == $row['UserPW']) {
                        var_dump($row);
                        $_SESSION['user'] = $row['UserName'];
                        $_SESSION['uid'] = $row['idUser'];
                        echo ("<script>changeUserbar('login', '" . $row['UserName'] . "')</script>\n");
                        $login = false;
                    }
                    else {
                        echo ("<script>changeUserbar('wrong')</script>\n");
                    }
                }
                else {
                    //echo ("Register new " . $login . "<br />\n");
                    unset ($_SESSION);
                    $_SESSION['user'] = "new";
                    echo ("<script>changeUserbar('register', '" . $_POST['uname'] . "', '" . $_POST['upasswd'] . "')</script>\n");
                }
            }
        }
        elseif (isset($_POST['reg']) && $_POST['reg'] == "Yes, please") {
            echo ("Register clicked " . $login . "<br />\n");
            $sql = "INSERT INTO User (UserName, UserPW) VALUES ('" . $_POST['uname'] . "', '" . $_POST['upasswd'] . "');";
            echo ($sql . "<br />\n");
            $ref = $db->query($sql);
            $_SESSION['user'] = $_POST['uname'];
            $sql = "SELECT last_insert_rowid();";
            $ref = $db->query($sql);
            if ($row = $ref->fetchArray(SQLITE3_ASSOC)) {
                //var_dump($row);
                $_SESSION['uid'] = $row['last_insert_rowid()'];
            }
            echo ("<script>changeUserbar('login', '" . $_POST['uname'] . "')</script>\n");
        }
        else {
            $sql = "SELECT idUser, UserName FROM User ORDER BY idUser DESC LIMIT 3;";
            $ref = $db->query($sql);
            while ($row = $ref->fetchArray(SQLITE3_ASSOC)) {
                var_dump($row);
            }
        }
        echo ("<br />\n");
        var_dump($_POST);
        echo ("<br />\n");
        var_dump($_SESSION);
    echo ("\t</div>\n");

?>