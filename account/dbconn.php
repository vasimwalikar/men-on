    <?php
    //Give your mysql username password and database name
    $name="root";
    $pas="";
    $dbname="menon_db";
    $con=mysql_connect("localhost",$name,$pas);
    mysql_select_db($dbname,$con);
    ?>