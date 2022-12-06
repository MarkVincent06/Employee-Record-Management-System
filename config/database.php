<?php
    $servername = "localhost";
    $username = "markvincent";
    $password = "syntaxerror";
    $dbName = "im_ermsdb";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . mysqli_connect_error());
    }
