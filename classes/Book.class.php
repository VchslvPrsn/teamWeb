<?php

namespace Book;

class Book
{
    private $id;
    private $db;
    private $book_id;
    private $name;
    private $author;
    private $genre_id;
    private $price;
    private $seller_id;
    private $image;

    private $db_host = "localhost";
    private $db_name = "booksdb";
    private $db_user = "root";
    private $db_pass = "root";

    public function __construct($name = null)
    {
        $this->name = $name;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function create($name, $author, $genre_id, $price, $seller_id, $image) {

        $query = "insert into books (name, author, genre_id, price, seller_id, image)
            values (:username, :author, :genre_id, :price, :seller_id, :image)";
        $sth = $this->db->prepare($query);

        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
                    ':name' => $name,
                    ':author' => $author,
                    ':genre_id' => $genre_id,
                    ':price' => $price,
                    ':seller_id' => $seller_id,
                    ':image' => $image,
                )
            );
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        } 

        return $result;
    }
}
?>