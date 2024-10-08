<?php
    // var_dump($konten); die();

    $this->load->view('templates/users/header');

    if($uri_segmen == 'jadwal_uji'){
        $this->load->view('templates/users/toolbar');
    }

    $this->load->view($konten);
    $this->load->view('templates/users/footer');
?>