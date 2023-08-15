<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <ul>
                <li>Home</li>
                <li>About us</li>
                <li>Contact</li>
                <li>Pricing</li>
                <li>Products</li>
                <li>
                    <form>
                        <input type="submit" value="log out" name="logout">
                    </form>
                </li>
            </ul>
        </div>
        <div class="box-1">
            <?php 
                session_start();

                if (isset($_GET['logout'])) {
                    header("Location:login.php");
                    session_destroy();
                }


                
                if (isset($_SESSION['username'])) {
                    echo "Welcome to homepage"."   ".$_SESSION['username'];
                } else {
                    header("Location:login.php");
                }

            ?> 
        </div> 
    </div>
</body>
</html>
