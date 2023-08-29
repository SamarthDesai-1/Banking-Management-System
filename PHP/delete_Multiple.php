<?php

    $con = mysqli_connect("localhost" ,"root" ,"" ,"mydb");

    
    if (isset($_POST['del']))
    $allID = $_POST['delete_data'];
    $extractID = implode(',' ,$allID);

    echo $extractID;


?>