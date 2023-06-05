<?php
$submit=FALSE;
// below line means if koi name ko set karke post kia to connection banega 
if(isset($_POST['name'])){
    // Set connection variables    
    $server ="localhost";
    $username="root";
    $password="";

    // Create a database connection
    $con=mysqli_connect($server,$username,$password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    //echo "Success Connecting to the database";


    // Collect post variables
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];

    $sql = "INSERT INTO harry_trip.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    // -> is called object operator
    // this means $con ko run karane k lia query function use karunga
    
    
    
    // Execute the Query
    if($con->query($sql)==TRUE){
        //echo "Successfully inserted";


        // Flag for successful insertion
        $submit=TRUE;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the databasse connection
    $con->close();
}    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to JB College US Trip Form</h1>
        <p>Enter your details and sumbit this form to confirm your participation</p>
        
        <?php
        if($submit==TRUE){
            echo "<p class='submitMsg'>Thanks for joining Us!!!</p>";
        }
        
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="text" name="email" id="email" placeholder="Enter Your email">
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea placeholder="Enter any other Information here"name="desc" id="desc" cols="30" rows="10"></textarea>

            <button class="btn">Submit</button>


        </form>


    </div>




    <script src="index.js"></script>
    
</body>
</html>