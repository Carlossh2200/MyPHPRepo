<?php  
     $conn = mysqli_connect("localhost", "root", "", "users");
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }