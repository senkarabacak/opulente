<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">



<?php
    $product_img_dir = '../productpictures/robe/male/white/robe_white.jpg';
    $product_name = 'robe_white';
    $product_title = 'robe_white';
    $product_description = 'robe_white';
    $product_category = 'robe';
    $product_gender = 'male';
    $product_color = 'white';
    $product_price = '$100';
?>


<?php
    $title = "Opulente - Product";
    $keywords = 'Opulente, Clothing , Clothing Store';
    $describtion = 'Opulente is a clothing store';
    require '../res/blocks/head.php';
?>




<link href="../res/css/header.css" rel="stylesheet" />
<?php require '../res/blocks/header.php'; ?>

<link href="../res/css/Product/product.css" rel="stylesheet" />
<?php require '../res/blocks/Product/product.php'; ?>

<link href="../res/css/footer.css" rel="stylesheet" />
<?php require '../res/blocks/footer.php'; ?>




















<script src='<?=$domain?>js/global.js'></script>
<script src='<?=$domain?>js/Product/script.js'></script>

</body>
</html>