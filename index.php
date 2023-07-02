
<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `travel`.`travel` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
   

    
    if($con->query($sql) == true){
        
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Travel</title>
</head>
<body>
    <div class="container">
        <h1>WELCOME TO THE WEBSITE </h1>

        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting the form</p>";
        }
     
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id ="name" placeholder="Enter your name">
            <input type="text" name="age" id ="age" placeholder="Enter your age">
            <input type="text" name="gender" id ="gender" placeholder="Enter your gender">
            <input type="email" name="email" id ="email" placeholder="Enter your email">
            <input type="number" name="phone" id ="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10"  placeholder="Enter your address">
            </textarea>
            <button class="btn">
                Submit
            </button>
            

        </form>
    </div>
    <script>

    </script>
</body>
</html>
