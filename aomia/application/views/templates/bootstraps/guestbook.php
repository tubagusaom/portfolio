<style media="screen">
.pagination a {
  color: black;
  float: left;
  padding-right: 16px;
  text-decoration: none;
  transition: background-color .3s;
}

/* .pagination a.active {
background-color: dodgerblue;
color: white;
} */

.data-ucapan::-webkit-scrollbar {
  width: 7px;
}
.data-ucapan::-webkit-scrollbar-track {
  border-radius: 10px;
  box-shadow: inset 0 0 6px #935317;
}

.data-ucapan::-webkit-scrollbar-thumb {
  background-color: #65360b;
  outline: 1px solid slategrey;
  border-radius: 10px;
}

.data-ucapan {
  overflow-x: hidden;
  overflow-y: auto;

  height:273px!important;
  /* height:293px!important; */
  margin-top: 5px;
  /* overflow:scroll; */
}

</style>

<!-- <section class="section section-overlay custom-overlay-1 m-none pb-xlg" id="guestbook"> -->
<section class="parallax section section-parallax section-center m-none" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?=base_url()?>_assets/img/demos/wedding/guestbook/untitled_22.jpeg" style="width:100%;background-repeat: no-repeat;">
  <div class="container" id="guestbook">
    <div class="row center mt-xlg">
      <div class="col-md-12">
        <h2 class="tb-belanda custom-font-size-1 text-color-primary">
          <b>Buku Tamu</b>
        </h2>

        <div class="text-color-primary" style=""> Berikan Ucapan atau Do’a </div> <br>

        <font class="">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kami. <br>
          Atas kehadiran serta doa restu, kami ucapkan terima kasih.
        </font>
      </div>
    </div>

    <div class="row mb-xlg">
      <div class="col-md-6 mt-xlg tb-quicksand">
        <form id="guestbookSendMessage" action="<?=base_url()?>welcome/upload_ajax" method="POST" class="bgmesage background-color-light p-lg">
          <div class="form-content">

            <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">

              <div class="form-control-custom mt-md">
                <input type="hidden" name="idPengunjung" value="<?=count($arraydata)+1?>" id="idPengunjung">
                <input type="text" class="form-control p-none" name="guestbookName" placeholder="Isikan Nama Anda*" data-msg-required="Masukan Nama." id="guestbookName" required="" />
              </div>
              <!-- <div class="form-control-custom mt-md">
                <input type="email" class="form-control p-none" name="guestbookEmail" placeholder="Email*" data-msg-required="Masukan Email." id="guestbookEmail" required="" />
              </div> -->
              <div class="form-control-custom mt-md">
                <textarea class="form-control p-none" name="guestbookMessage" placeholder="Tulis Ucapan & Do'a*" data-msg-required="Isi Pesan." id="guestbookMessage" required=""></textarea>
              </div>

              <div class="form-control-custom mt-md">
                <select class="form-control p-none" name="guestbookConfirm" id="guestbookConfirm" style="border-color: transparent transparent #b5b5b5 transparent;" required="" data-msg-required="Silahkan Konfirmasi Kehadiran.">
                  <option value="0" selected>Konfirmasi Kehadiran</option>
                  <option value="1">Hadir</option>
                  <option value="2">Tidak Hadir</option>
                </select>
              </div>
            </div>

            <div class="alert alert-success hidden alert-dismissible mt-lg col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2" id="guestBookSuccess">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Terkirim!</strong> Terima kasih atas doanya.
            </div>

            <div class="alert alert-error hidden mt-lg col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2" id="guestBookError">
              <strong>Terkirim!</strong> terimakasih atas doa nya ;).
              <span class="font-size-xs mt-sm display-block" id="guestBookErrorMessage"></span>
            </div>

            <!-- <input type="submit" class="btn btn-tb-wishes custom-border-radius font-size-md text-uppercase text-color-light outline-none p-sm pl-xlg pr-xlg m-auto mb-xlg mt-xlg" value="Kirim Ucapan" /> -->
            <button type="submit" class="btn btn-tb-wishes custom-border-radius font-size-md text-uppercase text-color-light outline-none p-sm pl-xlg pr-xlg m-auto mb-xlg mt-xlg" name="kirim_ucapan">
              <span>Kirim Ucapan</span>
              <i class="fa fa-comments-o"></i>
            </button>
          </div>

          <div class="custom-inner-border"></div>
        </form>
      </div>

      <div class="col-md-6 gb-tb tb-quicksand">
        <div class="bgboxmsg guestbook-messages gm-tb pb-sm">
          <div class="owl-carousel owl-theme nav-bottom rounded-nav mb-none" data-plugin-options="{'items': 1, 'loop': false, 'dots': false, 'nav': true}">

            <?php
              $counter = 1;
              $totaldata = count($arraydata);


              // foreach (array_slice($arraydata, 0, 3) as $key => $value) {
              // foreach ($arraydata as $keyx => $valuex) {
            // foreach (($arraydata) as $key => $value) {
            // foreach ($arraydata->parent()->children() as $key => $value){

               // for ($i = 0, reset($arraydata); list($key,$value) = each($arraydata) && $i < 2; $i++) {
                  // for ($i=0; $i< $totaldata; $i++ ) {
                    // if(($i+1)<=3){
                      // break;
            ?>

            <div id="divDoa">
            <div class="data-ucapan col-md-12 testimonial testimonial-style-3">
              <!-- <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
              </blockquote>
              <div class="testimonial-arrow-down"></div> -->

                <?php
                  // foreach (array_slice($arraydata, 0, 3) as $key => $value) {
                   foreach (($arraydata) as $key => $value) {
                ?>

                  <div class="testimonial-author">
                    <div class="testimonial-author-thumbnail">
                      <img src="<?=base_url()?>assets/img/icon-chat-bg.png" class="img-responsive img-circle" style="-webkit-transform: scaleX(-1);transform: scaleX(-1);" alt="">
                    </div>
                    <p>
                      <span>
                        <b class="text-color-primary" style="font-size:14px;">
                          <!-- <?=$value["id"].'<br>'?> -->
                          <?=$value["name"]?> &nbsp
                        </b>

                        <?php
                          $confirm = $value["confirm"];

                          if ($confirm == 1) {
                            $view_confirm = "Hadir";
                            $bg_confirm = "#935317";
                            $bg_color = "#fff";
                          }elseif ($confirm == 2) {
                            $view_confirm =  "Tidak Hadir";
                            $bg_confirm = "#935317";
                            $bg_color = "#fff";
                          }else {
                            $view_confirm =  "<b>.......</b>";
                            $bg_confirm = "#bbb";
                            $bg_color = "#333";
                          }
                        ?>
                        <font style="background:<?=$bg_confirm?>;color:<?=$bg_color?>!important;padding:1.5px 5px 1.5px 5px;border:1px solid #777;border-radius:5px;">
                          <?=
                            $view_confirm
                          ?>
                        </font>
                      </span>
                      <span>
                        <i class="fa fa-clock-o"></i>
                        <!-- 1 hari, 6 jam yang lalu -->
                        <?=$value["datetime"];?>
                      </span>
                      <span style="font-weight:700;">
                        <?=$value["message"]?>
                      </span>
                    </p>
                  </div>
                  <?php
                      // if ($counter++ == 3) break;
                    }
                  ?>

              </div>

              <!-- <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a class="active" href="#"><?php print_r($totaldata); ?></a>
                <a href="#">&raquo;</a>
              </div> -->

              </div>

              <?php
                  // if ($counter++ == 3) continue;
                // }
              ?>




            </div>
          <div class="custom-inner-border"></div>
        </div>
      </div>

      <div class=" col-md-12 mt-xlg tb-quicksand">
        <div class="bgdoa guestbook-messages background-color-light">
          <div class="owl-carousel owl-theme nav-bottom rounded-nav" data-plugin-options="{'items': 1, 'loop': false, 'dots': false, 'nav': true}">
            <div>
              <div class="testimonial testimonial-style-2 testimonial-with-quotes custom-wedding-quotes mb-none mt-xlg pt-xlg pl-xlg pr-xlg">
                <blockquote>
                  <p class="font-weight-normal custom-text-color-1 font-size-lg mb-xlg pb-xlg">Dan segala sesuatu kami jadikan berpasang-pasangan, supaya kamu mengingat kebesaran Allah.</p>
                </blockquote>
                <div class="testimonial-author mt-xlg mb-xlg pb-lg">
                  <p class="text-uppercase">
                    <strong class="custom-text-color-2">(QS. Adz Dzariyaat (51) : 49)</strong>
                  </p>
                </div>
              </div>
            </div>

            <div>
              <div class="testimonial testimonial-style-2 testimonial-with-quotes custom-wedding-quotes mb-none mt-xlg pt-xlg pl-xlg pr-xlg">
                <blockquote>
                  <p class="font-weight-normal custom-text-color-1 font-size-lg mb-xlg">
                    Anjuran-anjuran Rasulullah untuk Menikah: Rasulullah SAW bersabda: "Nikah itu sunnahku, barangsiapa yang tidak suka, bukan golonganku!
                  </p>
                </blockquote>
                <div class="testimonial-author mt-xlg mb-xlg pb-lg">
                  <p class="text-uppercase">
                    <strong class="custom-text-color-2">
                      (HR. Ibnu Majah, dari Aisyah r.a.)
                    </strong>
                  </p>
                </div>
              </div>
            </div>

          </div>
          <div class="custom-inner-border"></div>
        </div>
      </div>

    </div>
  </div>

  <br> <br>

  <div class="container mt-lg mb-xlg">
    <div class="row">
      <div class="col-md-12 center">
        <p class="tb-quicksand" style="line-height:30px;">
          Terimakasih atas doa restunya <br>
          <font style="font-size:28px;">وَالسَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</font>

        </p>
        <!-- <h2 class="text-name-tb-nobold custom-font-size-tb-1">
          <b>Aom</b> <font>&</font> <b>Mia</b>
        </h2> -->

        <i class="icontb-aomia2 icon-aomia2 text-color-primary"></i>
      </div>
    </div>
  </div> <br> <br> <br> <br>
</section>
