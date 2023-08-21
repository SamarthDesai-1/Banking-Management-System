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


    echo "Firstname : ".$result['Firstname'];
    echo "Middlename : ".$result['Middlename'];
    echo "Lastname : ".$result['Lastname'];


    

?>


<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/MyAccount.css">
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <h1 class="text-color-blue">American Express</h1>    
            <!-- Account holder info section starts at here -->
            <div class="account-holder-info">
                <div class="image-section">
                    <img src="./IMAGES/american3.png" alt="" class="custom-image">
                    <!-- <img src="./IMAGES/american2.jpg" alt="" class="custom-image"> -->
                    <!-- <img src="./IMAGES/american.png" alt="" class="custom-image"> -->
                    <!-- <img src="./IMAGES/apple.jpg" alt="" class="custom-image"> -->
                </div>
                <div class="name-section">
                    <h4><?php echo $result['Firstname']."   "; echo $result['Middlename']."   "; echo $result['Lastname']; ?></h4>
                </div>
            </div>
            <!-- Account holder info section ends at here -->
        </div>

        <!-- Account info section starts at here --> 
        <div class="account-info-section">
            <h4><?php echo $result['Firstname']."   "; echo $result['Middlename']."   "; echo $result['Lastname']."   "; ?> your Account Statement</h4>
            
            <div class="date-section">
                <h4><span id="dynamic-date"></span></h4>
            </div>
        </div>
        <!-- Account info section ends at here --> 

        <div class="display-content-section">
            <div class="box" id="box-1">
                <h1>About Bank Info</h1>
                <h4>Country : <?php echo $result['Firstname']; ?></h4>
                <h4>IFSC Code : <?php echo $result['Middlename']; ?> </h4>
                <h4>MICR : <?php echo $result['Lastname']; ?> </h4>
                <h4>Customer ID :</h4>
            </div>
            <div class="box" id="box-2">
                <h1>Account Details</h1>
                <h4>Account Type : </h4>
                <h4>Account No : </h4>
                <h4>Account openning date : </h4>
                <h4>Account Name : </h4>
            </div>
            <div class="box" id="box-3">

                <!-- PHP Script -->
                    <?php 

                        $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                        $sql = "select * from customerinfo where ID = '$pin'";
                        $rows = mysqli_query($con ,$sql);
                        $result = mysqli_fetch_array($rows);

                        setcookie("Balance" ,$result['CurrentBalance']);

                    ?>
                <h1>Net Balance</h1>
                <h2><?php echo "$".$result['CurrentBalance']; ?></h2>
                <!-- PHP Script -->

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


                    }

                ?>

            </div>

            <div class="box" id="box-4">
                
                <div class="heading-section">
                    <h1>Currency Convertor</h1>
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
                            
                                echo "Success";
                            
                            ?>
                        </div>
                    </div>
                </form>


            </div>

            <div class="box" id="box-5">
                <h1>Loan Statement</h1>
                <p>Currently no loan found</p>
            </div>
            
            <div class="box" id="box-6">

                <form method="post">
                    <h1>Payment Section</h1>
                    <div class="transfer-section">
                        <button class="transfer-btn"><a href="Payment.php" class="links">Transfer Funds</a></button>
                    </div>
                </form>

            </div>

            <div class="box" id="box-7">
                <div class="edit-section">
                    <!-- <h1>Policy Statement</h1> -->
                    <h1>Edit Section</h1>
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
                    <h1>Your Account Details</h1>
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
                                    <td><textarea name="address" id="" cols="50" rows="8" class="items"></textarea></td>
                                </tr>
                                <!-- <div class="controls">
                                        <button class="close-btn">Close</button>
                                        <button type="submit" class="submit-btn" name="update">Save</button>
                                    </div> -->
                            </div>

                        </div>

                    </div>


                </form>

                    <div class="controls">
                        <button class="close-btn">Close</button>
                        <button class="submit-btn">Submit</button>
                    </div>
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
                    <h1>Your transaction activities</h1>
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

            <div class="box" id="box-9">box-9
                <form method="post" class="cvv-form-section">

                    <div class="header-section">
                        <h1>CVV</h1>
                    </div>
                    <div class="input-section">
                        <h3>Set 5 digit CVV</h3>
                        <input type="password" id="" class="cvv-format" maxlength="5" name="cvv">
                        <h3>Confirm your CVV</h3>
                        <input type="password" id="" class="cvv-format" maxlength="5" name="concvv">
                    </div>

                    <div class="cvv-button-section">
                        <input type="submit" value="Update" class="cvv-btn" name="cvvbtn">
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
                    
                ?>


            </div>

            <div class="box" id="box-10">box-10
            <div class="progress">
                    <div class="progress-done">

                    </div>
                </div>

                <div class="inputcontainer">
                    <div>
                        <h3>Value</h3>
                        <input type="number" class="input">
                    </div>
                    <div>
                        <h3>Max Value</h3>
                        <input type="number" class="maxInput">
                    </div>
                </div>
            </div>
            <!-- <div class="box" id="box-11">box-11</div>
            <div class="box" id="box-12">box-12</div>
            <div class="box" id="box-13">box-13</div> -->
            <div class="box" id="box-14">box-14</div>
            <!-- <div class="box" id="box-15">box-15</div>
            <div class="box" id="box-16">box-16</div>
            <div class="box" id="box-17">box-17</div> -->
            <div class="box" id="box-18">box-18</div>
           
          
        </div>

        <div class="payment-statement-section">
            <h1>Statement</h1>

            <div class="account-statement-section">

                <table class="main-table">
                    <div class="table-head-section">
                        <tr>
                            <td class="inner-data table-data">ID</td>
                            <td class="inner-data table-data">Email</td>
                            <td class="inner-data table-data">Sender Account NO</td>
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
                                <td class="inner-data"><?php echo $result['ID']; ?></td>
                                <td class="inner-data"><?php echo $result['Email']; ?></td>
                                <td class="inner-data"><?php echo $result['SenderAccountNo']; ?></td>
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

    <script src="/COLLEGE MINI PROJECT/JAVASCRIPT/MyAccount.js"></script>
   <script>
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



</body>
</html>



 <!-- Update Data -->
 <?php

    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
    $sql = "select * from accountinfo where ID = '$pin'";
    $rows = mysqli_query($con ,$sql);
    $result = mysqli_fetch_array($rows);

    if (isset($_POST['update'])) {

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
        if ($middlename != "") {
            $sql = "update accountinfo set Middlename = '$middlename' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($lastname != "") {
            $sql = "update accountinfo set Lastname = '$lastname' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($currency != "") {
            $sql = "update accountinfo set Currency = '$currency' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($accounttype != "") {
            $sql = "update accountinfo set AccountType = '$accounttype' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($mobile != "") {
            $sql = "update accountinfo set Mobile = '$Mobile' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($nominee != "") {
            $sql = "update accountinfo set Nominee = '$nominee' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
        if ($address != "") {
            $sql = "update accountinfo set Address = '$address' where ID = '$pin'";
            $update->update("accountopen_db" ,$sql);  
        }
    }

?>
<!-- Update Data -->