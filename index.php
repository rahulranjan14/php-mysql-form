<?php
    $insert = false;
    if(isset($_POST['name'])){

//set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";


    //create a db connection
    $con = mysqli_connect($server, $username, $password);

    //check for connection success
    if (!$con) {
        die("connection to db failed due to" . mysqli_connect_error());
    }
    // echo "connection to db successful";


//collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ref = $_POST['ref'];
    $sql = "INSERT INTO  `ikyafreepasses`.`ikyapasses` 
    ( `name`, `age`, `gender`, `email`, `phone`, `ref`, `dt`)
     VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$ref', current_timestamp())";

    //  echo $sql;


    //execute the query
    if ($con->query($sql) == true) {
        // echo "successfully inserted";

        //flag for successfull insertion
        $insert = true;
    }
    else {
        echo "Error : $sql <br> $con->error";
    }


    //closing db connection
    $con->close();
    }
?>

 <!-- for empty cases -->
<!-- $name =  (isset($_POST['name']) ? $_POST['name'] : null);
    $age = (isset($_POST['age']) ? $_POST['age'] : null);
    $gender = (isset($_POST['gender']) ? $_POST['gender'] : null);
    $email = (isset($_POST['email']) ? $_POST['email'] : null);
    $phone = (isset($_POST['phone']) ? $_POST['phone'] : null);
    $ref = (isset($_POST['ref']) ? $_POST['ref'] : null); -->



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ikya registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- <img class="bg" src="./event3.jpeg" alt="fiesta"> -->
    <div class="container">
        <h1> <span class="ikya">ikya</span> <span class="year">2020</span> </h1>
        <p>register in advance to get your free passes.</p>

        <?php
        if($insert == true){
       echo  "<p class='submsg'>thanks for showing your interest, we will contact you soon</p>";
        }
 ?>

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="number" name="phone" id="phone" placeholder="enter your phone number">
            <textarea name="ref" id="ref" cols="30" rows="10"
             placeholder="how do you came to know about ikya"></textarea>
             <button class="btn">Submit</button>
        </form>


    </div>
    <script src="index.js"></script>


    


</body>
</html>