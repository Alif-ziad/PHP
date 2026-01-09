<?php
global $num1_Err;
global $num2_Err;
global $operator_Err;
$hasErr=false;

global $num1;
global $num2;
global $operator;
global $result;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST['num1']))
    {
        $num1_Err="Enter value";
        $hasErr=true;
    }
    else
    {
        if(!is_numeric($_POST['num1']))
        {
            $num1_Err="Invalid value 1";
            $hasErr=true;
        }
    }
    if(empty($_POST['operator']))
    {
        $operator_Err="Operator is required";
        $hasErr=true;
    }
   
    if(empty($_POST['num2']))
    {
        $num2_Err="Enter value";
        $hasErr=true;
    }
    else
    {
        if(!is_numeric($_POST['num2']))
        {
            $num2_Err="Invalid value 2";
            $hasErr=true;
        }
    }
    if(!$hasErr)
    {
        $num1=$_POST['num1'];
        $operator=$_POST['operator'];
        $num2=$_POST['num2'];

        if($operator == '+')
        {$result = $num1 + $num2;}
    else if($operator == '-')
        {$result = $num1 - $num2;}
    else if($operator == '*')
        {$result = $num1 * $num2;}
    else if($operator == '/')
        {$result = $num1 / $num2;}

        echo " ".$num1;
        echo " ".$operator;
        echo " ".$num2."<br>";
        echo "Result: ".$result;
        
    }
}
?>


<!doctype html>
<html>
<head>
        <title>Calculator</title>
</head>
<body>
   <form method="POST" action="" enctype="multipart/form-data">
    VALUE 1:<input type="text" name="num1">
    <span style="color:red;"><?php if(isset($num1_Err)){echo $num1_Err;}?></span>
    OPERATOR :
    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>    
    <span style="color:red;"><?php if(isset($operator_Err)){echo $operator_Err;}?></span>
    VALUE 2:<input type="text" name="num2">
    <span style="color:red;"><?php if(isset($num2_Err)){echo $num2_Err;}?></span> 
    <input type="submit" value="submit">
</form>
</body>
</html>