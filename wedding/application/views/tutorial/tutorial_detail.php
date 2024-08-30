<style>
/* Carousel Styles */
.carousel-indicators .active {
    background-color: #2980b9;
}

.carousel-inner img {
    width: 100%;
    max-height: 460px
}

.carousel-control {
    width: 0;
}

.carousel-control.left,
.carousel-control.right {
	opacity: 1;
	filter: alpha(opacity=100);
	background-image: none;
	background-repeat: no-repeat;
	text-shadow: none;
}

.carousel-control.left span {
	padding: 15px;
}

.carousel-control.right span {
	padding: 15px;
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-prev,
.carousel-control .icon-next {
	position: absolute;
	top: 45%;
	z-index: 5;
	display: inline-block;
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .icon-prev {
	left: 0;
}

.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next {
	right: 0;
}

.carousel-control.left span,
.carousel-control.right span {
	background-color: #000;
}

.carousel-control.left span:hover,
.carousel-control.right span:hover {
	opacity: .7;
	filter: alpha(opacity=70);
}

/* Carousel Header Styles */
.header-text {
    position: absolute;
    top: 20%;
    left: 1.8%;
    right: auto;
    width: 96.66666666666666%;
    color: #fff;
}

.header-text h2 {
    font-size: 40px;
}

.header-text h2 span {
    background-color: #2980b9;
	padding: 10px;
}

.header-text h3 span {
	background-color: #000;
	padding: 15px;
}

.btn-min-block {
    min-width: 170px;
    line-height: 26px;
}

.btn-theme {
    color: #fff;
    background-color: transparent;
    border: 2px solid #fff;
    margin-right: 15px;
}

.btn-theme:hover {
    color: #000;
    background-color: #fff;
    border-color: #fff;
}
.nav-sidebar {
    width: 100%;
    padding: 8px 0;
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
    border-radius: 0;
}
.nav-sidebar .active a {
    cursor: default;
    background-color: #428bca;
    color: #fff;
    text-shadow: 1px 1px 1px #666;
}
.nav-sidebar .active a:hover {
    background-color: #428bca;
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
}
.box-categories .fa-ul > li > * {
    line-height: inherit;
    margin: 0;
}
.nopaddingx,.nopadding {
   padding: 2px !important;
   margin: 0 !important;
}
</style>

<section class="page-header">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <ul class="breadcrumb">
                  <li><a href="<?=base_url()?>">Home</a></li>
                  <li class="active">Download Area</li>
              </ul>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <h1>DOWNLOAD AREA</h1>
              </div>
          </div>
      </div>
</section>
<section class="main-container">

    <div id="mainContent" >
        <div class="headerContent" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="background-color: white;padding-bottom: 20px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px">


                                      <h2><?=$rows[0]->title ?></h2>
                                      <?php if($rows[0]->image_description != ""){
                                      ?>
                                      <p><img class="img-thumbnail" src="<?=base_url().'assets/files/tutorial/'.$rows[0]->image_description ?>"></p>
                                      <?php
                                      }
                                      ?>
                                      <p><?=$rows[0]->description ?></p>
                                      <?php
                                          if($rows[0]->link_download != ""){
                                      ?>
                                      <a target="_blank" class="btn btn-success btn-sm" href="<?=$rows[0]->link_download ?>">
                                          <i class="fa fa-file-text-o"></i>
                                             Download Manual
                                      </a>
                                      <?php } ?>
                                      <?php
                                          if($rows[0]->link_video != ""){
                                      ?>
                                      <a target="_blank" class="btn btn-success btn-sm" href="<?=$rows[0]->link_video ?>">
                                          <i class="fa fa-youtube-play"></i>
                                             Video Tutorial
                                      </a>
                                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
