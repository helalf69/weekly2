function changeUserbar(login, uname, upasswd) {
//    alert (login + " - " + uname + " - " + upasswd);
    let box = document.getElementById['userbar'];
    if (login == "Log in*") box.innerHTML = "Logged in as " + uname;
    if (login == "register") {
        alert (login + " - " + uname + " - " + upasswd);
        let txt = "<form action='index.php' method='post' class='login'>";
        txt = txt + "<input type='hidden' name='uname' value='" + uname + "' />";
        txt = txt + "<input type='hidden' name='upasswd' value='" + upasswd + "' />";
        txt = txt + "User not found, want to register? ";
        txt = txt + "<input type='submit' name='reg' value='Yes, please'>&nbsp;";
        txt = txt + "<input type='submit' name='reg' value='No, thank you'>&nbsp;";
        txt = txt + "</form>";
        box.innerHTML = txt;
    }
}