<?php
    $cid = $_POST["id"];

    $servername = "localhost";
    $user = "root";
    $passw = "";
    $dbname = "person";

    $conn = mysqli_connect($servername, $user, $passw, $dbname);
    //echo $_POST["name"];
    if (!$conn) {
        die("connection failed:" . mysqli_connect_error());
    }
    $sql = "SELECT name, id FROM county WHERE country_id=$cid";
    $result = mysqli_query($conn, $sql);
    echo '<option value="default" selected>Choose your County...</option>';
    $i=0;
    while ($row = mysqli_fetch_array($result)) {
        $i+=1;
        if($i==$county_id){
            echo'<option value=' . $row["id"] . ' selected >' . $row["name"] . '</option>';
        }
        else{
            echo'<option value=' . $row["id"] . '>' . $row["name"] . '</option>';
        }
    }
?>
