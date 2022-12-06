<?php

class Event {
    //инкапсуляция
    private $date;
    private $place;
    private $type;
    private $name;
    private $price;
    private $file;
    private $id;

    //конструктор
    function __construct($id, $date, $place, $type, $name, $price, $file) {
        $this->id = $id;
        $this->date = $date;
        $this->place = $place;
        $this->type = $type;
        $this->name = $name;
        $this->price = $price;
        $this->file = $file;
    }

    //ключ GET, функции, чтобы достучаться и вернуть значения переменных
    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function getPlace() {
        return $this->place;
    }

    function getType() {
        return $this->type;
    }

    function getName() {
        return $this->name;
    }
    
    function getPrice() {
        return $this->price;
    }

    function getFile() {
        return $this->file;
    }

    
    // static function addEvent($name) {
    //     global $mysqli;
    //     $mysqli->query("INSERT INTO `events`(`name`) VALUES ('$name')");

    //     return json_encode(["result"=>"success $name"]);
    // }
    
    // * Статический метод (функция внутри класса) добавления события в базу данных
    // статическая функция вызывется без создания объекта
    static function addEvent($date, $place, $type, $name, $price, $file) {
        global $mysqli;
        // $date = Date.parse($date);
        //$type = trim(mb_strtolower($type));
       
        // $result = $mysqli->query("SELECT * FROM `events` WHERE (`date`='$date' && `place`='$place')");
        $result = $mysqli->query("SELECT * FROM `events` WHERE 1");
        // $mysqli->query("INSERT INTO `events`(`date`, `place`, `type`, `name`, `price`, `file` ) VALUES ('$date', '$place', '$type', '$name', '$price', '$file')");
        $mysqli->query("INSERT INTO `events`(`date`, `place`, `type`, `name`, `price`, `file` ) VALUES ('$date', '$place', '$type', '$name', '$price', '$file')");
        return json_encode(["result"=>"success"]);


        // if ($result->num_rows !== 0) {
        //     return json_encode(["result"=>"exist"]);

        // } else {
        //     $mysqli->query("INSERT INTO `events`(`date`, `place`, `type`, `name`, `price`, `file` ) VALUES ('$date', '$place', '$type', '$name', '$price', '$file')");
        //     return json_encode(["result"=>"success"]);
        // }
        //var_dump($mysqli);
        //echo "User added";
    }

    // * Статический метод (функция внутри класса) выбора событий по месяцам
    static function compareDate($date) {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `events` WHERE `date`='$date'");

        $result = $result->fetch_assoc();

        
        //if (password_verify($pass, $result["pass"])) {
        if ($date == XXXXXXX) {
            $_SESSION["id"] = $result["id"];
            // $_SESSION["name"] = $result["name"];
            // $_SESSION["lastname"] = $result["lastname"];
            // $_SESSION["email"] = $result["email"];

            
            return json_encode(["result"=>"ok"]);
           
        } else {
           return json_encode(["result"=>"not_found"]);
        }
    }

    // Статический метод получения событий конкретного месяца
    static function getEvents($month, $year) {
        //получаем данные
        global $mysqli;
        // выбираем из них те, что date
        $result = $mysqli->query("SELECT `date`, `place`, `type`, `name`, `price`, `file` FROM `events` WHERE MONTH(`date`)=$month AND YEAR(`date`)=$year");
        
        // преобразуем эти данные в массив
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
          }
        // возвращаем результат в формате json
        return json_encode($events);


    }

    // Статический метод получения данных всех пользователей
    static function getAllEvents() {
         global $mysqli;
          $result = $mysqli->query("SELECT `date`, `place`, `type`, `name`, `price`, `file` FROM `events` WHERE 1");
          while ($row = $result->fetch_assoc()) {
            $events[] = $row;
          }
          return json_encode($events);

    }

}