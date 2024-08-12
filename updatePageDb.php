<?php
$rno = $_POST['roll'];
$fname = $_POST['sname'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$gen = $_POST['gen'];


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

$sql1 = "SELECT * FROM student";
$result = $conn->query($sql1);
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
            if($fname=="")
            {
                $fname=$row['StudName'];
            }
            if($uname=="")
            {
                $uname=$row['Username'];
            }
            if($pwd=="")
            {
                $pwd=$row['Password'];
            }
            if($gen=="")
            {
                $gen = $row['Gender'];
            }
        }
    }
}


$sql = "UPDATE student SET StudName='$fname',Username='$uname',Password='$pwd',Gender='$gen' WHERE RollNo=$rno";
if(mysqli_query($conn,$sql))
{
    echo "<script>alert('Updated Successfully');</script>";
    header("Location: viewOne_page.php?value=$rno");
}
else
{
    echo "Error".mysqli_error($conn);
    mysqli_close($conn);
}

?>