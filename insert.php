<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert page</title>
</head>
<body>
    <?php 
    $conn = mysqli_connect("localhost","root","","user");

    if ($conn === false){
        die("ERROR: Could not connect. ".mysqli_connect_error());
    }

    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $email = $_REQUEST['email'];
    $number = $_REQUEST['number'];
    $password = $_REQUEST['password'];
    $username = $_REQUEST['username'];

    $sql = "INSERT INTO user VALUES ('$name','$age','$email','$number','$password','$username')";

    if (mysqli_query($conn,$sql)) {
        echo "<h3>data stored succesfully";
    }
    else{
        echo "Error storing data haha $sql. " . mysqli_error($conn);
    }
    mysqli_close($conn);
     ?>
</body>
</html>