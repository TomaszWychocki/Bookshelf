<div class="changePersonalDataForm">
    <table width="100%" class="changePersonalDataTable">
        <form action="index.php" xmlns="http://www.w3.org/1999/html" method="POST">
            <tr>
                <td style="text-align: right" width="50%">
                    Imię:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newImie" placeholder="{$user->getName()}">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Nazwisko:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newNazwisko" placeholder="{$user->getSurname()}">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Telefon:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newTelefon" placeholder="{$user->getPhone()}">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    E-mail:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="email" name="newEmail" placeholder="{$user->getEmail()}">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Ulica:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newUlica" placeholder="{$user->getStreet()}">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Miasto:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newMiasto" placeholder="{$user->getCity()}">
                </td>
            </tr>
            <tr>
                <td style="text-align: right" width="50%">
                    Numer konta bankowego:
                </td>
                <td style="text-align: left">
                    <input class="changePersonalDataInput" type="text" name="newNrKonta" placeholder="{$user->getBank()}">
                </td>
            </tr>
    </table>
</div>

<div class="changePersonalDataButton" onClick="window.history.back()">
    POWRÓT
</div>
<button type="submit" name="changePersonalData_ok" class="changePersonalDataButton">ZMIEŃ</button>
</form>