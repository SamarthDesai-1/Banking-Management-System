<?php
  setcookie("Balance" ,15000);
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
      class Cookie {
        getCOOKIE() {
          let decodeCookie = decodeURIComponent(document.cookie);
          let ca = decodeCookie.split(";");
          let splitans = ca[0].split('=');
          return splitans[1];
        }
      }

      const cookie = new Cookie();
      let ans = cookie.getCOOKIE();

      console.log("Cookie : " + ans);
      
      console.log(typeof(ans));
      let toINT = parseInt(ans);
      console.log(typeof(toINT));
      
      
    </script>
  </body>
</html>
