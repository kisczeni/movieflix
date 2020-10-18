<DOCTYPE html>
<html>
    <head>
        <title>MovieFlix</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/ef1b9cb013.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ef1b9cb013.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="header-container">
                <div id="logo-div"><span id="logo-span">MovieFlix</span>
                </div>
                <p id="para-header">where many movies are in one place...</p>
                <nav>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#movies">Movies</a></li>
                        <li id="dropdown"><a href="#">Our Partners <i class="fas fa-caret-down"> </i></a>
                            <ul id="sublist">
                                <li class="sublist-item"><a href="https://www.imdb.com/" target="_blank">IMDb</a></li>
                                <li class="sublist-item"><a href="https://www.netflix.com/" target="_blank">Netflix</a></li>
                                <li class="sublist-item"><a href="https://www.sorozatjunkie.hu/" target="_blank"> Sorozatjunkie</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#">Log In/Sign In</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <section id="about-section">
                <a name="about"></a>
                <h2>About</h2>
                <div class="about-container">
                    <div class="about-text">
                        <p> 
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
                            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
                            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
                            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                            <br><br>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,
                            vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. 
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                    </div>
                    <div class="img-wrapper">
                        <div class="img" id="right">
                            <img src="team.jpg" alt="">
                            <p>Our team</p>
                        </div>
                        <div class="img" id="left">
                            <img src="cinema.jpg" alt="">
                            <p>In the cinema</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="films-section">
                <a name="movies"></a>
                <?php 
                    require_once "create.php";
                    require_once "update.php";
                    require_once "delete.php";
                ?>
                
                <div id="content-wrapper">
                    <h2>MovieFlix CRUD</h2>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "movieflix_database";

                        // creating a connection to database

                        $connection = mysqli_connect($servername, $username, $password, $database);

                        // check if connection was not successful

                        if(mysqli_connect_errno()){
                            die("Failed to connect").mysqli_connect_error();
                        }
                        /*else{
                            echo "Connection was succesful!";
                        }*/
                        
                        // query a table for the records, then set up our query

                        $sql = "SELECT * FROM movieflix_table";

                        // store the result of our query

                        $result = mysqli_query($connection, $sql);

                        $rowCount = mysqli_num_rows($result);
                        
                        if($rowCount > 0){
                            echo "
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Genre</th>
                                            <th>Director</th>
                                        </tr>
                                    </thead>
                            ";
                        }
                    ?>
                    <?php 
                        while($row = $result -> fetch_assoc()): ?>  <!-- $row = mysqli_fetch_assoc($result); -->
                            <tbody>
                                <tr>
                                    <td><?php echo $row["movieflix_id"]?></td>
                                    <td><?php echo $row["movieflix_title"]?></td>
                                    <td><?php echo $row["movieflix_genre"]?></td>
                                    <td><?php echo $row["movieflix_director"]?></td>
                                </tr>
                            </tbody>
                        <?php 
                            endwhile; 
                            mysqli_close($connection);
                        ?>
                    </table>
                </div>

                <div id="line-div"></div>

                <div id="form-wrapper">
                    <button class="form-wrapper-button" id="create-button">Create movie</button>
                    <button class="form-wrapper-button" id="update-button">Update movie</button>
                    <button class="form-wrapper-button" id="delete-button">Delete movie</button>

                    <form action="create.php" method="POST" id="create-form">
                        <input type="text" placeholder="Enter movie title" name="create-title" required> <br>
                        <input type="text" placeholder="Enter movie genre" name="create-genre" required> <br>
                        <input type="text" placeholder="Enter movie director" name="create-director" required> <br>
                        <input type="submit" value="Save" name="create-submit" class="small-button" id="small-button-green"> <br>
                    </form>

                    <form action="update.php" method="POST" id="update-form">
                        <input type="text" placeholder="Enter movie ID" name="update-id" required class="only-number"> <br>
                        <input type="text" placeholder="Enter movie title" name="update-title" required> <br>
                        <input type="text" placeholder="Enter movie genre" name="update-genre" required> <br>
                        <input type="text" placeholder="Enter movie director" name="update-director" required> <br>
                        <input type="submit" value="Update" name="update-submit" class="small-button" id="small-button-orange"> <br>
                    </form>
                    
                    <form action="delete.php" method="POST" id="delete-form">
                        <input type="text" placeholder="Enter movie ID (number)" name="delete-id" required class="only-number"> <br>
                        <input type="submit" value="Delete" name="delete-submit" class="small-button" id="small-button-red"> <br>
                    </form>
                    <!-- <a id="myAnchor" href="https://w3schools.com/">Go to W3Schools.com</a> -->
                </div>
            </section>
        </main>
        <footer class="contact-section">
            <a name="contact"></a>
    	    <!--      missing        -->
        </footer>
        <script src="script.js"></script>
    </body>
</html>
