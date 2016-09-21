<!DOCTYPE html>
<head>
</head>

<body>
  <?php
    echo "You selected " . $_POST['mode'] . " mode.";
  ?>

  <input type="button" name="returnButton" value="Return" onClick="_return()">

  <script type="text/javascript">
    function _return() {
      window.location = "index.php";
    }
  </script>
</body>

</html>
