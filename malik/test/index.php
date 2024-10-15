<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Background</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Roboto&display=swap"
      rel="stylesheet"
    />

    <style>
        *,
        ::before,
        ::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        }

        body {
        font-family: Playfair Display, sans-serif;
        background: #f1f1f1;
        }

        .home {
        height: 100vh;
        position: relative;
        }

        video {
        object-fit: cover;
        position: absolute;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 1;
        }

        .overlay {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 2;
        background: rgba(0,0,0,0.6);
        }

        .home-content {
        width: 600px;
        margin: 0 auto;
        position: relative;
        top: 150px;
        color: #fff;
        z-index: 3;
        }

        .home-content h1 {
        font-family: Playfair Display, serif;
        text-align: center;
        text-transform: uppercase;
        font-size: 85px;
        line-height: 1.1;
        }

        .middle-line {
        height: 200px;
        width: 2px;
        background: #fff;
        margin: 40px auto;
        }

        .home-content button {
        display: block;
        font-size: 20px;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        background: transparent;
        color: #fff;
        margin: 50px auto 0;
        padding: 16px 30px;
        cursor: pointer;
        }
    </style>
  </head>

<body>
    <div class="home">
        <video autoplay muted loop>
            <source src="../video/7.mp4" type="video/mp4" />
        </video>
    </div>

    <div class="overlay"></div>
    <div class="home-content">
        <h1>High-End Kitchen.</h1>
        <div class="middle-line"></div>
        <button>DISCOVER</button>
    </div>
</body>

</html> 