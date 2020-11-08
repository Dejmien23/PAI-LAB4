<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">DD Laptopy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Strona głowna <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategorie
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <?php
             /* $menu = array('kategoria_1.php'=>'Dell', 'kategoria_2.php'=>'Lenovo','kategoria_3.php'=>'MacBook',);
              foreach ($menu as $key => $value): */

              @mysqli_query($conn, 'SET NAMES utf8');

              $sql = 'SELECT `id`, `nazwa`
                           FROM `kategorie`
                           ORDER BY `nazwa`';
              $wynik = mysqli_query($conn, $sql);
              if (mysqli_num_rows($wynik) > 0) {
                while ($kategoria = @mysqli_fetch_array($wynik)) {
                  echo '<a class="dropdown-item" href="' . $_SERVER["PHP_SELF"] . '?kat_id=' . $kategoria['id'] . '">' . $kategoria['nazwa'] . '</a>' . PHP_EOL;
                }
              }
            ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kontakt.php">Kontakt</a>
      </li>
    </ul>
  </div>
</nav>