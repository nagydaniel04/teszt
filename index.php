<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
            $("#hidden").hide();
            $("#country").change(function(){               
                $("#hidden").show();
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
                <?php if(true): ?>
                <input value="<?php if(isset($name))echo $name; ?>" class="form-control" id="name" type="text" name="name">
                <?php endif; ?>
                <?php    if(isset($okname)){
                        if($okname==0){
                            echo '<p style="color:red;">***Incorrect name</p>';
                        }
                    }
                ?>
            </fieldset>
            <fieldset class="form-group">
                <label for="email">Email:</label>
                <?php if(true): ?>
                <input value="<?php if(isset($email)) echo $email; ?>" class="form-control" id="email" type="text" name="email">
                <?php endif; ?>
                <?php
                    if(isset($okmail)){
                        if($okmail==0){
                            echo '<p style="color:red;">***Incorrect email</p>';
                        }
                    }
                ?>
            </fieldset>
            <fieldset class="form-group">
                <label for="country">Country:</label>
                <select class="form-control" id="country" name="country">
                    <option value="default">Choose your Country...</option>
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
                 <?php
                    if(isset($okcountry)){
                        if($okcountry==0){
                            echo '<p style="color:red;">***Choose your Country</p>';
                        }
                    }
                ?>
                <span id="hidden"> 
                <label for="county" id="countyl">County:</label>                   
                <select class="form-control" id="county" name="county">
                    <option value="default"></option>
                </select>
                <?php
                    if(isset($okcounty)){
                        if($okcounty==0){
                            echo '<p style="color:red;">***Choose your County</p>';
                        }
                    }
                    ?>
                </span>
            </fieldset>
            <input class="btn" type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>