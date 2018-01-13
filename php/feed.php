<?php
    session_start();
    require_once 'snack.php';
 ?>

 <html>
 <head>
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
                <a href="profile.php">View your profile</a>
            </li>
         </ul>
        <div id="content">
            <form id="picu" action="profile.php" method="post" enctype="multipart/form-data">
                <div><input type="hidden" name="size" value="1000000"></div>
                <div><input class="bt" type="file" name="image" ></div>
                <div><textarea name="text" rows="4" cols="40" placeholder="CC"></textarea></div>
                <div><input class="bt" type="submit" name="upload" value="Upload"></div>
        </form>
     </div>
    </div>
</body>
</html>
