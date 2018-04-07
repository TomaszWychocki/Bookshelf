<?php
/* Smarty version 3.1.30, created on 2017-04-24 20:52:18
  from "D:\xampp\htdocs\templates\editAuction.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe49629ac4a2_54494387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c30bee79c9f27ba4a99803b7207750e793e55d9' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\editAuction.tpl',
      1 => 1493012819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fe49629ac4a2_54494387 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="editAuctionForm">
    <table width="100%" class="editAuctionTable">
        <form method='post' action='index.php?id=<?php echo $_smarty_tpl->tpl_vars['book']->value->getId();?>
'>
        <input type="hidden" name="editAuction" value="edit">
        <tr>
            <td style="text-align: right">
                Nazwa aukcji:
            </td>
            <td style="text-align: left" width="50%">
                <input class="editAuctionInput" type="text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getAuctionName();?>
" style="color: goldenrod;" name="nazwa_aukcji" maxlength="50" required/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Tytuł książki:
            </td>
            <td style="text-align: left" width="50%">
                <input class="editAuctionInput" type="text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getTitle();?>
" style="color: goldenrod;" name="tytul" maxlength="50" required/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Autor książki:
            </td>
            <td style="text-align: left" width="50%">
                <input class="editAuctionInput" type="text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getAuthor();?>
" style="color: goldenrod;" name="autor" maxlength="50" required/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Stan:
            </td>
            <td style="text-align: left" width="50%">
                <select name="stan" class="styled-select">
                    <?php if ($_smarty_tpl->tpl_vars['book']->value->getCond() == 'nowe') {?>
                        <option value="nowe">Nowa</option>
                        <option value="uzywane">Używana</option>
                    <?php } else { ?>
                        <option value="uzywane">Używana</option>
                        <option value="nowe">Nowa</option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Rodzaj transakcji:
            </td>
            <td style="text-align: left">
                <?php if ($_smarty_tpl->tpl_vars['book']->value->getBuyNow() == 1) {?>
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" checked onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getPrice();?>
" type="number" name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                <?php } elseif ($_smarty_tpl->tpl_vars['book']->value->getSwap() == 1) {?>
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getPrice();?>
" type="number" disabled name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" checked onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                <?php } else { ?>
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getPrice();?>
" type="number" disabled name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" checked onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Opis:
            </td>
            <td>
                <textarea class="editAuctionInput" name="opis" rows="1" cols="40" maxlength="3000" style="max-width: 900px; resize:vertical;" required><?php echo $_smarty_tpl->tpl_vars['book']->value->getDescr();?>
</textarea>
            </td>
        </tr>
    </table>
</div>


<div class="editAuctionButton" onClick="window.history.back()">
    POWRÓT
</div>
<button type="submit" id="i_submit" class="editAuctionButton">ZAPISZ</button>

</form>
<br><br><?php }
}
