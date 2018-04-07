<?php
/* Smarty version 3.1.30, created on 2017-04-22 09:56:43
  from "D:\xampp\htdocs\templates\showMore.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb0cbbba3227_19988493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35dc51e7edd197576143993cde0edd2f50a10139' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\showMore.tpl',
      1 => 1492847801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb0cbbba3227_19988493 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['book']->value->getPrice() == null) {?>
    <?php $_smarty_tpl->_assignInScope('price', 'brak');
} else { ?>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['book']->value->getPrice();
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('price', ($_prefixVariable1).("zł"));
}?>

<?php if ($_smarty_tpl->tpl_vars['book']->value->getBuyNow() == 1) {?>
    <?php $_smarty_tpl->_assignInScope('type', 'Kup teraz');
} elseif ($_smarty_tpl->tpl_vars['book']->value->getSwap() == 1) {?>
    <?php $_smarty_tpl->_assignInScope('type', 'Wymiana');
} elseif ($_smarty_tpl->tpl_vars['book']->value->getGive() == 1) {?>
    <?php $_smarty_tpl->_assignInScope('type', 'Oddam');
}?>

<?php if ($_smarty_tpl->tpl_vars['book']->value->getCond() == 'nowe') {?>
    <?php $_smarty_tpl->_assignInScope('cond', 'Nowa');
} else { ?>
    <?php $_smarty_tpl->_assignInScope('cond', 'Używana');
}?>

<table class="listaKsiazekTable" width="100%">
    <tr>
        <td style='width: 40%; color: goldenrod; font-size: 20px' colspan='2'>
            <?php echo $_smarty_tpl->tpl_vars['book']->value->getAuctionName();?>

        </td>
    </tr>
    <tr>
        <td colspan='2'>
            <img src='images/books/<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
/MIN.jpg' height='500px'>
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
    <tr>
        <td style='text-align: right; width: 40%'>
            Sprzedający:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            <?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>
 (Ocena: <?php echo $_smarty_tpl->tpl_vars['user']->value->getRating();?>
/6 )
        </td>
    </tr>
    <tr>
        <td colspan='2'>
            Opis:
        </td>
    </tr>
    <tr>
        <td colspan='2' style='white'>
            <?php echo $_smarty_tpl->tpl_vars['book']->value->getDescr();?>

        </td>
    </tr>
</table>

<div class="listaKsiazekButton" onClick="window.history.back()">
    POWRÓT
</div>

<?php if ($_smarty_tpl->tpl_vars['button']->value == 'buynow') {?>
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=confirm&id=<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
'">
        KUP TERAZ
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['button']->value == 'give') {?>
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=confirm&id=<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
'">
        WEŹ ZA DARMO
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['button']->value == 'swap') {?>
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=sendMail&to=<?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>
'">
        WYMIEŃ SIĘ
    </div>
<?php }?>

<br><br><?php }
}
