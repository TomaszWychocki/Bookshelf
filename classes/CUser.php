<?php

class CUser {
	private $tools;
    private $id, $login, $password, $name, $surname, $phone, $email, $street, $city, $bank;

    function __construct($userID) {
        $this->tools = CTools::getInstance();
        $result = $this->tools->query("SELECT * FROM uzytkownik WHERE id=$userID;");

        $row = $result->fetch_assoc();
        $this->id = $row['id'];
        $this->login = $row['login'];
        $this->password = $row['haslo'];
        $this->name = $row['imie'];
        $this->surname = $row['nazwisko'];
        $this->phone = $row['telefon'];
        $this->email = $row['email'];
        $this->street = $row['ulica'];
        $this->city = $row['miasto'];
        $this->bank = $row['nrkonta'];

        $list=array();
        $list[]=$row;
        return $list;
    }

    function getRating() {
        $result = $this->tools->query("SELECT ocena FROM aukcjaKoniec WHERE ocena>0 AND sprzedajacy='$this->id';");
        $i = 0;
        $sum = 0;
        while($row = $result->fetch_assoc()){
            $sum += $row['ocena'];
            $i++;
        }

        if($i > 0)
            return round($sum / $i,2);
        else
            return 0;
    }

    public function getID() {return $this->id;}
    public function getLogin() {return $this->login;}
    public function getPassword() {return $this->password;}
    public function getName() {return $this->name;}
    public function getSurname() {return $this->surname;}
    public function getPhone() {return $this->phone;}
    public function getEmail() {return $this->email;}
    public function getStreet() {return $this->street;}
    public function getCity() {return $this->city;}
    public function getBank() {return $this->bank;}
}