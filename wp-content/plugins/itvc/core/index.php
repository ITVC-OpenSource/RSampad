<?php
if (isset($_GET['h']) AND isset($_GET['u']) AND isset($_GET['p']) AND isset($_GET['n'])) {
  include('assets/php/dbconfigndzjg.php');
  include('assets/php/jdf.php');
  $birth = jdate("m/d");
  $res = $pdo->query("SELECT * FROM `students` WHERE birth = '$birth'");
  if ($res->rowCount() == 0) {
    echo "امروز شادمان نیستیم!😔";
  } else {
    foreach ($res as $row) {
      $year = 1400 - $row['year'];
      echo "<div class='birth'>";
      echo "<p class='happy'>" . $row['name'] . " " . $year ."سالگیت مبارک" . "</p></div>";
    }
  }
}
?>
