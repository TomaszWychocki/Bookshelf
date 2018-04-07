<table class="menu_content">
    <tr>
        <td onClick="window.location.href='index.php'">
            <div class="link">
                &nbsp&nbspSTRONA GŁÓWNA&nbsp&nbsp
            </div>
        </td>
        {if $show == 'no_user'}
            <td>
                <div class="link" onclick="showPage('register')">
                    &nbsp&nbspREJESTRACJA&nbsp&nbsp
                </div>
            </td>
        {elseif $show == 'mail'}
            <td>
                <div class="account" style="float: right; min-width: 110px">
                    &nbsp&nbspWIADOMOŚCI&nbsp&nbsp
                    <div class="men">
                        <table class="menu_tab">
                            <tr>
                                <td onClick="window.location.href='index.php?action=receivedMail'">
                                    Odebrane
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=sendMail'">
                                    Nowa wiadomość
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        {elseif $show == 'my_account'}
            <td>
                <div class="account" style="float: right; min-width: 110px">
                    &nbsp&nbspMOJE KONTO&nbsp&nbsp
                    <div class="men">
                        <table class="menu_tab">
                            <tr>
                                <td onClick="window.location.href='index.php?action=changePassword'">
                                    Zmień hasło
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=changePersonalData'">
                                    Zmień dane osobowe
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=comments'">
                                    Komentarze
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        {elseif $show == 'add'}
            <td>
                <div class="link" onClick="window.location.href='index.php?action=addAuction'">
                    &nbsp&nbspDODAJ AUKCJĘ&nbsp&nbsp
                </div>
            </td>
        {/if}

        <td>
            <div class="search">
                <form method="GET" action="index.php">
                    <input type="text" name="szukana_fraza" placeholder="SZUKAJ...">
                </form>
            </div>
        </td>

        {if $username != 'no_user'}
            <td>
                <div class="account" style="float: right; min-width: 110px">
                    &nbsp&nbsp{$username}&nbsp&nbsp
                    <div class="men">
                        <table class="menu_tab">
                            <tr>
                                <td onClick="window.location.href='index.php?action=myAccount'">
                                    Moje
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=receivedMail'">
                                    Wiadomości
                                </td>
                            </tr>
                            <tr>
                                <td onClick="window.location.href='index.php?action=addAuction'">
                                    Dodaj aukcje
                                </td>
                            </tr>

                            {if $username == 'ADMIN'}
                                <tr>
                                    <td onClick="window.location.href='index.php?action=adminAuct'">
                                        Aukcje
                                    </td>
                                </tr>
                                <tr>
                                    <td onClick="window.location.href='index.php?action=adminUser'">
                                        Użytkownicy
                                    </td>
                                </tr>
                            {/if}
                            {if $username == 'MOD'}
                                <tr>
                                    <td onClick="window.location.href='index.php?action=adminAuct'">
                                        Aukcje
                                    </td>
                                </tr>
                            {/if}

                            <tr>
                                <td onClick="window.location.href='index.php?action=logout'">
                                    Wyloguj
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        {else}
            <td>
                <div class="link" style="float: right" onclick="showPage('login')">
                    &nbsp&nbspLOGOWANIE&nbsp&nbsp
                </div>
            </td>
        {/if}
    </tr>
</table>