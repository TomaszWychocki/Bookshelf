<?php
require_once(realpath(dirname(__FILE__)) . '/CMail.php');
require_once(realpath(dirname(__FILE__)) . '/CUser.php');
require_once(realpath(dirname(__FILE__)) . '/CBook.php');

class CServer {
    private static $instance;
	private $tools;

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new CServer();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->tools = CTools::getInstance();
    }

    function deleteDirectory($dir) {
        if (!file_exists($dir))
            return true;
        if (!is_dir($dir))
            return unlink($dir);

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..')
                continue;
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item))
                return false;
        }
        return rmdir($dir);
    }

    function getUserMailsList($id) {
        $result = $this->tools->query("SELECT a.id, a.temat, a.tresc, a.przeczytano, b.login, a.czas
                               FROM wiadomosc a
                               JOIN uzytkownik b
                               ON a.od_id = b.id
                               WHERE a.do_id=$id;");
        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row;

        return $list;
    }

    function getUserBooksList($id) {
        $result = $this->tools->query("SELECT * FROM aukcja WHERE autor_id=$id;");
        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row;

        return $list;
    }

    function removeBook($bookID) {
        $this->tools->query("DELETE FROM aukcja WHERE id=$bookID;");
        $this->deleteDirectory("images/books/" . $bookID);
    }

    function removeUser($userID) {
        if($_COOKIE['login'] != 'admin'){
            header("Location: http://localhost/index.php?err=forbidden");
        }

        $result = $this->tools->query("SELECT id FROM aukcja WHERE autor_id=$userID");
        while ($row = $result->fetch_assoc()) {
            $this->removeBook($row['id']);
        }

        $this->tools->query("DELETE FROM uzytkownik WHERE id=$userID");
        header("Location: http://localhost/index.php?action=adminUser");
    }

    function searchBooks($str) {
        $result = $this->tools->query("SELECT id FROM aukcja WHERE tytul LIKE '%$str%';");
        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row['id'];

        return $list;
    }

    function getUsersId() {
        $result = $this->tools->query("SELECT id FROM uzytkownik WHERE login<>'admin' AND login<>'mod'");
        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row['id'];

        return $list;
    }

    function getBooksId() {
        $result = $this->tools->query("SELECT id FROM aukcja");
        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row['id'];

        return $list;
    }

    function getBooksIdByType($type) {
        $result = $this->tools->query("SELECT * FROM aukcja WHERE rodzaj='$type'");
        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row['id'];

        return $list;
    }

    function getCommentsList($what) {
        $result = null;
        if($what === 1) {
            $result = $this->tools->query("SELECT  a.id,  a.kupujacy, a.nazwa_aukcji, a.komentarz, a.ocena, b.login
                                        FROM aukcjaKoniec a
                                        JOIN uzytkownik b
                                        ON a.sprzedajacy = b.id
                                        WHERE a.kupujacy='" . $_COOKIE['id'] . "' AND ocena=0;");
        }
        else {
            $result = $this->tools->query("SELECT  a.id,  a.kupujacy, a.nazwa_aukcji, a.komentarz, a.ocena, b.login
                                        FROM aukcjaKoniec a
                                        JOIN uzytkownik b
                                        ON a.kupujacy = b.id
                                        WHERE a.ocena>0 AND a.sprzedajacy='" . $_COOKIE['id'] . "';");
        }

        $list=array();
        while ($row = $result->fetch_assoc())
            $list[]=$row;

        return $list;
    }

    function loginUser() {
        $this->GUI = CGUI::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik WHERE login='".$_POST['login']."' AND haslo='".$_POST['password']."'");
        if(mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            if($row['aktywacja'] == 'Y') {
                setcookie('login', $_POST['login'], time() + (86400 * 30));
                setcookie('id', $row['id'], time() + (86400 * 30));
                header("Location: http://localhost/index.php");
            }
            else
                $this->tools->showNotification('error', 'Konto nie zostało jeszcze aktywowane...');
        }
        else
            $this->tools->showNotification('error', 'Wpisano niepoprawny login i/lub hasło...');
    }

    function logoutUser(){
        if(isset($_COOKIE['id']))
            setcookie("id","", time()-3600);
        if(isset($_COOKIE['login']))
            setcookie("login","", time()-3600);
        header("Location: http://localhost/index.php");
    }

    function register() {
        $this->GUI = CGUI::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik WHERE login='".$_POST['register_login']."'");
        if(mysqli_num_rows($result) < 1){
            $result2 = $this->tools->query("SELECT * FROM uzytkownik WHERE email='".$_POST['register_email']."'");
            if(mysqli_num_rows($result2) < 1){
                if($_POST['register_password1'] == $_POST['register_password2']){
                    $this->tools->query("INSERT INTO uzytkownik (login, haslo, imie, nazwisko, telefon, email, ulica, miasto, nrkonta, aktywacja) VALUES ('".$_POST['register_login']."',
                                                                                                                                   '".$_POST['register_password1']."',
                                                                                                                                   '".$_POST['register_imie']."',
                                                                                                                                   '".$_POST['register_nazwisko']."',
                                                                                                                                   '".$_POST['register_telefon']."',
                                                                                                                                   '".$_POST['register_email']."',
                                                                                                                                   '".$_POST['register_ulica']."',
                                                                                                                                   '".$_POST['register_miasto']."',
                                                                                                                                   '".$_POST['register_konto']."',
                                                                                                                                   'N')");
                    $login = $_POST['register_login'];
                    $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                      <p>Dziękujemy za rejestrację w naszym sklepie. Przesyłamy link do aktywacji Twojego konta:</p>
                      <b><p>Twój login to: '.$login.'
                      <br>
                      Link do aktywacji konta: <a href="http://localhost/index.php?action=accountActivation&hash='.md5($login).'">LINK</a>
                      </p></b>
                      <p>Po aktywowaniu konta będziesz mógł dokonać swoich pierwszych transakcji.</p>
                      <p>Życzymy samych udanych zakupów,<br>Administrator BookShelf</p>
                      <br>
                      --<br>Wiadomość wygenerowana automatycznie
                    </body>
                    </html>
                    ';
                    CMail::send($_POST['register_email'],'Aktywacja konta', $message);
                    $this->tools->showNotification('success', 'Na Twój e-mail została wysłana wiadomość z linkiem do aktywacji konta...');
                }
                else
                    $this->tools->showNotification('error', 'Hasła różnią się od siebie...');
            }
            else
                $this->tools->showNotification('error', 'Taki email już istnieje...');
        }
        else
            $this->tools->showNotification('error', 'Taki login już istnieje...');
    }

    function changePersonalData() {
        $this->GUI = CGUI::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik WHERE email='".$_POST['newEmail']."' AND id<>".$_COOKIE['id'].";");

        if(mysqli_num_rows($result) == 0 || $_POST['newEmail'] == "") {
            $result = $this->tools->query("SELECT * FROM uzytkownik WHERE id='" . $_COOKIE['id'] . "';");
            $row = $result->fetch_assoc();

            $imie = ($_POST['newImie'] != "") ? $_POST['newImie'] : $row['imie'];
            $nazwisko = ($_POST['newNazwisko'] != "") ? $_POST['newNazwisko'] : $row['nazwisko'];
            $telefon = ($_POST['newTelefon'] != "") ? $_POST['newTelefon'] : $row['telefon'];
            $email = ($_POST['newEmail'] != "") ? $_POST['newEmail'] : $row['email'];
            $ulica = ($_POST['newUlica'] != "") ? $_POST['newUlica'] : $row['ulica'];
            $miasto = ($_POST['newMiasto'] != "") ? $_POST['newMiasto'] : $row['miasto'];
            $nrkonta = ($_POST['newNrKonta'] != "") ? $_POST['newNrKonta'] : $row['nrkonta'];

            $this->tools->query("UPDATE uzytkownik SET imie='" . $imie . "', nazwisko='" . $nazwisko . "', telefon='" . $telefon . "', email='" . $email . "', ulica='" . $ulica . "', miasto='" . $miasto . "', nrkonta='" . $nrkonta . "' WHERE id='" . $_COOKIE['id'] . "';");
            header("Location: http://localhost/index.php?action=changePersonalData");
        }
        else
            $this->tools->showNotification('error', 'Taki email już istnieje...');
    }

    function accountActivation($hash) {
        $this->GUI = CGUI::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik;");
        $a = false;
        while ($row = $result->fetch_assoc()) {
            if (md5($row['login']) == $hash && $row['aktywacja'] != 'Y') {
                $a = true;
                $this->tools->query("UPDATE uzytkownik SET aktywacja='Y' WHERE login='" . $row['login'] . "';");
                break;
            }
        }
        if ($a == true)
            $this->tools->showNotification('success', 'Aktywacja konta przebiegła pomyślnie...');
        else
            $this->tools->showNotification('error', 'Link do aktywacji jest niepoprawny...');
    }

    function sendResetPasswordMessage() {
        $this->GUI = CGUI::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik WHERE email='".$_GET['remind_email']."';");
        if(mysqli_num_rows($result) > 0) {
            $hash = md5(sha1($_GET['remind_email']));
            $row = $result->fetch_assoc();
            $login = $row['login'];
            $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                      <p>Zgadnie z Twoim życzeniem przesyłamy Ci link do zresetowania hasła:</p>
                      <b><p>Twój login to: ' . $login . '
                      <br>
                      Link do zresetowania hasła: <a href="http://localhost/index.php?action=remind_reset&remind_reset=' . $hash . '">LINK</a>
                      </p></b>
                      <p>Będziesz tam mógł zmienić hasło na swoje ulubione.</p>
                      <p>Życzymy samych udanych zakupów,<br>Administrator BookShelf</p>
                      <br>
                      --<br>Wiadomość wygenerowana automatycznie
                    </body>
                    </html>
                    ';
            CMail::send($_GET['remind_email'], 'Reset hasła', $message);
            $this->tools->query("UPDATE uzytkownik SET haslo='" . $hash . "' WHERE email='" . $_GET['remind_email'] . "';");
            $this->tools->showNotification('success', 'Na adres ' . $_GET['remind_email'] . ' został wysłany link do resetu hasła...');
        }
        else
            $this->tools->showNotification('error', 'Adres '.$_GET['remind_email'].' nie istnieje w naszej bazie...');
    }

    function resetPassword() {
        $this->GUI = CGUI::getInstance();
        if($_POST['newPass1'] == $_POST['newPass2']){
            $this->tools->query("UPDATE uzytkownik SET haslo='".$_POST['newPass1']."' WHERE haslo='".$_POST['remind_hash']."';");
            $this->tools->showNotification('success', 'Hasło zostało zmienione poprawnie...');
        }
        else
            $this->tools->showNotification('error', 'Hasła różnią się od siebie...');
    }

    function changePassword() {
        $this->GUI = CGUI::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik WHERE haslo='".$_POST['oldPassword']."' AND id=".$_COOKIE['id'].";");
        if(mysqli_num_rows($result) > 0){
            if($_POST['newPassword1'] == $_POST['newPassword2']){
                $this->tools->query("UPDATE uzytkownik SET haslo='".$_POST['newPassword1']."' WHERE id=".$_COOKIE['id'].";");
                $this->tools->showNotification('success', 'Hasło zostało zmienione poprawnie...');
            }
            else
                $this->tools->showNotification('error', 'Hasła różnią się od siebie...');
        }
        else
            $this->tools->showNotification('error', 'Stare hasło jest niepoprawne...');
    }

    function addComment() {
        $this->tools->query("UPDATE aukcjaKoniec SET komentarz='".$_POST['komentarz']."', ocena=".$_POST['ocena']." WHERE id=".$_POST['id'].";");
        header("Location: http://localhost/index.php?action=comments");
    }

    function addAuction() {
        if ((($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg")) && ($_FILES["file"]["size"] < 524288)) {
            $nazwa_aukcji = $_POST['nazwa_aukcji'];
            $tytul = $_POST['tytul'];
            $autor = $_POST['autor'];
            $stan = $_POST['stan'];
            $rodzaj = $_POST['rodzaj'];
            $czas = $_POST['czas'];
            $data = date("Y-m-d");
            $opis = $_POST['opis'];
            $autor_id = $_COOKIE['id'];

            $cena = null;
            $wymiana = 0;
            $oddam = 0;
            $kup_teraz = 0;
            $selected_radio = $_POST['rodzajTransakcji'];
            if($selected_radio == 'kupteraz'){
                $kup_teraz = 1;
                $cena = $_POST['cena'];
            }
            elseif($selected_radio == 'wymiana'){
                $wymiana = 1;
            }
            else{
                $oddam = 1;
            }

            $this->tools->query("INSERT INTO aukcja(id, nazwa_aukcji, tytul, autor, stan, kup_teraz, wymiana, oddam, cena, opis, rodzaj, czas, dodano, autor_id) VALUES (DEFAULT, '$nazwa_aukcji', '$tytul', '$autor', '$stan', '$kup_teraz', '$wymiana', '$oddam', '$cena', '$opis', '$rodzaj', '$czas', '$data', '$autor_id');");

            $result = $this->tools->query("SELECT * FROM aukcja;");
            $lastId = 0;
            while($row = $result->fetch_assoc()){
                if($row['id']>$lastId)
                    $lastId = $row['id'];
            }

            if(!file_exists('images/books/'.$lastId.'/')) {
                mkdir('images/books/' . $lastId, 0777, true);
            }

            include 'libs/imageResizer/WideImage.php';
            move_uploaded_file($_FILES["file"]["tmp_name"], "images/books/" . $lastId . '/' . $_FILES["file"]["name"]);
            rename("images/books/" . $lastId . '/' . $_FILES["file"]["name"], "images/books/" . $lastId . '/MAX.jpg');
            WideImage::load("images/books/" . $lastId . '/MAX.jpg')->resize(300, 200, 'outside')->saveToFile("images/books/" . $lastId . '/MIN.jpg');

            header("Location: http://localhost/index.php?action=myAccount");
        }
        else
            header("Location: http://localhost/index.php?action=addAuction&err=badImg");
    }

    function editAuction() {
        $nazwa_aukcji = $_POST['nazwa_aukcji'];
        $tytul = $_POST['tytul'];
        $autor = $_POST['autor'];
        $stan = $_POST['stan'];

        $cena = null;
        $wymiana = 0;
        $oddam = 0;
        $kup_teraz = 0;
        $selected_radio = $_POST['rodzajTransakcji'];
        if($selected_radio == 'kupteraz'){
            $kup_teraz = 1;
            $cena = $_POST['cena'];
        }
        elseif($selected_radio == 'wymiana'){
            $wymiana = 1;
        }
        else{
            $oddam = 1;
        }

        $opis = $_POST['opis'];
        $id_aukcji = $_GET['id'];

        $this->tools->query("UPDATE aukcja SET nazwa_aukcji='$nazwa_aukcji', tytul='$tytul', autor='$autor', stan='$stan', kup_teraz='$kup_teraz', cena='$cena', wymiana='$wymiana', oddam='$oddam', opis='$opis' WHERE id='$id_aukcji'");

        header("Location: http://localhost/index.php?action=myAccount");
    }

    function confirmed() {
        $book = new CBook($_GET['id']);

        $this->tools->query("INSERT INTO aukcjaKoniec VALUES (DEFAULT, '".$_COOKIE['id']."', '".$book->getAuthorId()."', '".$book->getAuctionName()."', '', 0);");
        $nazwa = $book->getAuctionName();
        $autor = $book->getAuthorId();
        $cena = ($book->getPrice() == null) ? 'brak' : $book->getPrice().'zł';

        $seller = new CUser($book->getAuthorId());
        $buyer = new CUser($_COOKIE['id']);

        $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                      <p>Twoja książka została kupiona. Dane potrzebne bo zakończenia transakcji:<br></p>
                      <p>
                      Nazwa aukcji: <b>'.$nazwa.'</b>
                      <br>
                      Login: <b>'.$buyer->getLogin().'</b>
                      <br>
                      Imię: <b>'.$buyer->getName().'</b>
                      <br>
                      Nazwisko: <b>'.$buyer->getSurname().'</b>
                      <br>
                      Telefon: <b>'.$buyer->getPhone().'</b>
                      <br>
                      Email: <b>'.$buyer->getEmail().'</b>
                      <br>
                      Ulica: <b>'.$buyer->getStreet().'</b>
                      <br>
                      Miasto: <b>'.$buyer->getCity().'</b>
                      <br>
                      Cena: <b>'.$cena.'</b>
                      <br>
                      Numer konta bankowego: <b>'.$buyer->getBank().'</b>
                      </p>
                      <p>Życzymy samych udanych zakupów,<br>Administrator BookShelf</p>
                      <br>
                      --<br>Wiadomość wygenerowana automatycznie
                    </body>
                    </html>
                    ';
        CMail::send($seller->getEmail(),'Ktoś kupił twój przedmiot', $message);

        $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                      <p>Dokonałeś zakupu książki. Dane potrzebne bo zakończenia transakcji:<br></p>
                      <p>
                      Nazwa aukcji: <b>'.$nazwa.'</b>
                      <br>
                      Login: <b>'.$seller->getLogin().'</b>
                      <br>
                      Imię: <b>'.$seller->getName().'</b>
                      <br>
                      Nazwisko: <b>'.$seller->getSurname().'</b>
                      <br>
                      Telefon: <b>'.$seller->getPhone().'</b>
                      <br>
                      Email: <b>'.$seller->getEmail().'</b>
                      <br>
                      Ulica: <b>'.$seller->getStreet().'</b>
                      <br>
                      Miasto: <b>'.$seller->getCity().'</b>
                      <br>
                      Cena: <b>'.$cena.'</b>
                      <br>
                      Numer konta bankowego: <b>'.$seller->getBank().'</b>
                      </p>
                      <p>Życzymy samych udanych zakupów,<br>Administrator BookShelf</p>
                      <br>
                      --<br>Wiadomość wygenerowana automatycznie
                    </body>
                    </html>
                    ';
        CMail::send($buyer->getEmail(),'Kupiłeś przedmiot', $message);

        $id = $_GET['id'];
        $this->removeBook($id);

        $this->tools->query("INSERT INTO wiadomosc (od_id, do_id, temat, tresc, przeczytano, czas) VALUES ('1', '".$_COOKIE['id']."', 'Kupiłeś książkę', 'Dokonałeś zakupu książki. Dodatkowe dane dotyczące sprzedawcy zostały wysłane na pocztę. Sprawdź pocztę e-mail.', 'N', '".date('H:i j.m.Y')."')");
        $this->tools->query("INSERT INTO wiadomosc (od_id, do_id, temat, tresc, przeczytano, czas) VALUES ('1', '".$autor."', 'Ktoś kupił Twoją książkę', 'Jedna z Twoich książek została kupiona. Sprawdź pocztę e-mail.', 'N', '".date('H:i j.m.Y')."')");

        header("Location: http://localhost/index.php?suc=buyOk");
    }
}