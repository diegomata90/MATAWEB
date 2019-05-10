<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Hola, <?= $nombre ?>!</h1>
      <p></p>

    </div>

  </div>

  <div class="row">
      <div class="text-center">
        <img src="<?= PATH_ASSETS . 'img/construccion.jpg' ?>" alt="construcion">
      </div>
  </div>


</body>
</html>