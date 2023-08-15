<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/Signup.css">
</head>
<body>
    <div class="container">

        <div class="box">
            <div class="image-section">
                <img src="/COLLEGE MINI PROJECT/IMAGES/signup4.avif" alt="" class="image">
            </div>
    
            <div class="form-section">
                <form method="post">
                    <h1>Sign up</h1>
                    <input type="email" placeholder="Email" class="format" name="email"><br>
                    <input type="text" placeholder="Username" class="format" name="name"><br>
                    <input type="password" id="pass" placeholder="Create Password" class="format" name="password" maxlength="8"><br>
                    <input type="password" id="conf" placeholder="Confirm Password" class="format" name="confirmpass" maxlength="8"><br>


                    <div class="button">
                        <input type="submit" value="Accept and Register" class="btn-primary respond-btn" name="subbtn">
                    </div>
                    <div class="line">
                        <div class="continue-section">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" style="width: 2vh;" class="svg-img"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                            <p class="text">Continue with Google</p>
                        </div>
                        <div class="continue-section">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 2vh;"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>
                           <p class="text">Continue with Apple</p>
                        </div>
                    </div>
                    <div class="foot">
                        <p>Already Register ? <a href="Login.html" class="link">Log in</a></p>
                    </div>
                </form>
            </div>
        </div>

       

    </div>
    <script src="./JAVASCRIPT/Signup.js"></script>
</body>
</html>


<?php

    include("DatabaseClassFile.php");
    session_start();

    $create = new Database();
    $create->db("signup_db");

    $table = new Database();
    $sql = "create table signup(ID int AUTO_INCREMENT primary key ,Email varchar(50) ,Username varchar(20) ,Password varchar(20));";
    $table->createTable("signup_db" ,$sql);

                    

    $con = mysqli_connect("localhost" ,"root" ,"" ,"signup_db");
    if (isset($_POST['subbtn'])) {

        $email = $_POST['email'];
        $sql = "select * from signup where Email = '$email'";
        $rows = mysqli_query($con ,$sql);
        $result = mysqli_num_rows($rows);

        if ($result > 0) {
            ?>
                <script>
                    alert("Email already exixts");
                    setTimeout(() => {
                        window.location.href = "/PHP/Login.php";                        
                    }, 1000);
                </script>
            <?php

        } else {
            ?>
            <?php
                $password = $_POST['password'];
                $confirmpassword = $_POST['confirmpass'];
                if ($password === $confirmpassword) {
                    $insertion = new Database();
                    $username = $_POST['name'];
                    $sql = "insert into signup(Email ,Username ,Password) values ('$email' ,'$username' ,'$password')";
                    $insertion->insertTable("signup_db" ,$sql);
                } else {
                    ?>
                        <script>
                            alert("OOPS Something Went Wrong : Retype Password");
                        </script>
                    <?php
                }
              

        }

    }

?>
