<?php 
    include('database.php');

    class dbQuery extends Database{

        function insertImg($imageFile){
            $image=$imageFile;
            $tmp=$_FILES['image']['tmp_name'];
            $path="uploads/";
            move_uploaded_file($tmp,$path.$image);
        }

        function insert($table,$tableData){
            $key=implode(",",array_keys($tableData));
            $values=implode("','",array_values($tableData));
                // If there is an image in the form
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $key .= ",image";
                $values .= "','". $_FILES['image']['name'];
                // Call the insertImg function to handle image upload
                $this->insertImg($_FILES['image']['name']);
            }
            $sql="INSERT INTO $table ($key) VALUES ('$values')";
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }



        function display($table){
            $sql="SELECT * FROM $table";
            $result=$this->conn->query($sql);
            if($result->num_rows >0){
                while ($row=$result->fetch_assoc()) {
                    $data[]=$row;
                }
                return $data;
            }else{
                echo "error occured";
            } 
        }

        function displayJoin($sql){
            $result=$this->conn->query($sql);
            if($result->num_rows >0){
                while ($row=$result->fetch_assoc()) {
                    $data[]=$row;
                }
                return $data;
            }
        }

        function delete($table,$idName,$id){
            $sql="DELETE FROM $table WHERE $idName=$id";
            $result=$this->conn->query($sql);
            if($result){
                return true;
            }else {
                return false;
            }
        }

        function deleteImg($imageFile){
            unlink("uploads/".$imageFile);
        }

        function fetchData($table,$id){
            $sql= "SELECT * FROM $table WHERE id = $id";
            $result=$this->conn->query($sql);
            if($result->num_rows >0){
                while ($row=$result->fetch_assoc()) {
                    $data[]=$row;
                }
                return $data;
            }
        }


        function edit($table,$id,$tableData){
            $keys=array_keys($tableData);
            $values=array_values($tableData);
            $data = [];
            for ($i = 0; $i < count($keys); $i++) {
                $data[]= "{$keys[$i]}='{$values[$i]}' ";
            }
            $dataString = implode(',',$data); // it gives result -> name='$name' ,age='$age' ,address='$address'
            $sql="UPDATE $table SET $dataString  WHERE id = '$id'";
            $result = $this->conn->query($sql);
            if($result){
                echo "Data updated successfully";
                echo '<br>Go back to <a href="display.php">table</a>';
            }
        }

        function search($searchData){
            $sql = "SELECT Songs.*, Artists.Artist_Name,Artists.Image AS ArtistImage, Genres.Genre_Name, Albums.Title AS AlbumTitle 
                    FROM Songs
                    INNER JOIN Artists ON Songs.Artist_ID = Artists.Artist_ID
                    INNER JOIN Genres ON Songs.Genre_ID = Genres.Genre_ID
                    INNER JOIN Albums ON Songs.Album_ID = Albums.Album_ID
                    WHERE Songs.Title LIKE '%$searchData%'";
            $result = $this->conn->query($sql);
            if(!$result || $result->num_rows === 0) {
                echo "<div id='error-msg'> No Songs Found </div>";
            } else {
                // Process and display the search results
                while($row = $result->fetch_assoc()) {
                    $data[]=$row;
                }
                return $data;
            }
        }
        

        function login($table,$email,$password){
            // $password= md5($password); 
            $sql = "SELECT * FROM $table WHERE email = '$email' AND password='$password'";
            $result = $this->conn->query($sql);
            $findData = $result->num_rows;
            if($findData > 0){
                $row = $result->fetch_assoc();
                session_start(); 
                $_SESSION['id']=$row['User_ID'];
                $_SESSION['first_name']=$row['First_Name'];
                $_SESSION['image']=$row['Image'];
                $_SESSION['auth']=TRUE;
                header("location:index.php");
            }else{
                // $_SESSION['error']="invalid email and password";
                echo '<div>invalid email or password</div>';
            }
        }

        function logout(){
            session_start();
            session_destroy();
            header("Location:login.php");
        }

        //for user authentication
        function sessionCheck(){
            session_start();
            if(!$_SESSION['auth']){
                header("location:login.php");
            }
        }

        function likeSong($songId,$userId){
            $sql = "INSERT INTO likedsongs (User_ID, Song_ID) VALUES ($userId,$songId)";
            $result = $this->conn->query($sql);
            if ($result) {
                echo "liked";
            }
        }

        function dislikeSong($songId,$userId){
            $sql="DELETE FROM likedsongs WHERE User_ID=$userId AND Song_ID = $songId";
            $result = $this->conn->query($sql);
            if ($result) {
                echo "disliked";
            }
        }

        function checkLikeDislike($songId,$userId){
            $sql = "SELECT * FROM likedsongs WHERE User_ID=$userId AND Song_ID = $songId";
            $result = $this->conn->query($sql);
            if($result && $result->num_rows > 0) {
                return true;
            }else{
                return false;
            }
        }

        function checkPlaylistSong($songId,$playlistId){
            $sql = "SELECT * FROM playlist_songs WHERE Playlist_ID=$songId AND Song_ID = $songId";
            $result = $this->conn->query($sql);
            if($result && $result->num_rows > 0) {
                return true;
            }else{
                return false;
            }
        }

        
    }

?>


