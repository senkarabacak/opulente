<?php
class allProducts{
    public function __construct(){

        $sql = "SELECT `id`, `product_name`, `product_title`, `product_description`, `product_category`, `product_gender`, `product_color`, `product_price`, `file_name` FROM `products` WHERE 1";
    
        $details = (mysqli_fetch_all(api_query($sql)));
        $this->allProducts = $details;
    }
    
    public function __destruct(){

    }
}


class productFilters{
    public function __construct(){
        $this->filterList = ['category', 'gender', 'color'];

        $this->category = ['loungewear', 'robe'];
        $this->gender = ['male', 'female'];
        $this->color = ['white', 'cream', 'brown', 'black'];
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
