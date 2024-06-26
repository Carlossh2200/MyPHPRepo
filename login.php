<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>

    <?php 
    session_start();

    $message = "";
    if (count($_POST) > 0){
        $isSuccess = 0;
        $conn = mysqli_connect("localhost","root","","users");
        $userName = $_POST['username'];
        $sql = "SELECT * FROM user WHERE username = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('s',$userName);
        $statement->execute();
        $result = $statement->get_result();
        while ( $row = $result->fetch_assoc()){
            if (!empty($row)){
                $password = $row["password"];
                if ($_POST["password"] === $password){
                    $isSuccess = 1;
                    $_SESSION['username'] = $userName;
                    break;
                }
            }
        }
        $statement->close();
        $conn->close();
        if ($isSuccess == 0){
            $message = "Invalid Username or Password";
        }
        else{
            header("Location: ./addSongs.php");
            exit();
        }
    }
    ?>

    <div class="loginText">
        <h1>KANYE WEST</h1>
    </div>

    <div class="loginForm">
        <?php if ($message != ""){
            echo "<div class='error-message'>$message</div>";
        }
        else{
            $message = "";
        } 
        ?>
        <form action="" method="post">
            <h2>Login</h2>
            <div>
                <div class="row">
                    <label>Username</label> <input type="text" name="username" class="full-width" required>
                </div>
                <div class="row">
                    <label>Password </label> <input type="password" name="password" class="full-width" required>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Submit" class="full-width">
                </div>
            </div>
        </form>
    </div>
    <div class="signupOptions">
    <h3>No account? </h3>
    <a class="signupButton" href="signup.php"> Sign Up</a>
    </div>
</body>
<footer>
    <h6>All rights reserved </h6>
</footer>
</html>