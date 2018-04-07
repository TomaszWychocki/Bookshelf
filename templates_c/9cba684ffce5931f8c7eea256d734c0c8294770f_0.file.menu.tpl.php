<?php
/* Smarty version 3.1.30, created on 2017-04-22 23:52:44
  from "D:\xampp\htdocs\templates\menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd0ac922f35_71221184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cba684ffce5931f8c7eea256d734c0c8294770f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\menu.tpl',
      1 => 1492897962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd0ac922f35_71221184 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="menu_content">
    <tr>
        <td onClick="window.location.href='index.php'">
            <div class="link">
                &nbsp&nbspSTRONA GŁÓWNA&nbsp&nbsp
            </div>
        </td>
        <?php if ($_smarty_tpl->tpl_vars['show']->value == 'no_user') {?>
            <td>
                <div class="link" onclick="showPage('register')">
                    &nbsp&nbspREJESTRACJA&nbsp&nbsp
                </div>
            </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['show']->value == 'mail') {?>
            <td>
                <div class="account" style="float: right; min-width: 110px">
                    &nbsp&nbspWIADOMOŚCI&nbsp&nbsp
                    <div class="men">
                        <table class="menu_tab">
                            <tr>
                                <td onClick="window.location.href='index.php?action=receivedMail'">
                                    Odebrane
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=sendMail'">
                                    Nowa wiadomość
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['show']->value == 'my_account') {?>
            <td>
                <div class="account" style="float: right; min-width: 110px">
                    &nbsp&nbspMOJE KONTO&nbsp&nbsp
                    <div class="men">
                        <table class="menu_tab">
                            <tr>
                                <td onClick="window.location.href='index.php?action=changePassword'">
                                    Zmień hasło
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=changePersonalData'">
                                    Zmień dane osobowe
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=comments'">
                                    Komentarze
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['show']->value == 'add') {?>
            <td>
                <div class="link" onClick="window.location.href='index.php?action=addAuction'">
                    &nbsp&nbspDODAJ AUKCJĘ&nbsp&nbsp
                </div>
            </td>
        <?php }?>

        <td>
            <div class="search">
                <form method="GET" action="index.php">
                    <input type="text" name="szukana_fraza" placeholder="SZUKAJ...">
                </form>
            </div>
        </td>

        <?php if ($_smarty_tpl->tpl_vars['username']->value != 'no_user') {?>
            <td>
                <div class="account" style="float: right; min-width: 110px">
                    &nbsp&nbsp<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
&nbsp&nbsp
                    <div class="men">
                        <table class="menu_tab">
                            <tr>
                                <td onClick="window.location.href='index.php?action=myAccount'">
                                    Moje
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=receivedMail'">
                                    Wiadomości
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=addAuction'">
                                    Dodaj aukcje
                                </td>
                            </tr>

                            <?php if ($_smarty_tpl->tpl_vars['username']->value == 'ADMIN') {?>
                                <tr>
                                    <td onClick="window.location.href='index.php?action=adminAuct'">
                                        Aukcje
                                    </td>
                                </tr>
                                <tr>
                                    <td onClick="window.location.href='index.php?action=adminUser'">
                                        Użytkownicy
                                    </td>
                                </tr>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['username']->value == 'MOD') {?>
                                <tr>
                                    <td onClick="window.location.href='index.php?action=adminAuct'">
                                        Aukcje
                                    </td>
                                </tr>
                            <?php }?>

                            <tr>
                                <td onClick="window.location.href='index.php?action=logout'">
                                    Wyloguj
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        <?php } else { ?>
            <td>
                <div class="link" style="float: right" onclick="showPage('login')">
                    &nbsp&nbspLOGOWANIE&nbsp&nbsp
                </div>
            </td>
        <?php }?>
    </tr>
</table><?php }
}
