function changeUserbar(login, uname, upasswd) {
//    alert (login + " - " + uname + " - " + upasswd);
    let divbox = document.getElementById('userbar');
    if (login == "login") {
        alert (login + " - " + uname);
        divbox.innerHTML = "Logged in as " + uname;
    }
    if (login == "register") {
        //alert (login + " - " + uname + " - " + upasswd);
        let txt = "<form action='index.php' method='post' class='login'>";
        txt = txt + "<input type='hidden' name='uname' value='" + uname + "' />";
        txt = txt + "<input type='hidden' name='upasswd' value='" + upasswd + "' />";
        txt = txt + "User not found, want to register? ";
        txt = txt + "<input type='submit' name='reg' value='Yes, please'>&nbsp;";
        txt = txt + "<input type='submit' name='reg' value='No, thank you'>&nbsp;";
        txt = txt + "</form>";
        divbox.innerHTML = txt;
    }
}