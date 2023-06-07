<?php
session_start();
include('/lk.php');
$con=mysqli_connect("localhost","root","root","booksdb");
    if(count($_POST)>0) {    
        $name = $_POST['name'];
        $author = $_POST['author'];
        $genre = $_POST['genres'];
        $price = $_POST['price'];
        $seller = $_SESSION['user_id'];
        $image = addslashes(file_get_contents($_FILES['image']['name']));
        if(empty($_POST['id'])){
            $query = "insert into books(name,author,genre_id,price,seller_id,preview)
            VALUES ('$name','$author','$genre','$price','$seller','$image')";
        }
        $res = mysqli_query($con, $query);
        if($res) {
            echo json_encode($res);
        } else {
            echo "Error: " . $sql . "" . mysqli_error($con);
        }
    }
?>