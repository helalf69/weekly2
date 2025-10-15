<?php 
    session_start(); // ******************************************************************* INIT ****************************************
    if (isset($_POST['logout']) || !isset($_SESSION['user'])) {
        unset($_SESSION);
        $_SESSION['user']="guest";
    }
    if (isset($_POST['login']) or isset($_POST['reg'])) {
        $_POST['uname'] = strip_tags($_POST['uname']);
        $_POST['uname'] = htmlspecialchars($_POST['uname'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $_POST['uname'] = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['uname']);
        $_POST['upasswd'] = strip_tags($_POST['upasswd']);
        $_POST['upasswd'] = htmlspecialchars($_POST['upasswd'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $_POST['upasswd'] = hash('sha256', $_POST['upasswd']);
    }
    $login = false;
    $reg = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly by Hawk</title>
    <link rel="icon" href="inc/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="inc/weekly.css" />
    <script src="inc/weekly.js"></script> 
</head>

<body onload="fadeBG()">
    <div class="bg" id="bg" aria-hidden="true"></div>
    <script src="inc/fadebg.js"></script>

    <script src="inc/userbar.js"></script>

    <img src="inc/weekly_logo.png" class="logo" alt="">

    <div class="footer">
        *If you don't have a user, you will be asked if you want to register.
    </div>

    <div class="title">
        <h1>Weekly by Hawk</h1>
        <h2>
<?php  // ************************************************************************************ HEADER **************************************
        $month = "<span style='font-size: 125%; font-weight: bolder;'>" . date('F') . "</span> ";
        if (date('d') > 15) {
            $nextMonth = "<span style='font-size: 65%'>" . date("F", strtotime("+1 month")) . "</span> ";
            echo ($month . $nextMonth . "<br />\n");
        } else {
            $prevMonth = "<span style='font-size: 65%'>" . date("F", strtotime("-1 month")) . "</span> ";
            echo ($prevMonth . $month . "<br />\n");
        }
//        echo (date('l jS'));
?>
        </h2>
    </div>

    <div class="userbar" id="userbar"> <!-- ***************************************************** USER BAR **************************** -->
        <form action="index.php" method="post" class="login">
            <input type="text" name="uname" placeholder="Username" size="10" />&nbsp;
            <input type="password" name="upasswd" placeholder="Password" size="10" />&nbsp;
            <input type="submit" name="login" value="Log in*" />
        </form>
    </div>

    <?php include("inc/ops.inc.php"); ?>  <!-- **************************************************  ADMIN **************************** -->
  
</body>
</html>