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
        //validation
        $isname="/^[A-Z][a-z]+ [A-Z][a-z]+$/";
        $okname=1;
        $okmail=1;
        if (empty($name)||!preg_match($isname,$name)||strlen($name)>30 ) {
            echo 'Incorrect name<br>';
            $okname=0;
        }
        if (empty($email)||strlen($email)>30||(filter_var($email, FILTER_VALIDATE_EMAIL) === false)){
            echo 'Incorrect email<br>';
            $okmail=0;
        }
        if($okname&&$okmail) {
                $sql="INSERT INTO person(name, email, country_id,county_id)
                VALUES('$name','$email','$country_id','$county_id')";
                if(mysqli_query($conn,$sql)){
                    echo "Succes";
                }
                else{
                    echo "Fail";
                }
        }
        else{
            include 'index.php';
        }
        
        ?>
    </body>
</html>
