<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">



<?php
    $product_img_dir = '../productpictures/loungewear/female/black/loungewear_black_woman_bottom.jpg';
    $product_name = 'loungewear_black_woman_bottom';
    $product_title = 'loungewear_black_woman_bottom';
    $product_description = 'loungewear_black_woman_bottom';
    $product_category = 'loungewear';
    $product_gender = 'female';
    $product_color = 'black';
    $product_price = '€100';
?>


<?php
  $title = "Opulente - Produkt";
  $keywords = 'Opulente, Kleidung, Mode Geschäft';
  $describtion = 'Opulente ist Mode Geschäft';
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