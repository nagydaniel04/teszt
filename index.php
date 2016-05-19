<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
            $("#county,#countyl").hide();
            $("#country").change(function(){               
                $("#county,#countyl").show();
                $.ajax({
                    url:"countysearch.php",
                    method:"POST",
                    data: {id: $("#country").val()}
                }).success(function(result){
                    $("#county").html(result);             
                })
            });
        });
        </script>       
    </head>
    <body>
        <form method="POST" action="save.php" class="form">
            <fieldset class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" id="name" type="text" name="name"><br>
            </fieldset>
            <fieldset class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" id="email" type="text" name="email"><br>
            </fieldset>
            <fieldset class="form-group">
                <label for="country">Country:</label>
                <select class="form-control" id="country" name="country">
                <?php $servername="localhost";
                    $user="root";
                    $passw="";
                    $dbname="person";

                    $conn=mysqli_connect($servername, $user, $passw, $dbname);
                    //echo $_POST["name"];
                    if (!$conn){
                        die("connection failed:".mysqli_connect_error());
                    }
                     $country="SELECT name FROM country";
                     $result=mysqli_query($conn,$country);
                     $i=0;
                     while($row= mysqli_fetch_array($result)){
                        $i+=1;
                        echo'<option value='.$i.'>'.$row["name"].'</option>';                        
                     }
                 ?>
                </select>
                <label for="county" id="countyl">County:</label>
                <select class="form-control" id="county" name="county">
                </select>
            </fieldset>
            <input class="btn" type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>