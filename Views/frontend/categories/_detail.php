<list-product>
    <div class="container">
        <div class="titlePrimary">
            <?=$categoryName['name']?>
        </div>
        <?php view('partitions.frontend.filter',[
            'categories' =>$categories ?? [],
        ]); ?>
        <?php  if(!empty($products)):?>
        <div class="__product">
            <?php  foreach($products as $product): ?>
                    <div class="item">
                        <div class="image">
                        <a href="index.php?controller=product&action=show&id=<?=$product['id']?>">
                            <?php 
                                $productImage=!empty($product['image']) ? $product['image'] : 'no-image.jpg'  ?>
                                <img src="./public/uploads/<?=$productImage;?>" alt="<?=$product['name']?>">
                        </a>
                            <div class="function">
                                <a href=""><i class="fal fa-heart"></i></a>
                                <a href="index.php?controller=product&action=show&id=<?=$product['id']?>"><i class="fal fa-eye"></i></a>
                                <a href="index.php?controller=cart&action=store&id=<?=$product['id']?>"><i class="fal fa-shopping-cart"></i></a>
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
        <?php else : ?>
            <p align="center">Không có sản phẩm nào </p>
        <?php endif; ?>
    </div>
</list-product>
