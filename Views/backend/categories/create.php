<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
    view('backend.categories._from',[
        'errors' => $errors ?? [],
      
    ]);
    view('partitions.backend.footer');
?>
