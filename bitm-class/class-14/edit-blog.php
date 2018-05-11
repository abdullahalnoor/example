<?php
     $blogId = $_GET['id'];
     
     require_once './Blog.php';
     $blog = new Blog();
     
     $queryResult = $blog->selectBlogInfoByBlogId($blogId);
     $blogInfo = mysqli_fetch_assoc($queryResult);
     
//     echo '<pre>';
//     print_r($blogInfo);
     
     if($_POST['btn']) {
         $blog->updateBlogInfo($_POST, $blogId);
     }
     
     
     

?>

<hr/>
    <a href="add-blog.php">Add Blog</a>
    <a href="view-blog.php">View Blog</a>
<hr/>


<h3>Edit Blog Form</h3>

<form action="" method="POST" name="editBlogForm">
    <table>
        <tr>
            <td>Blog Title</td>
            <td><input type="text" name="blog_title" value="<?php echo $blogInfo['blog_title']; ?>"></td>
        </tr>
        <tr>
            <td>Author Name</td>
            <td><input type="text" name="author_name" value="<?php echo $blogInfo['author_name']; ?>"></td>
        </tr>
        <tr>
            <td>Blog Description</td>
            <td><textarea name="blog_description" rows="5" cols="30"><?php echo $blogInfo['blog_description']; ?></textarea></td>
        </tr>
        <tr>
            <td>Publication Status</td>
            <td>
                <select name="publication_status">
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Update Blog Info"></td>
        </tr>
    </table>
</form>
<script>
    document.forms['editBlogForm'].elements['publication_status'].value = '<?php echo $blogInfo['publication_status']; ?>';
</script>

















