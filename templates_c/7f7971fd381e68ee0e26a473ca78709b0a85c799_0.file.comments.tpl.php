<?php
/* Smarty version 3.1.30, created on 2017-04-24 22:16:25
  from "D:\xampp\htdocs\templates\comments.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe5d1972cbc2_07584485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f7971fd381e68ee0e26a473ca78709b0a85c799' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\comments.tpl',
      1 => 1493064979,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fe5d1972cbc2_07584485 (Smarty_Internal_Template $_smarty_tpl) {
?>
<br><br>KOMENTARZE DO WYSTAWIENIA

<table class="listaKsiazekTable" width="100%">
    <tr>
        <td>Nazwa aukcji</td>
        <td>Sprzedający</td>
        <td>Komentarz</td>
        <td>Ocena</td>
        <td></td>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list1']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <tr>
            <form action="index.php" method="POST">
                <td style="color: goldenrod"><?php echo $_smarty_tpl->tpl_vars['row']->value['nazwa_aukcji'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['login'];?>
</td>
                <td><input class="commentInput" type="text" required placeholder="..." name="komentarz" maxlength="500"></td>
                <td>
                    <select name="ocena" class="styled-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
                <td><button type="submit" class="commentButton">OK</button></td>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                <input type="hidden" name="addComment" value="add">
            </form>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </table>


<br><br>KOMENTARZE OD INNYCH UŻYTKOWNIKÓW

<table class="listaKsiazekTable" width="100%">
    <tr>
        <td>Nazwa aukcji</td>
        <td>Kupujący</td>
        <td>Komentarz</td>
        <td>Ocena</td>
        <td></td>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list2']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <tr>
            <td style="color: goldenrod"><?php echo $_smarty_tpl->tpl_vars['row']->value['nazwa_aukcji'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['login'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['komentarz'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ocena'];?>
</td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table><?php }
}
