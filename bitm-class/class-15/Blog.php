<?php

class Blog {

    private $link;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', '', 'bitm-php-64');
    }

    public function queryExecute($sql, $status = NULL) {
        if (mysqli_query($this->link, $sql)) {
            if ($status) {
                $queryResult = mysqli_query($this->link, $sql);
                return $queryResult;
            } else {
                $mesage = "Blog info save successfully";
                return $mesage;
            }
        } else {
            die('Query Problem' . mysqli_error($this->link));
        }
    }

    public function saveBlogInfo($data) {
        $sql = "INSERT INTO blogs (blog_title, author_name, blog_description, publication_status) VALUES ('$data[blog_title]', '$data[author_name]', '$data[blog_description]', '$data[publication_status]')";
        $mesage = $this->queryExecute($sql);
        return $mesage;
    }

    public function getAllBlogInfo() {
        $sql = "SELECT * FROM blogs ORDER BY id DESC";
        $status = 'select';
        $queryResult = $this->queryExecute($sql, $status);
        return $queryResult;
    }

    public function selectBlogInfoByBlogId($blogId) {
        $sql = "SELECT * FROM blogs  WHERE id = '$blogId' ";
        $status = 'select';
        $queryResult = $this->queryExecute($sql, $status);
        return $queryResult;
    }

    public function updateBlogInfo($data, $blogId) {
        $sql = "UPDATE blogs SET blog_title = '$data[blog_title]', author_name = '$data[author_name]', blog_description ='$data[blog_description]', publication_status = '$data[publication_status]' WHERE id = '$blogId' ";
        $this->queryExecute($sql);
        header('Location: view-blog.php');
    }

    public function deleteBlogInfo($id) {
        $sql = "DELETE FROM blogs WHERE id = '$id' ";
        $this->queryExecute($sql);
        header('Location: view-blog.php');
    }

}
