<?php
    if(count($_POST)>0) {    
        $con=mysqli_connect("localhost","root","root","booksdb");
        $name = $_POST['name'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $price = $_POST['price'];
        $seller = $_SESSION['user_id'];
        $image = $_POST['image'];
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