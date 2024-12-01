<!doctype html>
<html lang="en">
<head>
  <style>
    body, html {
      margin: 0;
      padding: 0;
    }

    /* Footer styles */
    footer {
      color: white;
      width: 100%;
      background-color:navy; /* Adjust color as needed */
      padding: 20px 0;
      position: relative; /* 'relative' if you want it at the end, 'fixed' if always visible */
    }

    .info_section {
      padding: 40px 0;
      width: 100%;
    }

    .info_section .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .info_col h4 {
      color: white;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .info_col p, .info_col a {
      color: #b0c4de;
      font-size: 15px;
      text-decoration: none;
    }

    .info_links a {
      display: block;
      margin-bottom: 10px;
    }

    .info_links a:hover {
      color: #87ceeb;
    }

    /* Subscribe button styling */
    .info_col form input[type="text"] {
      padding: 8px;
      width: 80%;
      margin-right: 5px;
      border: 1px solid #ddd;
      border-radius: 3px;
    }

    .info_col form button {
      padding: 8px 15px;
      background-color: #00bfff;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .info_col form button:hover {
      background-color:aqua;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ryxx Billiard Shop Footer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Footer Section -->
<footer>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>Address</h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>Jl.7Sea No.1 Kongo</span>
              </a>
              <br>
              <a href="https://wa.link/ui6tge">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>Call +6281521683112</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>Info</h4>
            <p>Web ini di kerjakan dengan penuh semangat!</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>Links</h4>
            <div class="info_links">
              <a class="active" href="Beranda">Beranda</a>
              <a class="active" href="Coffe">Stick</a>
              <a class="active" href="Noncoffe">Chalk</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <h4>Subscribe</h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
