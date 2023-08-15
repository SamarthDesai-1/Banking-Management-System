<?php

    $con = mysqli_connect("localhost" ,"root" ,"");
    $sql = "create database crudoper";
    mysqli_query($con ,$sql);
    echo "Database created Successfully";


    $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
    $sql = "create table iud(Name varchar(20) ,Email varchar(20) ,Mobile varchar(20) ,Address varchar(20) ,Gender varchar(7))";
    mysqli_query($con ,$sql);

    $Name = $_GET['name'];
    $Email = $_GET['email'];
    $Mobile = $_GET['mobile'];
    $Address = $_GET['address'];
    $Gender = $_GET['gender'];

    if (isset($_GET['subbtn'])) {
        $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
        $sql = "insert into iud(Name ,Email ,Mobile ,Address ,Gender) values('$Name' ,'$Email' ,'$Mobile' ,'$Address' ,'$Gender')";
        mysqli_query($con ,$sql);
        
        header("location:index.html");
    
    } 
    else if (isset($_GET['upbtn'])) {
        $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
        $sql = "update iud set Email = '$Email' ,Mobile = '$Mobile' ,Address = '$Address' ,Gender = '$Gender' where Name = '$Name'";
        mysqli_query($con ,$sql);
        
        header("location:read.php");
    }
    // else if (isset($_GET['delbtn'])) {
    //     $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
    //     $sql = "delete from iud where Name = '$Name'";
    //     mysqli_query($con ,$sql);
        
    //     header("location:index.html");
    // }
    else if (isset($_GET['selbtn'])) {
        header("location:read.php");
    }


?>
