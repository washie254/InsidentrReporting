<?php
function GetCoordinate(){
 $con = mysqli_connect('localhost', 'root', '', 'mojor');
 $sql = "SELECT * FROM insident";
 $result = mysqli_query($con, $sql);

    $i = 0;
    $my_array = array();

    while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
    {
        $my_array[$i]['lat'] = $row[6];
        $my_array[$i]['lng'] = $row[7];
        $lat = $my_array[$i]['lat'];
        $lng = $my_array[$i]['lng'];
        $i++;
    }
    return $my_array;
}

?>