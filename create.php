<?php

    // create record function
    
    function createRecord(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "movieflix_database";
    
        // creating a connection to database

        $connection = mysqli_connect($servername, $username, $password, $database);

        // check if connection was successful or not

        if(!$connection){
            die("Connection was unsuccessful! ".mysqli_connect_error()); 
        }
        else{
            echo "Connection was successful! ";
        }

        // storing userinput into variables

        $movieTitle = $_POST["create-title"];
        $movieGenre = $_POST["create-genre"];
        $movieDirector = $_POST["create-director"];

        // attempting INSERT data into our table

        $sql = "INSERT INTO movieflix_table (movieflix_title, movieflix_genre, movieflix_director)
                VALUE ('$movieTitle', '$movieGenre', '$movieDirector')";

        // check if inserting data was successful
        
        if(mysqli_query($connection, $sql)){
            echo "Succesfully inserted data"; 
        }
        else{
            echo "Error: ".$sql.mysqli_error($connection);
        }
        
        // close connection
        mysqli_close($connection);
        
        // re-directing the user back to the main page index.php
        header("location: index.php");

    }

    if(isset($_POST["create-submit"])){
        createRecord();
    }
?>