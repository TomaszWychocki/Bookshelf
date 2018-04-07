<?php
/* Smarty version 3.1.30, created on 2017-04-21 22:54:36
  from "D:\xampp\htdocs\templates\mailList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fa718ce04f53_29274613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e13f10ea6f1c73f6b8e8afbf12227f9aaffea578' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\mailList.tpl',
      1 => 1492801636,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fa718ce04f53_29274613 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="mail_received">
    <table class="odebrane_tab" width="100%">
        <tr class="head"><td></td><td>OD</td><td>TEMAT</td> <td>ODEBRANO</td></tr>
        <?php $_smarty_tpl->_assignInScope('i', 1);
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['i']->value%2 == 0) {?>
                <tr class="mail_one">
            <?php } else { ?>
                <tr class="mail_two">
            <?php }?>

            <td width="25px">
                <a href="index.php?action=deleteMail&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                    <img height="25px" src="images/bin.png" class="bin"/>
                </a>
            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['login'];?>

            </td>

            <?php if ($_smarty_tpl->tpl_vars['row']->value['przeczytano'] == "N") {?>
                <td width="75%" class="newTemat" onClick="window.location.href='index.php?action=receivedMailContent&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
'">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['temat'];?>

                </td>
            <?php } else { ?>
                <td width="75%" class="temat" onClick="window.location.href='index.php?action=receivedMailContent&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
'">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['temat'];?>

                </td>
            <?php }?>

            <td width="100px">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['czas'];?>

            </td>
            </tr>

        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </table>
</div><?php }
}
