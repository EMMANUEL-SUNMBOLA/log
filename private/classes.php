<?php

// class Order{
//     private $name;
//     private $items = [];
//     private $email;
//     private $price;

//     function TakeOrder(string $name, array $order, $dbTab, $conn){
//         $this -> name = $name;
//         $this -> items = $order;

//         foreach($order as $celery){
//             $msg = "INSERT INTO $dbTab(name, orders) VALUES('$name','$celery')";
//             return ($conn -> query($msg)) ? true : false;
//         }
//     } 
// }

class Customer{
    private $name;
    private $pass;
    private $email;
    private $Prdname;
    private $sub;
    private $cont;
    private $price;
    private $loc;
    function CreateCustomer(object $conn, string $dbTab, string $name, string $pass, string $email){
        $this -> name = $name;
        $this -> pass = $pass;
        $this -> email = $email;
        $msg = "INSERT INTO $dbTab(username, email, pwd) VALUES ('$name', '$email', '$pass')";
        return ($conn -> query($msg)) ? true : false;
    }

    function CreatePost(object $conn, string $dbTab, string $Prdname, string $sub, string $cont, string $price, string $loc){
        $this -> sub = $sub;
        $this -> cont = $cont;
        $this -> Prdname = $Prdname;
        $this -> price = $price;
        $this -> loc = $loc;

        $msg = "INSERT INTO $dbTab(loc, subject, content, pice)  VALUES ('$loc', '$sub', '$cont', '$price')";

        return ($conn -> query($msg)) ? true : false;
    }

}
class Order {
    private $customerName;
    private $customerEmail;
    private $items = array();
    private $totalPrice;

    public function __construct($customerName, $customerEmail) {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
    }

    public function addItem($name, $price) {
        $this->items[] = array('name' => $name, 'price' => $price);
        $this->totalPrice += $price;
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function sendEmail() {
        // Code to send email to customer goes here
    }
}
