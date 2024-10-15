<?php include "home/model/config/login.php"; ?>

<head>
  <meta charset="UTF-8">
  <title>Company Name - Login</title>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <link href="home/images/logokoperasi_transparent_k.png" rel="icon" type="image/png" />
  <link rel="stylesheet" href="home/css/reset-login.css">
  <link rel="stylesheet" href="home/images/login.css">

</head>

<body>
  <div class="login_form">
    <section class="login-wrapper">

      <form id="login" method="post" action="#">
        <div class="logo">
          <!-- <h1>
            Koperasi<font style="color:#138ac9;"> OBS</font>
          </h1> -->
          <h1 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;"> Accounting </h1>
          <div class="sublogo" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Company Name</div>
        </div>

        <label for="username" style="color:#2fb0f4;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">User Name</label>
        <input required id="username" name="username" type="text" autocapitalize="off" autocorrect="off" oninvalid="this.setCustomValidity('Masukan Username')" oninput="setCustomValidity('')"/>

        <label for="password" style="color:#2fb0f4;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Password</label>
        <input required id="password" name="password" type="password" oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')"/>

        <button id="submit" type="submit" name="login">
          <font style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;"> Sign In </font>
        </button>
      </form>

    </section>
  </div>
</body>
<!-- terabyte -->
