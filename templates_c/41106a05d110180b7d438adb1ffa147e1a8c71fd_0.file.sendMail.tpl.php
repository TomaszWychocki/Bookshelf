<?php
/* Smarty version 3.1.30, created on 2017-04-20 20:21:04
  from "D:\xampp\htdocs\templates\sendMail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f8fc10d82ab0_25970089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41106a05d110180b7d438adb1ffa147e1a8c71fd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\sendMail.tpl',
      1 => 1492712458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f8fc10d82ab0_25970089 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table width="100%" class="wiad_tresc">
    <form id="wyslijForm" method="POST" action="index.php">
        <tr>
            <?php if (isset($_smarty_tpl->tpl_vars['to']->value)) {?>
                <td style="background-color: rgba(0,0,0,0.5);">
                    <input type="text" style="padding-left: 5; color: goldenrod;" value="<?php echo $_smarty_tpl->tpl_vars['to']->value;?>
" class="sendMailSubject" maxlength="15" name="sendOdbiorca" required readonly>
                </td>
            <?php } else { ?>
                <td style="background-color: rgba(0,0,0,0.5);">
                    <input type="text" style="padding-left: 5; color: goldenrod;" placeholder="ODBIORCA" class="sendMailSubject" maxlength="15" name="sendOdbiorca" required>
                </td>
            <?php }?>

        </tr>
        <tr>
            <td style="background-color: rgba(0,0,0,0.5);">
                <input type="text" style="padding-left: 5;" placeholder="TEMAT" class="sendMailSubject" maxlength="100" name="sendTemat" required>
            </td>
        </tr>
        <tr>
            <td style="background-color: rgba(10,10,10,0.4); padding: 20px 5px 20px 5px;">
                <textarea placeholder="TREŚĆ" rows="5" class="sendMailSubject" maxlength="3000" style="max-width: 1090px" name="sendTresc" required></textarea>
            </td>
        </tr>
    </form>
</table>

<div class="receivedMailButton" onClick="window.history.back()">
    POWRÓT
</div>
<div class="receivedMailButton" onClick="document.forms['wyslijForm'].submit()">
    WYŚLIJ
</div>
<br><br><?php }
}
