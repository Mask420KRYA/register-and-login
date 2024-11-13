<?php
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

function checkUsersPassword($givenUser, $givenPassword) {
    // Check if the $givenUser has the $givenPassword
    $fileUsers = fopen("clients.csv", "r");
    while (!feof($fileUsers)) {
        $existingUser = fgets($fileUsers);
        $existingArrayForUser = explode(":", $existingUser);
        if ($existingArrayForUser[0] == $givenUser) {
            if ($existingArrayForUser[1] == $givenPassword) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}
?>