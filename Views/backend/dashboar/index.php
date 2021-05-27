<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.dashboar._detail',[
        'totalPrice' => $price_total ?? [],
        'totalUser'  => $totalUser ?? [],
        'totalOrder' => $totalOrder ?? [],
        'totalProduct'  => $totalProduct ?? [],
        'users'     => $users ??[],
        
        
    ]);
    view('partitions.backend.footer');

?>
