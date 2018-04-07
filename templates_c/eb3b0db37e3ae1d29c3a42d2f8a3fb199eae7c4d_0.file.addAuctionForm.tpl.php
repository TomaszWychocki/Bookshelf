<?php
/* Smarty version 3.1.30, created on 2017-04-24 20:45:44
  from "D:\xampp\htdocs\templates\addAuctionForm.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe47d8617fb3_94915937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb3b0db37e3ae1d29c3a42d2f8a3fb199eae7c4d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\addAuctionForm.tpl',
      1 => 1493012340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fe47d8617fb3_94915937 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="addAuctionForm">
    <table width="100%" class="addAuctionTable">
        <form action="index.php" xmlns="http://www.w3.org/1999/html" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="addAuction" value="add">
            <tr>
                <td style="text-align: right">
                    Nazwa aukcji:
                </td>
                <td style="text-align: left" width="50%">
                    <input class="addAuctionInput" type="text" style="color: goldenrod;" name="nazwa_aukcji" maxlength="50" required placeholder="..."/>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Tytuł książki:
                </td>
                <td style="text-align: left">
                    <input class="addAuctionInput" type="text" name="tytul" required maxlength="50" placeholder="..."/>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Autor:
                </td>
                <td style="text-align: left">
                    <input class="addAuctionInput" type="text" name="autor" required maxlength="50" placeholder="..."/>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Stan:
                </td>
                <td style="text-align: left">
                    <select name="stan" class="styled-select">
                        <option value="nowe">Nowa</option>
                        <option value="uzywane">Używana</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Rodzaj książki:
                </td>
                <td style="text-align: left">
                    <select name="rodzaj" class="styled-select">
                        <option value="Literatura">Literatura</option>
                        <option value="Czasopisma">Czasopismo</option>
                        <option value="Podreczniki szkolne">Podręcznik szkolny</option>
                        <option value="Poradniki">Poradnik</option>
                        <option value="Ksiazki naukowe">Książka naukowa</option>
                        <option value="Dla dzieci">Dla dzieci</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Rodzaj transakcji:
                </td>
                <td style="text-align: left">
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" checked onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" type="number" name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Czas trwania aukcji:
                </td>
                <td style="text-align: left">
                    <select name="czas" class="styled-select">
                        <option value="1">1 dzień</option>
                        <option value="3">3 dni</option>
                        <option value="7">7 dni</option>
                        <option value="14">14 dni</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Wybierz zdjęcie (*.jpg max 500kB):
                </td>
                <td style="text-align: left">
                    &nbsp<input type="file" name="file" id="file" class="file-input">
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    Opis:
                </td>
                <td>
                    <textarea class="addAuctionInput" name="opis" rows="1" cols="40" maxlength="3000" style="max-width: 900px; resize:vertical;" required placeholder="..."/></textarea>
                </td>
            </tr>


    </table>
</div>

<div class="addAuctionButton" onClick="window.history.back()">
    POWRÓT
</div>
<button type="submit" id="i_submit" class="addAuctionButton">DODAJ</button>
</form>
<br><br><?php }
}
