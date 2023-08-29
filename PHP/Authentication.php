<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Page</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/Authentication.css">
</head>
<body>
    <div class="container">
        

        <div class="box-1">
            <div class="image-section">
                <img src="/COLLEGE MINI PROJECT/IMAGES/admin2.png" alt="" class="admin-image">
            </div>

            <div class="form-section">

                <form method="post">
                    <input type="password" class="format" placeholder="PIN" maxlength="4" name="pin">
                    <br>
                    <div class="btn-section">
                        <input type="submit" value="Verify" class="btn" name="subbtn">
                        <input type="submit" value="Forget PIN" class="btn-primary">
                    </div>
                </form>
                
            </div>
        </div>
        
        <div class="box-2">
            <h1 class="big-font">Privacy & Policy</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime earum quibusdam explicabo. Alias dolores saepe voluptatibus, consequatur nisi modi minus!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis necessitatibus ullam veniam nemo aliquam excepturi a, commodi impedit, expedita ipsam id nobis et aperiam placeat sunt doloremque nam corrupti consectetur.</p>
            <br><br>
            <div class="liner"></div>
            <h3>American Express Banking Company.</h3>
            
        </div>

        
    
    </div>

</body>
</html>

<?php

    session_start();

    $email = $_SESSION['email'];
   

    if (isset($_POST['subbtn'])) {

        $pin = $_POST['pin'];
        $_SESSION['pin'] = $pin;

        $con = mysqli_connect("localhost" ,"root" ,"" ,"pin_db");
        $sql = "select Pin from pininfo where Email = '$email'";
        $result = mysqli_query($con ,$sql);

        $rows = mysqli_fetch_array($result);

        if ($pin == $rows['Pin']) {

            $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
            $sql = "update accountinfo set ID = '$pin' where Email = '$email'";
            mysqli_query($con ,$sql);

            header("location:MyAccount.php");
        }
        else {
            ?>
                <script>alert("Retype PIN is wrong")</script>
            <?php
        }

    }
  



?>