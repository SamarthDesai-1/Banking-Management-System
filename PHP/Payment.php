<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/Payment.css">
</head>

<body>
    <div class="container">

        <div class="box-1">
            <div class="header-section">
                <h1>Payment Details</h1>
            </div>

            <form class="form-section" method="post">

                <div class="sender-info-section">

                    <div class="email-enter flex">
                        <label>Email Address</label>
                        <input type="email" class="format" name="email">
                    </div>

                    <div class="account-number-sender flex">
                        <label>Your Account Number</label>
                        <input type="number" class="format" placeholder="*** *** *** ***" name="sender">
                    </div>

                    <div class="account-number-recevier flex">
                        <label>Recevier Account Number</label>
                        <input type="number" class="format" placeholder="*** *** *** ***" name="recevier">
                    </div>

                    <div class="cvv-amount-section">

                        <div class="cvv-section flex">
                            <label>CVV</label>
                            <input type="password" class="format format-cvv" maxlength="5" name="cvv">
                        </div>

                        <div class="amount-section flex">
                            <label>Transfer Amount</label>
                            <input type="number" class="format" maxlength="10" name="fund">
                        </div>

                    </div>
                   

                    <div class="spacer"></div>

                    <div class="btn-section">
                        <button type="submit" class="btn" name="subbtn">Make Payment</button>
                    </div>

                </div>

            </form>

        </div>

        <div class="box-2">
            <div class="img-section">
                <img src="/COLLEGE MINI PROJECT/IMAGES/pay1.webp" alt="">
            </div>
            <div class="info-section">
                <h1>Beaware from frauds.</h1>
                <ul>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, accusamus?</li>
                    <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa, nisi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
            </div>
        </div>

    </div>
</body>

</html>

<?php

    include("DatabaseClassFile.php");
    session_start();

    $pin = $_SESSION['pin'];
    $email = $_SESSION['email'];
    $date = date("d-m-Y");


    $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
    $sql = "select * from customerinfo where ID = '$pin'";
    $rows = mysqli_query($con ,$sql);

    $result = mysqli_fetch_array($rows);

    if (isset($_POST['subbtn'])) {

        $create = new Database();
        $create->db("payment_db");

        $table = new Database();
        $sql = "create table paymentinfo(ID int ,Date varchar(10) ,Email varchar(30) ,SenderName varchar(20) ,SenderAccountNo varchar(30) ,RecevierName varchar(20) ,RecevierAccountNo varchar(30) ,Fund varchar(20))";
        $table->createTable("payment_db" ,$sql);

        $sender = $_POST['sender'];
        $recevier = $_POST['recevier'];
        $cvv = $_POST['cvv'];
        $fund = $_POST['fund'];
        

        if ($sender != "" && $recevier != "" && $cvv != "" && $fund != "") {
            
            // // session email id verifucation 
            // if (isset($_SESSION['email'])) {
            //     #continue
            // } else {
            //     header("location:Login.php");
            // }
            
            // fetching CVV data on particular PIN
            $con = mysqli_connect("localhost" ,"root" ,"" ,"cvv_db");
            $sql = "select * from cvvinfo where ID = '$pin'";
            $rows = mysqli_query($con ,$sql);
            $info = mysqli_fetch_array($rows);
            
            $cvvDATA = $info['CVV'];

            if ($sender === $result['AccountNo'] && $cvvDATA === $cvv) {

                $oldBalance = $result['CurrentBalance'];
                if ($fund <= $oldBalance) {

                    // fetching account information of sender
                    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
                    $sql = "select * from accountinfo where ID = '$pin'";
                    $rows = mysqli_query($con ,$sql);
                    $resultACCOUNT = mysqli_fetch_array($rows);
                         
                    $senderFULLNAME =  $resultACCOUNT['Firstname']." ".$resultACCOUNT['Middlename'];
 
                         
                    // fetching account information of recevier
                    $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                    $sql = "select * from customerinfo where AccountNo = '$recevier'";
                    $recevierEMAIL = mysqli_query($con ,$sql);
                    $recevierEmailArray = mysqli_fetch_array($recevierEMAIL); 
 
                    $RECEVIEREMAIL = $recevierEmailArray['Email'];
 
                    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
                    $sql = "select * from accountinfo where Email = '$RECEVIEREMAIL'";
                    $recevierNAME = mysqli_query($con ,$sql);
 
                    $recevierNameArray =  mysqli_fetch_array($recevierNAME);
                         
                         
                    $recevierFULLNAME = $recevierNameArray['Firstname']." ".$recevierNameArray['Middlename'];
 
 
                    $insert = new Database();
                    $sql = "insert into paymentinfo(ID ,Date ,Email ,SenderName ,SenderAccountNo ,RecevierName ,RecevierAccountNo ,Fund) values('$pin' ,'$date' ,'$email' ,'$senderFULLNAME' ,'$sender' ,'$recevierFULLNAME' ,'$recevier' ,'$fund')";
                    $insert->insertTable("payment_db" ,$sql);
 
 
                     class UpdateBalances {

                        function updateSenderBalance($fund ,$pin ,$result) {
    
                            $oldBalance = $result['CurrentBalance'];
    
                            $newBalance = $oldBalance - $fund;
    
                            $update = new Database();
                            $sql = "update customerinfo set CurrentBalance = '$newBalance' where ID = '$pin'";
                            $update->update("customerbankdetails_db" ,$sql);
    
                            
    
                        }
    
                        function updateRecevierBalance($fund ,$recevier) {
    
                            $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                            $sql = "select * from customerinfo where AccountNo = '$recevier'";
                            $rows = mysqli_query($con  ,$sql);
    
                            $result = mysqli_fetch_array($rows);
    
                            $oldBalance = $result['CurrentBalance'];
                            $newBalance = $oldBalance + $fund;
    
                            $update = new Database();
                            $sql = "update customerinfo set CurrentBalance = $newBalance where AccountNo = '$recevier'";
                            $update->update("customerbankdetails_db" ,$sql);
    
    
                        }
    
                    }
                    $updateSENDERBALANCE = new UpdateBalances();
                    $updateSENDERBALANCE->updateSenderBalance($fund ,$pin ,$result);
     
                    $updateRECEVIERBALANCE = new UpdateBalances();
                    $updateRECEVIERBALANCE->updateRecevierBalance($fund ,$recevier);

                    header("location:MyAccount.php");
                   
                }
                else {

                    ?> 
                        <script>alert("You have not enough in your account for transfer.. Sorry")</script>
                    <?php
                   

                }
                    
            }
            else {
                ?>

                    <script>alert("Your account no and cvv is wrong please retype it")</script>

                <?php
            }
           
         
        }
        else {
            ?>
                <script>alert("Fill details appropriately")</script>
            <?php
        }
    }


?>
