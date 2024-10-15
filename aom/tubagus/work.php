<html lang="en">

<head>

<style media="screen">
@media (max-width:420px){
  #br-tb{
    display: block;
  }

  #font-tb{
    font-size: 25px;
  }
}

@media (min-width:421px){
  #br-tb{
    display: none;
  }
}

.fancybox-thumb img{
  opacity: 0.6;
}
</style>

<title>Tubagus Aom</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../font/css/fontello.css" rel="stylesheet">
<!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" media="screen">
<link rel="shortcut icon" type="image/x-icon" href="../img/mini.png" />
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <a class="brand" href="index.html">
        <!-- <img src="img/user.jpg" alt=""> -->
      </a>
      <ul class="nav nav-collapse pull-left">
        <li><a href="?Profile=&copy;Tubagus.Aom"><i class="icon-user"></i> Profile</a></li> <br id="br-tb">
        <li><a href="?SkilLs=&copy;Tubagus.Aom"><i class="icon-trophy"></i> Skills</a></li> <br id="br-tb">
        <li><a href="?Work=&copy;Tubagus.Aom" class="active"><i class="icon-picture"></i> Work</a></li> <br id="br-tb">
        <li><a href="?Resume=&copy;Tubagus.Aom"><i class="icon-doc-text"></i> Resume</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>

<div class="container work" style="padding-bottom: 70px">
  <h2>My Work</h2>

  <?=require_once "project.php"?>

</div>

<?=require_once "footer.php"?>

<script src="../js/jquery-1.10.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script>
  $('#myModal').modal('hidden')
</script>

<script src="../js/jquery.fancybox.js?v=2.1.5"></script>

<script>
  $(document).ready(function () {
      $(".fancybox-thumb").fancybox({
          helpers: {
              title: {
                  type: 'inside'
              },
              overlay: {
                  css: {
                      'background': 'rgba(1,1,1,0.65)',
                      'opacity': '0.9'

                  }
              }
          }
      });
  });
</script>
</body>
</html>
