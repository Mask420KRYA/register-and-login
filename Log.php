<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include_once("CommonCode.php");

if (isset($_POST["userName"], $_POST["psw"])) {
    // Check the validity of the UserName and password provided:
    if (userAlreadyExists($_POST["userName"])) {
        if (checkUsersPassword($_POST["userName"], $_POST["psw"])) {
            print("Ok, your password is correct");
        } else {
            print("Invalid password");
        }
        // User OK
    } else {
        print("Your username is not in our database");
    }
}
?>


<h1>Login</h1>

<form method="POST">
    <input type="text" name="userName" placeholder="Enter your username" />
    <input type="password" name="psw" placeholder="Please choose a password" />
    <input type="password" name="pswAgain" placeholder="Please retype the password" />
    <input type="submit" value="Create account" />
</form>

</body>
</html>