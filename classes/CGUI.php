<?php
include("libs/Smarty.class.php");
require_once(realpath(dirname(__FILE__)) . '/CServer.php');
require_once(realpath(dirname(__FILE__)) . '/CTools.php');
require_once(realpath(dirname(__FILE__)) . '/CMail.php');
require_once(realpath(dirname(__FILE__)) . '/CBook.php');
require_once(realpath(dirname(__FILE__)) . '/CUser.php');

class CGUI {
    private static $instance;
    private static $smarty, $server, $tools;

    private function __construct() {
        self::$smarty = new Smarty;
        self::$server = CServer::getInstance();
		self::$tools = CTools::getInstance();
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new CGUI();
        }
        return self::$instance;
    }

    private function printMenu($qs) {
        if (!isset($_COOKIE['login']))
            self::$smarty->assign('show', 'no_user');
        elseif (isset($_COOKIE['login']) && ($qs == 'receivedMail' || $qs == 'receivedMailContent' || $qs == 'sendMail'))
            self::$smarty->assign('show', 'mail');
        elseif (isset($_COOKIE['login']) && ($qs == 'myAccount' || $qs == 'changePassword' || $qs == 'changePersonalData'))
            self::$smarty->assign('show', 'my_account');
        else
            self::$smarty->assign('show', 'add');

        if (isset($_COOKIE['login']))
            self::$smarty->assign('username', strtoupper($_COOKIE['login']));
        else
            self::$smarty->assign('username', 'no_user');

        self::$smarty->display("templates/menu.tpl");
    }

    private function showMailList() {
        if(isset($_COOKIE['id'])) {
            $list = self::$server->getUserMailsList($_COOKIE['id']);
            self::$smarty->assign('list', $list);
            self::$smarty->display('templates/mailList.tpl');
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showMyAccount() {
        if(isset($_COOKIE['id'])) {
            $list = self::$server->getUserBooksList($_COOKIE['id']);
            self::$smarty->assign('list', $list);
            self::$smarty->display('templates/userBooksList.tpl');
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showChangePasswordForm() {
        if(isset($_COOKIE['id'])) {
            self::$smarty->assign('what', 'changePassword_form');
            self::$smarty->display("templates/tmp.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showChangePersonalDataForm() {
        if(isset($_COOKIE['id'])) {
            $user = new CUser($_COOKIE['id']);
            self::$smarty->assign('user', $user);
            self::$smarty->display("templates/changePersonalData.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function search($str) {
        $list = self::$server->searchBooks($str);
        $books = array();
        foreach ($list as $id) {
            $books[] = new CBook($id);
        }

        self::$smarty->assign('books', $books);
        self::$smarty->display('templates/search.tpl');
    }

    private function showSendMailForm() {
        if(isset($_COOKIE['id'])) {
            if(isset($_GET['to']))
                self::$smarty->assign('to', $_GET['to']);
            self::$smarty->display("templates/sendMail.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showAdminView() {
        if($_COOKIE['login'] == 'admin') {
            $list = self::$server->getUsersId();
            $users = array();
            foreach ($list as $id) {
                $users[] = new CUser($id);
            }

            self::$smarty->assign('users', $users);
            self::$smarty->display("templates/adminView.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showAdminAllBooks() {
        if($_COOKIE['login'] == 'admin' || $_COOKIE['login'] == 'mod') {
            $list = self::$server->getBooksId();
            $books = array();
            foreach ($list as $id) {
                $books[] = new CBook($id);
            }

            self::$smarty->assign('books', $books);
            self::$smarty->assign('admin', 'yes');
            self::$smarty->display("templates/search.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showAddAuctionForm() {
        if(isset($_COOKIE['id'])) {
            self::$smarty->display("templates/addAuctionForm.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showBooksByType($type) {
        $list = self::$server->getBooksIdByType($type);
        $books = array();
        foreach ($list as $id) {
            $books[] = new CBook($id);
        }

        self::$smarty->assign('books', $books);
        self::$smarty->display('templates/search.tpl');
    }

    private function showComments() {
        if(isset($_COOKIE['id'])) {
            $list1 = self::$server->getCommentsList(1);
            $list2 = self::$server->getCommentsList(2);
            self::$smarty->assign('list1', $list1);
            self::$smarty->assign('list2', $list2);
            self::$smarty->display('templates/comments.tpl');
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function editAuction($id) {
        if(isset($_COOKIE['id'])) {
            $book = new CBook($id);
            self::$smarty->assign('book', $book);
            self::$smarty->display("templates/editAuction.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function confirm($id) {
        if(isset($_COOKIE['id'])) {
            self::$smarty->assign('id', $id);
            self::$smarty->assign('what', 'confirm');
            self::$smarty->display("templates/tmp.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showMore($id) {
        if(isset($_COOKIE['id'])) {
            $book = new CBook($id);
            $user = new CUser($book->getAuthorId());
            self::$smarty->assign('book', $book);
            self::$smarty->assign('user', $user);

            if(isset($_COOKIE['id']) && $book->getBuyNow() == 1 && $_COOKIE['id'] != $book->getAuthorId() && $_COOKIE['login'] != 'admin' && $_COOKIE['login'] != 'mod')
                self::$smarty->assign('button', 'buynow');
            elseif(isset($_COOKIE['id']) && $book->getGive() == 1 && $_COOKIE['id'] != $book->getAuthorId() && $_COOKIE['login'] != 'admin' && $_COOKIE['login'] != 'mod')
                self::$smarty->assign('button', 'give');
            elseif(isset($_COOKIE['id']) && $book->getSwap() == 1 && $_COOKIE['id'] != $book->getAuthorId() && $_COOKIE['login'] != 'admin' && $_COOKIE['login'] != 'mod')
                self::$smarty->assign('button', 'swap');
            else
                self::$smarty->assign('button', 'none');

            self::$smarty->display("templates/showMore.tpl");
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showReceivedMailContent() {
        if(isset($_COOKIE['id'])) {
            CMail::getMail($_GET['id']);
        }
        else
            header("Location: http://localhost/index.php?err=forbidden");
    }

    private function showResetPasswordForm($hash) {
        $result = self::$tools->query("SELECT * FROM uzytkownik WHERE haslo='$hash';");
        if(mysqli_num_rows($result) > 0) {
            self::$smarty->assign('hash', $hash);
            self::$smarty->display("templates/resetPassword.tpl");
        }
        else
            $this->showNotification('error', 'Link został już wcześniej użyty lub jest niepoprawny...');
    }

    public function printContent($queryString = "main") {
        self::$smarty->display("templates/header.tpl");
        $this->printMenu($queryString);

        if($queryString === "main") {
            self::$smarty->display("templates/mainPage.tpl");

            if (!isset($_COOKIE["cookie_info"]))
                setcookie("cookie_info", "F");

            if (isset($_COOKIE["cookie_info"]) && $_COOKIE["cookie_info"] == "F") {
                self::$smarty->assign('what', 'cookie_info');
                self::$smarty->display("templates/tmp.tpl");
            }
        }
        elseif($queryString === "receivedMail")
            $this->showMailList();
        elseif($queryString === "myAccount")
            $this->showMyAccount();
        elseif($queryString === "remove_book") {
            self::$server->removeBook($_GET['id']);
            if($_COOKIE['login'] == 'admin' || $_COOKIE['login'] == 'mod')
                header("Location: http://localhost/index.php?action=adminAuct");
            else
                header("Location: http://localhost/index.php?action=myAccount");
        }
        elseif($queryString === "changePassword")
            $this->showChangePasswordForm();
        elseif($queryString === "changePersonalData")
            $this->showChangePersonalDataForm();
        elseif($queryString === "szukana_fraza")
            $this->search($_GET['szukana_fraza']);
        elseif($queryString === "sendMail")
            $this->showSendMailForm();
        elseif($queryString === "adminUser")
            $this->showAdminView();
        elseif($queryString === "remove_user")
            self::$server->removeUser($_GET['id']);
        elseif($queryString === "adminAuct")
            $this->showAdminAllBooks();
        elseif($queryString === "addAuction")
            $this->showAddAuctionForm();
        elseif($queryString === "showAuctionList")
            $this->showBooksByType($_GET['type']);
        elseif($queryString === "comments")
            $this->showComments();
        elseif($queryString === "editAuction")
            $this->editAuction($_GET['id']);
        elseif($queryString === "confirm")
            $this->confirm($_GET['id']);
        elseif($queryString === "auctionShowMore")
            $this->showMore($_GET['id']);
        elseif($queryString === "receivedMailContent")
            $this->showReceivedMailContent();
        elseif($queryString === "deleteMail")
            CMail::deleteMail($_GET['id']);
        elseif($queryString === "logout")
            self::$server->logoutUser();

        self::$smarty->display("templates/footer.tpl");

        if($queryString === "accountActivation")
            self::$server->accountActivation($_GET['hash']);
        elseif($queryString === "remind")
            self::$server->sendResetPasswordMessage();
        elseif($queryString === "remind_reset")
            $this->showResetPasswordForm($_GET['remind_reset']);
        elseif($queryString === "confirmed")
            self::$server->confirmed();
    }
}