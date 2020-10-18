<?php
    function updateRecord(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "movieflix_database";

        $connection = mysqli_connect($servername, $username, $password, $database);

        if(mysqli_connect_errno()){
            die("Connection was failed!").mysqli_connect_error();
        }
        /* else{
            echo "connection is made up";
        } */

        $movieID = $_POST["update-id"];
        $movieTitle = $_POST["update-title"];
        $movieGenre = $_POST["update-genre"];
        $movieDirector = $_POST["update-director"];

        $sql = "UPDATE movieflix_table 
                SET movieflix_title = '$movieTitle', movieflix_genre = '$movieGenre', movieflix_director = '$movieDirector' 
                WHERE movieflix_id = '$movieID'";

       if(mysqli_query($connection, $sql)){
           echo "Update successful!";
       }
       else{
           echo "Error: ".$sql.mysqli_error($connection);
       }
        
       mysqli_close($connection);

       header("location: index.php");
    }

    if(isset($_POST["update-submit"])){
       updateRecord();
    }
?>

































