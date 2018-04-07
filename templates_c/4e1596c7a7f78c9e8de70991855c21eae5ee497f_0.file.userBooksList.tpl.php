<?php
/* Smarty version 3.1.30, created on 2017-04-24 20:51:21
  from "D:\xampp\htdocs\templates\userBooksList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe4929d21278_20072589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e1596c7a7f78c9e8de70991855c21eae5ee497f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\userBooksList.tpl',
      1 => 1493059877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fe4929d21278_20072589 (Smarty_Internal_Template $_smarty_tpl) {
?>
<br><br>MOJE AUKCJE
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
    <?php if ($_smarty_tpl->tpl_vars['row']->value['cena'] == null) {?>
        <?php $_smarty_tpl->_assignInScope('cena', 'brak');
?>
    <?php } else { ?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['cena'];
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('cena', ($_prefixVariable1).("zł"));
?>
    <?php }?>

    <table class="listaKsiazekTable" width="100%">
        <tr>
            <td width='20%' rowspan='8' height='160px'>
                <img src='images/books/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
/MIN.jpg' height='140px'>
            </td>
        <tr>
            <td style='text-align: right; width: 40%'>
                Nazwa aukcji:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['nazwa_aukcji'];?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Tytuł książki:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['tytul'];?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Autor:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['autor'];?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Dodano:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['dodano'];?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Czas trwania aukcji:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['czas'];?>
 dni
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Rodzaj książki:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['rodzaj'];?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Cena:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['cena']->value;?>

            </td>
        </tr>
        </tr>
    </table>
<div class="listaKsiazekButton" onClick="window.location.href='index.php?action=editAuction&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
'">
    EDYTUJ
</div>
<div class="listaKsiazekButton" onClick="window.location.href='index.php/?action=remove_book&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
'">
    USUŃ
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<br><br><?php }
}
