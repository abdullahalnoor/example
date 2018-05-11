<?php 
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
    }
    
    require '../vendor/autoload.php';
    use App\classes\Blog;
    
    $id = $_GET['id'];
    
    $queryResult = Blog::getBlogInfoById($id);
    $blogInfo = mysqli_fetch_assoc($queryResult); 

    
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Category</title>
    <link href="../assets/admin/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include './includes/header.php'; ?>
<div class="container" style="margin-top: 80px;" >
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    
                    <tr>
                        <th>Blog ID</th>
                        <td><?php echo $blogInfo['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Category ID</th>
                        <td><?php echo $blogInfo['category_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td><?php echo $blogInfo['category_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Blog Title</th>
                        <td><?php echo $blogInfo['blog_title']; ?></td>
                    </tr>
                    <tr>
                        <th>Author Name</th>
                        <td><?php echo $blogInfo['author_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Blog Description</th>
                        <td><?php echo $blogInfo['blog_description']; ?></td>
                    </tr>
                    <tr>
                        <th>Blog Image</th>
                        <td><img src="<?php echo $blogInfo['blog_image']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td><?php echo $blogInfo['publication_status'] == 1 ? 'Published' : 'Unpublished'; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>