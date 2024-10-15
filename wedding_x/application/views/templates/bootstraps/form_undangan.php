<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Undangan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=base_url()?>_assets/img/terabyte_icon.png" type="image/x-icon" />
  <link rel="apple-touch-icon" href="<?=base_url()?>_assets/img/terabyte_icon.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?=base_url()?>_assets/vendor/font-awesome/css/font-awesome.min.css">
</head>
<body style="background:whitesmoke">

<div class="container">
  <h2>Form undangan</h2>
  <p>Input nama tamu undangan untuk mengundang & input nama pasangannya (Kalo ada), <br> Nah , klo udah klik tombol copy link ya ;)</p><br>
  <form>
    <div class="form-group">
      <label for="usr">Tamu Undangan:</label>
      <input type="hidden" id="urlbase" value="<?php echo base_url() ?>putri-moses">
      <input type="text" id="tamusatu" class="form-control" placeholder="Nama">
    </div>
    <div class="form-group">
      <label for="pwd">Nama Pasangan :</label>
      <input type="text" id="tamu2dua" class="form-control" placeholder="Suami / Istri">
      <input type="hidden" id="dataoutput">
    </div>

    <div class="form-group">

      <button onclick="copyLink()" type="button" class="btn btn-primary btn-block" name="button">
        <span>copy link</span>
        <i class="fa fa-clipboard"></i>
      </button>
    </div>

    
  </form>
</div>

<script src="<?=base_url('assets/js/sweetalert.js')?>"></script>
<script>

  function copyLink() {

    var baseUrl   = document.getElementById('urlbase').value;
    var datas     = document.getElementById('tamusatu').value;
    var datad     = document.getElementById('tamu2dua').value;

    if(!datad){
      var dataPasangan =  '';
    }else{
      var dataPasangan =  '-' + datad;
    }

    var outPut = document.getElementById('dataoutput').value = baseUrl + '/' + datas + dataPasangan;
    outPut=outPut.replace(/ /g,"%20");
    // outPut.replace(" ", "%20");

    // alert(outPut);
    navigator.clipboard.writeText(outPut);

    // outPut.type = 'text';
    // // urlBase.select();    // Selects the text inside the input
    // outPut.clone();
    // document.execCommand('copy');    // Simply copies the selected text to clipboard
    // // outPut.type = 'hidden';
    Swal.fire({         //displays a pop up with sweetalert
      icon: 'success',
      title: 'Link berhasil di copy',
      showConfirmButton: false,
      timer: 1000
    });


  }

</script>

</body>
</html>
