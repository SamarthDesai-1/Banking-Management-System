<?php
  setcookie("Samarth" ,"Desai");
  echo "Cookies is set";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>

  <body>
    <script>
      let decodeCookie = decodeURIComponent(document.cookie);
      let ca = decodeCookie.split(";");
      let splitans = ca[0].split('=');
      console.log(splitans[1]);
    </script>
  </body>
</html>
