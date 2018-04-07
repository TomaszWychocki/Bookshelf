<?php
/* Smarty version 3.1.30, created on 2017-04-21 23:09:10
  from "D:\xampp\htdocs\templates\adminView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fa74f60f1776_03051191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a709b3b36837d0270314681788486116207fa00b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\adminView.tpl',
      1 => 1492803927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fa74f60f1776_03051191 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="listaKsiazekTable" width="100%">
    <tr>
        <td>ID</td>
        <td>Login</td>
        <td>Imię</td>
        <td>Nazwisko</td>
        <td>Telefon</td>
        <td>Email</td>
        <td>Ulica</td>
        <td>Miasto</td>
        <td>Numer konta bankowego</td>
        <td></td>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getID();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getSurname();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getPhone();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getStreet();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getCity();?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['user']->value->getBank();?>

            </td>
            <td>
                <a style='color: goldenrod;' href='index.php?action=remove_user&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getID();?>
'>
                    USUŃ
                </a>
            </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table><?php }
}
