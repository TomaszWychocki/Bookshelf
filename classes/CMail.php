<?php

class CMail {
    static function getMail($id) {
        $tools = CTools::getInstance();
        $smarty = new Smarty;

        $result = $tools->query("SELECT * FROM wiadomosc WHERE do_id='" . $_COOKIE['id'] . "' AND id='$id';");

        if(mysqli_num_rows($result) > 0){
            $tools->query("UPDATE wiadomosc SET przeczytano='T' WHERE id='$id';");
            $result = $tools->query("SELECT a.id, a.temat, a.tresc, a.przeczytano, b.login
                               FROM wiadomosc a
                               JOIN uzytkownik b
                               ON a.od_id = b.id
                               WHERE a.id='$id';");
            $row = $result->fetch_assoc();

            $smarty->assign('what', 'mailContent');
            $smarty->assign('login', $row['login']);
            $smarty->assign('subject', $row['temat']);
            $smarty->assign('content', $row['tresc']);
            $smarty->display("templates/tmp.tpl");
        }
        else{
            header("Location: http://localhost/index.php?action=receivedMail");
        }
    }

    static function deleteMail($id) {
        $tools = CTools::getInstance();
        $result = $tools->query("SELECT * FROM wiadomosc WHERE id='$id' AND do_id='" . $_COOKIE['id'] . "';");
        if(mysqli_num_rows($result) > 0){
            $tools->query("UPDATE wiadomosc SET do_id='" . ($_COOKIE['id']*(-1)) . "' WHERE id='$id';");
        }
        header("Location: http://localhost/index.php?action=receivedMail");
    }

    static function send($to, $subject, $content){
		$tools = CTools::getInstance();
        date_default_timezone_set('Etc/UTC');
        require_once 'libs/PHPMailer/PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "sample@gmail.com";
        $mail->Password = "sample";
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('BookShelf@example.com', 'BookShelf');
        $mail->addReplyTo('BookShelf@example.com', 'BookShelf');
        $mail->addAddress($to, 'User');
        $mail->Subject = $subject;
        $mail->msgHTML($content);
        if (!$mail->send())
            $tools->showNotification('error',$mail->ErrorInfo);
        else
            $tools->showNotification('success','Wiadomość została wysłana poprawnie...');
    }

    static function sendMail() {
        $tools = CTools::getInstance();

        $result = $tools->query("SELECT * FROM uzytkownik WHERE login='".$_POST['sendOdbiorca']."'");
        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $tools->query("INSERT INTO wiadomosc (od_id, do_id, temat, tresc, przeczytano, czas) VALUES ('".$_COOKIE['id']."', '".$row['id']."', '".$_POST['sendTemat']."', '".$_POST['sendTresc']."', 'N', '".date('H:i j.m.Y')."')");
            $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                      <p>Na stronie BookShelf otrzymałeś nową wiadomość prywatną</p>
                      <b><p>Temat: '.$_POST['sendTemat'].'
                      <br>
                      Treść: '.$_POST['sendTresc'].'
                      </p></b>
                      <p>Aby na nią odpowiedzieć zaloguj się na naszej stronie <a href="http://localhost">BookShelf.pl</a></p>
                      <p>Życzymy samych udanych zakupów,<br>Administrator BookShelf</p>
                      <br>
                      --<br>Wiadomość wygenerowana automatycznie
                    </body>
                    </html>
                    ';
            self::send($row['email'],'Nowa wiadomość prywatna', $message);
        }
        else
            $tools->showNotification('error','Taki użytkownik nie istnieje...');
    }

    static function checkMail() {
        if(isset($_COOKIE['id'])) {
            $tools = CTools::getInstance();
            $smarty = new Smarty;
            $result = $tools->query("SELECT * FROM wiadomosc WHERE do_id='" . $_COOKIE['id'] . "' AND przeczytano='N';");
            if (mysqli_num_rows($result) > 0) {
                $smarty->assign('type', 'mail');
                $smarty->assign('number', mysqli_num_rows($result));
                $smarty->display("templates/notification.tpl");
            }
        }
    }
}