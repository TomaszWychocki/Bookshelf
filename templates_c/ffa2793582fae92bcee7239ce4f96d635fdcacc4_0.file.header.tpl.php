<?php
/* Smarty version 3.1.30, created on 2017-04-23 21:28:09
  from "D:\xampp\htdocs\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fd0049cfe437_18870205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffa2793582fae92bcee7239ce4f96d635fdcacc4' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\header.tpl',
      1 => 1492975619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fd0049cfe437_18870205 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>BookShelf</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mail.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="shortcut icon" href="images/icon.ico">

    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
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
<?php }
}
