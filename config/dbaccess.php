<?php
session_start();

if($_SERVER['SERVER_NAME'] == 'localhost'){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "opulente";
}else{
    $dbServername = "localhost";
    $dbUsername = "u847747079_dbUsername";
    $dbPassword = "g+9mh26pE]I";
    $dbname = "u847747079_dbName";
}




$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlQuery = "SELECT `username`, `email` FROM `users` WHERE `username`='saddsaddasrg' OR `email`='gdrsd'";
$result = $conn->query($sqlQuery)->fetch_assoc();
// echo $result['num_rows'];

if(isset($_POST['formType'])){
    if($_POST['formType'] == 'register'){

        typeRegister($conn);
    }else if($_POST['formType'] == 'login'){

        typeLogin($conn);
    }else if($_POST['formType'] == 'changeDetails'){
        
        typeChangeDetails($conn);
    }else if($_POST['formType'] == 'adminAccounts'){

        typeAdminAccounts($conn);
    }else if($_POST['formType'] == 'adminProducts'){

        typeAdminProducts($conn);
    }else if($_POST['formType'] == 'adminAddProduct'){

        typeAdminAddProduct($conn);
    }else if($_POST['formType'] == 'addToCart'){

        typeCart($conn);
    }
}




function typeRegister($conn){

    $salutatuin = $_POST['salutation'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);


    $errTrue = false;

    //Checking if username exists
    $sqlQuery = "SELECT `username`, `email` FROM `users` WHERE `username`='$username'";
    $result = $conn->query($sqlQuery)->fetch_assoc();
    if($result != ''){
        $_SESSION['regErr'] = 'user';
        $errTrue = true;
    }

    //Checking if email exists
    $sqlQuery = "SELECT `username`, `email` FROM `users` WHERE `email`='$email'";
    $result = $conn->query($sqlQuery)->fetch_assoc();
    if($result != ''){
        $_SESSION['regErr'] = 'email';
        $errTrue = true;
    }

    //If there is no errors, user is being registerd
    if($errTrue == true){
        $conn->close();
        header('Location: ../register');
        exit;
    }else if($errTrue == false){
        $sqlQuery = "INSERT INTO `users`(`username`, `email`, `salutation`, `first_name`, `last_name`, `address`, `zip`, `country`, `password`) VALUES ('$username', '$email', '$salutatuin', '$fName', '$lName', '$address', '$zip', '$country', '$pass')";
        $result = $conn->query($sqlQuery);
        $_SESSION['regSuc'] = 'true';

        $conn->close();
        header('Location: ../signup');
        exit;
    }
}




function typeLogin($conn){
    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    $remember = $_POST['isRememberTicked'];

    // echo $login . '<br>';
    // echo $pass . '<br>';

    //Checking if username and password are correct
    $sqlQuery = "SELECT `username`, `email`, `password`, `role` FROM `users` WHERE (`username`='$login' OR `email`='$login') AND `password`='$pass'";
    $result = $conn->query($sqlQuery)->fetch_assoc();
    if($result == ''){
        $_SESSION['logErr'] = 'invalid';
        $errTrue = true;

        $conn->close();
        header('Location: ../../signup');
        exit;
    }else{
        if($remember == 'true'){ //If user want to remember details, we just set cookie
            if (isset($_COOKIE['user'])) {  //Unseting previous cookies and sessions
                unset($_COOKIE['user']); 
                setcookie('user', '', -1, '/'); 
            }
            unset($_SESSION['user']);
            unset($_SESSION['role']);

            if($result['role'] == 'admin'){ //Aminis can't chose remember me
                $_SESSION['user'] = $result['username'];
                $_SESSION['role'] = $result['role'];

            }else{ //If it's user, he will be remembered for 7 days
                setcookie('user', $result['username'], time() + (86400 * 7), "/"); // 86400 = 1 day
            }


        }else{ //If user don't want to remember details, we set session instead of cookie
            if (isset($_COOKIE['user'])) {
                unset($_COOKIE['user']); 
                setcookie('user', '', -1, '/'); 
            }
            $_SESSION['user'] = $result['username'];
            $_SESSION['role'] = $result['role'];
        }
    }


    $conn->close();
    header('Location: ../../');
    exit;
}



function typeChangeDetails($conn){
    $salutation = $_POST['salutation'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $passCur = md5($_POST['passCur']);
    $pass = md5($_POST['pass']);



    $have_err = false;


    //Updating details
    $sqlQuery = "UPDATE `users` SET `salutation`='$salutation', `first_name`='$fName', `last_name`='$lName', `address`='$address', `zip`='$zip', `country`='$country' WHERE `username`='$username' AND `email`='$email'";
    $result = $conn->query($sqlQuery);
        
    //Checking if passwords match and updating password
    $sqlQuery = "SELECT `password` FROM `users` WHERE `username`='$username' AND `email`='$email'";
    $result = $conn->query($sqlQuery)->fetch_assoc();
    if($result != ''){
        if($passCur != $result['password']){
            if($pass == 'd41d8cd98f00b204e9800998ecf8427e' && $passCur == 'd41d8cd98f00b204e9800998ecf8427e'){  // d41d8cd98f00b204e9800998ecf8427e is encrypted nothing

            }else{
                $_SESSION['changeErr'] = 'pass';
                $have_err = true;
            }
        }else{
            //Changing password if everything is fine
            if($pass == 'd41d8cd98f00b204e9800998ecf8427e' || $passCur == 'd41d8cd98f00b204e9800998ecf8427e'){
                $_SESSION['changeErr'] = 'passNull';
                $have_err = true;
            }else{
                $sqlQuery = "UPDATE `users` SET `password`='$pass' WHERE `username`='$username' AND `email`='$email'";
                $result = $conn->query($sqlQuery);
                $conn->close();
            }

        }
    }


    if($have_err == true){

    }else{
        $_SESSION['changeSuc'] = 'true';
    }

        
    header('Location: ../account');
    exit;
}





function typeAdminAccounts($conn){
    $totalAccounts = $_POST['totalAccounts'];

    for($i = 0; $i < $totalAccounts; $i++){
        $id = $_POST['v0-'.$i];
        $username = $_POST['v1-'.$i];
        $email = $_POST['v2-'.$i];
        $reg_date = $_POST['v3-'.$i];
        $salutation = $_POST['v4-'.$i];
        $fName = $_POST['v5-'.$i];
        $lName = $_POST['v6-'.$i];
        $address = $_POST['v7-'.$i];
        $zip = $_POST['v8-'.$i];
        $country = $_POST['v9-'.$i];
        $role = $_POST['v10-'.$i];
        $active = $_POST['v11-'.$i];

        $sqlQuery = "UPDATE `users` SET `username`='$username', `email`='$email', `reg_date`='$reg_date', `salutation`='$salutation', `first_name`='$fName', `last_name`='$lName', `address`='$address', `zip`='$zip', `country`='$country', `role`='$role', `active`='$active' WHERE `id`=$id";
        $result = $conn->query($sqlQuery);
    }

    $conn->close();
    header('Location: ../account');
    exit;

}


function typeAdminProducts($conn){
    $totalProducts = $_POST['totalProducts'];

    for($i = 0; $i < $totalProducts; $i++){
        $id = $_POST['v0-'.$i];
        $product_name = $_POST['v1-'.$i];
        $product_title = $_POST['v2-'.$i];
        $product_description = $_POST['v3-'.$i];
        $product_category = $_POST['v4-'.$i];
        $product_gender = $_POST['v5-'.$i];
        $product_color = $_POST['v6-'.$i];
        $product_price = $_POST['v7-'.$i];
        $file_name = $_POST['v8-'.$i];
        $delete = $_POST['v9-'.$i];

        if($delete == 'true'){
            $sqlQuery = "DELETE FROM `products` WHERE `id`='$id'";
            $result = $conn->query($sqlQuery);
            unlink("../productpictures/" . $product_category . '/' . $product_gender. '/' . $product_color . '/' . $file_name);
        }else{
            $sqlQuery = "SELECT `product_category`, `product_gender`, `product_color`, `file_name` FROM `products` WHERE `id`=$id";
            $result = $conn->query($sqlQuery)->fetch_assoc();

            $from = "../productpictures/" . $result['product_category'] . '/' . $result['product_gender'] . '/' . $result['product_color'] . '/' . $result['file_name'];
            $to = "../productpictures/" . $product_category . '/' . $product_gender. '/' . $product_color . '/' . $file_name;

            if (!file_exists(explode($file_name, $to)[0])) {
                mkdir(explode($file_name, $to)[0], 0777, true);
            }
            rename($from, $to);

            $sqlQuery = "UPDATE `products` SET `product_name`='$product_name', `product_title`='$product_title', `product_description`='$product_description', `product_category`='$product_category', `product_gender`='$product_gender', `product_color`='$product_color', `product_price`='$product_price', `file_name`='$file_name' WHERE `id`=$id";
            $result = $conn->query($sqlQuery);
        }
    }

    $conn->close();
    header('Location: ../account');
    exit;
}


function typeAdminAddProduct($conn){

    $product_name = $_POST['v0'];
    $product_title = $_POST['v1'];
    $product_description = $_POST['v2'];
    $product_category = $_POST['v3'];
    $product_gender = $_POST['v4'];
    $product_color = $_POST['v5'];
    $product_price = $_POST['v6'];
    $file_name = $_POST['v8'];


    // $image = $_POST['v6'];
    //Stores the filename as it was on the client computer.
    $imagename = $_FILES['v7']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['v7']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['v7']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['v7']['tmp_name'];
    
    $ext = pathinfo($imagename, PATHINFO_EXTENSION);

    if($file_name == ''){
        $file_name = explode($ext, $imagename)[0];
    }

    //The path you wish to upload the image to
    $imagePath = "../productpictures/" . $product_category . "/" . $product_gender . "/" . $product_color . "/";
    $pageImagePath = "../productpictures/" . $product_category . "/" . $product_gender . "/" . $product_color . "/" . $file_name . $ext;


    // echo $ext;
    
    if(is_uploaded_file($imagetemp)) {
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true);
        }
        if(move_uploaded_file($imagetemp, $imagePath . $file_name . $ext)) {
            $sqlQuery = "INSERT INTO `products`(`product_name`, `product_category`, `product_gender`, `product_color`, `file_name`, `product_title`, `product_description`, `product_price`) VALUES ('$product_name', '$product_category', '$product_gender', '$product_color', '$imagename', '$product_title', '$product_description', '$product_price')";
            $result = $conn->query($sqlQuery);
            
            $default_product_page = file_get_contents("../res/blocks/Product/default.txt");
            $default_product_page = str_replace("add_product_img_dir", $pageImagePath, $default_product_page);
            $default_product_page = str_replace("add_product_name", $product_name, $default_product_page);
            $default_product_page = str_replace("add_product_title", $product_title, $default_product_page);
            $default_product_page = str_replace("add_product_description", $product_description, $default_product_page);
            $default_product_page = str_replace("add_product_category", $product_category, $default_product_page);
            $default_product_page = str_replace("add_product_gender", $product_gender, $default_product_page);
            $default_product_page = str_replace("add_product_color", $product_color, $default_product_page);
            $default_product_page = str_replace("add_product_price", $product_price, $default_product_page);
            
            if (!file_exists("../Product/")) {
                mkdir("../Product/", 0777, true);
            }
            fwrite(fopen("../Product/" . preg_replace("/\s+/", "", $product_name) . ".php", "w"), $default_product_page);
            
            // echo "Sussecfully uploaded your image.";
        }else {
            // echo "Failed to move your image.";
        }
    }
    else {
        // echo "Failed to upload your image.";
    }

    $conn->close();
    header('Location: ../account');
    exit;
}




function typeCart($conn){
    $product_title = $_POST['title'];
    $product_quantity = $_POST['number'];
    $product_category = $_POST['category'];
    $product_gender = $_POST['gender'];
    $product_color = $_POST['color'];

    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    }else{
        $username = $_COOKIE['user'];
    }

    $sqlQuery = "INSERT INTO `orders` (`product_title`, `buyer_username`, `quantity`, `product_category`, `product_gender`, `product_color`) VALUES ('$product_title', '$username', '$product_quantity', '$product_category', '$product_gender', '$product_color')";
    $result = $conn->query($sqlQuery);
    // echo $conn -> error;


    $conn->close();
    header('Location: ../account');
    exit;
}





?>