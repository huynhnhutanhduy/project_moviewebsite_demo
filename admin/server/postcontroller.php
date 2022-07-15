<?php

include 'product.php';

$action = $_GET["action"];

if($action == "create"){
     // Get new information
     $movie = new Movie();
     $movie->movieName = $_GET["movieName"] ;
     $movie->categoryName = $_GET["categoryName"] ;
     $movie->movieLink = $_GET["movieLink"] ;
     $movie->movieDescription = $_GET["movieDescription"] ;

     // Call function createAjax()
     createMovie($movie);
}elseif($action == "delete"){
     // Get Id needs delete request
     $movieId = $_GET["Id"] ;
     // $movieName = $_GET["movieName"];

     // Call function deleteAjax()
     deleteMovie($movieId);
}elseif($action == "update"){
     // Get Id request
     $movieId = $_GET["Id"] ;
     // New update information
     $newMovie = new Movie();
     $newMovie->movieName = $_GET["movieName"] ;
     $newMovie->categoryName = $_GET["categoryName"] ;
     $newMovie->movieLink = $_GET["movieLink"] ;
     $newMovie->movieDescription = $_GET["movieDescription"] ;

     // Call function updateAjax()
     updateMovie($movieId, $newMovie);
}elseif($action == "search"){
     // Get keyword needs search request
     $keyword = $_GET["keyword"];

     // Call function searchAjax()
     searchMovie($keyword);
}elseif($action == "manage"){
     // Call function manageAjaz()
     manageMovie();
}


// Link test: localhost/aecaychuoi/admin/server/postcontroller?action=create&movieName=Z&categoryName=Hành+động&movieLink=https://cellphones.com.vn/samsung-galaxy-a32.html&movieDescription=phim+rất+hay
function createMovie($movie){
     //Get data from database
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "datamovie";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Change character set to utf8 => Fix lỗi tiếng Việt
     $conn -> set_charset("utf8");

     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }

     //câu query test từ localhost/phpmyadmin/ và đảm bảo câu query phải chạy được trong sql
     $sql = "INSERT INTO  linkmovie(MovieName, CategoryName, MovieLink, MovieDescription) VALUES('$movie->movieName', '$movie->categoryName', '$movie->movieLink', '$movie->movieDescription')";
     // echo $sql;
     // die();

     //3. Response result to client/user
     if ($conn->query($sql) === TRUE) {
          echo "Product has been successfully created <br>";
     } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
     }

     //Close connection to database
     $conn->close();
}


// Link test: localhost/aecaychuoi/admin/server/postcontroller?action=delete&Id=1
function deleteMovie($movieId){
     //Get data from database
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "datamovie";
 
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Change character set to utf8 => Fix lỗi tiếng Việt
     $conn -> set_charset("utf8");
 
     // Check connection
     if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
     }
      
     // sql to delete a record
     $sql = "DELETE FROM linkmovie WHERE Id = $movieId" ;
      
     if ($conn->query($sql) === TRUE) {
          echo "Movie with Id $movieId has been successfully deleted from database ";
     } else {
          echo "Error deleting record: " . $conn->error;
     }
 
     //Close connection to database
     $conn->close();
}


// Link test: localhost/aecaychuoi/admin/server/postcontroller?action=update&Id=11&movieName=ZZZ&categoryName=Hành+động&movieLink=https://cellphones.com.vn/samsung-galaxy-a32.html&movieDescription=phim+rất+hay
function updateMovie($movieId, $newMovie){
     //Get data from database
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "datamovie";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Change character set to utf8 => Fix lỗi tiếng Việt
     $conn -> set_charset("utf8");

     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }

     //câu query test từ localhost/phpmyadmin/ và đảm bảo câu query phải chạy được trong sql
     $sql = "UPDATE linkmovie SET MovieName = '$newMovie->movieName', CategoryName = '$newMovie->categoryName', MovieLink = '$newMovie->movieLink' , MovieDescription = '$newMovie->movieDescription' WHERE Id = $movieId";
     // echo $sql;
     // die();

     //3. Response result to client/user
     if ($conn->query($sql) === TRUE) {
          echo "Movie with Id $movieId has been successfully updated";
     } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     }

     //Close connection to database
     $conn->close();
}

// Link test: localhost/aecaychuoi/admin/server/postcontroller?action=search&keyword=AAA
function searchMovie($keyword){
     //Get data from database
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "datamovie";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Change character set to utf8 => Fix lỗi tiếng Việt
     $conn -> set_charset("utf8");

     // Check connection
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT * FROM linkmovie WHERE MovieName LIKE '%$keyword%' ORDER BY Id ASC LIMIT 100";

     $result = $conn->query($sql);
     // var_dump($result);
     // die();

     //return result as JSON
     if ($result->num_rows > 0) {
          //Convert $result to json format
          $data = $result->fetch_all(MYSQLI_ASSOC);
          // var_dump($data);
          // die();
          echo json_encode($data);
     } else {
          // $dataString = "No result found";
          echo json_encode(["No result found"]);
     }
     
     //Close connection to database
     $conn->close();
}


// Link test: localhost/aecaychuoi/admin/server/postcontroller?action=manage
function manageMovie(){
     //Get data from database
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "datamovie";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Change character set to utf8 => Fix lỗi tiếng Việt
     $conn -> set_charset("utf8");

     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT * FROM linkmovie ORDER BY Id ASC";
     $result = $conn->query($sql);

     // return result as JSON
     if ($result->num_rows > 0) {
          //Convert $result to json format
          $data = $result->fetch_all(MYSQLI_ASSOC);
          // var_dump($data);
          // die();
          echo json_encode($data);
     } else {
          // echo "{resul:\" No result found\"}";
          echo json_encode(["No result found"]);
     }

     //Close connection to database
     $conn->close();
}
?>