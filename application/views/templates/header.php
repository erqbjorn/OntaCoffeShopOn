<!doctype html>
<html lang="en">
  <style>

    body{
      margin: 0;
      padding: 0;
      background-image: url('assets/images/BG.png');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
    }


  </style>
  <head>
    <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="assets/images/Onta2.png" type="">

  <title> OntaCoffeShop </title>
  

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="assets/dist/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="assets/dist/css/font-awesome.min.css" rel="stylesheet" />
  
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Custom styles for this template -->
  <link href="assets/dist/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/dist/css/responsive.css" rel="stylesheet" />
  

</head>
<nav class="navbar fi navbar-expand-lg custom_nav-container">
  <div class="container-fluid">
    <a class="navbar-brand" href="beranda">
      <img src="assets/images/Onta2.png" height="70" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""> </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>Beranda">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>Coffe">Coffe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>Noncoffe">Non-Coffe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>keranjang">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>