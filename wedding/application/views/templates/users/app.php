<?php
    // var_dump($konten); die();

    $this->load->view('templates/users/header');

    if($uri_segmen == $controller){

        $this->load->view('templates/users/toolbar', array('toolbar' => $grid['toolbar']));
        
    }

    $this->load->view($konten);
    $this->load->view('templates/users/footer');
?>

