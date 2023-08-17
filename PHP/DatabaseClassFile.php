<?php

    class Database {

        public function db($databaseName) {
            $con = mysqli_connect("localhost","root","");
            $sql = "create database $databaseName";
            mysqli_query($con ,$sql);
            echo "Database created successfully";
        }

        public function createTable($databaseName ,$sql) {
            $con = mysqli_connect("localhost","root","",$databaseName);
            mysqli_query($con ,$sql);
            echo "Table created successfully";
        }

        public function insertTable($databaseName ,$sql) {
            $con = mysqli_connect("localhost","root","","$databaseName");
            mysqli_query($con ,$sql);
            echo "Insert record successfully";
        }

        public function update($databaseName ,$sql) {
            $con = mysqli_connect("localhost","root","","$databaseName");
            mysqli_query($con ,$sql);
            echo "Update record successfully";
        }

        public function delete($databaseName ,$sql) {
            $con = mysqli_connect("localhost","root","","$databaseName");
            mysqli_query($con ,$sql);
            echo "Delete record successfully";
        }
    }  


?>






