<!-- USAGE NOTES!!!!!
Possible modes are: sensor, none, rain, sunrise, thunder, fog, sunny
this document assigns read and none -->

<?php
  include "GLOBAL.php";

  $database = connectMongo();
  $collection = $database -> pref;
  $query = array('name' => 'mode');

  if ($_POST['mode'] == "presets") {
    $collection->update($query, array('$set' => array("mode" => "none")));
  } else {
    $collection->update($query, array('$set' => array("mode" => $_POST['mode'])));
  }
?>

<script>
  window.location.href='index.php';
</script>
