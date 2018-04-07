<br><br>MOJE AUKCJE
{foreach from=$list item=row}
    {if $row.cena == null}
        {assign var=cena value='brak'}
    {else}
        {assign var=cena value={$row.cena}|cat:"zł"}
    {/if}

    <table class="listaKsiazekTable" width="100%">
        <tr>
            <td width='20%' rowspan='8' height='160px'>
                <img src='images/books/{$row.id}/MIN.jpg' height='140px'>
            </td>
        <tr>
            <td style='text-align: right; width: 40%'>
                Nazwa aukcji:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$row.nazwa_aukcji}
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Tytuł książki:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$row.tytul}
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Autor:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$row.autor}
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Dodano:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$row.dodano}
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Czas trwania aukcji:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$row.czas} dni
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Rodzaj książki:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$row.rodzaj}
            </td>
        </tr>
        <tr>
            <td style='text-align: right; width: 40%'>
                Cena:&nbsp
            </td>
            <td style='text-align: left; width: 40%; color: goldenrod'>
                {$cena}
            </td>
        </tr>
        </tr>
    </table>
<div class="listaKsiazekButton" onClick="window.location.href='index.php?action=editAuction&id={$row.id}'">
    EDYTUJ
</div>
<div class="listaKsiazekButton" onClick="window.location.href='index.php/?action=remove_book&id={$row.id}'">
    USUŃ
</div>
{/foreach}

<br><br>