<?php
require_once("libs/Smarty.class.php");

class CTools {
	private static $instance;
	private $connection;
    private $host="localhost";
    private $port=3306;
    private $socket="";
    private $user="root";
    private $password="pass";
    private $dbname="sklep";
	
	public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new CTools();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
        or die('Could not connect to the database server' . mysqli_connect_error());
        $this->query("SET NAMES utf8");
    }

    function query($q) {
        $result = $this->connection->query($q);
        if(!$result)
            die('Query error: '.mysqli_error($this->connection));
        else
            return $result;
    }
	
	public static function showNotification($type, $text) {
		$smarty = new Smarty;
        $smarty->assign('type', $type);
        $smarty->assign('text', $text);
        $smarty->display("templates/notification.tpl");
    }
}
?>