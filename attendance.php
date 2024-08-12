<?php
include("links.html");
include("adminLinks.html");

$sn = "localhost";
$un = "root";
$pwd = "";
$db = "sss_46";
$conn = mysqli_connect($sn,$un,$pwd,$db);
$studs = array();
if(!$conn)
{
    die("Connection failed".mysqli_connect_error());
}
$t = 0;
echo "<center>";
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
echo "<br><h1>Attendance Sheet</h1><br>";
echo "<form action='attendUpdatePage.php' method='post'>";
echo "<table border='2' cellspacing='5' cellpadding='5'>";
echo "<tr><th>Stud Rollno</th><th>Stud Name</th><th>Attendance</th></tr>";

if($result==false)
{
    echo "Error".$conn->error;
}
else
{
    while($row=$result->fetch_assoc())
    {
        $res = 'a'.$row['RollNo'];
        echo "<tr><td>".$row['RollNo']."</td><td>".$row['StudName']."</td><td><input type='checkbox' name='".$res."'/></td></tr>";
    }
}
echo "</table><br><br><br>";
echo "<input type='submit' value='submit'/>";
echo "</form></center>";
$result->free();
$conn->close();
?>