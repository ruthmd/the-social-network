<?php
    session_start();
    require_once 'snack.php';
    $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
    $last_name= mysqli_real_escape_string($conn,$_POST['last_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);

    if (empty($first_name)||empty($last_name)||empty($email)||empty($pwd)){
        set_msg("Fill out all the fields!");
    }
    else{
        $query = "SELECT id FROM user WHERE email ='$email'";
        $result = $conn->query($query);
        $uidcheck = mysqli_num_rows($result);
        if ($uidcheck > 0){
            set_msg("This email id already exists!");
        }
        else{
        $query = "INSERT INTO user (first, last, email, pwd) VALUES ('$first_name', '$last_name', '$email', '$pwd')";
        $result = $conn->query($query);
        set_msg("successful registration");
        header("Location: ../pages/login.html");
        exit();//may have to be removed
        }
    }
?>

<html>
<head charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
    <div style="opacity:0.75">
        <img src="../assets/images/Cave.jpg" height="100%" width="100%">
    </div>
    <form method="post" action="../php/signup.php">
        <h1>Sign up</h1>
        <label for="fname">First name</label><br>
        <input type="text" id="fname" name="first_name" autocomplete="off"><br>
        <label for="lname">Last name</label><br>
        <input type="text" id="lname" name="last_name" autocomplete="off"><br>
        <label for="mail">Email address</label><br>
        <input type="email" id="mail" name="email" autocomplete="off"><br>
        <label for="pass">create password</label><br>
        <input type="password" id="pass" name="password"><br>
        <center><input type="submit" value="Sign up"></center>
        <div class="acc">Already have an account ... ?<br>
            <center><a href="ls.html">Login in here</a></center>
        </div>
    </form>

</body>
</html>
