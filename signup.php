<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    
    <?php include('connection.php'); 
    session_start();
    ?>

    <main>
    <header><?php include('./view/header.php')?></header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <div>
            <?php 
            if (isset($_POST['submit'])){
                $isSingupSuccess = 0;

                $fullName = htmlspecialchars($_POST['fullName']);
                $username = htmlspecialchars($_POST['username']);  
                $email = htmlspecialchars($_POST['email']);
                $number = htmlspecialchars($_POST['number']);
                $age = htmlspecialchars($_POST['age']);
                $password = htmlspecialchars($_POST['password']);

                

                $sql = "INSERT INTO user (name,age,email,number,password,username) VALUES (?,?,?,?,?,?)"; 
                $statement = $conn -> prepare($sql);
                if ($statement){
                    $statement->bind_param('sisiss',$fullName,$age,$email,$number,$password,$username);
                    if ($statement->execute()){
                        echo "<script>alert('User Signup Successfull!')</script>";
                        header("Location: ". $_SERVER['REQUEST_URI']);
                        exit();
                    }
                    else{
                        echo "<script>alert('User Signup Error.')</script>";
                    }
                    $statement->close();
                }
                $conn->close();
            }
            ?>
        </div>

        <div class="signupForm">
            <form action="" method="post">
                <h2>Signup</h2>
                <div>
                    <div class="row">
                        <label>Full name: </label> <input type="text" name="fullName" class="full-width">
                    </div>
                    <div class="row">
                        <label>Username: </label> <input type="text" name="username" class="full-width">
                    </div>
                    <div>
                        <label>Email: </label> <input type="email" name="email" class="full-width">
                    </div>
                    <div class="row">
                        <label>Number: </label> <input type="number" name="number" class="full-width">
                    </div>
                    <div class="row">
                        <label>Age: </label> <input type="number" name="age" class="full-width">
                    </div>
                    <div class="row">
                        <label>Password: </label> <input type="password" name="password" class="full-width">
                    </div>
                    <div class="rowSubmit">
                        <input type="submit" name="submit" value="Submit" class="full-width"> 
                    </div>
                </div>
            </form>
        </div>
        
    </main>

<?php include('./view/footer.php') ?>
</body>
</html>