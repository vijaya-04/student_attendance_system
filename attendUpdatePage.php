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


//retrieving no.of classes done variable in database
$sql1 = "SELECT * FROM student WHERE RollNo='101'";
$result1 = $conn->query($sql1);
if($result1==false)
{
    echo "Error".$conn->error;
}
else
{
    while($row=$result1->fetch_assoc())
    {
        $res1 = $row['total_no_of_classes'];
        break;
    }
}
$result1->free();
$res1++;




//updating no.of classes done variable in database
$sql2 = "UPDATE student SET total_no_of_classes='$res1'";
if(mysqli_query($conn,$sql2))
{
    echo "";
}
else
{
    echo "Error".mysqli_error($conn);
}


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
        $res = 'a'.$row['RollNo'];
        $rno = $row['RollNo'];
        if (isset($_POST[$res])) 
        {
            array_push($pres,$rno);
        }
        else
        {
            array_push($abs,$rno);
        }
    }
}


foreach($pres as $c1)
{
    //retrieving no.of classes present variable in database
    $sql3 = "SELECT no_of_classes_present FROM student WHERE RollNo='$c1'";
    $result3 = $conn->query($sql3);
    if($result3==false)
    {
        echo "Error".$conn->error;
    }
    else
    {
        $row = $result3->fetch_assoc();
        $res3 = $row['no_of_classes_present'];
    }
    $result3->free();
    $res3++;

    //updating no.of classes done variable in database
    $sql4 = "UPDATE student SET no_of_classes_present='$res3' WHERE RollNo='$c1'";
    if(mysqli_query($conn,$sql4))
    {
        echo "";
    }
    else
    {
        echo "Error".mysqli_error($conn);
    }
}

echo "<div class='d-flex flex-row justify-content-center'><div style='margin-right:30px;'>";
echo "<table border='2'>";
echo "<tr><th>Presentees List</th></tr>";
foreach($pres as $x)
{
    echo "<tr><td>$x</td></tr>";
}
echo "</table></div>";

echo "<div>";
echo "<table border='2'>";
echo "<tr><th>Absentees List</th></tr>";
foreach($abs as $x)
{
    echo "<tr><td>$x</td></tr>";
}
echo "</table></div>";
echo "</center>";
$result->free();
$conn->close();
?>