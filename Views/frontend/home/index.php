<?php
    view('partitions.frontend.header',['menus'=>$menus ?? []]);
    view('partitions.frontend.category_choose',['categoryChoose'=>$categoryChoose ??[]]);
    view('partitions.frontend.shipping');
    view('frontend.products.index',[
        'products'   => $products ??[] ,
        'categories' => $categories ?? [],   
    ]);
    // view('partitions.frontend.new');
    view('partitions.frontend.footer');

?>