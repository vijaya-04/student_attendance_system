<?php
$uname=$_POST["uname"];
$pwd1 = $_POST["pwd1"];

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
if($uname=="admin" && $pwd1=="admin123")
{
    $t=1;
    include("link_page.html");
}
        
$sql = "SELECT * FROM student";
// $result = $conn->query($sql);
$result = mysqli_query($conn,$sql);
if($result==false)
{
    echo "Error".$conn->error;
}
else
{
    while($row=$result->fetch_assoc())
    {
         if($row['Username']==$uname && $row['Password']==$pwd1)
        {
            $t=1;
            $rno = $row['RollNo'];
            header("Location: viewOne_page.php?value=$rno");
            break;
        }
    }
}
if($t==0)
{
    echo "<script>alert('Not a valid user');</script>";
    include("login.html");
}
$result->free();
$conn->close();
?>