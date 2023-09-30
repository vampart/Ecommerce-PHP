<?php

ini_set("display_errors", "off");

if (isset($_POST['remove_product'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['pdt_name'] == $_POST['remove_pdt_name']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

$obj = new adminback();
$logo_info = $obj->display_logo();




?>

<?php
if (isset($del_msg)) {
    echo "{$del_msg}";
}
?>
<div class="header-middle biolife-sticky-object ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
            </div>
            <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                <div class="primary-menu">
                    <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">



                        <li class="menu-item"><a href="index.php">Home</a></li>
                        <li class="menu-item"><a href="all_product.php">Food</a></li>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                        ?>
                            <li class="menu-item"><a href="exist_order.php">Dashboard </a></li>
                        <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                <div class="biolife-cart-info">
                    <div class="mobile-search">
                        <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                        <div class="mobile-search-content">
                            <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                <select name="category">
                                    <option value="-1" selected>All Categories</option>
                                    <option value="vegetables">Sandwich</option>
                                    <option value="fresh_berries">Soup</option>
                                </select>
                                <button type="submit" class="btn-submit">go</button>
                            </form>
                        </div>
                    </div>
                    <div class="wishlist-block hidden-sm hidden-xs">
                    </div>
                    <div class="minicart-block">
                        <div class="minicart-contain">
                            <a href="javascript:void(0)" class="link-to">
                                <span class="icon-qty-combine">
                                    <i class="icon-cart-mini biolife-icon"></i>
                                    <span class="qty">
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            echo $_SESSION['cart_pdt_number'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </span>
                                </span>
                                <span class="title">My Cart :</span>


                                <span class="sub-total">
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        echo $_SESSION['subtotal'];
                                    } else {
                                        echo "0";
                                    }
                                    ?></span>


                            </a>
                            <div class="cart-content">
                                <div class="cart-inner">
                                    <ul class="products">

                                        <?php if (isset($_SESSION['cart'])) {

                                            $_SESSION['subtotal'] = 0;
                                            $_SESSION['cart_pdt_number'] = 0;
                                            foreach ($_SESSION['cart'] as $key => $value) {
                                                $_SESSION['subtotal'] =  $_SESSION['subtotal'] + $value['pdt_price'];
                                                $_SESSION['cart_pdt_number']++;
                                        ?>
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="admin/uploads/<?php echo $value['pdt_img'] ?>" width="90" height="90" alt="National Fresh"> </a>
                                                        </div>

                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name"><?php echo $value['pdt_name'] ?> </a></div>

                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">USD. </span><?php echo $value['pdt_price'] ?></span></ins>

                                                            </div>
                                                        </div>
                                                        <div class="action">

                                                            <form action="" method="POST">

                                                                <input type="hidden" value="<?php echo $value['pdt_name'] ?>" name="remove_pdt_name">
                                                                <input class="btn" type="submit" value="Remove" name="remove_product">
                                                            </form>


                                                        </div>
                                                    </div>
                                                </li>

                                        <?php }
                                        } else {
                                            echo "Your cart is empty";
                                        } ?>



                                    </ul>
                                    <p class="btn-control">
                                        <a href="userprofile.php" class="btn view-cart ">Check Out</a>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-toggle">
                        <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>