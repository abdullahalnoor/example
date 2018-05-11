<?php

class Blog {

    public function saveBlogInfo($data) {
        $link = mysqli_connect('localhost', 'root', '', 'bitm-php-64');

        $sql = "INSERT INTO blogs (blog_title, author_name, blog_description, publication_status) VALUES ('$data[blog_title]', '$data[author_name]', '$data[blog_description]', '$data[publication_status]')";

        if (mysqli_query($link, $sql)) {
            $mesage = "Blog info save successfully";
            return $mesage;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    public function getAllBlogInfo() {
        $link = mysqli_connect('localhost', 'root', '', 'bitm-php-64');
        $sql = "SELECT * FROM blogs ORDER BY id DESC";
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    public function selectBlogInfoByBlogId($blogId) {
        $link = mysqli_connect('localhost', 'root', '', 'bitm-php-64');
        $sql = "SELECT * FROM blogs  WHERE id = '$blogId' ";
        
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    
    public function updateBlogInfo($data, $blogId) {
         $link = mysqli_connect('localhost', 'root', '', 'bitm-php-64');
         $sql = "UPDATE blogs SET blog_title = '$data[blog_title]', author_name = '$data[author_name]', blog_description ='$data[blog_description]', publication_status = '$data[publication_status]' WHERE id = '$blogId' ";
         if (mysqli_query($link, $sql)) {
             header('Location: view-blog.php');
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

}
