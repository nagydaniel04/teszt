<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body text-align="center">
        <?php
        $servername="localhost";
        $user="root";
        $passw="";
        $dbname="person";
        
        $conn=mysqli_connect($servername, $user, $passw, $dbname);
        //echo $_POST["name"];
        if (!$conn){
            die("connection failed:".mysqli_connect_error());
        }
        $name=$_POST["name"];
        $email=$_POST["email"];
        $country_id=$_POST["country"];
        $county_id=$_POST["county"];
        $sql="INSERT INTO person(name, email, country_id,county_id)
            VALUES('$name','$email','$country_id','$county_id')";
        if(mysqli_query($conn,$sql)){
            echo "Succes";
        }
        else{
            echo "Fail";
        }
        ?>
    </body>
</html>
