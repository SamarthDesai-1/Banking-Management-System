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

                    ?>
                <h1>Net Balance</h1>
                <h2><?php echo "$".$result['CurrentBalance']; ?></h2>
                <!-- PHP Script -->

                <form method="post">

                    <div class="form-section">
                        <label>Add Funds</label>
                        <input type="number" name="af" id="">
                        <br>                                                                                                                        
                        <label>Withdraw Funds</label>
                        <input type="number" name="wf">
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
                <h1>Currency Convertor</h1>
            </div>
            <div class="box" id="box-5">
                <h1>Loan Statement</h1>
                <p>Currently no loan found</p>
            </div>
            <div class="box" id="box-6">box-6</div>
            <div class="box" id="box-7">box-7</div>
            <div class="box" id="box-8">
                <div class="dynamic-progress-bar">
                    <div class="circular-progress">
                        <div class="progress-value">0%</div>
                    </div>
                    <span class="text">Account Verification</span>
                </div>
                <div class="text-area-section">
                    <h1>Your transaction activities</h1>
                </div>
            </div>
            <div class="box" id="box-9">box-9</div>
            <div class="box" id="box-10">box-10</div>
            <div class="box" id="box-11">box-11</div>
            <div class="box" id="box-12">box-12</div>
            <div class="box" id="box-13">box-13</div>
            <div class="box" id="box-14">box-14</div>
            <div class="box" id="box-15">box-15</div>
            <div class="box" id="box-16">box-16</div>
            <div class="box" id="box-17">box-17</div>
            <div class="box" id="box-18">box-18</div>
            <div class="box" id="box-19">box-19</div>
            <div class="box" id="box-20">box-20</div>
            <div class="box" id="box-21">box-21
                <div class="payment-statement-section">

                </div>
            </div>
            <div class="box" id="box-22">box-22</div>
            <div class="box" id="box-23">
                <h1>Cibil Score</h1>
                
            </div>
            <div class="box" id="box-24">box-24</div>
            <div class="box" id="box-25">box-25</div>
            <div class="box" id="box-26">box-26</div>
            <div class="box" id="box-27">box-27</div>
            <div class="box" id="box-28">box-28</div>
            <div class="box" id="box-29">box-29</div>
            <div class="box" id="box-30">box-30</div>
            <!-- <div class="box" id="box-31">box-31</div>
            <div class="box" id="box-32">box-32</div>
            <div class="box" id="box-33">box-33</div>
            <div class="box" id="box-34">box-34</div>
            <div class="box" id="box-35">box-35</div>
            <div class="box" id="box-36">box-36</div>
            <div class="box" id="box-37">box-37</div> -->
        </div>
        <div class="payment-statement-section">
            <h1>Statement</h1>
        </div>
    </div>

    <script src="/COLLEGE MINI PROJECT/JAVASCRIPT/MyAccount.js"></script>

</body>
</html>