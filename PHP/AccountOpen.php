<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Open Page</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/AccountOpen.css">
</head>

<body>
    <div class="container">
        <div class="box-1">
            <form method="get" class="form-section">
                <table class="tab">

                    <div class="name-section">
                        <tr>
                            <td class="text-format"><h1>Name</h1></td>
                        </tr>
                        <tr>
                            <td class="text-format">First Name</td>
                            <td><input type="text" class="format" name="first"></td>
                        </tr>
                        <tr>
                            <td class="text-format">Middle Name</td>
                            <td><input type="text" class="format" name="middle"></td>
                        </tr>
                        <tr>
                            <td class="text-format">Last Name</td>
                            <td><input type="text" class="format" name="last"></td>
                        </tr>
                    </div>
    
                    <div class="currency-section">
                        <tr>
                            <td class="text-format"><h1>Currency</h1></td>
                        </tr>
                        <tr>
                            <td class="text-format"><input type="radio" name="curr" value="USD">&nbsp;&nbsp;USD</td>
                            <td class="text-format"><input type="radio" name="curr" value="EUR">&nbsp;&nbsp;EUR</td>
                        </tr>
                    </div>
    
                    <div class="account-type">
                        <tr>
                            <td class="text-format"><h4>Type of Account</h4></td>
                            <td><select name="account" id="" class="select-menu">
                                <option value="Savings" class="option-menu">Savings</option>
                                <option value="Current" class="option-menu">Current</option>
                                <option value="Fixed" class="option-menu">Fixed</option>
                                <option value="Recurring" class="option-menu">Recurring</option>
                            </select></td>
                        </tr>
                    </div>
    
                    <div class="contact-info">
                        <tr>
                            <td class="text-format"><h1>Contact</h1></td>
                        </tr>
                        <tr>
                            <td class="text-format">Mobile</td>
                            <td><input type="text" class="format" maxlength="10" name="mobile"></td>
                        </tr>
                        <tr>
                            <td class="text-format">Email</td>
                            <td><input type="email" name="email" id="" class="format"></td>
                        </tr>
                    </div>
    
                    <div class="nominee-section">
                        <tr>
                            <td class="text-format"><h1>Nominee</h1></td>
                        </tr>
                        <tr>
                            <td class="text-format">Add Nominee</td>
                            <td><input type="text" class="format" name="nominee"></td>
                        </tr>
                    </div>
    
                    <div class="mail-section">
                        <tr>
                            <td class="text-format"><h1>Address</h1></td>
                        </tr>
                        <tr>
                            <td class="text-format">Address</td>
                            <td><textarea name="address" id="" cols="30" rows="3" class="format"></textarea></td>
                        </tr>
                    </div>
    
                </table>

                <div class="box-2">
                    <h1 class="big-font">Rules and Regulations</h1>
                    <ul>
                        <li><h5>Lorem ipsum dolor sit amet.</h5></li>
                        <li><h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, et?</h5></li>
                        <li><h5>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5></li>
                        <li><h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet accusantium ex reiciendis laudantium dignissimos aperiam!</h5></li>
                        <li><h5>Lorem ipsum dolor sit amet consectetur adipisicing.</h5></li>
                        <li><h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat tenetur ipsum cumque itaque est qui ut facilis omnis vero eos!</h5></li>
                        <li><h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem corrupti dicta necessitatibus quod ipsum nemo atque natus rerum sit accusantium.</h5></li>
                        <li><h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, sit expedita.</h5></li>
        
                        <div class="spacer"></div>
                        <label class="aac"><input type="checkbox" name="chkbox" id="" class="ckhbox"><h3>Accept & Continue</h3></label>
                        
                        <button type="submit" class="spec-button" name="subbtn">Create Account</button>
                    </ul>
                </div>
        
            </form>
          
        </div>

    </div>
</body>

</html>

<?php

    if (isset($_GET['chkbox'])) {
        ?>
            <script>alert("Your Account is open Successfully")</script>
        <?php

            session_start();
            include("DatabaseClassFile.php");
            $database = new Database();
            $database->db("accountopen_db");

            $create = new Database();
            $sql = "create table accountinfo(ID int primary key ,Firstname varchar(20) ,Middlename varchar(20) ,Lastname varchar(20) ,Currency varchar(4) ,AccountType varchar(10) ,Mobile varchar(10) ,Email varchar(30) ,Nominee varchar(20) ,Address varchar(50))";
            $create->createTable("accountopen_db" ,$sql);

            function generatePin() : int {
                return rand(1000 ,9999);
            }

            $getPin = generatePin();
            $_SESSION['userpin'] = $getPin;

            $firstname = $_GET['first'];
            $middlename = $_GET['middle'];
            $lastname = $_GET['last'];
            $currency = $_GET['curr'];
            $accounttype = $_GET['account'];
            $mobile = $_GET['mobile'];
            $email = $_GET['email'];
            $nominee = $_GET['nominee'];
            $address = $_GET['address'];

            if ($firstname != "" && $middlename != "" && $lastname != "" && $currency != "" && $accounttype != "" && $mobile != "" && $email != "" && $nominee != "" && $address != "") {
                $insert = new Database();
                $sql = "insert into accountinfo(ID ,Firstname ,Middlename ,Lastname ,Currency ,AccountType ,Mobile ,Email ,Nominee ,Address) values ($getPin ,'$firstname' ,'$middlename' ,'$lastname' ,'$currency' ,'$accounttype' ,'$mobile' ,'$email' ,'$nominee' ,'$address')";
                $insert->insertTable("accountopen_db" ,$sql);

                ?>
                    <script>
                        window.location.href = "GeneratePIN.php";
                    </script>
                <?php
               
            }
            else {
                ?>
                    <script>alert("Fill all required fields Appropriately")</script>
                <?php
            }
          



        ?>

        <?php
    }
    else if (isset($_GET['subbtn'])) {
        ?>
            <script>alert("Are you accepted our Rules and Regulations")</script>
        <?php
    }


?>


