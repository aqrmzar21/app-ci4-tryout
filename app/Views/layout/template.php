<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <style>
    li:first-child {
      color: rgb(0, 181, 252);
      ;
      /* background-color: rgb(0, 181, 252); */
      /* background-color: yellow; */
      padding: 5px 1px;
      border-radius: 30px;
    }

    header {
      /* font-family: Verdana, sans-serif; */
      font-family: Ghaitsa;
      font-size: 15px;
      background-color: white;
      margin: 3px auto;
      /* padding: 0px 10em 0px 10em; */
      border-radius: 10px;
      /* border-bottom: 1px solid black; */
      box-shadow: 0px 3px 0.5px #aaa;
    }

    .kotak {
      width: 1000px;
      margin: 10px auto;
      /* border: 3px solid black; */
    }

    .kot3 {
      display: inline-block;
      /* background-color: aqua; */
      width: 20%;
      padding: 1em 5em;
      margin: auto;
    }

    .menu a {
      color: #aaa;
      text-decoration: none;
    }

    .menu a:hover {
      color: yellow;
      /* background-color: yellow; */
      background-color: rgb(0, 181, 252);
      padding: 2px 20px;
      border-radius: 30px;
      text-decoration: none;
    }

    .menu li {
      display: inline;
      list-style: none;
    }


    .kot6 {
      /* display: inline-block; */
      float: right;
      /* background-color: bisque; */
      width: 40%;
      margin: auto;
      padding: 1em 30px 1em 10px;
      /* text-align: right; */
    }

    .kotak-img {
      width: 18rem auto;
    }

    .c-shadow {
      text-shadow: 4em 4em 20em rgba(0, 0, 0, 0.5);
      /* Menambahkan bayangan */
    }

    .d-opacity {
      opacity: 0.1;
      /* Atur nilai opacity antara 0 (transparan) dan 1 (penuh) */
    }
  </style>
</head>

<body>
  <header>
    <div class="kotak">
      <div class="kot3">
        <p class="h5" style="color:rgb(0, 181, 252);">TokTok</p>
      </div>

      <div class="kot6">
        <ul class="menu">
          <!-- <li><a href="/">Home</a></li>
          <li><a href="/pages/contact">Service</a></li>
          <li><a href="/pages/about">About</a></li> -->
          <li><a href="<?= base_url('/'); ?>">Home</a></li>
          <li><a href="<?= base_url('/pages/contact'); ?>">Service</a></li>
          <li><a href="<?= base_url('/pages/about'); ?>">About</a></li>
        </ul>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <!-- <h2>INI HOME WORLD</h2> -->
      <?= $this->renderSection('content'); ?>

    </div>
  </main>

  <footer class="py-5">
    <div class="container-fluid">
      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>&copy; 2025 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter" />
              </svg></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram" />
              </svg></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#facebook" />
              </svg></a></li>
        </ul>
      </div>
    </div>
  </footer>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
  function previewImg() {

    const sampul = document.querySelector('#komik_sampul');
    const sampulLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    sampulLabel.textContent = sampul.files[0].name;

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
</script>

</html>