<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.users._form',[
        'errors'    => $errors ?? [],
        'user'      => $user ?? []
    ]);
    view('partitions.backend.footer');
?>
