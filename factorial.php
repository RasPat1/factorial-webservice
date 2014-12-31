<?php
  include 'bootstrap.php';
  $num = htmlspecialchars($_GET["num"]);
  if ($db) {
    $qString = "select result from factorial where number=$num";
    $res = mysqli_query($db, $qString);
    if ($res) {
      $resNum = mysqli_fetch_array($res);
      $resNum = $resNum['result'];
      echo !empty($resNum) ? $resNum : 0;
    }
  }
