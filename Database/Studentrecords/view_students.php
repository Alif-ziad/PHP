<?php
include("db_connect.php");


    $conn=dbConnect();
   
    $sql="SELECT * FROM students";
    $result = mysqli_query($conn,$sql);
    $totalRows = mysqli_num_rows($result);

?>

<!doctype html>
<html>
    <head>
        <title>View Students</title>
    </head>
<body>
    <h2>Student Records</h2>
<?php
if($totalRows > 0)
    {
        echo "<table>";
        echo "<tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Age</th>
               <th>Department</th>
              </tr>";
    
     for($i=0; $i < $totalRows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['age']."</td>";
        echo "<td>".$row['department']."</td>";
        echo "</tr>";
        }
      echo "</table>";
    }
    else
{
    echo "<p>No student records found.</p>";
}
mysqli_free_result($result);
mysqli_close($conn);
?>

</body>
</html>