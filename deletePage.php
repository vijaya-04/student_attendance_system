<?php
include("links.html");
include("adminLinks.html");

$sn = "localhost";
$un = "root";
$pwd = "";
$db = "sss_46";
$conn = mysqli_connect($sn,$un,$pwd,$db);

$pres = array();
$abs = array();

if(!$conn)
{
    die("Connection failed".mysqli_connect_error());
}
$t = 0;
echo "<center>";
echo "<h4>Students with attendance below 75%</h4><br>";
echo "<table border='2' cellspacing='5' cellpadding='5'>";
echo "<tr><th>Stud RollNo</th><th>Stud Name</th><th>Attendance</th></tr>";
//updating the values in the database
$sql = "SELECT * FROM student";
$result = $conn->query($sql);


if($result==false)
{
    echo "Error".$conn->error;
}
else
{
    while($row=$result->fetch_assoc())
    {
        $v1 = $row['total_no_of_classes'];
        $v2 = $row['no_of_classes_present'];
        $per = ($v2/$v1)*100;
        if($per < 75)
        {
            echo "<tr><td>".$row['RollNo']."</td><td>".$row['StudName']."</td><td>".$per."</td></tr>";
        }
    }
}


echo "</table><br><br>";

echo "<form action='deleteUpdation.php' method='post'>";
echo "Enter RollNo : <input type='text' name='drno'/><br><br>";
echo "<input type='submit' value='submit'/>";
echo "</form>";



echo "</center>";
$result->free();
$conn->close();
?>