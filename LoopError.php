<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap'); 
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .form-section {
            max-width: 500px;
            border: 2px solid black;
            padding: 20px 40px;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">

        <form method="post">

            <div class="form-section">

                <label><h1>Username</h1></label>
                <input type="text" name="user">
                <label><h1>Password</h1></label>
                <input type="password" name="pass">

                <input type="submit" value="Submit" name="subbtn">

            </div>

        </form>

    </div>
</body>
</html>

<?php


   
    if (isset($_POST['subbtn'])) {
        
        $username = $_POST['user'];
        $password = $_POST['pass'];
    
        if ($username != "" && $password != "") {

            echo "Username : ".$username;
            echo "Password : ".$password;
            
        }
       

    } 



?>