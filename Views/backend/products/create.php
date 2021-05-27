<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.products._form',[
        'categories' => $categories ?? [],
        'errors'     => $errors ?? [],
        'product'    => $product ?? [],
    ]);
    view('partitions.backend.footer');
?>
