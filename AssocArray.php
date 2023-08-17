<?php

    $currency = array(
        "INR"=> "98.25633" ,
        "USD"=> "80.52366" ,
        "RSR"=> "83.25625" ,
        "SGD"=> "85.25367" ,
        "AUD"=> "55.52368"
    );

    foreach ($currency as $key => $value) {

        echo "Currency : ".$key."   "."Rate : ".$value."<br>";

    }




?>