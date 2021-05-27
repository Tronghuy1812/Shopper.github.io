<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.orders._list',[
        'orders' => $orders ?? [],

    ]);
    view('partitions.backend.footer');
?>
