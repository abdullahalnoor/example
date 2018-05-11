<?php

namespace App\classes;
use App\classes\Database;

class Blog {
    
    public function saveBlogInfo($data) {
        session_start();
        $sql = "INSERT INTO blogs (category_id, blog_title, author_name, blog_description, publication_status) VALUES ('$data[category_id]', '$data[blog_title]',  '$_SESSION[name]', '$data[blog_description]', '$data[publication_status]' )";
        $link = Database::db_connect();
        if (mysqli_query($link, $sql) ) {
            $message = "Blog info save successfully";
            return $message;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
    
    public function getAllBlogInfo() {
        $sql = "SELECT b.*, c.category_name FROM blogs as b, categories as c WHERE b.category_id = c.id ";
        $link = Database::db_connect();
        if (mysqli_query($link, $sql) ) {
            $queryResult = mysqli_query($link, $sql); 
            return $queryResult;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
    
}
