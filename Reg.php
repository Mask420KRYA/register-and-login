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

function userAlreadyExists($checkUser) {
    $fileUsers = fopen("clients.csv", "r");
    while (!feof($fileUsers)) {
        $existingUser = fgets($fileUsers);
        $existingArrayForUser = explode(":", $existingUser);
        if ($existingArrayForUser[0] == $checkUser) {
            return true;
        }
    }
    return false;
}

 
if (isset($_POST["userName"], $_POST["psw"], $_POST["pswAgain"])) {
    print("Registration in process...");

    if ($_POST["psw"] == $_POST["pswAgain"]) {
        $fileUsers = fopen("clients.csv", "a+");
        if (userAlreadyExists($_POST["userName"])) {
            print("User already exists, please pick another username!");
        } else {
            fputs($fileUsers, "\n" . $_POST["userName"] . ":" . $_POST["psw"]);
        }
    } else {
        print("Passwords do not match. Please try again!");
    }
}
?>

<h1>To register, please fill in the following form:</h1>

<form method="POST">
    <input type="text" name="userName" placeholder="Enter your username" />
    <input type="password" name="psw" placeholder="Please choose a password" />
    <input type="password" name="pswAgain" placeholder="Please retype the password" />
    <input type="submit" value="Create account" />
</form>

</body>
</html>