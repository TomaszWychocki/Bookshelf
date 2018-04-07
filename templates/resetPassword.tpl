<div id="remind_pass_div">
    <div id="remind_pass_content">
        <div style="height: 100%;text-align: center;">
            <center>
                <table width="750px">
                    <tr>
                        <td height="60px">
                            <a1>
                                Zmiana hasła
                            </a1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a2>
                                Proszę wpisać swoje nowe hasło.
                            </a2>
                        </td>
                    </tr>
                    <form method="post" action="index.php">
                        <tr>
                            <td class="tab">
                                <input class="inp2" name="newPass1" type="password" required placeholder="Hasło">
                                <input class="inp2" name="newPass2" type="password" required placeholder="Powtórz hasło">
                                <input type="hidden" value="{$hash}" name="remind_hash">
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <br>
                                <input type="submit" name="remind_pass_ok" class="metro_button2" value="Zmień">
                    </form>
                    <input type="submit" class="metro_button" value="Zamknij" onclick="remind_hide()">
                    </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
</div>