<?php
    function deleteRecord(){

        // creating a connection to our database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "movieflix_database";
        
        $connection = mysqli_connect($servername, $username, $password, $database);

        if(mysqli_connect_errno()){
            die("Connection was failed!").mysqli_connect_error();
        }
        // else{
        //     echo "Connection was successful!";
        // }

        // create an ID variable to store user ID input
        $movieID = $_POST["delete-id"];

        // define SQL query
        $sql = "DELETE FROM movieflix_table 
                WHERE movieflix_id = '$movieID'";
        
        // execute our query
        if(mysqli_query($connection, $sql)){
            echo "Deleting was successful!";
        }
        else{
            echo "Error: ".$sql.mysqli_error($connection);
        }

        // close database connection
        mysqli_close($connection);

        // redirect the user back to index.php
        header("location: index.php");
    }

    if(isset($_POST["delete-submit"])){
        deleteRecord();
    }
?>