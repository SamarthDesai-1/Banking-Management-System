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
    $sql = "create table customerinfo(ID int primary key ,Email varchar(50) ,MICR varchar(10) ,AccountNo varchar(20) ,IFSC varchar(20))";
    $create->createTable("customerbankdetails_db" ,$sql);

    class Details {

        function generateMICR() {
            $MICR = rand(100000000 ,999999999);
            echo $MICR;
        }

        function generateAccountNo() {
            $ACCOUNT = rand(10000000000000 ,99999999999999);
            echo $ACCOUNT;
        }

        function generateIFSC() {
            $IFSCprefix = "AMEX";
            $IFSC = rand(1000000 ,9999999);
            echo $IFSCprefix.$IFSC;
        }
    }

    $MICR = new Details();
    $micr = $MICR->generateMICR();

    $ACCOUNT = new Details();
    $account = $ACCOUNT->generateAccountNo();

    $IFSC = new Details();
    $ifsc = $IFSC->generateIFSC();

    $insert = new Database();
    $sql = "insert into customerinfo(ID ,Email ,MICR ,AccountNo ,IFSC) values('$id' ,'$micr' ,'$account' ,'$ifsc')";
    $insert->insertTable("customerbankdetails_db" ,$sql);

?>