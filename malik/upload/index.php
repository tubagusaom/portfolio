<?php include "../config/master_koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malik - Upload</title>

    <meta name="description" content="Galeri Malik" />
    <meta name="keywords" content="Web, Developer, Programer, IT, Consultan IT, Consultan, website" />
    <meta name="author" content="terabyte" />

    <link rel="shortcut icon" href="../images/icon-malik.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../images/icon-malik.png">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="TeraByte | Malik" /> <!-- website name -->
    <meta property="og:site" content="https://terabytee.my.id/malik" /> <!-- website link -->
    <meta property="og:title" content="TeraByte | Malik"/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="Web Developer from INDONESIA" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="../images/icon-malik.png" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="https://terabytee.my.id/malik" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="../images/icon-malik.png"> <!-- to have large image post format in Twitter -->


    <link rel="stylesheet" href="../sass/vender/bootstrap.css">
    <link rel="stylesheet" href="../sass/vender/bootstrap.min.css">
    <link rel="stylesheet" href="../owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../sass/main.css">
    <!-- <link rel="stylesheet" href="../css/terabytee.css"> -->
</head>
<body>

    <div class="terabyte_page">


        <div class="profile_container">
            <div class="profile_info">
                <div class="cart">
                        <div class="img">
                          <a href="../">
                            <img src="../images/icon-malik.png" alt="">
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
            <div class="posts_profile" style="padding-top: 20px;">
                <div class="tab-content" id="pills-tabContent">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#create_modal">
                        <img src="../images/tab.png" style=" display: block;margin-left: auto;margin-right: auto;width: 20%;">
                        <span class="d-none d-lg-block " style="padding-top:15px;text-align:center;font-size:2em;color:#333;font-weight:bold;">UPLOAD</span>
                    </a>
                </div>
            </div>
        </div>
        
    </div>

    <!--Create model-->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                            id="exampleModalLabel">
                            <span class="title_create">Upload new</span>
                            <button class="next_btn_post btn_link"></button>
                        </h1>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="up_load" src="../images/upload.png" alt="upload">
                        <p>Drag photos or videos here</p>
                        <button class="btn btn-primary btn_upload">
                            select from your device
                            <form id="upload-form">
                                <!-- <input class="input_select" type="file" id="image-upload" name="image-upload"> -->
                                <input type="file" id="image-upload" name="image-upload" required>
                            </form>
                        </button>
                        
                        <!-- <div id="image-container" class="hide_img"></div>

                        <div id="image_description" class="hide_img">
                            <div class="img_p"></div>
                            <div class="description">
                                <div class="cart">
                                    <div>
                                        <div class="img">
                                            <img src="../images/profile_img.jpg">
                                        </div>
                                        <div class="info">
                                            <p class="name">Zineb_essoussi</p>
                                        </div>
                                    </div>
                                </div>
                                <form>
                                    <textarea type="text" id="emoji_create" placeholder="write your email"></textarea>
                                </form>
                            </div>
                        </div> -->
                        
                        <div class="post_published hide_img">
                            <img src="../images/uploaded_post.gif" alt="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <a href="" style="float:left">Simpan</a> -->
                         <button class="btn-block" type="submit">Save</button>
                    </div>

                </div>
            </div>
        </div>
        </form>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

        <!-- <script>
            function GFG_Fun() {
                if ($('#file')[0].files.length === 0) {
                    alert('no');
                } else {
                    alert('ok');
                }
            }
        </script> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="../owlcarousel/jquery.min.js"></script>
    <script src="../owlcarousel/owl.carousel.min.js"></script>
    <script src="../js/carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <!-- <script src="../js/terabytee.js"></script> -->
</body>

</html>
