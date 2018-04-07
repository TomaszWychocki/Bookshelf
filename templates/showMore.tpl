{if $book->getPrice() == null}
    {assign var=price value='brak'}
{else}
    {assign var=price value={$book->getPrice()}|cat:"zł"}
{/if}

{if $book->getBuyNow() == 1}
    {assign var=type value='Kup teraz'}
{elseif $book->getSwap() == 1}
    {assign var=type value='Wymiana'}
{elseif $book->getGive() == 1}
    {assign var=type value='Oddam'}
{/if}

{if $book->getCond() == 'nowe'}
    {assign var=cond value='Nowa'}
{else}
    {assign var=cond value='Używana'}
{/if}

<table class="listaKsiazekTable" width="100%">
    <tr>
        <td style='width: 40%; color: goldenrod; font-size: 20px' colspan='2'>
            {$book->getAuctionName()}
        </td>
    </tr>
    <tr>
        <td colspan='2'>
            <img src='images/books/{$book->getId()}/MIN.jpg' height='500px'>
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Tytuł:&nbsp
        </td>
        <td style='text-align: left; width: 40%;'>
            {$book->getTitle()}
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Autor:&nbsp
        </td>
        <td style='text-align: left; width: 40%;'>
            {$book->getAuthor()}
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Dodano:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            {$book->getAdded()}
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Czas trwania aukcji:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            {$book->getTime()} dni
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Rodzaj transakcji:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            {$type}
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Stan:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            {$cond}
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Cena:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            {$price}
        </td>
    </tr>
    <tr>
        <td style='text-align: right; width: 40%'>
            Sprzedający:&nbsp
        </td>
        <td style='text-align: left; width: 40%; color: goldenrod'>
            {$user->getLogin()} (Ocena: {$user->getRating()}/6 )
        </td>
    </tr>
    <tr>
        <td colspan='2'>
            Opis:
        </td>
    </tr>
    <tr>
        <td colspan='2' style='white'>
            {$book->getDescr()}
        </td>
    </tr>
</table>

<div class="listaKsiazekButton" onClick="window.history.back()">
    POWRÓT
</div>

{if $button == 'buynow'}
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=confirm&id={$book->getId()}'">
        KUP TERAZ
    </div>
{elseif $button == 'give'}
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=confirm&id={$book->getId()}'">
        WEŹ ZA DARMO
    </div>
{elseif $button == 'swap'}
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=sendMail&to={$user->getLogin()}'">
        WYMIEŃ SIĘ
    </div>
{/if}

<br><br>