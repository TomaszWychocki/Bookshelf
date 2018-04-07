<div class="mail_received">
    <table class="odebrane_tab" width="100%">
        <tr class="head"><td></td><td>OD</td><td>TEMAT</td> <td>ODEBRANO</td></tr>
        {assign var=i value=1}
        {foreach from=$list item=row}
            {if $i % 2 == 0}
                <tr class="mail_one">
            {else}
                <tr class="mail_two">
            {/if}

            <td width="25px">
                <a href="index.php?action=deleteMail&id={$row.id}">
                    <img height="25px" src="images/bin.png" class="bin"/>
                </a>
            </td>
            <td>
                {$row.login}
            </td>

            {if $row.przeczytano == "N"}
                <td width="75%" class="newTemat" onClick="window.location.href='index.php?action=receivedMailContent&id={$row.id}'">
                    {$row.temat}
                </td>
            {else}
                <td width="75%" class="temat" onClick="window.location.href='index.php?action=receivedMailContent&id={$row.id}'">
                    {$row.temat}
                </td>
            {/if}

            <td width="100px">
                {$row.czas}
            </td>
            </tr>

        {assign var=i value=$i+1}
        {/foreach}
    </table>
</div>