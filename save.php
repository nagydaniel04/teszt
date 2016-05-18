<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $servername="localhost";
        $user="root";
        $passw="";
        $dbname="person";
        
        $conn=mysqli_connect($servername, $user, $passw, $dbname);
        //echo $_POST["name"];
        if (!$conn){
            die("connection failed:".mysqli_connect_error());
        }
        //countries->html
//        $country="SELECT name FROM country";
//        $queryc=  mysql_query($country);
//        while($row= mysql_fetch_array($query)){
//            echo"$row[name]";
//        }
        $name=$_POST["name"];
        $email=$_POST["email"];
        $country_id=2;
        $county_id=2;
        $sql="INSERT INTO person(name, email, country_id,county_id)
            VALUES('$name','$email','$country_id','$county_id')";
        //echo $sql;
        if(mysqli_query($conn,$sql)){
            echo "letrejott egy sor";
        }
        else{
            echo "nem sikerult";
        }
        ?>
    </body>
</html>
