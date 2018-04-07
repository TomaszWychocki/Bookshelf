{if $what == 'cookie_info'}
    <div id="cookie">
        <table><tr>
                <td width="380px" align="center">
                    Ta strona używa cookie i innych technologii.<br> Korzystając z niej wyrażasz zgodę na ich używanie,<br> zgodnie z aktualnymi ustawieniami przeglądarki.
                </td>
                <td width="20px" valign="top">
                    <img src="images/x.png" onclick="hide()" align="right">
                </td>
            </tr>
        </table>
    </div>
{elseif $what == 'login_form'}
    <div id="login_div">
        <div id="login_content">
            <div style="height: 100%;text-align: center;">
                <center>
                    <table width="750px">
                        <tr>
                            <td height="60px">
                                <a1>
                                    Logowanie do BookShelf.pl
                                </a1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a2>
                                    Proszę wpisać swój login i hasło do swojego konta, aby się zalogować.
                                </a2>
                            </td>
                        </tr>
                        <tr>
                            <td class="tab">
                                <img src="images/user.jpg">
                            </td>
                        </tr>
                        <form method="post" action="index.php">
                            <tr>
                                <td class="tab">
                                    <input class="inp" type="text" placeholder="Login" name="login" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab">
                                    <input class="inp" type="password" placeholder="Hasło" name="password" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p onclick="showPage('remind')" class="a3">
                                        Zapomniałeś hasła?
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <br><input type="submit" class="metro_button2" value="Loguj" name="log_ok">
                        </form>
                        <input type="submit" class="metro_button" value="Zamknij" onclick="log_hide()">
                        </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>
{elseif $what == 'register_form'}
    <div id="register_div">
        <div id="register_content">
            <div style="height: 100%;text-align: center;">
                <center>
                    <table width="750px">
                        <tr>
                            <td height="60px">
                                <a1>
                                    Rejestracja na BookShelf.pl
                                </a1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a2>
                                    Proszę wpisać dane do swojego konta, aby się zarejestrować.
                                </a2>
                            </td>
                        </tr>
                        <form method="post" action="index.php">
                            <tr>
                                <td class="tab">
                                    <input class="inp" style="width: 400px" type="text" maxlength="15" placeholder="Login (15 znaków)" name="register_login" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab">
                                    <input class="inp2" type="password" placeholder="Hasło" name="register_password1" required>
                                    <input class="inp2" type="password" placeholder="Powtórz hasło" name="register_password2" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab"><input class="inp" style="width: 400px" type="email" placeholder="E-mail" name="register_email" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab"><input class="inp2" type="text" placeholder="Imie" name="register_imie" required>
                                    <input class="inp2" type="text" placeholder="Nazwisko" name="register_nazwisko" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab"><input class="inp" style="width: 400px" type="text" placeholder="Numer telefonu" name="register_telefon" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab">
                                    <input class="inp2" type="text" placeholder="Ulica i numer domu" name="register_ulica" required>
                                    <input class="inp2" type="text" placeholder="Miasto" name="register_miasto" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab">
                                    <input class="inp" style="width: 400px" type="text" placeholder="Numer konta bankowego" name="register_konto" required>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <br><input type="submit" class="metro_button2" value="Rejestruj" name="register_ok">
                        </form>
                        <input type="submit" class="metro_button" value="Zamknij" onclick="reg_hide()">
                        </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>
{elseif $what == 'remind_form'}
    <div id="remind_div">
        <div id="remind_content">
            <div style="height: 100%;text-align: center;">
                <center>
                    <form>
                        <table width="750px">
                            <tr>
                                <td height="60px">
                                    <a1>Przypomnienie hasła</a1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a2>Proszę wpisać swój e-mail, aby zresetować hasło.</a2>
                                </td>
                            </tr>
                            <form method="get" action="index.php">
                                <tr>
                                    <td class="tab">
                                        <input class="inp" style="width: 400px" name="remind_email" type="email" required placeholder="E-mail">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <br><input type="submit" name="but" class="metro_button2" value="Resetuj">
                                        <input type="hidden" name="action" value="remind">
                            </form>
                            <input type="submit" class="metro_button" value="Zamknij" onclick="remind_hide()">
                            </td>
                            </tr>
                        </table>
                </center>
            </div>
        </div>
    </div>
{elseif $what == 'changePassword_form'}
    <div class="changePasswordForm">
        <table width="100%" class="changePasswordTable">
            <form action="index.php" xmlns="http://www.w3.org/1999/html" method="POST">
                <tr>
                    <td style="text-align: right" width="50%">
                        Stare hasło:
                    </td>
                    <td style="text-align: left">
                        <input class="changePasswordInput" type="password" required name="oldPassword" placeholder="********">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        Nowe hasło:
                    </td>
                    <td style="text-align: left">
                        <input class="changePasswordInput" type="password" required name="newPassword1" placeholder="********">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        Powtórz hasło:
                    </td>
                    <td style="text-align: left">
                        <input class="changePasswordInput" type="password" required name="newPassword2" placeholder="********">
                    </td>
                </tr>
        </table>
    </div>

    <div class="changePasswordButton" onClick="window.history.back()">
        POWRÓT
    </div>
    <button type="submit" name="changePassword_ok" class="changePasswordButton">ZMIEŃ</button>
    </form>
{elseif $what == 'confirm'}
    <table class="listaKsiazekTable" width="100%">
        <tr>
            <td><img src='images/books/{$id}/MIN.jpg'></td>
        </tr>
        <tr>
            <td>Czy na pewno chcesz kupić ten przedmiot?</td>
        </tr>
    </table>

    <div class="listaKsiazekButton" onClick="window.history.back()">
        NIE
    </div>

    <div class="listaKsiazekButton" onClick="window.location.href='index.php?action=confirmed&id={$id}'">
        TAK
    </div>
    <br><br>
{elseif $what == 'mailContent'}
    <div class="mail_receivedContent">
        <table width="100%" class="wiad_tresc">
            <tr>
                <td class="login_wiad_tresc"><login>{$login}:</login> {$subject}</td>
            </tr>
            <tr>
                <td class="tresc_wiad_tresc">{$content}</td>
            </tr>
        </table>
    </div>
    <div class="receivedMailButton" onClick="window.history.back()">
        POWRÓT
    </div>
    <div class="receivedMailButton" onClick="window.location.href='index.php?action=sendMail&to={$login}'">
        ODPOWIEDZ
    </div>
    <br><br>
{/if}