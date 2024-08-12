<?php
$rno = $_POST['drno'];



$sn = "localhost";
$un = "root";
$pwd = "";
$db = "sss_46";
$conn = mysqli_connect($sn,$un,$pwd,$db);
if(!$conn)
{
    die("Connection failed".mysqli_connect_error());
}

$sql = "DELETE FROM student WHERE RollNo='$rno'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('student with rollno'".$rno." has been suspended')</script>";
    include("viewAll.php");
} else {
    echo "Error deleting row: " . $conn->error;
    $conn->close();
}

?>