<?php

$name_Err;
$email_Err;
$password_Err;
$confirmpassword_Err;
$hasErr=false;

$name;
$email;
global $password;
global $confirmpassword;


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST['username']))
    {
        $name_Err="Username is required";
        $hasErr=true;
    }
    else
    {
        if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['username']))
        {
            $name_Err="Only letters allowed";
            $hasErr=true;
        }

    }

    if(empty($_POST['email']))
    {
        $email_Err="E-mail is required";
        $hasErr=true;
    }
    else
    {
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $email_Err="Invalid email format";
            $hasErr=true;
        }
    }

    if(empty($_POST['password']))
    {
        $password_Err="Password is required";
        $has_Err=true;
    }    
    else
    {}

    if(empty($_POST['confirmpassword']))
    {
        $confirmpassword_Err="Retype Password";
        $has_Err=true;
    }
    else
    {
        if($_POST['password'] !== $_POST['confirmpassword'])
        {
            $confirmpassword_Err="Passwords do not match!";
            $has_Err=true;
        }
    }

    if(!$hasErr)
    {
        $name=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        echo "Name: ".$name."<br>";
        echo "E-mail: ".$email."<br>";
        echo "Password: ".$password."<br>";
        echo "Confirm Password: ".$confirmpassword."<br>";
    }    
}
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        USERNAME: <input type="text" name="username">
        <br>
         <span style="color:red;"><?php if(isset($name_Err)){echo $name_Err;}?></span>
        <br>
        EMAIL:<input type="text" name="email">
        <br>
         <span style="color:red;"><?php if(isset($email_Err)){echo $email_Err;}?></span>
        <br>
        PASSWORD:<input type="password" name="password">
        <br>
         <span style="color:red;"><?php if(isset($password_Err)){echo $password_Err;}?></span>
        <br>
        CONFIRM PASSWORD:<input type="Password" name="confirmpassword">
        <br>
         <span style="color:red;"><?php if(isset($confirmpassword_Err)){echo $confirmpassword_Err;}?></span>
        <br>
        <input type="submit" value="submit">
</form>
</body>
</html>

