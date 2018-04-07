<?php
/* Smarty version 3.1.30, created on 2017-04-23 00:00:10
  from "D:\xampp\htdocs\templates\notification.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd26a1b61e0_04116265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '388d638b929d59f52c3d075cbcc306b54eff8307' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\notification.tpl',
      1 => 1492898327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd26a1b61e0_04116265 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['type']->value == 'error') {?>
    <div id="error" onclick="hide2('error')">
        <img src="images/error.png" height="45px" align="left">
        <b style="font-size: 20px">
            Coś poszło nie tak!
        </b>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'success') {?>
    <div id="success" onclick="hide2('success')">
        <img src="images/sucess.png" height="45px" align="left">
        <b style="font-size: 20px">
            Wszystko zgodnie z planem!!
        </b>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'mail') {?>
    <div class="mail" onclick="window.location.href='index.php?action=receivedMail'">
        <center>
            <table>
                <tr><td><img src="images/mail.png"></td></tr>
                <tr><td><?php echo $_smarty_tpl->tpl_vars['number']->value;?>
</td></tr>
            </table>
        </center>
    </div>
<?php }
}
}
