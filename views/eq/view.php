<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id_cat'];?>">
                                            <?php echo $categoryItem['name_cat'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src=<?php echo "../.." . $product[0]['image_prod'] ?> alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if ($product[0]['is_new']): ?>
                                    <img src="../../images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>
                                <h2><?php echo $product[0]['name_prod'];?></h2>
                                <p>Код товара: <?php echo $product[0]['code_prod'];?></p>
                                <span>
                                    <span><?php echo $product[0]['price_prod'];?> Тенге</span>
                                    <label>Количество:</label>
                                    <input type="text" value="3" />
                                    <a href="/cart/add/<?php echo $product[0]['id_prod']; ?>" class="btn btn-default add-to-cart"
											data-id="<?php echo $product[0]['id_prod']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </span>
                                <p><b>Наличие:</b> На складе</p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> D&amp;G</p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <?php echo $product[0]['descr_prod'];?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>