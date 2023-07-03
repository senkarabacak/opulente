<div class="product">
    <div class="pInner cont">
        <div class="piProduct">
            <img src="<?=$product_img_dir?>" alt="" class="pipImg">
        </div>
        <form method='POST' action='../config/dbaccess' class="piDescription">
            <div class="pidHeader title-size"><?=$product_title?></div>
            <div class="pidPrice text-small-size"><?=$product_price?></div>
            <div class="pidDescription text-small-size"><?=$product_description?></div>
            <div class="pidButtons">
                <div class="pidbCuantity">
                    <img src="<?=$domain?>res/img/Product/minus.png" alt="" class='pidbbIcon pidbbMinus' id='pidbbMinus'>
                    <input class='pidbbNumber' type="number" name='number' value='1' min="1" max="99" id='pidbbNumber'>
                    <img src="<?=$domain?>res/img/Product/plus.png" alt="" class='pidbbIcon pidbbPlus' id='pidbbPlus'>
                </div>
                <div class="pidbButtons">
                    <input type='submit' class="pidbbCart text-small-size" value="Add to cart">
                </div>
            </div>
            <input type="text" value='<?=$product_title?>' name='title' style='display: none'>
            <input type="text" value='<?=$product_category?>' name='category' style='display: none'>
            <input type="text" value='<?=$product_gender?>' name='gender' style='display: none'>
            <input type="text" value='<?=$product_color?>' name='color' style='display: none'>
            
            <input type="text" value='addToCart' name='formType' style='display: none'>
        </form>
    </div>
</div>