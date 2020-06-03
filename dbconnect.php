<?php
    //$dbhost = "localhost";
    //$dbuser = "bob";
    //$dbpassword = "bob";
    //$dbname = "univille";
    error_reporting(0);
    $dbhost = getenv("DB_HOST")!=null?getenv("DB_HOST"):"localhost";
    $dbuser = getenv("DB_USER")!=null?getenv("DB_USER"):"bob";
    $dbpassword = getenv("DB_PASSWORD")!=null?getenv("DB_PASSWORD"):"bob";
    $dbname = getenv("DB_NAME")!=null?getenv("DB_NAME"):"univille";
    
    $con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
?>