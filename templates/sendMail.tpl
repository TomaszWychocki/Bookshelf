<table width="100%" class="wiad_tresc">
    <form id="wyslijForm" method="POST" action="index.php">
        <tr>
            {if isset($to)}
                <td style="background-color: rgba(0,0,0,0.5);">
                    <input type="text" style="padding-left: 5; color: goldenrod;" value="{$to}" class="sendMailSubject" maxlength="15" name="sendOdbiorca" required readonly>
                </td>
            {else}
                <td style="background-color: rgba(0,0,0,0.5);">
                    <input type="text" style="padding-left: 5; color: goldenrod;" placeholder="ODBIORCA" class="sendMailSubject" maxlength="15" name="sendOdbiorca" required>
                </td>
            {/if}

        </tr>
        <tr>
            <td style="background-color: rgba(0,0,0,0.5);">
                <input type="text" style="padding-left: 5;" placeholder="TEMAT" class="sendMailSubject" maxlength="100" name="sendTemat" required>
            </td>
        </tr>
        <tr>
            <td style="background-color: rgba(10,10,10,0.4); padding: 20px 5px 20px 5px;">
                <textarea placeholder="TREŚĆ" rows="5" class="sendMailSubject" maxlength="3000" style="max-width: 1090px" name="sendTresc" required></textarea>
            </td>
        </tr>
    </form>
</table>

<div class="receivedMailButton" onClick="window.history.back()">
    POWRÓT
</div>
<div class="receivedMailButton" onClick="document.forms['wyslijForm'].submit()">
    WYŚLIJ
</div>
<br><br>