<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_COOKIE['user'])){
    header('Location: /index');
}
?>
<!DOCTYPE html>
<html lang="en">







<?php
    $title = "Opulente - My Account";
    $keywords = 'Opulente, Clothing , Clothing Store';
    $describtion = 'Opulente is a clothing store';
    require 'res/blocks/head.php';
    require 'models/user.class.php';
    require 'models/product.class.php';
?>


<link href="res/css/header.css" rel="stylesheet" />
<?php require 'res/blocks/header.php'; ?>

<link href="res/css/Account/body.css" rel="stylesheet" />
<?php require 'res/blocks/Account/body.php'; ?>



<!-- <link href="res/css/footer.css" rel="stylesheet" /> -->
<?php // require 'res/blocks/footer.php'; ?>




















<script src='js/global.js'></script>
<script src='js/Account/script.js'></script>

</body>
</html>