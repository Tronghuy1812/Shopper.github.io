<?php
    view('partitions.frontend.header',['menus'=>$menus ??[]]);
    view('frontend.categories._detail',
    [
        'categoryName'  => $categoryName ,
        'products'      => $products ,
        'categories'    =>$categories
    ]);
    view('partitions.frontend.footer');