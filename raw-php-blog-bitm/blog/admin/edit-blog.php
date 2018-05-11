<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

require '../vendor/autoload.php';

use App\classes\Category;
use App\classes\Login;
use App\classes\Blog;

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $message = Login::adminLogout();
        $_SESSION['message'] = $message;
    }
}


if(isset($_POST['btn'])) {
    Blog::updateBlogInfo($_POST);
}






$queryResult = Category::getAllpublishedCategory();

$id = $_GET['id'];
$bogQueryResult = Blog::getBlogInfoById($id);
$blogInfo = mysqli_fetch_assoc($bogQueryResult);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Category</title>
        <link href="../assets/admin/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
<?php include './includes/header.php'; ?>
        <div class="container" style="margin-top: 80px; ">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <form class="form-horizontal" name="editBlogForm" action="" method="POST" enctype="multipart/form-data">
                        <h3 class="text-center text-primary">Edit Blog</h3>
                        <hr/>
                        <div class="form-group">
                            <label for="inputCategoryName" class="col-sm-2 control-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="blog_title" value="<?php echo $blogInfo['blog_title']; ?>" required class="form-control" placeholder="Blog Title">
                                <input type="hidden" name="blog_id" value="<?php echo $blogInfo['id']; ?>" required class="form-control" placeholder="Blog Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCategoryName" class="col-sm-2 control-label">Category Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputPublicationStatus" name="category_id">
                                    <option>---Select Category Name---</option>
<?php while ($publishedCategory = mysqli_fetch_assoc($queryResult)) { ?>
                                        <option value="<?php echo $publishedCategory['id']; ?>"><?php echo $publishedCategory['category_name']; ?></option>
<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCategoryDescription" class="col-sm-2 control-label">Blog Description</label>
                            <div class="col-sm-10">
                                <textarea name="blog_description" cols="30" rows="10" required style="resize: vertical;"  class="form-control" id="inputCategoryDescription" placeholder="Blog Description"><?php echo $blogInfo['blog_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCategoryDescription" class="col-sm-2 control-label">Blog Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="blog_image" accept="image/*"><br/>
                                <img src="<?php echo $blogInfo['blog_image']; ?>" height="80" width="80">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPublicationStatus" class="col-sm-2">Publication Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputPublicationStatus" name="publication_status">
                                    <option>---Select Publication Status---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Blog Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../assets/admin/js/bootstrap.min.js"></script>
        <script>
            document.forms['editBlogForm'].elements['publication_status'].value = '<?php echo $blogInfo['publication_status'] ?>';
            document.forms['editBlogForm'].elements['category_id'].value = '<?php echo $blogInfo['category_id'] ?>';
        </script>
    </body>
</html>