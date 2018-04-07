<?php
/* Smarty version 3.1.30, created on 2017-04-21 23:04:02
  from "D:\xampp\htdocs\templates\changePersonalData.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fa73c2826eb3_59990932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd17151aabcd96bcaedc5e852ecd1d738681aa838' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\changePersonalData.tpl',
      1 => 1492808514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fa73c2826eb3_59990932 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="changePersonalDataForm">
    <table width="100%" class="changePersonalDataTable">
        <form action="index.php" xmlns="http://www.w3.org/1999/html" method="POST">
            <tr>
                <td style="text-align: right" width="50%">
                    Imię:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newImie" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Nazwisko:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newNazwisko" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getSurname();?>
">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Telefon:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newTelefon" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getPhone();?>
">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    E-mail:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="email" name="newEmail" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Ulica:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newUlica" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getStreet();?>
">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Miasto:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newMiasto" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getCity();?>
">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Numer konta bankowego:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newNrKonta" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getBank();?>
">
                </td>
            </tr>
    </table>
</div>

<div class="changePersonalDataButton" onClick="window.history.back()">
    POWRÓT
</div>
<button type="submit" name="changePersonalData_ok" class="changePersonalDataButton">ZMIEŃ</button>
</form><?php }
}
