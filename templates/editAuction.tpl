<div class="editAuctionForm">
    <table width="100%" class="editAuctionTable">
        <form method='post' action='index.php?id={$book->getId()}'>
        <input type="hidden" name="editAuction" value="edit">
        <tr>
            <td style="text-align: right">
                Nazwa aukcji:
            </td>
            <td style="text-align: left" width="50%">
                <input class="editAuctionInput" type="text" value="{$book->getAuctionName()}" style="color: goldenrod;" name="nazwa_aukcji" maxlength="50" required/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Tytuł książki:
            </td>
            <td style="text-align: left" width="50%">
                <input class="editAuctionInput" type="text" value="{$book->getTitle()}" style="color: goldenrod;" name="tytul" maxlength="50" required/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Autor książki:
            </td>
            <td style="text-align: left" width="50%">
                <input class="editAuctionInput" type="text" value="{$book->getAuthor()}" style="color: goldenrod;" name="autor" maxlength="50" required/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Stan:
            </td>
            <td style="text-align: left" width="50%">
                <select name="stan" class="styled-select">
                    {if $book->getCond() == 'nowe'}
                        <option value="nowe">Nowa</option>
                        <option value="uzywane">Używana</option>
                    {else}
                        <option value="uzywane">Używana</option>
                        <option value="nowe">Nowa</option>
                    {/if}
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Rodzaj transakcji:
            </td>
            <td style="text-align: left">
                {if $book->getBuyNow() == 1}
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" checked onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" value="{$book->getPrice()}" type="number" name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                {elseif $book->getSwap() == 1}
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" value="{$book->getPrice()}" type="number" disabled name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" checked onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                {else}
                    <input type="radio" name="rodzajTransakcji" value="kupteraz" onclick="document.getElementById('dodajCena').disabled=false"/>Kup teraz
                    <input class="addAuctionInput" id="dodajCena" style="width: 100px" value="{$book->getPrice()}" type="number" disabled name="cena" placeholder="cena (w zł)" required/><br>
                    <input type="radio" name="rodzajTransakcji" value="wymiana" onclick="document.getElementById('dodajCena').disabled=true"/>Wymiana<br>
                    <input type="radio" name="rodzajTransakcji" value="oddam" checked onclick="document.getElementById('dodajCena').disabled=true"/>Oddam<br>
                {/if}
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Opis:
            </td>
            <td>
                <textarea class="editAuctionInput" name="opis" rows="1" cols="40" maxlength="3000" style="max-width: 900px; resize:vertical;" required>{$book->getDescr()}</textarea>
            </td>
        </tr>
    </table>
</div>


<div class="editAuctionButton" onClick="window.history.back()">
    POWRÓT
</div>
<button type="submit" id="i_submit" class="editAuctionButton">ZAPISZ</button>

</form>
<br><br>