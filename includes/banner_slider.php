<?php
$pdt_info = $obj->display_product_byCata(1);
$pdt_datas = array();
while ($pdt_ftecth = mysqli_fetch_assoc($pdt_info)) {
    $pdt_datas[] = $pdt_ftecth;
}
?>
<div class="special-slide">
    <div class="container">
        <ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}'>

            <?php
            foreach ($pdt_datas as $pdt_data) {
            ?>


                <li>

                    <div class="slide-contain biolife-banner__special">
                        <div class="banner-contain">
                            <div class="media">
                                <a href="single_product.php?status=singleproduct&&id=<?php echo $pdt_data['pdt_id'] ?>" class="bn-link">
                                    <figure><img src="admin/uploads/<?php echo $pdt_data['pdt_img'] ?>" width="616" height="483" alt=""></figure>
                                </a>
                            </div>
                            <a href="single_product.php?status=singleproduct&&id=<?php echo $pdt_data['pdt_id'] ?>">
                                <div class="text-content">
                                    <b class="first-line">Special Items</b>
                                    <span class="second-line"><?php echo $pdt_data['pdt_name'] ?></span>

                                    <div class="product-detail">

                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">USD. </span><?php echo $pdt_data['pdt_price'] ?></span></ins>


                                        </div>

                                        <h4 class="product-name "><?php echo $pdt_data['pdt_des'] ?></h4>


                                    </div>


                                </div>

                            </a>
                        </div>
                    </div>


                </li>
            <?php } ?>


        </ul>
    </div>
</div>
</div>