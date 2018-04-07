<?php
    ob_start();
    include("classes/CGUI.php");

    $GUI = CGUI::getInstance();
    $Server = CServer::getInstance();

    if(isset($_GET['action']))
        $GUI->printContent($_GET['action']);
    elseif(isset($_GET['szukana_fraza']))
        $GUI->printContent("szukana_fraza");
    else
        $GUI->printContent();

    if(isset($_POST['log_ok']))
        $Server->loginUser();
    elseif(isset($_POST['sendOdbiorca']))
        CMail::sendMail();
    elseif(isset($_POST['register_ok']))
        $Server->register();
    elseif(isset($_POST['changePersonalData_ok']))
        $Server->changePersonalData();
    elseif(isset($_POST['remind_pass_ok']))
        $Server->resetPassword();
    elseif(isset($_POST['changePassword_ok']))
        $Server->changePassword();
    elseif(isset($_POST['addComment']))
        $Server->addComment();
    elseif(isset($_POST['addAuction']))
        $Server->addAuction();
    elseif(isset($_POST['editAuction']))
        $Server->editAuction();


CMail::checkMail();

    if(isset($_GET['err']) && $_GET['err'] == "badImg")
        $GUI->showNotification('error', 'Zdjęcie nie jest prawidłowe...');
    if(isset($_GET['err']) && $_GET['err'] == "forbidden")
        $GUI->showNotification('error', 'Nie masz dostępu do tej części witryny. Zaloguj się...');
    if(isset($_GET['suc']) && $_GET['suc'] == "buyOk")
        $GUI->showNotification('success', 'Dokonano zakupu przedmiotu...');

    ob_end_flush();