<!DOCTYPE html>

<?php include 'connect.php'; ?>

<html lang="en">
<head>
  <title>Moja pierwsza strona w Bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="lightbox.min.css">
</head>

<body>

<?php include 'naglowek.php';?>

<?php include 'menu.php';?>

<div class="container" style="margin-top:30px">
  <div class="row">
      <?php

        $kat_id = isset($_GET['kat_id']) ? (int)$_GET['kat_id'] : 1;
        $sql = 'SELECT `nazwa`, `opis`, `img`
                     FROM `produkty`
                     WHERE `kategoria_id` = ' . $kat_id .
                     ' ORDER BY `nazwa`';

        $wynik = mysqli_query($conn, $sql);

        if(isset($_GET['kat_id'])) {
          if (mysqli_num_rows($wynik) > 0) {
              while ($produkt = @mysqli_fetch_array($wynik)) {
                  echo $produkt['nazwa'] . PHP_EOL;
                  echo '<a class="example-image-link" style=" margin-left: auto; margin-right: auto;" href="' . $produkt['img']. '" data-lightbox="example-set"> <img class="example-image" src="' . $produkt['img']. '" alt="" width="100%" /></a>'. PHP_EOL;
                  echo $produkt['opis']. PHP_EOL;
              }
            }
          } 
        else {
              echo '<h2>Witaj!</h2>
                    <a class="example-image-link" style=" margin-left: auto; margin-right: auto;" href="laptops.jpg" data-lightbox="example-set"><img class="example-image" src="laptops.jpg" alt="" width="100%" /></a>
                    <p>Wybierz jedną z kategorii by zapoznać się z produktem.</p>';
            }

        mysqli_close($conn);

      ?>
    </div>
  </div>

<?php include 'footer.php';?>

<script src="lightbox-plus-jquery.min.js"></script>

</body>
</html>
