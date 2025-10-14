<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) $_SESSION['user']="guest";
    elseif (isset($_POST['logout'])) {
        unset($_SESSION);
        $_SESSION['user']="guest";
    }
    if (isset($_POST['login']) or isset($_POST['reg'])) {
        $_POST['nick'] = strip_tags($_POST['nick']);
        $_POST['nick'] = htmlspecialchars($_POST['nick'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $_POST['nick'] = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['nick']);
        $_POST['passwd'] = strip_tags($_POST['passwd']);
        $_POST['passwd'] = htmlspecialchars($_POST['passwd'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
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

    <img src="inc/weekly_logo.png" class="logo" alt="">

    <div class="title">
        <h1>Weekly by Hawk</h1>
        <h2>
<?php
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
    
</body>
</html>