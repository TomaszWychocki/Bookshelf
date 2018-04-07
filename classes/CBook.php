<?php
require_once(realpath(dirname(__FILE__)) . '/CTools.php');

class CBook {
    private $id, $auctionName, $title, $author, $cond, $buyNow, $swap, $give, $price, $descr, $type, $time, $added, $author_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAuctionName()
    {
        return $this->auctionName;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getCond()
    {
        return $this->cond;
    }

    /**
     * @return mixed
     */
    public function getBuyNow()
    {
        return $this->buyNow;
    }

    /**
     * @return mixed
     */
    public function getSwap()
    {
        return $this->swap;
    }

    /**
     * @return mixed
     */
    public function getGive()
    {
        return $this->give;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    function __construct($bookID) {
        $tools = CTools::getInstance();
        $result = $tools->query("SELECT * FROM aukcja WHERE id=$bookID;");

        $row = $result->fetch_assoc();
        $this->id = $row['id'];
        $this->auctionName = $row['nazwa_aukcji'];
        $this->title = $row['tytul'];
        $this->author = $row['autor'];
        $this->cond = $row['stan'];
        $this->buyNow = $row['kup_teraz'];
        $this->swap = $row['wymiana'];
        $this->give = $row['oddam'];
        $this->price = $row['cena'];
        $this->descr = $row['opis'];
        $this->type = $row['rodzaj'];
        $this->time = $row['czas'];
        $this->added = $row['dodano'];
        $this->author_id = $row['autor_id'];

        $list=array();
        $list[]=$row;
        return $list;
    }
}