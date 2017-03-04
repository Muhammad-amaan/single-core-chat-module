<?php

$password = "admin@123";


function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

generateHash($password);
if(verify($password, $hashedPassword))
{
echo "success";
}
else
{
echo "invalid";
}
?>