<?php
$rno = $_POST["rno"];
$fname = $_POST["fname"];
$uname = $_POST["uname"];
$pwd1 = $_POST["pwd1"];
$gen = $_POST["gender"];
$temp="";
if($gen == "Male")
{
    $temp = "M";
}
else if($gen == "Female")
{
    $temp = "F";
}


$sn = "localhost";
$un = "root";
$pwd = "";
$db = "sss_46";
$conn = mysqli_connect($sn,$un,$pwd,$db);
if(!$conn)
{
    die("Connection failed".mysqli_connect_error());
}
$sql = "INSERT INTO student(RollNo,StudName,Username,Password,Gender,total_no_of_classes,no_of_classes_present) VALUES ('$rno','$fname','$uname','$pwd1','$temp',10,10)";
if(mysqli_query($conn,$sql))
{
    include("login.html");
}
else
{
    echo "Error".mysqli_error($conn);
}
mysqli_close($conn);
?>