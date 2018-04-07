<?php
/* Smarty version 3.1.30, created on 2017-04-23 22:26:05
  from "D:\xampp\htdocs\templates\resetPassword.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fd0ddda5cc00_56445298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f81cc4b6c0a32a3efcc89325228b5a1df2314453' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\resetPassword.tpl',
      1 => 1492979148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fd0ddda5cc00_56445298 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="remind_pass_div">
    <div id="remind_pass_content">
        <div style="height: 100%;text-align: center;">
            <center>
                <table width="750px">
                    <tr>
                        <td height="60px">
                            <a1>
                                Zmiana hasła
                            </a1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a2>
                                Proszę wpisać swoje nowe hasło.
                            </a2>
                        </td>
                    </tr>
                    <form method="post" action="index.php">
                        <tr>
                            <td class="tab">
                                <input class="inp2" name="newPass1" type="password" required placeholder="Hasło">
                                <input class="inp2" name="newPass2" type="password" required placeholder="Powtórz hasło">
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
" name="remind_hash">
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <br>
                                <input type="submit" name="remind_pass_ok" class="metro_button2" value="Zmień">
                    </form>
                    <input type="submit" class="metro_button" value="Zamknij" onclick="remind_hide()">
                    </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
</div><?php }
}
