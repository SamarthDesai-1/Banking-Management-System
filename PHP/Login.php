<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/Login.css">
    <title>Log in Page</title>
</head>
<body>
    <div class="container">

        <div class="box">
            <div class="image-section">
                <img src="/COLLEGE MINI PROJECT/IMAGES/loginnew.PNG" alt="" class="image">
            </div>
            <div class="form-section">
                <h1>Welcome to AMEX</h1>
                
                <form class="inner-form" method="post">
                    <input type="email" placeholder="Email or phone" class="format" name="email" id="username"> <span id="asterisk-1"></span><br><br>
                    <input type="password" name="pass" placeholder="Password" class="format" id="password" maxlength="10"> <span id="asterisk-2"></span>
                    <p class="forget-password">Forget Password ?</p>

                    <div id="retype-sect"><span id="retype"></span></div>

                    <div class="button">
                        <input type="submit" value="Log in" name="login" class="inside-btn-1" onclick="isFill()">
                        <input type="submit" value="Signup" name="signin" class="custom-btn inside-btn-1" onclick="isFill()">
                    </div>

                </form>

                <footer>
                    <ul>
                        <li>Copyright Policy</li>
                        <li>Privacy Policy</li>
                        <li>Send Feedback</li>
                        <li>User Agreement</li>
                        <li>Cookie Policy</li>
                        <li>Community Guidelines</li>
                    </ul>
                </footer>
            </div>
        </div>
       
    </div>

    <script src="./JAVASCRIPT/Login.js"></script>
</body>
</html>


<?php

    session_start();
    include("DatabaseClassFile.php");

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['pass'];

        $con = mysqli_connect("localhost" ,"root" ,"" ,"signup_db");
        $sql = "select * from signup where Email = '$email'";
        $rows = mysqli_query($con ,$sql);
        $result = mysqli_num_rows($rows);

        if ($result > 0) {
            $sql = "select Email ,Password from signup where Email = '$email' and Password = '$password'";
            $rowsTwo = mysqli_query($con ,$sql);
            $resultTwo = mysqli_num_rows($rowsTwo);
            
            if ($resultTwo == 1) {
                
                $_SESSION['email'] = $email;

                header("location:Home.php");

            } else {
                ?>
                    <script>alert("Invalid : Username and Password please try Again....");</script>
                <?php
            }
            
        }
        else {

            header("location:Signup.php");
            
        }
    
    }
    
?>

