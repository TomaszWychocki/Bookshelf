<br><br>KOMENTARZE DO WYSTAWIENIA

<table class="listaKsiazekTable" width="100%">
    <tr>
        <td>Nazwa aukcji</td>
        <td>Sprzedający</td>
        <td>Komentarz</td>
        <td>Ocena</td>
        <td></td>
    </tr>
    {foreach from=$list1 item=row}
        <tr>
            <form action="index.php" method="POST">
                <td style="color: goldenrod">{$row.nazwa_aukcji}</td>
                <td>{$row.login}</td>
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
                <input type="hidden" name="id" value="{$row.id}">
                <input type="hidden" name="addComment" value="add">
            </form>
        </tr>
    {/foreach}
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
    {foreach from=$list2 item=row}
        <tr>
            <td style="color: goldenrod">{$row.nazwa_aukcji}</td>
            <td>{$row.login}</td>
            <td>{$row.komentarz}</td>
            <td>{$row.ocena}</td>
        </tr>
    {/foreach}
</table>