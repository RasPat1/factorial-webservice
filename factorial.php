<?php
  include 'bootstrap.php';
  $num = htmlspecialchars($_GET["num"]);
  echo calcFac($db, $num);

