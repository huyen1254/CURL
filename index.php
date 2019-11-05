<?php
include './Database.php';
?>
<form method="POST" action="">
       
        <input type="text" value="" placeholder="" name="urlPages"><br>
        <button type="submit" name="submit">SUBMIT</button>
</form>

    <?php

        if (isset($_POST['submit'])) {
        $urlPages = $_POST['urlPages'];
        $mysql_conn = new Database($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        if (!$mysql_conn->isConnectDatabase()) return;

        $curl = new Curl();
        $rows = array(
            "vnexpress" => new Vnexpress(),
            "vietnamnet" => new Vietnamnet(),
            "dantri" => new Dantri()
        );

        (new Crawler($curl, $mysql_conn, $rows))->parsePage($urlPages);
         }
    ?>
  