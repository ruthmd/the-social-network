<?php
    session_start();
    require_once 'snack.php';
    error_reporting(0);
    if(isset($_SESSION['id'])){
        header("Location: feed.php");
    }
    else {
        if (empty($_POST)===false) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $query = "SELECT * FROM user WHERE email='$email' AND pwd='$password'";
            $result = $conn->query($query);

            if (empty($email)===true||empty($password)===true) {
                set_msg("Fill out all the fields!");
            }else if(!$row = $result->fetch_assoc()) {
                set_msg("Your username or password is incorrect!");
            }else{
                $_SESSION['id'] = $row['id'];
                header("Location: feed.php");
                exit();
            }
        }
        else {
            header("Location: login.php");
        }
    }
?>


<html>
<head charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
    <div style="opacity:0.65">
        <img src="../assets/images/wave1.jpg" height="100%" width="100%">
    </div>
    <form method="post" action="../php/login.php">
        <h1>Log in</h1>
        <label for="mail">Email address</label><br>
        <input type="email" id="mail" name="email" autocomplete="off"><br>
        <label for="pass">Password</label><br>
        <input type="password" id="pass" name="password"><br>
        <center><input type="submit" value="Log in"></center>
        <div class="acc">New to tsn? <a href="su.html">Create an account</a></div>
    </form>
</body>
</html>
