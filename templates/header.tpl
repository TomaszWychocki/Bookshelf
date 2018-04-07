<html>
<head>
    <title>BookShelf</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mail.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="shortcut icon" href="images/icon.ico">

    <script>
        function hide() {
            document.getElementById("cookie").style.cssText = 'visibility:hidden;';
            document.cookie="cookie_info = T; expires=Fri, 3 Aug 2030 20:47:11 UTC;";
        }
        function hide2(id){
            document.getElementById(id).style.cssText = 'visibility:hidden;';
        }
        function log_hide(){
            document.getElementById('login_div').style.cssText = 'visibility: hidden;';
        }
        function reg_hide(){
            document.getElementById('register_div').style.cssText = 'visibility: hidden;';
        }
        function remind_hide(){
            document.getElementById('remind_div').style.cssText = 'visibility: hidden;';
            document.getElementById("login_div").style.cssText = 'visibility:hidden;';
            document.getElementById('remind_pass_div').style.cssText = 'visibility: hidden;';
        }
        function wys(){
            document.getElementById("content").style.cssText = 'min-height: ' + (window.innerHeight-166) + 'px;';
            document.getElementById("remind_pass_content").style.cssText = 'margin-top: ' + ((window.innerHeight/2)-100) + 'px;';
        }
        function showPage(x){
            switch(x) {
                case "login":
                    document.getElementById("login_div").style.cssText = 'visibility:visible; opacity: 1; transition: opacity 1s;';
                    document.getElementById("login_content").style.cssText = 'margin-top: ' + ((window.innerHeight/2)-177) + 'px;';
                    document.getElementById("error").style.cssText = 'visibility:hidden;';
                    break;
                case "register":
                    document.getElementById("register_div").style.cssText = 'visibility:visible; opacity: 1; transition: opacity 1s;';
                    document.getElementById("register_content").style.cssText = 'margin-top: ' + ((window.innerHeight/2)-230) + 'px;';
                    document.getElementById("error").style.cssText = 'visibility:hidden;';
                    break;
                case "remind":
                    document.getElementById("remind_div").style.cssText = 'visibility:visible; opacity: 1; transition: opacity 1s;';
                    document.getElementById("remind_content").style.cssText = 'margin-top: ' + ((window.innerHeight/2)-100) + 'px;';
                    document.getElementById("error").style.cssText = 'visibility:hidden;';
                    break;
            }
        }
    </script>
</head>
<body onload="wys()">
    <div id="wrapper">
        <div id="header">
            <center>
                <div id="child">
                    BookShelf
                </div>
            </center>
        </div>
        <div id="content">
