<?php

if (isset($_POST['email']))
{
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        http_response_code(200);
        echo $email . ' is valid email';
        // Do eventually email look up in database
        // something like
        // if email exist in db than msg "Email Exist" else msg "Email Does not Exist"
    } else {
        http_response_code(412);
        // Do something else or just leave it as is
    }
}

?>