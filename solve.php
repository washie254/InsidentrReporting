<?php

// connect to the database
include('connect-db.php');

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable from the URL
$id = $_GET['id'];

// delete record from database
if ($stmt = $mysqli->prepare("UPDATE  insident SET instatus='SOLVED' WHERE incId= ? LIMIT 1"))
{
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->close();

    $con = mysqli_connect('localhost','root','','mojor');
    $sql = "SELECT * FROM insident WHERE incId= $id";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        $uid= $row[8];
        $incTitle=$row[1];
    }
    $authId = 'IRS staff';
    $cdate = date("Y-m-d");
    $ctime = date("h:i:s");
    $msg = "Your Reported incident with title".$incTitle." has been solved. Thank you for reporting ";
    $query = "INSERT INTO notifications (authId, userId, date, time, incTitle, message) 
                VALUES('$authId', '$uid', '$cdate','$ctime','$incTitle','$msg')";
    mysqli_query($con, $query);

}

// IF  DELETION FAILS 
else {
    echo "ERROR: could not prepare SQL statement.";
}
$mysqli->close();
// redirect user after delete is successful
header("Location:auth_index.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: auth_view.php");
}
?>