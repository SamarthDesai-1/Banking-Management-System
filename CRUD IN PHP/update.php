<?php
    header("location:index.html");
    $Name = $_GET['Name'];

    $Email = $_GET['email'];
    $Mobile = $_GET['mobile'];
    $Address = $_GET['address'];
    $Gender = $_GET['gender'];

    if (isset($_GET['upbtn'])) {
        $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
        $sql = "update iud set Email = '$Email' ,Mobile = '$Mobile' ,Address = '$Address' ,Gender = '$Gender' where Name = '$Name'";
        mysqli_query($con ,$sql);
        header("location:read.php");
    }

?>