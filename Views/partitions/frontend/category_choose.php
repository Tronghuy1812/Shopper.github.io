<category>
    <div class="container-fluid">
        <div class="row row-column">
            <?php foreach($categoryChoose as $categorys) :?>
                <div class="item" style="background: rgba(0,0,0,0.3) url(./public/uploads/<?= !empty($categorys['image']) ? $categorys['image'] : 'no-image.jpg'?>) no-repeat center; background-size: cover;">
                    <div class="info">
                        <p><?=$categorys['name']?></p>
                        <a href="index.php?controller=category&action=show&id=<?=$categorys['id']?>">Xem ngay <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</category>