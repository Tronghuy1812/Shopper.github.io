<?php
    view('partitions.frontend.header',['menus'=>$menus ??[]]);
    view('frontend.carts._list', [
        'products' => $products ?? [] ,
    ]);
    view('partitions.frontend.footer');
?>
