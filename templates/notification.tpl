{if $type == 'error'}
    <div id="error" onclick="hide2('error')">
        <img src="images/error.png" height="45px" align="left">
        <b style="font-size: 20px">
            Coś poszło nie tak!
        </b>
        <br>
        {$text}
    </div>
{elseif $type == 'success'}
    <div id="success" onclick="hide2('success')">
        <img src="images/sucess.png" height="45px" align="left">
        <b style="font-size: 20px">
            Wszystko zgodnie z planem!!
        </b>
        <br>
        {$text}
    </div>
{elseif $type == 'mail'}
    <div class="mail" onclick="window.location.href='index.php?action=receivedMail'">
        <center>
            <table>
                <tr><td><img src="images/mail.png"></td></tr>
                <tr><td>{$number}</td></tr>
            </table>
        </center>
    </div>
{/if}
