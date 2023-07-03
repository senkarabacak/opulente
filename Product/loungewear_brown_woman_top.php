<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">



<?php
    $product_img_dir = '../productpictures/loungewear/female/brown/loungewear_brown_woman_top.jpg';
    $product_name = 'loungewear_brown_woman_top';
    $product_title = 'loungewear_brown_woman_top';
    $product_description = 'loungewear_brown_woman_top';
    $product_category = 'loungewear';
    $product_gender = 'female';
    $product_color = 'brown';
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