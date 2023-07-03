<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">






<?php
    $title = "Opulente - Products";
    $keywords = 'Opulente, Clothing , Clothing Store';
    $describtion = 'Opulente is a clothing store';
    require 'res/blocks/head.php';
    require 'models/product.class.php';
?>




<link href="res/css/header.css" rel="stylesheet" />
<?php require 'res/blocks/header.php'; ?>

<link href="res/css/Products/products.css" rel="stylesheet" />
<?php require 'res/blocks/Products/products.php'; ?>

<link href="res/css/footer.css" rel="stylesheet" />
<?php require 'res/blocks/footer.php'; ?>




















<script src='js/global.js'></script>
<script src='js/Products/script.js'></script>

</body>
</html>