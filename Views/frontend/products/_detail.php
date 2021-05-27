<div class="subDetail">
    <div class="container">
        <a href="index.php">Home</a> /
        <a href="index.php?controller=category&action=show&id=<?=$product['category_id']?>"><?=$product['category_name']?></a> / 
        <a href=""><?=$product['name']?></a>
    </div>
</div>
<div class="detailProduct">
    <div class="container">
        <div class="item">
            <div class="gallery">
                <div class="previews">
                    <?php foreach($images as $image) : ?>
                    <a href="#" class="selected" data-full="./public/uploads/<?=$image['name']?>">
                        <img src="./public/uploads/<?=$image['name']?>" alt="<?=$product['name']?>" width="90"/>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="full"><img src="./public/uploads/<?= !empty($product['image']) ? $product['image'] :'no-image.jpg'?>" /></div>
            </div>
            <div class="detail">
                <h1><?=$product['name']?></h1>
                <h2><?=number_format($product['price'])?> vnd</h2>
                <ul>
                    <li>SKU: <span><?=$product['sku']?></span></li>
                    <li>Infomation: <span><?=$product['description']?></span></li>
                    <li>Vendor: <span>Guess</span></li>
                </ul>
                <button>Thêm Sản Phẩm</button>
            </div>
        </div>
    </div>
</div>
<div style="clear: both"></div>

<div class="container">
    <div class="moreProduct">
        Sản Phẩm Liên Quan
    </div>
</div>
<?php  if(!empty($products)): ?>
    <list-product>
        <div class="container">
            <div class="__product">
                <?php  foreach($products as $product): ?>
                        <div class="item">
                            <div class="image">
                            <a href="index.php?controller=product&action=show&id=<?=$product['id']?>">
                                <?php  $productImage=!empty($product['image']) ? $product['image'] : 'no-image.jpg'  ?>
                                <img src="./public/uploads/<?=$productImage;?>" alt="<?=$product['name']?>">
                            </a>
                                <div class="function">
                                    <a href=""><i class="fal fa-heart"></i></a>
                                    <a href="index.php?controller=product&action=show&id=<?=$product['id']?>"><i class="fal fa-eye"></i></a>
                                    <a href=""><i class="fal fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <h1><?=$product['name']?></h1>
                            <h2>
                            <?php if(!empty($product['price_sale'])) : ?>
                                <s><?=number_format($product['price_sale']) ?? ''?> vnd</s>
                            <?php endif; ?>
                                <span><?=number_format($product['price'], 0)?? ''?> vnd</span>
                            </h2>
                        </div>
                <?php  endforeach;?>
            </div>
        </div>
    </list-product>
<?php else:  ?>
    <p align="center">Không có sản phẩm nào </p>
<?php endif; ?>