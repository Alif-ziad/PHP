<?php
$name_Err;
$email_Err;
$user_Err;
$pass_Err;
$confirm_Err;
$age_Err;
$gender_Err;
$course_Err;
$term_Err;
$hasErr=false;

$name;
$email;
$user;
$pass;
$confirm;
$age;
$gender;
$course;
$term;

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST['name']))
            {
                $name_Err="Fullname is Required";
                $hasErr=true;
            }
        else
            {
                if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
                {$name_Err="invalid characters";
                $hasErr=true;}
            }

        if(empty($_POST['email']))
            {
                $email_Err="Email is Required";
                $hasErr=true;
            }
        else
            {
                if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                {$email_Err="invalid Email";
                $hasErr=true;}
            }
        if(empty($_POST['user']))
            {
                $user_Err="Username is Required";
                $hasErr=true;
            }
        else
            {
                if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['user']))
                {$user_Err="invalid characters";
                $hasErr=true;}
                else if(strlen($_POST['user'])<5)
                {$user_Err="Minimum 5 characters";
                $haseErr=true;}
            }
        if(empty($_POST['password']))
            {
                $password_Err="Password is Required";
                $hasErr=true;
            }
            else if(strlen($_POST['password'])<5)
                {$password_Err="Minimum 6 characters";
                $haseErr=true;}
        else
            {
               
            }
        if(empty($_POST['confirm']))
            {
                $cofirm_Err="Retype Password";
                $hasErr=true;
            }
        else
            {
                if($_POST['password'] !== $_POST['confirm'])
                {$confirm_Err="Both password should be same";
                $hasErr=true;}
            }
        if(empty($_POST['age']))
            {
                $age_Err="Age is required";
                $hasErr=true;
            }
        else
            {
                if(!is_numeric($_POST['age']))
                {$age_Err="invalid Age";
                $hasErr=true;}
            }
        if(empty($_POST['gender']))
            {
                $gender_Err="Gender Required";
                $hasErr=true;
            }
        else
            {
              
            }
        if($_POST['course']=="")
            {
                $course_Err="Course is Required";
                $hasErr=true;
            }
        else
            {
            }
        if(empty($_POST['term']))
            {
                $term_Err="Accepting Required";
                $hasErr=true;
            }
        else
            {
            }

    if(!$hasErr)
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $course = $_POST['course'];
            $term = $_POST['term'];

            echo "Registration Successful!"."<br>";
            echo "Full Name :".$name."<br>";
            echo "Email :".$email."<br>";
            echo "User Name :".$user."<br>";
            echo "Age :".$age."<br>";
            echo "Gender :".$gender."<br>";
            echo "Course :".$course."<br>";


    }

}
?>

<!doctype html>
<html>
    <head>
        <title>
            Student Registration Form
        </title>
    </head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        FULLNAME :<input type="text" name="name">
        <br>
        <span style="color:red;"><?php if(isset($name_Err)){echo $name_Err;}?></span>
        <br>

        EMAIL :<input type="text" name="email">
        <br>
        <span style="color:red;"><?php if(isset($email_Err)){echo $email_Err;}?></span>
        <br>

        USERNAME :<input type="text" name="user">
        <br>
        <span style="color:red;"><?php if(isset($user_Err)){echo $user_Err;}?></span>
        <br>

        PASSWORD :<input type="password" name="password">
        <br>
        <span style="color:red;"><?php if(isset($password_Err)){echo $password_Err;}?></span>
        <br>

        CONFIRM PASSWORD :<input type="password" name="confirm">
        <br>
        <span style="color:red;"><?php if(isset($confirm_Err)){echo $confirm_Err;}?></span>
        <br>

        AGE :<input type="text" name="age">
        <br>
        <span style="color:red;"><?php if(isset($age_Err)){echo $age_Err;}?></span>
        <br>
        GENDER :
        <input type="radio" name="gender" value="male">MALE
        <input type="radio" name="gender" value="female">FEMALE
        <br>
        <span style="color:red;"><?php if(isset($gender_Err)){echo $gender_Err;}?></span>
        <br>
        COURSE :
        <select name="course">
            <option value=""></option>
            <option value="cse">CSE</option>
            <option value="eee">EEE</option>
            <option value="ip">IP</option>
            <option value="llb">LLB</option>
            <option value="english">ENGLISH</option>
            <option value="pharmacy">PHARMACY</option>
        </select>
        <br>
        <span style="color:red;"><?php if(isset($course_Err)){echo $course_Err;}?></span>
        <br>

        TERMS AND CONDITIONS:
        <br>
        Do you agree with our policies?<input type="checkbox" name="term" value="term">yes
        <br>
        <span style="color:red;"><?php if(isset($term_Err)){echo $term_Err;}?></span>
        <br>


        <input type="submit" value="submit">

</body>
</html>

        