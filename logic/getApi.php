<?php
session_start();

if(isset($_POST)){
    $postData = json_decode(file_get_contents("php://input"), TRUE);

    if($postData['action'] == 'get_products'){
        getProducts($postData);
    }else if($postData['action'] == 'get_details'){
        getDetails($postData);
    }

}else{
    echo json_encode('empty');
}

exit;















function getProducts($postData){
    $limit = $postData['params']['limit'];
    $sql = "SELECT `product_name`, `product_category`, `product_gender`, `product_color`, `file_name`, `product_title`, `product_description`, `product_price` FROM `products`";
    // echo json_encode(api_query($sql));


    $result = mysqli_fetch_all(api_query($sql));

    $resultM = [];
    for($i = 0; $i < count($result); $i++){
        $resultM[$i] = [
            'name' => $result[$i][0],
            'type' => $result[$i][1],
            'gender' => $result[$i][2],
            'color' => $result[$i][3],
            'file' => $result[$i][4],
            'title' => $result[$i][5],
            'description' => $result[$i][6],
            'price' => $result[$i][7],
        ];
    }

    echo json_encode($resultM);


    // print_r((api_query($sql)));
}



function getDetails($postData){
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    }else if(isset($_COOKIE['user'])){
        $username = $_COOKIE['uesr'];
    }

    $sql = "SELECT `username`, `email`, `salutation`, `first_name`, `last_name`, `zip`, `country` FROM `users` WHERE `username`='$username'";

    print_r(mysqli_fetch_assoc(api_query($sql)));
}




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























































































// class dbAccess{
//     function __construct(){
//         $this->servername = "localhost";
//         $this->username = "root";
//         $this->password = "";
//         $this->dbname = "opulente";
//     }

//     public function dbQuery($data){
        
//         $action = $data['action'];
//         $sqlQuery = $data['sql'];

//         if($action == '' || $sqlQuery == ''){
//             echo 'err';
//             die;
//         }

//         $this->action = $action;
//         $this->sqlQuery = $sqlQuery;
        
//         $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
//         if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         }

//         if($action == 'insert'){
//             $result = $conn->query($sqlQuery);
//             print_r($result);
//         }else if($action == 'select'){
//             if(isset($data['details']['fetch'])){
//                 if($data['details']['fetch'] == 'single'){

//                 }
//             }
//             $result = $conn->query($sqlQuery)->fetch_all();
//             print_r($result);
//         }
        
//         $conn->close();

//     }


//     function __destruct(){

//     }
// }

















// echo api_query([
//     'method' => 'GET',
//     'params' => [],
//     'url' => 'https://roboguard.fraudcentral.io/api/stats/',
// ]);

// function api_query($details){
//     // $params = array(
//     //     // 'param0' => 'value0',
//     // );

//     $json = json_encode($details['params']);
//     $ch = curl_init($details['url']);
    
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $details['method']);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json;charset=utf-8',
//         'Content-Length: ' . strlen($json),
//         "Accept: " . "application/json",
//     ));

//     $response = curl_exec($ch);
//     if(curl_errno($ch)) {
//         echo 'Error: ' . curl_error($ch);
//     } else {
//         return $response;
//     }
//     curl_close($ch);
// }












































?>