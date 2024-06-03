<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <form action="insert.php" method="post">
        <p>
        <label for="name">Name: </label>
        <input type="text" name="name" id="nameUser">
        </p>
        
        <p>
        <label for="age">Age: </label>
        <input type="number" name="age" id="ageUser">
        </p>
        
        <p>
        <label for="email">Email: </label>
        <input type="email" name="email" id="emailUser">
        </p>
        
        <p>
        <label for="number">Number: </label>
        <input type="number" name="number" id="numberUser">
        </p>
        
        <p>
        <label for="password">Password (8 characters): </label>
        <input type="password" name="password" id="passwordUser" minlength="8" required>
        </p>
        <p>
            <label for="username">Username: </label>
            <input type="text" name="username" id="userName">
        </p>
        <p>
        <input type="submit" value="Submit">
        </p>
        
    </form>
</body>
</html>