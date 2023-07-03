<?php
class userDetails{
    public function __construct(){
        if(isset($_SESSION['user'])){
            $username = $_SESSION['user'];
        }else if(isset($_COOKIE['user'])){
            $username = $_COOKIE['uesr'];
        }
    
        $sql = "SELECT `username`, `email`, `salutation`, `first_name`, `last_name`, `address`, `zip`, `country` FROM `users` WHERE `username`='$username'";
    
        $details = (mysqli_fetch_assoc(api_query($sql)));
        $this->username = $details['username'];
        $this->email = $details['email'];
        $this->salutation = $details['salutation'];
        $this->first_name = $details['first_name'];
        $this->last_name = $details['last_name'];
        $this->address = $details['address'];
        $this->zip = $details['zip'];
        $this->country = $details['country'];
    }
    
    public function __destruct(){

    }
}


class allUserDetails{
    public function __construct(){

        $sqlQuery = "SELECT `id`, `username`, `email`, `reg_date`, `salutation`, `first_name`, `last_name`, `address`, `zip`, `country`, `role`, `active` FROM `users` WHERE 1";
    
        $details = (mysqli_fetch_all(api_query($sqlQuery)));
        $this->allUsers = $details;
    }
    
    public function __destruct(){

    }
}







class orders{
    public function __construct($username){
        $sqlQuery = "SELECT * FROM `orders` WHERE `buyer_username`='$username'";
        $details = api_query($sqlQuery);

        $orders = [];
        while($row = $details->fetch_assoc()){
            array_push($orders, $row);
        }

        $this->orders = $orders;

    }
    
    public function __destruct(){
        
    }
}


















if(!function_exists('api_query')){
    function api_query($sql){
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "opulente";
        }else{
            $servername = "localhost";
            $username = "u847747079_dbUsername";
            $password = "g+9mh26pE]I";
            $dbname = "u847747079_dbName";
        }
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $result = $conn->query($sql);
        return $result;
    }
}
?>