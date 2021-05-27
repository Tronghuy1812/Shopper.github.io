<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.users._list',[
        'users' => $users ?? [],
    ]);
    view('partitions.backend.footer');
?>
