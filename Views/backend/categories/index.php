<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.categories._list',[
        'categories' => $categories,
    ]);
    view('partitions.backend.footer');
?>
