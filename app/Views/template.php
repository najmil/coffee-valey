<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Header</title>
      <style>
          header {
              background-color: #333;
              color: white;
              padding: 10px;
              text-align: center;
          }

          .logo {
              width: 100px;
          }

          .menu {
              list-style-type: none;
              padding: 0;
              text-align: center;
          }

          .menu li {
              display: inline;
              margin: 0 10px;
          }

          .menu li a {
              color: white;
              text-decoration: none;
          }

          .menu li a:hover {
              text-decoration: underline;
          }
      </style>
  </head>
  <body>

  <header>
      <img src="<?= base_url('logo.jpg') ?>" alt="Logo" class="logo">
      <br>
      Alamat Toko Anda
      <br><br>
      <ul class="menu">
          <li><a href="<?= base_url('home/index') ?>">Home</a></li>
          <li><a href="<?= base_url('menu/catalogue') ?>">Catalogue</a></li>
          <li><a href="<?= base_url('menu/distributors_index') ?>">Distributors</a></li>
          <li><a href="<?= base_url('menu/upload_index') ?>">Upload</a></li>
      </ul>
  </header>

  <div class="content-wrapper mb-3">
    <div class="container-full">
      <section class="content">
        <?= $this->renderSection('content'); ?>
      </section>
    </div>
  </div>

  </body>

  <footer>
    
  </footer>
</html>