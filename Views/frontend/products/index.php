<list-product>
    <div class="container">
        <div class="titlePrimary">
            Top month Sellers
        </div>
    <!-- tìm kiếm -->
        <?php view('partitions.frontend.filter',[
            'categories' =>$categories ?? []
        ]); ?>
        <?php if(!empty($products)) : ?>
        <div class="__product">
            <?php foreach($products as $producItem) :?>
                <div class="item">
                    <div class="image">
                        <a href="index.php?controller=product&action=show&id=<?=$producItem['id']?>">
                            <?php  $productImage=!empty($producItem['image']) ? $producItem['image'] : 'no-image.jpg'  ?>
                            <img src="./public/uploads/<?=$productImage;?>" alt="<?=$producItem['name']?>">
                        </a>
                        <div class="function">
                            <a href=""><i class="fal fa-heart"></i></a>
                            <a href="index.php?controller=product&action=show&id=<?=$producItem['id']?>"><i class="fal fa-eye"></i></a>
                            <a href="index.php?controller=cart&action=store&id=<?=$producItem['id']?>"><i class="fal fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <h1><?=$producItem['name']?></h1>
                    <h2>
                        <?php if(!empty($producItem['price_sale'])) : ?>
                            <s><?=number_format($producItem['price_sale']) ?? ''?> vnd</s>
                        <?php endif; ?>
                            <span><?=number_format($producItem['price'], 0)?? ''?> vnd</span>
                    </h2>
                </div>
            <?php endforeach;?>
        </div>
        <?php else :?>
            <br>
            <p align="center">Không tìm thấy sản phẩm nào !</p>
        <?php endif;?>
        
    </div>
</list-product>