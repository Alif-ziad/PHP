<?php
$name_Err;
$email_Err;
$subject_Err;
$message_Err;
$attachment_Err;
$hasErr=false;

$name;
$email;
$subject;
$message;
$attachment;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST['name']))
    {
        $name_Err="Name is required";
        $hasErr=true;
    }
    else
    {
        if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
        {
            $name_Err="Only letters allowed";
            $hasErr=true;
        }   
    }
    if(empty($_POST['email']))
    {
        $email_Err="Email is required";
        $hasErr=true;
    }
    else
    {
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $email_Err="Invalid Email format";
            $hasErr=true;
        }
    }
    if(empty($_POST['subject']))
    {
        $subject_Err="Must choose one";
        $hasErr=true;
    }
    if(empty($_POST['message']))
    {
        $message_Err="Cannot leave empty";
        $hasErr=true;
    }
    else
    {
        if(strlen($_POST['message'])<10)
        {
            $message_Err="Min 10 Characters";
            $hasErr=true;
        }
    }
    if($_FILES['myFile']['error']==4)
        {
            $attachment_Err="File is required";
            $hasErr=true;
        }
    else{
        $allowedTypes=['image/jpeg','image/png','application/pdf'];
        if(!in_array($_FILES['myFile']['type'],$allowedTypes))
        {
            $attachment_Err="only JPEG,PNG and PDF files are allowed";
            $hasErr=true;
        }
        $maxSize=2*1024*1024;
        if($_FILES['myFile']['size']>$maxSize)
        {
            $attachment_Err="File size must be less than 2MB";
            $hasErr=true;
        }
    }
if(!$hasErr)
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    echo "Email is Sent!"."<br>";
    echo "Name: ".$name."<br>";
    echo "Email: ".$email."<br>";
    echo "Subject: ".$subject."<br>";
    echo "Message: ".$message."<br>";

    $dir="uploads/";
    if(!is_dir($dir)){
        mkdir($dir);
    }
    $path=$dir.basename($_FILES['myFile']['name']);
    if(move_uploaded_file($_FILES['myFile']['tmp_name'],$path))
    {
        echo"File uploaded successfully: ".$path."<br>";
    }
    else
    {
        echo "Error on files";
    }
}
}
?>

<!doctype html>
<html>
    <head>
        <title>Contact Form</title>
    </head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        NAME: <input type="text" name="name">
        <br>
        <span style="color:red;"><?php if(isset($name_Err)){echo $name_Err;}?></span>
        <br>
        EMAIL: <input type="text" name="email">
        <br>
        <span style="color:red;"><?php if(isset($email_Err)){echo $email_Err;}?></span>
        <br>
        SUBJECT:
        <select name="subject">
            <option value="">Subject</option>
            <option value="General">General</option>
            <option value="Support">Support</option>
            <option value="Feedback">Feedback</option>
        </select>
        <br>
        <span style="color:red;"><?php if(isset($subject_Err)){echo $subject_Err;}?></span>
        <br>
        MESSAGE: <input type="text" name="message">
        <br>
        <span style="color:red;"><?php if(isset($message_Err)){echo $message_Err;}?></span>
        <br>
        ATTACHMENT: <input type="file" name="myFile">
        <br>
        <span style="color:red;"><?php if(isset($attachment_Err)){echo $attachment_Err;}?></span>
        <br>
        <input type="submit" value="submit">
</form>
</body>
</html>