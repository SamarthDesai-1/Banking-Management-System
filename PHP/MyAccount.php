<?php

    session_start();
    $email = $_SESSION['email'];

    include("DatabaseClassFile.php");
    $database = new Database();
    $database->db("customerbankdetails_db");


    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
    $sql = "select ID from accountinfo where Email = '$email'";
    $rows = mysqli_query($con ,$sql);
    $result = mysqli_fetch_array($rows);
    $id = $result['ID'];


    $create = new Database();
    $sql = "create table customerinfo(ID int primary key ,Email varchar(50) ,MICR varchar(10) ,AccountNo varchar(20) ,IFSC varchar(20) ,CurrentBalance numeric ,MinBalance numeric ,Loan varchar(10))";
    $create->createTable("customerbankdetails_db" ,$sql);

    class Details {

        function generateMICR() {
            $MICR = rand(100000000 ,999999999);
            return $MICR;
        }

        function generateAccountNo() {
            $ACCOUNT = rand(10000000000000 ,99999999999999);
            return $ACCOUNT;
        }

        function generateIFSC() {
            $IFSCprefix = "AMEX";
            $IFSC = rand(1000000 ,9999999);
            return $IFSCprefix.$IFSC;
        }
        
    }

    $MICR = new Details();
    $micr = $MICR->generateMICR();

    $ACCOUNT = new Details();
    $account = $ACCOUNT->generateAccountNo();

    $IFSC = new Details();
    $ifsc = $IFSC->generateIFSC();

    $toStringMICR = strval($micr);
    $toStringACCOUNT = strval($account);
    $toStringIFSc = strval($ifsc);

    $insert = new Database();
    $sql = "insert into customerinfo(ID ,Email ,MICR ,AccountNo ,IFSC ,CurrentBalance ,MinBalance ,Loan) values('$id' ,'$email' ,'$toStringMICR' ,'$toStringACCOUNT' ,'$toStringIFSc' ,0 ,0 ,'NULL')";
    $insert->insertTable("customerbankdetails_db" ,$sql);



?>


<?php

    $pin = $_SESSION['pin'];

    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
    $sql = "select * from accountinfo where ID = '$pin'";
    $rows = mysqli_query($con ,$sql);
    $result = mysqli_fetch_array($rows);

    

?>


<?php

    $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
    $sql = "select * from customerinfo where ID = '$pin'";
    $rows = mysqli_query($con ,$sql);
    $resultCustomerInfo = mysqli_fetch_array($rows);

    setcookie("bal" ,$resultCustomerInfo['CurrentBalance']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/MyAccount.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="logo-section">

            <div class="btn-home">
                    <h1 class="text-color-blue">Your Statement</h1>
                <button class="home-btn"><a href="Home.php" class="link">Go to Home</a></button>
            </div>
            <div class="account-holder-info">

                <div class="name-section">
                    <h4><?php echo $result['Firstname']."   "; echo $result['Middlename']."   "; echo $result['Lastname']; ?></h4>
                </div>
            </div>
        </div>

        <div class="account-info-section">
            
            <div class="date-section">
                <h4><span id="dynamic-date"></span></h4>
            </div>
        </div>

        <div class="display-content-section">
            <div class="box" id="box-1">
                <h1 style="color: #3284ed;">About Bank Info</h1>
                <h4>Country : <span>America</span></h4>
                <h4>IFSC Code : <span><?php echo $resultCustomerInfo['IFSC']; ?></span></h4>
                <h4>MICR : <span><?php echo $resultCustomerInfo['MICR']; ?></span> </h4>
                <h4>Customer ID : <span><?php echo $resultCustomerInfo['ID']; ?></span></h4>
            </div>
            <div class="box" id="box-2">
                <h1 style="color: #3284ed;">Account Details</h1>
                <h4>Account Type : <span> <?php echo $result['AccountType']; ?></span></h4>
                <h4>Account No : <span><?php echo $resultCustomerInfo['AccountNo']; ?> </span></h4>
                <!-- <h4>Account openning date : </h4> -->
                <h4>Account Name : <span><?php echo $result['Firstname']."   "; echo $result['Middlename']."   "; echo $result['Lastname']."   "; ?></span></h4>
            </div>
            <div class="box" id="box-3">

                    <?php 

                        $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                        $sql = "select * from customerinfo where ID = '$pin'";
                        $rows = mysqli_query($con ,$sql);
                        $result = mysqli_fetch_array($rows);


                    ?>

                <h1 style="color: #3284ed;">Net Balance</h1>
                <h2><?php echo "$".$result['CurrentBalance']; ?></h2>

                <form method="post">

                    <div class="form-section">
                        <label>Add Funds</label>
                        <input type="number" name="af" id="" class="format-amount">
                        <label>Withdraw Funds</label>
                        <input type="number" name="wf" class="format-amount">
                    </div> 
                    <div class="btn-section">
                        <button type="submit" class="btn" name="afbtn">Add</button>
                        <button type="submit" class="btn" name="wfbtn">Withdraw</button>
                    </div>

                </form>

                <?php

                    if (isset($_POST['afbtn'])) {
                        $addfunds = $_POST['af'];

                        $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                        $sql = "select CurrentBalance ,MinBalance from customerinfo where ID = '$pin'";
                        $rows = mysqli_query($con ,$sql);
                        $result = mysqli_fetch_array($rows);

                        $previousBALANCE = $result['CurrentBalance'];
                        $previousMINBALANCE = $result['MinBalance'];

                        if ($addfunds != "") {
                            $minBalance = ($addfunds * 20) / 100;

                            $newBALANCE = ($previousBALANCE + $addfunds);
                            $newMINBALANCE = ($previousMINBALANCE + $minBalance);
                            $sql = "update customerinfo set CurrentBalance = $newBALANCE ,MinBalance = $newMINBALANCE where ID = '$pin'";
                            mysqli_query($con ,$sql);
                            header('location:MyAccount.php');
                        }
                    }

                    if (isset($_POST['wfbtn'])) {
                        $withdrawfunds = $_POST['wf'];

                        $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                        $sql = "select CurrentBalance ,MinBalance from customerinfo where ID = '$pin'";
                        $rows = mysqli_query($con ,$sql);
                        $result = mysqli_fetch_array($rows);
                        
                        $previousBALANCE = $result['CurrentBalance'];
                        $previousMINBALANCE = $result['MinBalance'];

                        if ($withdrawfunds != "") {
                            $minBalance = ($withdrawfunds * 20) / 100;
                            
                            $newBALANCE = ($previousBALANCE - $withdrawfunds);
                            $newMINBALANCE = ($previousMINBALANCE - $minBalance);
                            $sql = "update customerinfo set CurrentBalance = $newBALANCE ,MinBalance = $newMINBALANCE where ID = '$pin'";
                            mysqli_query($con ,$sql);                            
                            
                            
                        }
                        header('location:MyAccount.php');


                    }

                ?>

            </div>

            <div class="box" id="box-4">
                
                <div class="heading-section">
                    <h1 style="color: #3284ed;">Currency Convertor</h1>
                </div>
               

                <form method="post">
                    <div class="curreny-convertor-section">
                        <label>
                            <h4>From : </h4>
                        </label>
                        <select name="" id="" class="drop">
                            <option value="INR">Indian Rupee</option>
                            <option value="USD">American Dollar</option>
                            <option value="AUD">Australian Dollar</option>
                            <option value="RSR">Russian Rubble</option>
                            <option value="SGD">Singapore Dollar</option>
                        </select>
                        <label>
                            <h4>To : </h4>
                        </label>
                        <select name="" id="" class="drop">
                            <option value="INR">Indian Rupee</option>
                            <option value="USD">American Dollar</option>
                            <option value="AUD">Australian Dollar</option>
                            <option value="RSR">Russian Rubble</option>
                            <option value="SGD">Singapore Dollar</option>
                        </select>
                        <label>
                            <h4>Amount : </h4>
                        </label>
                        <input type="number" name="" id="" class="format-amount">
                        <button type="button" class="con-btn">Convert</button>

                        <div class="output-section">
                            <?php
                            
                                
                            
                            ?>
                        </div>
                    </div>
                </form>


            </div>
            
            <div class="box" id="box-6">

                <form method="post">
                    <h1 style="color: #3284ed;">Payment Section</h1>
                    <div class="transfer-section">
                        <button class="transfer-btn"><a href="Payment.php" class="links">Transfer Funds</a></button>
                    </div>
                </form>

            </div>

            <div class="box" id="box-7">
                <div class="edit-section">
                    <!-- <h1>Policy Statement</h1> -->
                    <h1 style="color: #3284ed;">Edit Section</h1>
                    <div class="transfer-section">
                        <button class="transfer-btn" id="open-popup" onclick="createPopup(id)">Edit Details</button>
                    </div>
                </div>
            </div>

            <!-- Popup section -->
            
        <div class="popup" id="popup">
            <div class="overlay"></div>
            <div class="popup-content">
                <div class="header-section">
                    <h1 style="color: #3284ed;">Your Account Details</h1>
                </div>

                <div class="spacer"></div>


                <form method="post" class="popup-form-section">

                    <div class="section-1">
                        <div class="name-section">
                            <label for="">
                                <h4>First Name</h4>
                            </label>
                            <input type="text" class="format popup-form-css" name="fname">
                            <label for="">
                                <h4>Middle Name</h4>
                            </label>
                            <input type="text" class="format popup-form-css" name="mname">
                            <label for="">
                                <h4>Last Name</h4>
                            </label>
                            <input type="text" class="format popup-form-css" name="lname">
                        </div>

                        <div class="currency-section">
                            <tr>
                                <td class="text-format">
                                    <h2>Currency</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="format"><input type="radio" name="curr" value="USD">&nbsp;&nbsp;USD</td>
                                <td class="text-format"><input type="radio" name="curr" value="EUR">&nbsp;&nbsp;EUR
                                </td>
                            </tr>
                        </div>
                        <div class="account-type">
                            <tr>
                                <td class="text-format">
                                    <h2>Type of Account</h2>
                                </td>
                                <td><select name="account" id="" class="select-menu">
                                        <option value="Savings" class="option-menu">Savings</option>
                                        <option value="Current" class="option-menu">Current</option>
                                        <option value="Fixed" class="option-menu">Fixed</option>
                                        <option value="Recurring" class="option-menu">Recurring</option>
                                    </select></td>
                            </tr>
                        </div>
                    </div>

                    <div class="section-2">
                        <div class="contact-info">
                            <tr>
                                <td class="text-format">
                                    <h2>Contact</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-format">
                                    <h3>Mobile</h3>
                                </td>
                                <td><input type="text" class="format" maxlength="10" name="mobile"></td>
                            </tr>
                        </div>

                        <div class="section-3">
                            <div class="nominee-section">
                                <tr>
                                    <td class="text-format">
                                        <h3 class="big-font">Nominee</h3>
                                    </td>
                                    <td><input type="text" name="nominee" id="" class="format"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="big-font">Address</h3>
                                    </td>
                                    <td><textarea name="address" id="" cols="50" rows="3" class="items"></textarea></td>
                                </tr>
                                <div class="controls">
                                        <button class="close-btn">Close</button>
                                        <button type="submit" class="submit-btn" name="savebtn">Save</button>
                                </div>
                            </div>

                        </div>

                    </div>


                </form>

                    <!-- <div class="controls">
                        <button class="close-btn">Close</button>
                        <button type="submit" class="save-btn" name="savebtn">Save</button>
                    </div> -->
                </div>
            </div>
            <!-- Popup section -->

            <div class="box" id="box-8">
                <div class="dynamic-progress-bar">
                    <div class="circular-progress">
                        <div class="progress-value">0%</div>
                    </div>
                    <!-- <span class="text">Account Verification</span> -->
                </div>
                <div class="text-area-section">
                    <h1  style="color: #3284ed;">Your transaction activities</h1>
                    <ul>
                        <li>
                            <h4>Lorem ipsum dolor sit amet.</h4>
                        </li>
                        <li>
                            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, nisi.</h4>
                        </li>
                        <li>
                            <h4>Lorem ipsum dolor sit amet</h4>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="box" id="box-9">
                <form method="post" class="cvv-form-section">

                    <div class="header-section">
                        <h1 style="color: #3284ed;">CVV</h1>
                    </div>
                    <div class="input-section">
                        <h3>Set 5 digit CVV</h3>
                        <input type="password" id="" class="cvv-format" maxlength="5" name="cvv">
                        <h3>Confirm your CVV</h3>
                        <input type="password" id="" class="cvv-format" maxlength="5" name="concvv">
                    </div>

                    <div class="cvv-button-section">
                        <input type="submit" value="Update" class="cvv-btn" name="updbtn">
                        <input type="submit" value="Set PIN" class="cvv-btn" name="cvvbtn">
                    </div>

                </form>

                <?php

                    if (isset($_POST['cvvbtn'])) {

                        $cvv = $_POST['cvv'];
                        $concvv = $_POST['concvv'];

                        $create = new Database();
                        $create->db("cvv_db");

                        $table = new Database();
                        $sql = "create table cvvinfo(ID int primary key ,CVV varchar(5) ,Email varchar(30))";
                        $table->createTable("cvv_db" ,$sql);

                        if ($cvv != "" && $concvv != "") {
                            if ($cvv === $concvv) {
                                $insert = new Database();
                                $sql = "insert into cvvinfo(ID ,CVV ,Email) values('$pin' ,'$cvv' ,'$email')";
                                $insert->insertTable("cvv_db" ,$sql);
                            }
                            else {
                                ?>
                                    <script>alert("Retype cvv")</script>
                                <?php
                            }
                        }  

                    }
                    
                    if (isset($_POST['updbtn'])) {

                        $con = mysqli_connect("localhost" ,"root" ,"" ,"cvv_db");
                        $sql = "select * from cvvinfo where ID = '$pin'";
                        $rows = mysqli_query($con ,$sql);
                        $result = mysqli_fetch_array($rows);

                        $oldPIN = $result['CVV'];

                        $cvv = $_POST['cvv'];
                        $concvv = $_POST['concvv'];

                        if ($cvv != "" && $concvv != "") {
                            if ($cvv === $concvv) {
                                $update = new Database();
                                $sql = "update cvvinfo set CVV = '$cvv' where ID = '$pin'";
                                $update->update("cvv_db" ,$sql);
                            }
                            else {
                                ?>
                                    <script>alert("Retype cvv")</script>
                                <?php
                            }
                        }  

                    }
                    
                ?>


            </div>

            <div class="box" id="box-10">
                <div class="insurance-section-header">
                    <h1 style="color: #3284ed;">Insurance</h1>
                    <div class="progress-report">
                        <h2 class="font"><?php echo rand(0 ,100)."%"; ?></h2> <!-- generate this using random number -->
                        <ul>
                            <li><h3>Education Insurance</h3></li>
                            <li><h3>Medical Insurance</h3></li>
                            <li><h3>Personal Insurance</h3></li>
                        </ul>
                    </div>
                </div>
            
            </div>
           

           
          
        </div>

        <div class="payment-statement-section">
            <h1 style="color: #3284ed;">Statement</h1>

            <div class="account-statement-section">

                <table class="main-table">
                    <div class="table-head-section">
                        <tr>
                            <td class="inner-data table-data">Date</td>
                            <td class="inner-data table-data">Sender Name</td>
                            <td class="inner-data table-data">Sender Account NO</td>
                            <td class="inner-data table-data">Recevier Name</td>
                            <td class="inner-data table-data">Recevier Account NO</td>
                            <td class="inner-data table-data">Fund</td>
                        </tr>
                    </div>
                  
                    <?php
                    
                        $con = mysqli_connect("localhost" ,"root" ,"" ,"payment_db");
                        $sql = "select * from paymentinfo where ID = '$pin'";
                        $rows = mysqli_query($con ,$sql);

                        while ($result = mysqli_fetch_array($rows)) 
                        {

                    ?>
                            <tr>
                                <td class="inner-data"><?php echo $result['Date']; ?></td>
                                <td class="inner-data"><?php echo $result['SenderName']; ?></td>
                                <td class="inner-data"><?php echo $result['SenderAccountNo']; ?></td>
                                <td class="inner-data"><?php echo $result['RecevierName']; ?></td>
                                <td class="inner-data"><?php echo $result['RecevierAccountNo']; ?></td>
                                <td class="inner-data"><?php echo $result['Fund']; ?></td>
                            </tr>
                    <?php
                            

                        }

                    ?>
                </table>

            </div>


        </div>
    </div>

    <!-- <script src="/COLLEGE MINI PROJECT/JAVASCRIPT/MyAccount.js"></script> -->
    <script>
        function showProgress() {

            let circularProgress = document.querySelector(".circular-progress") ,
            progressValue = document.querySelector(".progress-value");

                
            let cookieString = document.cookie.split("=");
            let intNum = parseInt(cookieString[1]);

            let progressStartValue = 0,
                progressEndValue = Math.floor(Math.random() * 100),
                speed = 50;
                console.log(progressEndValue);

            let progress = setInterval(() => {
                progressStartValue++;

                progressValue.textContent = `${progressStartValue}%`;
                circularProgress.style.background = `conic-gradient(#3284ed ,${progressStartValue * 3.6}deg ,#ededed 0deg)`;

                if(progressStartValue == progressEndValue) {
                    clearInterval(progress);
                    
                    let element = document.querySelector(".text");
                    // element.innerHTML = `<input type="button" value="Submit">`;

                }
                console.log(progressStartValue);
            }, speed);

        }
        showProgress();

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


            overlay.addEventListener("clicl", closepopup);
            closebtn.addEventListener("click", closepopup);
            return openpopup;

        }

        let popup = createPopup("#popup");
        document.querySelector("#open-popup").addEventListener("click", popup);
    </script>
    <script>
       
    </script>



</body>
</html>



 <?php

    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
    $sql = "select * from accountinfo where ID = '$pin'";
    $rows = mysqli_query($con ,$sql);
    $result = mysqli_fetch_array($rows);

    if (isset($_POST['savebtn'])) {

        $firstname = $_POST['fname'];
        $middlename = $_POST['mname'];
        $lastname = $_POST['lname'];
        $currency = $_POST['curr'];
        $accounttype = $_POST['account'];
        $mobile = $_POST['mobile'];
        $nominee = $_POST['nominee'];
        $address = $_POST['address'];

        $update = new Database();
        if ($firstname != "") {
            $sql = "update accountinfo set Firstname = '$firstname' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);       
        }
        else if ($middlename != "") {
            $sql = "update accountinfo set Middlename = '$middlename' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        else if ($lastname != "") {
            $sql = "update accountinfo set Lastname = '$lastname' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        else if ($currency != "") {
            $sql = "update accountinfo set Currency = '$currency' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($accounttype != "") {
            $sql = "update accountinfo set AccountType = '$accounttype' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        else if ($mobile != "") {
            $sql = "update accountinfo set Mobile = '$Mobile' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        else if ($nominee != "") {
            $sql = "update accountinfo set Nominee = '$nominee' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        else if ($address != "") {
            $sql = "update accountinfo set Address = '$address' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
    }

?>