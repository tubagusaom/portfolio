<nav class="nav-tb">
  <div class="burger">
    <div class="burger__patty"></div>
  </div>

  <ul class="nav__list">
    <li class="nav__item">
      <a href="javascript:void(0)" class="nav__link c-primary" menuid-tb="header_top">
        <!-- <i class="fa fa-home"></i> -->
        <i class="icontb-aomia1 icon-aomia1 c-primary"></i>
        <!-- <img class="menu__imgtb" src="<?=base_url()?>_assets/img/demos/wedding/foto/aomia1.png" alt=""> -->
        <!-- <span class="c-blue">Home</span> -->
      </a>
    </li>

    <li class="nav__item">
      <a href="javascript:void(0)" class="nav__link c-blue" menuid-tb="couple">
        <i class="fa fa-heartbeat"></i>
        <!-- <i class="fa fa-female"></i> -->
        <span class="c-blue">Mempelai</span>
      </a>
    </li>

    <li class="nav__item">
      <a href="javascript:void(0)" class="nav__link c-yellow scrolly" menuid-tb="thewedding">
        <i class="fa fa-calendar-check-o"></i>
        <span class="c-yellow">Acara</span>
      </a>
    </li>

    <li class="nav__item">
      <a href="javascript:void(0)" onclick="menuGalery()" class="nav__link c-red" menuid-tb="photos">
        <i class="fa fa-picture-o"></i>
        <span class="c-red">Galeri</span>

        <!-- <i class="fa fa-gift"></i>
        <span class="c-red">Kado</span> -->
      </a>
    </li>

    <li class="nav__item">
      <a href="javascript:void(0)" class="nav__link c-green" menuid-tb="guestbook">
        <i class="fa fa-book"></i>
        <span class="c-green">Buku Tamu</span>
      </a>
    </li>

    <!-- <li>
      <a href="javascript:void(0);" style="font-size:15px;" class="menulogin"  id="login-btn" data-toggle="modal" data-target="#myModal" title="Login / Masuk">
        <i class="fa fa-sign-in"></i>
        <span class=""> Masuk </span>
      </a>
    </li> -->

  </ul>
</nav>

<!-- <a href="http://aom.my.id" class="logo" target="_blank">
 <img class="logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/ettrics-logo.svg" alt="" />
</a> -->

<!-- <button type="button" class="btn btn-default mr-xs mb-sm">xxx</button> -->



<script type="text/javascript">


// const menuGalery = document.getElementById('menuGalery')

function menuGalery() {

  // swal.firex({
  //  imageUrl: base_url + "_assets/img/demos/wedding/foto/icon-aom-mia.png",
  //  imageAlt: "Custom image",
  //  showConfirmButton: false,
  //
  //  showCloseButton: true,
  //
  //  showCancelButton: true,
  //  cancelButtonText: "Confirm me!",
  //
  //  animation: true,
  //
  //  type: "success"
  // }).then(function() {
  //    window.location = "#confirm";
  // });


  Swal.fire({
        // title: "Sweet!",
        // text: "Modal with a custom image.",
        imageUrl: base_url + "_assets/img/icon6.transparent.png",
        // imageWidth: 400,
        // imageHeight: 200,
        imageAlt: "Custom image",

        showCancelButton: true,
        cancelButtonText: "Confirm !",

        animation: true,
        showCloseButton: true,

        // footer: '<a href="javascript:void(0)" onclick="myFunction()" menuid-tb="gift" style="background:#757575;color:#fff;border-radius:4px;" class="btn mr-xs mb-sm">Confirm !</a>',

        showConfirmButton: false
        // confirmButtonText:
        //   '<i class="fa fa-thumbs-up"></i> Great!',
        // confirmButtonAriaLabel: 'Thumbs up, great!',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'

    }).then(function() {
       // window.location = "#xxx";
       // window.open = "http://www.google.com";

       document.getElementById('gift').scrollIntoView();
    });

}

</script>
