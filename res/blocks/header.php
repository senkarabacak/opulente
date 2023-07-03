<div class="header">
    <div class="hInner cont">
        <a href="/" class="hiLogoLink"> <img src="<?=$domain?>res/img/logo.png" alt="" class="hiLogo"> </a>
        <div class="hiLinks">
            <a href="<?=$domain?>" class="hilLink">Home</a>
            <a href="<?=$domain . 'products'?>" class="hilLink">Products</a>
        </div>
        <div class="hiUser">
            <?php if(isset($_SESSION['user']) || isset($_COOKIE['user'])): ?>

            <!-- <a href="cart" class="hiuLink"> <img src="<?=$domain?>res/img/cart.png" alt=""> </a> -->
            <!-- <a href="products" class="hiuLink">Orders</a> -->
            <a href="account" class="hiuLink"> <img src="<?=$domain?>res/img/account.png" alt=""> </a>

            <?php else: ?>

            <a href="signup" class="hiuLink">Login</a>
            <a href="register" class="hiuLink">Register</a>
            <!-- <a href="cart" class="hiuLink"> <img src="<?=$domain?>res/img/cart.png" alt=""> </a> -->

            <?php endif; ?>
        </div>
    </div>
</div>