<?php
    require_once 'connect.php';
    function set_msg($msg){
        if (!empty($msg)) {
            echo "<html>
            <head>
                <link rel='stylesheet' href='../assets/css/snack.css'>
            </head>
            <body>
            <div id='snackbar'>".$msg."</div>
            <script src='../script/script.js'></script>
            </body>
            </html>";
        }
    }
?>
