<?php include "config/master_koneksi.php"; ?>

<!DOCTYPE html>
<html id="terabytee" lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malik</title>

    <!-- <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'> -->

    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->

    <meta name="language" content="in,en" />
    <meta name="crawler" content="" />
    <meta name="googlebot" content="index,follow" />
    <meta name="robots" content="index,follow" />

    <meta name="description" content="Galeri Malik" />
    <meta name="keywords" content="Web, Developer, Programer, IT, Consultan IT, Consultan, website" />
    <meta name="author" content="terabyte" />

    <link rel="shortcut icon" href="images/icon-malik.png" type="image/x-icon" />
    <link rel="shortcut icon" href="images/icon-malik.png">
    <!-- <link rel="apple-touch-icon" href="images/icon-malik.png"> -->
    

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="Malik | Galeri" /> <!-- website name -->
    <meta property="og:site" content="https://terabytee.my.id/malik" /> <!-- website link -->
    <meta property="og:title" content="Malik | Galeri"/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="Galeri Malik" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="https://terabytee.my.id/malik/images/icon-malik.png" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="https://terabytee.my.id/malik" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="https://terabytee.my.id/malik/images/icon-malik.png"> <!-- to have large image post format in Twitter -->


    <link rel="stylesheet" href="sass/vender/bootstrap.css">
    <link rel="stylesheet" href="sass/vender/bootstrap.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <link rel="stylesheet" href="sass/main.css">
    <link rel="stylesheet" href="css/terabytee.css">

    <style>

        </style>
</head>
<body>

    <div class="terabyte_page">


        <div class="profile_container">
            <div class="profile_info">
                <div class="cart">
                        <div class="img">
                          <!-- <a href="./"> -->
                          <a id="profil-malik" href="javascript:void(0)">
                            <img src="./images/icon-malik.png" alt="">
                          </a>
                        </div>
                        <div class="info">
                            <p class="name">
                                MALIK
                                <!-- <button class="edit_profile">
                                    Edit profile
                                </button> -->
                            </p>
                            <!-- <div class="general_info">
                                <p><span>1</span> post</p>
                                <p><span>177</span> followers</p>
                                <p><span>137</span> following</p>
                            </div> -->
                            <p class="nick_name">طأبأجأص مألإك صأمأ وإجأيأ</p>
                            <p class="desc">
                                Aku anak solehnya abah sama ibu :)
                            </p>
                        </div>
                </div>
            </div>
            <div class="highlights">
                <!-- <div class="highlight">
                    <div class="img">
                        <img src="./images/profile_img.jpg" alt="">
                    </div>
                    <p>conseils</p>
                </div>
                <div class="highlight highlight_add">
                    <div class="img">
                        <img src="./images/plus.png" alt="">
                    </div>
                    <p>New</p>
                </div> -->
            </div>
            <hr>
            <div class="posts_profile">
                <ul class="nav-pills w-100 d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item mx-2" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            <img src="./images/upload.png" alt="posts">
                            Photo
                        </button>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <img src="./images/video.png" alt="saved posts">
                        Video
                      </button>
                    </li>
                    <!-- <li class="nav-item mx-2" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <img src="./images/tagged.png" alt="tagged posts">
                        TAGGED
                      </button>
                    </li> -->
                  </ul>

                <div class="tab-content" id="pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div id="posts_sec" class="post">

                            <?php
                                $sql_f	     ="SELECT `id`, `name_file`, `jenis_file`, `size_file`, `ext_file` FROM files WHERE jenis_file = '1' ORDER BY id desc";
                                $query_f	 =mysqli_query($koneksi,$sql_f);
                                while($data_f=mysqli_fetch_array($query_f)) {
                            ?>

                            <div class="item">
                                <img id="myImg" class="img-fluid item_img" src="./assets/m-image/<?=$data_f[1]?>" alt="">
                            </div>

                            <?php } ?>
                        </div>
                    </div>

                    <style>
                        .load_test{
                            color: red;
                        }
                    </style>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div id="saved_sec" class="post">
                            <!-- <div class="video-container" src="./video/1.mp4">
                                <video class="video-fluid item_img" src="./video/1.mp4"></video>
                                <div class="caption"><img src="./images/video.png"></div>
                            </div> -->

                            <?php
                                $sql_v	      ="SELECT `id`, `name_file`, `jenis_file`, `size_file`, `ext_file` FROM files WHERE jenis_file = '2' ORDER BY id desc";
                                $query_v      =mysqli_query($koneksi,$sql_v);
                                while($data_v =mysqli_fetch_array($query_v)) {
                            ?>

                            <style>
                                .video-fluid {
                                    background-image: url('https://terabytee.my.id/malik/images/play_malik.png');
                                    background-position: center;
                                    background-size: 66px!important;
                                    background-repeat: no-repeat;
                                    background-color: transparent;
                                }
                            </style>

                            <div class="item">
                                <!-- <video class="video-fluid item_img" src="./assets/m-video/<?=$data_v[1]?>" poster="./images/icon_play.png"></video> -->
                                <video class="video-fluid item_img" src="./assets/m-video/<?=$data_v[1]?>" ></video>
                            </div>

                            <?php } ?>

                            <!-- <div class="item">
                                <video class="video-fluid item_img" src="./video/6.mp4"></video>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div id="tagged" class="post">
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/Zhc5hHp/account4.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/SPTNbJL/account5.jpg" alt="">
                            </div>
                        </div>
                    </div> -->


                  </div>
            </div>
        </div>




    </div>

    <!-- <div id="myModalprofil" id="modal1" class="modal">
        <span class="close" 
              onclick="closeModal('modal1')">
          &times;
          </span>
        <img src=
"https://terabytee.my.id/malik/assets/m-image/1497210206_IMG-20240611-WA0001.jpg" 
             alt="HTML"
             class="modal-content">
             <div id="divclickprofil"></div>
    </div> -->

    <style>
        
    </style>

    <div id="myModalprofil" class="modal">
        
        <span class="close closeprofil" id="closeprofil"></span>
        
        <img class="modal-content" src="https://terabytee.my.id/malik/assets/m-image/1497210206_IMG-20240611-WA0001.jpg">

        <div id="caption">HELLO I'M MALIK</div>
        <div id="divclickprofil"></div>
    </div>

    <!-- The Modal profil -->
    <!-- <div id="myModalprofil" class="modal">
        
        <span class="close closeprofil" id="closeprofil"></span>
        
        <img class="modal-content" src="./images/icon-malik.png" style="width: 50%;height: auto;border-radius: 100%;">

        <div id="caption">HELLO I'M MALIK</div>
        <div id="divclickprofil"></div>
    </div> -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="close closeimg" id="closeimg">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <!-- <div id="caption"></div> -->
        <div id="divclickimg"></div>
    </div>

    <!-- The Modal video -->
    <div id="myModalvideo" class="modal">
        <div id="divclickvideo"></div>

        <!-- The Close Button -->
        <span class="close closevideo" id="closevideo">&times;</span>

        <!-- Modal Content (The video) -->
        <video class="modal-content" id="video01" autoplay loop></video>

        <!-- Modal Caption (Image Text) -->
        <!-- <div id="caption"></div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="./owlcarousel/jquery.min.js"></script>
    <script src="./owlcarousel/owl.carousel.min.js"></script>
    <script src="./js/carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/terabytee.js"></script>
</body>

</html>
