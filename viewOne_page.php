<?php
$rno = $_GET['value'];
include("links.html");

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

session_start();
$_SESSION['roll_no']=$rno;

echo "<div class='d-flex flex-row justify-content-center' style='margin-bottom:30px;'>";
if($result==false)
{
    echo "Error".$conn->error;
}
else
{
    while($row=$result->fetch_assoc())
    {
        if($row['RollNo']==$rno)
        {
            $t=1;
            if($row['Gender']=='F')
            {
                echo "<div style='border-width:2px; border-style:solid; border-color: black; height: 210px; width: 210px; padding:30px; border-radius:50px; margin-right:30px;'><img src='https://img.freepik.com/free-vector/cute-asian-girl-head-cartoon_1308-134567.jpg' style='height:150px; width: 150px;'></div>";
            }
            else
            {
                echo "<div style='border-width:2px; border-style:solid; border-color: black; height: 210px; width: 210px; padding:30px; border-radius:50px; margin-right:30px;'><img src='https://img.freepik.com/free-vector/handsome-boy-with-brown-eyes-black-hair_1308-160536.jpg?size=626&ext=jpg&ga=GA1.1.2082370165.1710720000&semt=ais' style='height:150px; width: 150px;'></div>";
            }
            echo "<div><table border='4' cellspacing='10' cellpadding='10'><tr>";
            echo "<tr><th>Student RollNo</th><td>".$row['RollNo']."</td></tr>";
            echo "<tr><th>Student Name</th><td>".$row['StudName']."</td></tr>";
            echo "<tr><th>Student Username</th><td>".$row['Username']."</td></tr>";
            echo "<tr><th>Password</th><td>".$row['Password']."</td></tr>";
            echo "<tr><th>Student Gender</th><td>".$row['Gender']."</td></tr>";
            echo "<tr><th>Total No. of Classes</th><td>".$row['total_no_of_classes']."</td></tr>";
            echo "<tr><th>No.of Classes Present</th><td>".$row['no_of_classes_present']."</td></tr>";
            echo "</table></div></div>";
            echo "<a href='updatePage.php' style='background-color:#95eded; border-radius:10px; padding: 10px; border-width:0px;'>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href='home.html' style='background-color:#95eded; border-radius:10px; padding: 10px; border-width:0px;'>LogOut</a></center>";
            break;
        }
    }
}
$result->free();
$conn->close();
?>