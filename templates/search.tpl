{foreach $books as $book}
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
            <td width='20%' rowspan='9' height='160px'>
                <img src='images/books/{$book->getId()}/MIN.jpg' height='140px'>
            </td>
        <tr>
            <td style='width: 40%; color: goldenrod; font-size: 20px' colspan='2'>
                {$book->getAuctionName()}
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
        </tr>
    </table>
    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=auctionShowMore&id={$book->getId()}'">
        WIĘCEJ
    </div>
    {if isset($admin)}
        <div class="listaKsiazekButton" onClick="window.location.href='index.php/?action=remove_book&id={$book->getId()}'">
            USUŃ
        </div>
    {/if}
{/foreach}
<br><br>