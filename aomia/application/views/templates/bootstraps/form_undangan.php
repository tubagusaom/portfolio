<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Undangan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=base_url()?>_assets/img/demos/wedding/foto/icon-aom-mia.png" type="image/x-icon" />
  <link rel="apple-touch-icon" href="<?=base_url().'_assets/img/demos/wedding/foto/icon-aom-mia.png'?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background:whitesmoke">

<div class="container">
  <h2>Form undangan</h2>
  <p>Input nama tamu undangan untuk mengundang & input nama pasangannya (Jika ada), <br> Nah klo udah klik tombol copy link ya :)</p><br>
  <form>
    <div class="form-group">
      <label for="usr">Tamu Undangan:</label>
      <input type="text" class="form-control" id="tamu1">
    </div>
    <div class="form-group">
      <label for="pwd">Bersama:</label>
      <input type="text" class="form-control" value="Pasangan" id="tamu2">
    </div>
  </form>
</div>

</body>
</html>
