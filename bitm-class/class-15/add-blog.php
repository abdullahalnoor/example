<?php
$xyz='';
    if( isset($_POST['btn']) ) {
        require_once './Blog.php';
        $blog = new Blog();
        $xyz = $blog->saveBlogInfo($_POST);
    } 
?>

<hr/>
    <a href="add-blog.php">Add Blog</a>
    <a href="view-blog.php">View Blog</a>
<hr/>



<h1><?php echo $xyz; ?></h1>
<form action="" method="POST">
    <table>
        <tr>
            <td>Blog Title</td>
            <td><input type="text" name="blog_title"></td>
        </tr>
        <tr>
            <td>Author Name</td>
        <td><input type="text" name="author_name"></td>
        </tr>
        <tr>
            <td>Blog Description</td>
            <td><textarea name="blog_description" rows="5" cols="30"></textarea></td>
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
            <td><input type="submit" name="btn" value="Save Blog Info"></td>
        </tr>
    </table>
</form>