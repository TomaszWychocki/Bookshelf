<?php
/* Smarty version 3.1.30, created on 2017-04-24 20:51:36
  from "D:\xampp\htdocs\templates\search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe4938339a70_74231903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5d8050bf22c6680d373f5f9a37cb4a50b2cb42d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\search.tpl',
      1 => 1493059796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fe4938339a70_74231903 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
?>
    <?php if ($_smarty_tpl->tpl_vars['book']->value->getPrice() == null) {?>
        <?php $_smarty_tpl->_assignInScope('price', 'brak');
?>
    <?php } else { ?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['book']->value->getPrice();
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('price', ($_prefixVariable1).("zł"));
?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['book']->value->getBuyNow() == 1) {?>
        <?php $_smarty_tpl->_assignInScope('type', 'Kup teraz');
?>
    <?php } elseif ($_smarty_tpl->tpl_vars['book']->value->getSwap() == 1) {?>
        <?php $_smarty_tpl->_assignInScope('type', 'Wymiana');
?>
    <?php } elseif ($_smarty_tpl->tpl_vars['book']->value->getGive() == 1) {?>
        <?php $_smarty_tpl->_assignInScope('type', 'Oddam');
?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['book']->value->getCond() == 'nowe') {?>
        <?php $_smarty_tpl->_assignInScope('cond', 'Nowa');
?>
    <?php } else { ?>
        <?php $_smarty_tpl->_assignInScope('cond', 'Używana');
?>
    <?php }?>

    <table class="listaKsiazekTable" width="100%">
        <tr>
            <td width='20%' rowspan='9' height='160px'>
                <img src='images/books/<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
/MIN.jpg' height='140px'>
            </td>
        <tr>
            <td style='width: 40%; color: goldenrod; font-size: 20px' colspan='2'>
                <?php echo $_smarty_tpl->tpl_vars['book']->value->getAuctionName();?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Tytuł:&nbsp
            </td>
            <td style='text-align: left; width: 40%;'>
                <?php echo $_smarty_tpl->tpl_vars['book']->value->getTitle();?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Autor:&nbsp
            </td>
            <td style='text-align: left; width: 40%;'>
                <?php echo $_smarty_tpl->tpl_vars['book']->value->getAuthor();?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Dodano:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['book']->value->getAdded();?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Czas trwania aukcji:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['book']->value->getTime();?>
 dni
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Rodzaj transakcji:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['type']->value;?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Stan:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['cond']->value;?>

            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Cena:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                <?php echo $_smarty_tpl->tpl_vars['price']->value;?>

            </td>
        </tr>
        </tr>
    </table>
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=auctionShowMore&id=<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
'">
        WIĘCEJ
    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
        <div class="listaKsiazekButton" onClick="window.location.href='index.php/?action=remove_book&id=<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
'">
            USUŃ
        </div>
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<br><br><?php }
}
