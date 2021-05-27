<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.categories._from',[
        'errors' => $errors ?? [],
        'product' => $product ?? [],
    ]);
    view('partitions.backend.footer');
?>
