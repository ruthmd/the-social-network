<?php
    session_start();
    require_once 'snack.php';
?>
<html>
<title>feed</title>
    <link rel="stylesheet" href="../assets/css/feed.css">
</head>
<body>
<ul>
    <li class="hi">
        <?php
            $uid=$_SESSION['id'];
            $query = "SELECT first FROM user WHERE id='$uid'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            echo "Hi ".$row['first']." !";
        ?>
    </li>
    <li>
        <form action='logout.php'>
            <button>LOG OUT</button>
        </form>
    </li>
    <li>
        <a href="feed.php">Upload pics</a>
    </li>
</ul>
<?php
    //upload the file path to db
    if (isset($_POST['upload'])) {
        $file_path="images/".basename($_FILES['image']['name']);
        $image=$_FILES['image']['name'];
        $txt=$_POST['text'];

        $query="INSERT INTO images (image,text) VALUES ('$image','$txt')";
        mysqli_query($conn,$query);
        if (move_uploaded_file($_FILES['image']['tmp_name'],$file_path)) {
            set_msg("upload successful");
        }else {
            set_msg("upload unsuccessful");
        }
    }
    //display image from database
    $query="SELECT * FROM images";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)) {
        echo "<div id='post'>
                <div id='img_div'>
                    <p id='pa'>".$row['text']."</p>
                    <img src='images/".$row['image']."'>
        </div>";


        // echo "<div class='ld'>";
        //     echo "<img src='assets/images/fistr.png' height='5px' width='5px'>";
        //     echo "<img src='assets/images/fistb.png' height='5px' width='5px'>";
        // echo "</div>";

        // $data = getimagesize($filename);
        // $width = $data[0];
        // $height = $data[1];
        
        // </div id='ld'>
        //     <img id='l' src='../assets/images/like.svg'>
        //     <img id='d' src='../assets/images/dislike.svg'>
        // <div>
    }
    ?>
</body>
</html>
