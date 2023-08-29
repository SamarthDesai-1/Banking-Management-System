<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PIN</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/GeneratePIN.css">
</head>
<body>
    <div class="container">
        
            <div class="header-section">
                <h1 class="head-text">Generate PIN</h1>
            </div>
            
            <div class="box-1">
    
                <div class="generate-section">
                    <h1>Generate PIN from here.</h1>
                    <ul>
                        <li><h3>By simply click on generate button.</h3></li>
                    </ul>
                    <button type="button" class="btn" id="open-popup" onclick="createPopup(id)">Generate</button>
                </div>

                <div class="forget-section">
                    <h1>Forget PIN ??</h1>
                    <ul>
                        <li>You can easily retrive your PIN using your Email.</li>
                        <li>Don't share your PIN with third party it can harm your privacy & security.</li>
                        <li>With PIN you can track your statements.</li>
                        <li>PIN makes you safer mover from rest peoples.</li>
                    </ul>
                    <div class="company-section">
                        <h4>American Express</h4>
                    </div>
                </div>

    
            </div>


        <div class="popup" id="popup">
            <div class="overlay"></div>
            <div class="popup-content">
                <h2>Your PIN</h2>

                <?php echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ad quia voluptatem labore cum officia vel sed aliquam incidunt itaque explicabo reprehenderit. Voluptatum, ex nisi provident eius dolore labore quasi!</p><br><p>Go back to Home page and refresh the page and you can see your financials.</p>"; ?>
                
                <?php 
                    $random = rand(1000 ,9999);
                    echo "<p><h4>Your Account PIN is : $random</h4></p>";
                ?>

                <div class="controls">
                    <button class="close-btn">Close</button>
                    <button class="submit-btn">Save</button>
                </div>
            </div>
        </div>

    </div>


    <script>
        let flag = true;
        if (flag != false) {
            setTimeout(() => {
                function createPopup(id) {
                    let popupNode = document.querySelector(id)
                    let overlay = popupNode.querySelector(".overlay");
                    let closebtn = popupNode.querySelector(".close-btn");
                    function openpopup() {
                        popupNode.classList.add("active");
                    }
                    function closepopup() {
                        popupNode.classList.remove("active");
                    }


                    overlay.addEventListener("click" ,closepopup);
                    closebtn.addEventListener("click" ,closepopup);
                    return openpopup;

                }   

                let popup = createPopup("#popup");
                document.querySelector("#open-popup").addEventListener("click" ,popup);
            }, 1000);
        } 
    </script>
            

</body>
</html>


<?php

    session_start();
    $email = $_SESSION['email'];

    include("DatabaseClassFile.php");
    $database = new Database();
    $database->db("pin_db");

    $create = new Database();
    $sql = "create table pininfo(ID int AUTO_INCREMENT primary key ,Email varchar(50) ,Pin varchar(4))";
    $create->createTable("pin_db" ,$sql);



    $con = mysqli_connect("localhost" ,"root" ,"" ,"pin_db");
    $sql = "select * from pininfo where Email = '$email'";
    $rows = mysqli_query($con ,$sql);
    $result = mysqli_num_rows($rows);

    if ($result > 0) {
        header("location:Authentication.php");
    }
        
    else {
        $insert = new Database();
        $sql = "insert into pininfo(Email ,Pin) values ('$email' ,'$random')";
        $insert->insertTable("pin_db" ,$sql);
    }
    
    



?>



