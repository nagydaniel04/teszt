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
    echo '<option value="default">Choose your County...</option>';
    while ($row = mysqli_fetch_array($result)) {
        echo'<option value=' . $row["id"] . '>' . $row["name"] . '</option>';
    }
?>
