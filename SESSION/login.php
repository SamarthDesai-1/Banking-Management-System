<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <form method="get">
            <label>Name : <input type="text" name="name"></label>
            <label>Password : <input type="password" name="pass" id=""></label>
            <input type="submit" value="Login" name="submit">
        </form>  


        <?php 

            session_start();
            $con = mysqli_connect("localhost" ,"root","" ,"demo");

            if(isset($_GET['submit'])) {
                $name = $_GET['name'];
                $password = $_GET['pass'];

                $sql = "select * from test;";
                $res = mysqli_query($con ,$sql);


                while ($row = mysqli_fetch_array($res)) {
                    if ($name == $row['name']) {
                        echo "success";
                        $_SESSION['username'] = $name;
                        header("Location:home.php");
                        break;
                    } else {
                        echo "<script>alert('Try Again');</script>";
                        break;
                    }
                }
            
            }

        ?>
        
    </div>
</body>
</html>