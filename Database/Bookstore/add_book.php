<?php
include("db.php");

$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        $year = $_POST['year'];

        if($price <=0)
            {$err= "enter valid price";
            }
         $check = mysqli_prepare($conn, "SELECT isbn FROM books WHERE isbn=?");
        mysqli_stmt_bind_param($check, "s", $isbn);
        mysqli_stmt_execute($check);
         mysqli_stmt_store_result($check);

        if(mysqli_stmt_num_rows($check) > 0)
        $err = "ISBN already exists";  
        
        if($err == "")
        {
                function insertData()
    {
        $query="INSERT INTO books (title,author,isbn,price, category,stock_quantity,publicatio_year) values (?,?,?,?,?,?,?)";
        $conn=mysqli_connect("localhost", "root", "","bookstore_db");
        $data=mysqli_query($conn, $query);
        if($data)
        {
            echo "<br> Book added successfully<br>";
            echo mysqli_affected_rows($conn)."<br>";
            var_dump($data);
        }

        else
        {
            echo "not inserted data<br>";
            echo mysqli_error($conn);
            var_dump($data);
        }
    }
            }

    }
    ?>