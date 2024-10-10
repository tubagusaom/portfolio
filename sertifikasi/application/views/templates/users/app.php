<?php
    // var_dump($datagrid); die();

    $this->load->view('templates/users/header');

    if($uri_segmen == $uri_segmen){
        $this->load->view('templates/users/data/datagrid',$datagrid);
    }

    // $this->load->view($konten);
    $this->load->view('templates/users/footer');
?>