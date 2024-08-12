<?php
include("links.html");
include("adminLinks.html");

$sn = "localhost";
$un = "root";
$pwd = "";
$db = "sss_46";
$conn = mysqli_connect($sn,$un,$pwd,$db);
if(!$conn)
{
    die("Connection failed".mysqli_connect_error());
}
$t = 0;
echo "<center>";
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
echo "<br><h1>Student Details</h1><br>";


echo "<div class='d-flex flex-row justify-content-center' style='margin-bottom:30px;'>";
if($result==false)
{
    echo "Error".$conn->error;
}
else
{
    echo "<div><table border='4' cellspacing='10' cellpadding='10'><tr>";
    echo "<tr><th>Student RollNo</th><th>Student Name</th><th>Gender</th><th>No.of classes done</th><th>No.of classes present</th></tr>";
    while($row=$result->fetch_assoc())
    {
            echo "<tr><td>".$row['RollNo']."</td><td>".$row['StudName']."</td><td>".$row['Gender']."</td><td>".$row['total_no_of_classes']."</td><td>".$row['no_of_classes_present']."</td></tr>";        
    }
}
echo "</table></div></div></center>";
$result->free();
$conn->close();
?>